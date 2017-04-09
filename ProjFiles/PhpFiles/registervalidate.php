<?php

/*
include 'ChromePhp.php';
ChromePhp::log('This is just a log message');
ChromePhp::warn("This is a warning message " ) ;
ChromePhp::error("This is an error message" ) ;
ChromePhp::log($_SERVER);
 
// using labels
foreach ($_SERVER as $key => $value) {
    ChromePhp::log($key, $value);
     echo '<pre>';
    print_r("check 1");
    echo '</pre>';
    
}*/

$servername = "mysql3.gear.host";
$username = "webhostdb";
$password = "siva_123456";
$dbName = "webhostdb";
$host = 3306;
// define variables and set to empty values
$uName="";$uPwd="";$uFName="";$uLName="";$uMobileNo="";$uEmailId="";$uProfile="";$uRPwd="";
$log_Err ="";
$shallAllow =false;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (empty($_POST["regUName"])) 
    {
        $log_Err = "username is required";
        echo($log_Err);
    } 
    else
    {
         if (empty($_POST["regFName"])) 
         {
             $log_Err = "Firstname is required";
             echo($log_Err);
         } 
        else
        {
            if (empty($_POST["regLName"])) 
            {
                $log_Err = "lastname is required";
                echo($log_Err);
            } 
            else
            {
                if (empty($_POST["regUMobile"])) 
                {
                    $log_Err = "Mobile number is required";
                    echo($log_Err);
                } 
                else 
                {
                     if (empty($_POST["regUemail"]))
                     {
                         $log_Err = "Email is required";
                         echo($log_Err);
                     } 
                    else
                    {
                        if (empty($_POST["regUPwd"]))
                        {
                            $log_Err = "Password is required";
                            echo($log_Err);
                        } 
                        else
                        {
                            if (empty($_POST["regURePwd"]))
                            {
                                $log_Err = "Passwords do not match";
                                echo($log_Err);
                            } 
                            else
                            {
                                $uName=$_POST["regUName"];
                                $uPwd=$_POST["regUPwd"];
                                $uFName=$_POST["regFName"];
                                $uLName=$_POST["regLName"];
                                $uMobileNo=$_POST["regUMobile"];
                                $uEmailId=$_POST["regUemail"];
                                $uRPwd=$_POST["regURePwd"];
                                
                                if($_POST["regUPwd"] == $_POST["regURePwd"])
                                {
                                    $shallAllow=true;
                                }
                                else
                                {
                                    $log_Err = "Passwords did not match";
                                    echo($log_Err);
                                }
                                
                                /*if($upwd == $uRPwd)
                                {
                                    $shallAllow=true;
                                }
                                else
                                {
                                    $log_Err = "Passwords did not match";
                                    echo($log_Err);
                                }*/
                            }
                        }
                    }
                }
            }
        }
    }

    if (empty($_POST["fileUploading"])) 
    {
        //$log_passwordErr = "Password is required";
        //echo($log_passwordErr);
    } 
    else
    {
        //$name = test_input($_POST["name"]);
    }
   
    
    if($shallAllow==true)
    {
        try
        {
            $connn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
            $connn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO webhostdb.userinfo (uname, password, first_name, last_name, mobile_no, email_id, profile_pic ) VALUES ( '$uName', '$uPwd', '$uFName', '$uLName', '$uMobileNo', '$uEmailId', 'no pic' )";
            $connn->exec($sql);
            echo "Connected successfully";
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
            /*echo ('<script language="javascript">');
            echo ('alert(<?php $e->getMessage();  ?>)');  //not showing an alert box.
            echo ('</script>');
            */
        }
    }
}

?>