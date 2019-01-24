<!DOCTYPE html>
<html>
<head>
	<title>User Addition Result</title>
</head>
<body>
<?php
if(isset($_POST['Add'])){
extract($_POST);
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'cmpe272lab';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(mysqli_connect_errno()){
	die('Could not connect: ' . mysql_connect_error());
}

$sql = "INSERT INTO USERS "."(first_name,last_name,email,home_address,home_phone,cell_phone) "."VALUES "."('$first_name','$last_name','$email','$home_address','$home_phone','$cell_phone')";
$retval = mysqli_query($conn, $sql);

if(!$retval){
	die('Could not enter data: ' . mysql_error());
}
echo"<h4>User Added Successfully</h4>";
mysqli_close($conn);
}
?>
</body>
</html>