<?php

$servername = "mysql3.gear.host";
$username = "webhostdb";
$password = "siva_123456";
$dbName = "webhostdb";
$host = 3306;

$shallAllow =true;

// define variables and set to empty values
$log_Err ="";

if($shallAllow == true)
{
    try
    {
        $connn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $connn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * from webhostdb.userinfo WHERE uname = 1";
        //$sql = "SELECT * from 'webhostdb.userinfo' WHERE uid="+$_POST["logUName"];
        //echo ($sql);
        
        /*
        //1
        $connn->exec($sql);
        echo "Connected successfully";
        echo "step 2";
        $response1 = $connn->setFetchMode(PDO::FETCH_ASSOC); 
        $response2 = $connn->fetchAll();
       */
       
        //2
        // prepare sql and bind parameters
        $res_data = $connn->prepare($sql);
        $res_data->execute();
        

        // set the resulting array to associative
        $response1 = $res_data->setFetchMode(PDO::FETCH_ASSOC); 
        $response2 = $res_data->fetchAll();
        echo "step 4";
        
        echo "\n"."records obtained successfully";
        //echo "\n"+$stmt;
        //echo "\n"+$result->userId;
        //echo "\n"+$result->firstName;
        //echo "\n"+$result->lastName;
        //echo "\n"+$result;
       // echo "\n"+$result2;
       // print_r('response1:' . $response2['uname']);
        //print_r('response2:' . $response2);            
        
        foreach($response2 as $data)
        {
            echo $data['uname'];
        }
        
        if($response2[0]['password'] == $_POST["logUPwd"])
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
        echo('complete session');
        echo 'Connection failed: ' . $e->getMessage();
        /*echo ('<script language="javascript">');
        echo ('alert(<?php $e->getMessage();  ?>)');  //not showing an alert box.
        echo ('</script>');
        */
    }
    echo('end connection');
}

?>
