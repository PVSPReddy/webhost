<?php

//require_once("UserService.php");
require_once("RequestHandleService.php");

$method = $_SERVER['REQUEST_METHOD'];

//$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));

$requestContentType = $_SERVER['HTTP_ACCEPT'];

$requestName = "";
if(isset($_GET["userRequest"]))
{
    $requestName = $_GET["userRequest"];
}
else
{
    $requestName="faultRequest";
}

$rh = new RequestHandler();

if(strpos($requestContentType,'application/json') !== false)
{
    //$input = json_decode(file_get_contents('php://input'),true);
    $json = file_get_contents('php://input');
    //$rh -> Request_Handler($requestName, $json);
    $response = encodeJson($json);
    
    echo $response;
    //echo $response;
}
else if(strpos($requestContentType,'text/html') !== false)
{
    print_r($_REQUEST);
    //echo $response;
}
else if(strpos($requestContentType,'application/xml') !== false)
{
    print_r($_REQUEST);
    //echo $response;
}

function encodeXml($responseData) {
		// creating object of SimpleXMLElement
		$xml = new SimpleXMLElement('<?xml version="1.0"?><mobile></mobile>');
		foreach($responseData as $key=>$value) {
			$xml->addChild($key, $value);
		}
		return $xml->asXML();
	}
	
function encodeHtml($responseData) {
	
		$htmlResponse = "<table border='1'>";
		foreach($responseData as $key=>$value) {
    			$htmlResponse .= "<tr><td>". $key. "</td><td>". $value. "</td></tr>";
		}
		$htmlResponse .= "</table>";
		return $htmlResponse;		
	}
	
	
function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}


/*
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);
$json = file_get_contents('php://input');
$inputs = json_decode($json);

UserServices user_serv = new UserServices();

switch($method)
{
    case "Get"
    {
        
    }
}



$requestContentType = $_SERVER['HTTP_ACCEPT'];

if(strpos($requestContentType,'application/json') !== false)
{
    $response = $this->encodeJson($rawData);
    echo $response;
}
else if(strpos($requestContentType,'text/html') !== false)
{
    $response = $this->encodeHtml($rawData);
    echo $response;
}
else if(strpos($requestContentType,'application/xml') !== false)
{
    $response = $this->encodeXml($rawData);
    echo $response;
}
*/
?>