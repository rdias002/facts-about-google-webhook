<?php
	$method = $_SERVER['REQUEST_METHOD'];
	
	if($method == "POST"){
		$requestBody = file_get_contents('php://input');
		$json = json_decode($requestBody);
		$facts_category = $json->result->parameters->facts_category;
		switch($facts_category){
			case 'History':
				$speech = "Google was founded in 1998";
				break;
			case 'Head Quarters':
				$speech = "Google's Head Quarters is in California";
				break;
			default:
				$speech = "Sorry, didn't get that";
		}
		$response = new \stdClass();
		$response->speech="";
		$response->displayText="";
		$response->source="webhook";
		echo json_encode($response);
		
	}else{
		echo "Method not allowed";
	}
?>