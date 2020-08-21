<?php 
class myTread extends Thread {

	public function __construct ($method){
		$this->method = $method;
	}
	public function run() {
		echo "Method: ".$this->method;
		switch ($this->method) {
			case 'processPayment':
				$this->processPayment();
			break;
			case 'sendLead':
				$this->sendLead();
			break;
			
			default:
				echo "unknown Default %)\n";
				break;
		}
	}

	public function processPayment(){
		echo "processing Payment: ".date("h:i:s")."\n";
		sleep(1);
	}

	public function sendLead(){
		echo "sending Lead: ".date("h:i:s")."\n";
		sleep(3);
	}

	private $method = null;
};

?>