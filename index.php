<?php
require_once 'MyThread.php';

$threads = 6;

$start = microtime(true);
echo "Start: ".date("d-m-yy h:i:s")."\n";

for( $i = 0; $i < $threads; $i++){
    ($i == 0 || $i == $threads - 1) ? $pool[] = new myTread('processPayment') : $pool[] = new myTread('sendLead');
}

foreach($pool as $worker){
    $worker->start();
}
foreach($pool as $worker){
    $worker->join();
}
printf("Done for %.2f seconds" . "\n", microtime(true) - $start);
echo "Ended: ".date("d-m-yy h:i:s")."\n";
?>