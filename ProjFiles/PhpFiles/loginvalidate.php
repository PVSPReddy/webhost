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
    echo ('step 0');
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
            echo "step 1";
        }
    }
}

if($shallAllow == true)
{
    try
    {
        $connn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $connn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * from webhostdb.userinfo WHERE uid=\$_POST[\"logUName\"]";
        echo "step 2";
        //1
        $connn->exec($sql);
        echo "Connected successfully";
        
        //2
         // prepare sql and bind parameters
        $res_data = $connn->prepare($sql);
        $res_data->execute();
        echo "step 3";

        // set the resulting array to associative
        $response1 = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $response2 = $stmt->fetchAll();
        echo "step 4";
        
        echo "\n"+"records obtained successfully";
        //echo "\n"+$stmt;
        //echo "\n"+$result->userId;
        //echo "\n"+$result->firstName;
        //echo "\n"+$result->lastName;
        //echo "\n"+$result;
       // echo "\n"+$result2;
        print_r('response1:' + $response1);
        print_r('response2:' + $response2);            
        
        if($response2->pwd == $_POST["logUPwd"])
        {
            print_r('user Login is valid');
        }
        else
        {
            print_r('user Login is not valid');
        }
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