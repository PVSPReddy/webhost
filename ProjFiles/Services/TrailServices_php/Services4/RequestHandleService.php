<?php

require_once("UserService.php");
require_once("ServerStatusService.php");

class RequestHandler extends ServerStatus
{
    function Request_Handler($method, $data)
    {
        $uServices = new UserServices();
        switch($method)
        {
            case "UserRegistration":
                $uServices -> Register($data);
                break;
            case"UserLogin":
                $uServices -> Register($data);
                break;
            case "AllUsersData":
                $uServices -> Register($data);
                break;
            default:
                $uServices -> FaultMethod($data);
                break;
        }
    }
    
}

?>