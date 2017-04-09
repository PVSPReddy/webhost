<?php
    // define variables and set to empty values
$log_nameErr =""; $log_passwordErr ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (empty($_POST["logUName"])) 
    {
        $nameErr = "Name is required";
        echo($nameErr);
    } 
    else
    {
        //$name = test_input($_POST["name"]);
    }
    
    if (empty($_POST["logUPwd"])) 
    {
        $log_passwordErr = "Password is required";
        echo($log_passwordErr);
    } 
    else
    {
        //$name = test_input($_POST["name"]);
    }
}

?>