<!DOCTYPE html>
<html>
<head>
	<?php
extract($_POST);
if(!$USERNAME || !$PASSWORD){
	fieldsBlank();
	die();
}
if(isset($NewUser)){
	if(!($file=fopen("password.txt","a"))){
		print("<title>Error</title></head><body>
			Could not open password file</body></html>");
		die();
	}
fputs($file, "$USERNAME,$PASSWORD\n");
userAdded($USERNAME);
}
else{
	if(!($file=fopen("password.txt","r"))){
		print("<title>Error</title></head><body>
			Could not open password file</body></html>");
		die();
	}
	$userVerified = 0;
	while(!feof($file) && !$userVerified){
		$line=fgets($file,255);
		$line=chop($line);
		$field=explode(",",$line);
		if($USERNAME==$field[0]){
			$userVerified=1;
			if(checkPassword($PASSWORD,$field)==true)
				accessGranted($USERNAME);
			else
				wrongPassword();
		}
		}
		fclose($file);
		if(!$userVerified)
			accessDenied();
	}

	function checkPassword($userpassword,$filedata)
	{
		if($userpassword==$filedata[1])
			return true;
		else
			return false;
	}

	function userAdded($name)
	{
		print("<title>Thank You</title></head>
			<body style=\"font-family:arial;
			font-size:1em; color:blue\">
			<strong>You have been added to the user list, $name.<br/>Enjoy the site.</strong>");
	}

	function accessGranted($name)
	{
		if($name=='admin'){
		if(!($file=fopen("password.txt","r"))){
		print("<title>Error</title></head><body>
			Could not open password file</body></html>");
		die();
	}
	$users = array();
	while(!feof($file)){
		$line=fgets($file,255);
		$line=chop($line);
		$field=explode(",",$line);
		if($field[0]=="admin")
			continue;
		else{
			array_push($users,$field[0]);
		}	
	}
	print("<title>Admin login</title></head>
		<body style=\"font-family:arial;
		font-size:1em; color:blue\">
		<strong>Welcome, $name.</strong><br/>
		<h5>Current users of website:</h5>
		<ul>");
	foreach($users as $user){
		print("<li>$user</li>");
	}
	print("</ul>");
	}
	else{
		print("<title>Thank You</title></head>
			<body style=\"font-family:arial;
			font-size:1em; color:blue\">
			<strong>Welcome, $name.</strong><br/>");
	}
	}

	function wrongPassword()
	{
		print("<title>Access Denied</title></head>
			<body style=\"font-family:arial;
			font-size:1em; color:red\">
			<strong>You entered an invalid password.<br/>
			Access has been denied.</strong>");
	}

	function accessDenied()
	{
		print("<title>Access Denied</title></head>
			<body style=\"font-family:arial;
			font-size:1em; color:red\">
			<strong>You were denied access to this server.
			<br/></strong>");
	}

	function fieldsBlank()
	{
		print("<title>Access Denied</title></head>
			<body style=\"font-family:arial;
			font-size:1em; color:red\">
			<strong>Please fill in all form fields.
			<br/></strong>");
	}
	?>
</body>
</html>