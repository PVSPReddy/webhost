<?php

$servername = "mysql3.gear.host";
$username = "webhostdb";
$password = "siva_123456";
$dbName = "webhostdb";
$host = 3306;

$shallAllow =false;

// define variables and set to empty values
$log_Err ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    //echo ('step 0');
    if (empty($_POST["logUName"])) 
    {
        $log_Err = "Name is required";
        echo($log_Err);
    } 
    else
    {
        if (empty($_POST["logUPwd"]))
        {
            $log_Err = "Password is required";
            echo($log_Err);
        }
        else
        {
            $shallAllow =true;
            //echo "step 1";
        }
    }
}

if($shallAllow == true)
{
    try
    {
        
        $connn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $connn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $uname = $_POST["logUName"];
        //$sql = "SELECT * from webhostdb.userinfo WHERE uname=\"pvsivapr\" ";
        //$sql = "SELECT * from webhostdb.userinfo WHERE uname="."\""+$_POST["logUName"]."\"";
        $sql = "SELECT * from webhostdb.userinfo WHERE uname="."\"".$_POST["logUName"]."\"";
        
        echo ($sql);
        
        // prepare sql and bind parameters
        $res_data = $connn->prepare($sql);
        $res_data->execute();

        // set the resulting array to associative
        $_response = $res_data->setFetchMode(PDO::FETCH_ASSOC); 
        $response = $res_data->fetchAll();
       
        
        echo "\n"."records obtained successfully";
        echo $response[0]['uname'];
        echo $response[0]['password'];
        //echo "\n"+$stmt;
        //echo "\n"+$result->userId;
        //echo "\n"+$result->firstName;
        //echo "\n"+$result->lastName;
        //echo "\n"+$result;
       // echo "\n"+$result2;
                  
        
        if($response[0]['password'] === '12345678')
        {
            print_r('user Login is valid');
        }
        else
        {
            print_r('user Login is not valid');
        }
        
        
        /*
        $connn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $connn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * from 'webhostdb.userinfo' WHERE uname="+"\""+$_POST["logUName"]+"\"";
        
        echo ($sql);
        
        // prepare sql and bind parameters
        $res_data = $connn->prepare($sql);
        $res_data->exec($sql);

        // set the resulting array to associative
        $response = $res_data->setFetchMode(PDO::FETCH_ASSOC); 
        $_response = $res_data->fetchAll();
       
        
        echo "\n"+"records obtained successfully";
        echo $response[0][uname];
        echo $response[0][password];
        //echo "\n"+$stmt;
        //echo "\n"+$result->userId;
        //echo "\n"+$result->firstName;
        //echo "\n"+$result->lastName;
        //echo "\n"+$result;
       // echo "\n"+$result2;
                  
        
        if($response[0][password] == $_POST["logUPwd"])
        {
            print_r('user Login is valid');
        }
        else
        {
            print_r('user Login is not valid');
        }
        */
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " + $e->getMessage();
        /*echo ('<script language="javascript">');
        echo ('alert(<?php $e->getMessage();  ?>)');  //not showing an alert box.
        echo ('</script>');
        */
    }
}

?>