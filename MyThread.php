<?php 
class myTread extends Thread {

	public function __construct ($method, $params){
		$this->method = $method;
		$this->params = $params;
	}
	public function run() {
		//echo "Method: ".$this->method;
		switch ($this->method) {
			case 'processPayment':
				$this->processPayment();
			break;
			case 'sendLead':
				$this->sendLead();
			break;
			
			default:
				echo "unknown Operation %)\n";
			break;
		}
	}

	public function processPayment(){
		( isset($this->params['account_id']) ) ? $account_id = $this->params['account_id'] : $account_id = "N/A";
		( isset($this->params['amount']) ) ? $amount = $this->params['amount'] : $amount = "N/A";
		echo "[Processing Payment] with Params: account_id = ".$account_id." and amount = ".$amount." at ".date("h:i:s")."\n\n";
		sleep(1);
	}

	public function sendLead(){
		( isset($this->params['lead_id']) ) ? $lead_id = $this->params['lead_id'] : $lead_id = "N/A";
		echo "[Sending Lead] with Params: lead_id = ".$lead_id." at ".date("h:i:s")."\n\n";
		sleep(3);
	}

	private $method = null;
	private $params = null;
};

?>