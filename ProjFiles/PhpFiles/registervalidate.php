<?php

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
                $nameErr = "lastname is required";
                echo($nameErr);
            } 
            else
            {
                if (empty($_POST["regUMobile"])) 
                {
                    $log_passwordErr = "Mobile number is required";
                    echo($log_passwordErr);
                } 
                else 
                {
                     if (empty($_POST["regUemail"]))
                     {
                         $nameErr = "Email is required";
                         echo($nameErr);
                     } 
                    else
                    {
                        if (empty($_POST["logUPwd"]))
                        {
                            $log_passwordErr = "Password is required";
                            echo($log_passwordErr);
                        } 
                        else
                        {
                            if (empty($_POST["regURePwd"]))
                            {
                                $nameErr = "Passwords do not match";
                                echo($nameErr);
                            } 
                            else
                            {
                                $uName=$_POST["regUName"];
                                $uPwd=$_POST["logUPwd"];
                                $uFName=$_POST["regFName"];
                                $uLName=$_POST["regLName"];
                                $uMobileNo=$_POST["regUMobile"];
                                $uEmailId=$_POST["regUemail"];
                                $uRPwd=$_POST["regURePwd"];
                                if($upwd==$uRPwd)
                                {
                                    $shallAllow=true;
                                }
                                else
                                {
                                    $nameErr = "Passwords do not match";
                                    echo($nameErr);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    echo ('<script language="javascript">');
    echo ('alert(<?php $nameErr  ?>)');  //not showing an alert box.
    echo ('</script>');

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
            $sql = "INSERT INTO webhostdb.userinfo (uid, uname, password, first_name, last_name, mobile_no, email_id, profile_pic ) VALUES ('1', 'pvsivapr', '123456', 'Venkata Sivaprasad Reddy', 'Pulagam', '9865231458', 'pvsivapr@gmail.com', 'no pic' )";
            $connn->exec($sql);
            echo "Connected successfully";
            echo ('<script language="javascript">');
            echo ('alert(Connected successfully>)');  //not showing an alert box.
            echo ('</script>');
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
            echo ('<script language="javascript">');
            echo ('alert(<?php $e->getMessage();  ?>)');  //not showing an alert box.
            echo ('</script>');
        }
    }
}

?>