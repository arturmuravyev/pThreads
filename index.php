<?php
require_once 'MyThread.php';

$data = file_get_contents("tasks.json");
$json_data = json_decode($data, TRUE);
$tasks_counter = sizeOf($json_data);

//$threads is configurable up to the limit of the CPU cores
$threads = 4;

$start = microtime(true);
echo "Start: ".date("d-m-yy h:i:s")."\n";
echo ".....................................................................\n";
/*
	initialize threads to process tasks while they exist in $json_data
*/
while($tasks_counter > 0) {

	($threads > $tasks_counter) ? $limit = $tasks_counter : $limit = $threads;

	for( $i = 0; $i < $limit; $i++){
	    if ($json_data[$i]['category'] == 'account' && $json_data[$i]['task'] == 'processPayment' && isset($json_data[$i]['data'])) {
	    	$pool[] = new myTread('processPayment',$json_data[$i]['data']);
	    }else if ($json_data[$i]['category'] == 'amocrm' && $json_data[$i]['task'] == 'sendLead'  && isset($json_data[$i]['data'])) {
	    	$pool[] = new myTread('sendLead', $json_data[$i]['data']);
	    }else {
	    	echo "At position $i data set is incorrect \n".$json_data[$i]['category'].$json_data[$i]['task'];
	    }
	}

	foreach($pool as $worker){
	    $worker->start();
	}
	foreach($pool as $worker){
	    $worker->join();
	}
	
	$pool = [];
	//delete tasks which already sent for processing in new Thread
	array_splice($json_data, 0, $threads);
	//recalculate counter
	$tasks_counter = sizeOf($json_data);
	echo ".....................................................................\n";
}

$seconds = microtime(true) - $start;
echo "Done in ".number_format($seconds,2)." seconds\n";
echo "Ended: ".date("d-m-yy h:i:s")."\n";

?>