<?php
require_once("user.php");
$method = $_SERVER['REQUEST_METHOD'];
echo $method;
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
foreach($request as $item)
{
	echo $item;
}
$input = json_decode(file_get_contents('php://input'),true);
echo $input;

$call = "";
if(isset($_GET["call"]))
{
    $call = $_GET["call"];
}
else
{
    
}
$user = new user();
switch($call)
{
    case "1":
    $user->getAllUsers();
    break;
    case "2":
    break;
    case "3":
    break;
    case "4":
    break;
    case "5":
    break;
    case "6":
    break;
    default:
    break;
}

?>