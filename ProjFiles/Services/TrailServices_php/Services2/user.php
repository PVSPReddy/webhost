<?php

class UserDetails
{
	private function getConnection()
	{
		$servername = "mysql3.gear.host";
		$username = "webhostdb";
		$password = "siva_123456";
		$dbName = "webhostdb";
		$host = 3306;
		$connn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
		$connn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $connn;
		/*
		try
		{
			
			$connn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
			$connn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			

			$uname = $_POST["logUName"];
			$sql = "SELECT * from webhostdb.userinfo";
			//$sql = "SELECT * from webhostdb.userinfo WHERE uname="."\""+$_POST["logUName"]."\"";
			//$sql = "SELECT * from webhostdb.userinfo WHERE uname="."\"".$_POST["logUName"]."\"";
			
			//echo ($sql);
			
			// prepare sql and bind parameters
			$res_data = $connn->prepare($sql);
			$res_data->execute();
			// set the resulting array to associative
			$_response = $res_data->setFetchMode(PDO::FETCH_ASSOC); 
			$response = $res_data->fetchAll();
			
			
			//echo "\n"."records obtained successfully";
			//echo $response[0]['uname'];
			//echo $response[0]['password'];
			//echo "\n"+$stmt;
			//echo "\n"+$result->userId;
			//echo "\n"+$result->firstName;
			//echo "\n"+$result->lastName;
			//echo "\n"+$result;
			// echo "\n"+$result2;
			
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " + $e->getMessage();
		}
		*/

	}

			
	
	private function getAllUsers()
	{
		/*
		$con = getConnection();
		$sql = "SELECT * from webhostdb.userinfo";
		$res_data = $connn->prepare($sql);
		$res_data->execute();
		$_response = $res_data->setFetchMode(PDO::FETCH_ASSOC); 
		$response = $res_data->fetchAll();
		$i=0;
		$userData=array();
		foreach($response as $eachUser)
		{
			$userData[$i] = array(
			'user_Id'=$eachUser['uid'],
			'user_name'=$eachUser['uname'],
			'user_password'=$eachUser['password'],
			'user_first_name'=$eachUser['first_name'],
			'user_last_name'=$eachUser['last_name'],
			'user_mobile_no'=$eachUser['mobile_no'],
			'user_email_id'=$eachUser['email_id'],
			'user_profile_pi'c=$eachUser['profile_pic']			
			);
			$i++;
		}*/
		//return $userData;
		return "hello";
	}
	
	private function getUser($uname)
	{
		$con = getConnection();
		$sql = "SELECT * from webhostdb.userinfo WHERE uname="."\"".uname."\"";
		$res_data = $connn->prepare($sql);
		$res_data->execute();
		$_response = $res_data->setFetchMode(PDO::FETCH_ASSOC); 
		$response = $res_data->fetchAll();
		foreach($response as $eachUser)
		{
			$userData[$i] = array(
			user_Id=$eachUser['uid'],
			user_name=$eachUser['uname'],
			user_password=$eachUser['password'],
			user_first_name=$eachUser['first_name'],
			user_last_name=$eachUser['last_name'],
			user_mobile_no=$eachUser['mobile_no'],
			user_email_id=$eachUser['email_id'],
			user_profile_pic=$eachUser['profile_pic']			
			);
			$i++;
		}
		return $userData
	}
	
}

public class UserInDetail()
{
	private string uname{get; set;}
}


?>