<?php

	
	session_start();
	
	if($_GET['logout']==1 AND $_SESSION['id'])
	{
		session_destroy();
	
		$msg = "You have been logged out. Have a nice day";
	
	}
	include("connection.php");
	
	if($_POST['submit']=="Sign Up")
	{
		if(!$_POST['email']) $error.="<br/>please enter your email";
		else 
			if (!filter_var($_POST['email'].FILTER_VALIDATE_EMAIL)) $error.="<br/>Please Enter a valid Email Address";
		
		if(!$_POST['password']) $error.="<br/>Please enter password";
			
			else
			{
				if(strlen($_POST['password'])<8) $error.="<br/>please enter a password with atleast 8 charecters";
				if(!preg_match('`[A-Z]`',$_POST['password'])) $error.="<br/>Please include atleast one capital letter in password";
			}
		
		
		if($error)
			$error = "There were errors in your signup details".$error;
	
	
	
		else
		{
			
			
			$query = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."'";
						
			$result = mysqli_query($link,$query);
			
			$results = mysqli_num_rows($result);
			
			if($results) $error = "That email address is already registered. Do you want to login In";
			
			else
			{
				$query = "INSERT INTO `users` (`email`,`password`) VALUES('".mysqli_real_escape_string($link,$_POST['email'])."','".md5(md5($_POST['email']).$_POST['password'])."')";
				
				mysqli_query($link,$query);
				
				echo "You have been signed up";
				
				$_SESSION['id'] = mysqli_insert_id($link);
				
				//print_r($_SESSION);
				
				header("Location:mainpage.php");
			}			
			
		}
	
	
	}
	
	
	if($_POST['submit']=='Log In')
	{
		
		$query = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($link,$_POST['loginemail'])."' AND password = '".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."' LIMIT 1 ";
		
		$result = mysqli_query($link,$query);
		
		$row = mysqli_fetch_array($result);
		
		if($row)
		{
			
			$_SESSION['id'] = $row['id'];
			
			//print_r($_SESSION);
			
			//Redirect log in page
			
			header("Location:mainpage.php");
			
		}
		
		else
		{
			$error = "We could not find a user with that email and password. Please try again.";
		}
		
		
		
	}
	
	
	
	
?>