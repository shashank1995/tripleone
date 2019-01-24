<!DOCTYPE html>
<html>
<head>
	<title>Search Result</title>
</head>
<body>
<?php
if(isset($_POST['Search'])){
extract($_POST);
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'cmpe272lab';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(mysqli_connect_errno()){
	die('Could not connect: ' . mysql_connect_error());
}

$arr = explode(" ",$search_term);
if(sizeof($arr)>1){
	$search_term = $arr[0];
}
if($search_by=="name"){
	$sql = "SELECT * FROM USERS WHERE first_name like '%$search_term%'";
}
else if($search_by=="email"){
	$sql = "SELECT * FROM USERS WHERE email like '%$search_term%'";
}
else if($search_by=="phone_number"){
	$sql = "SELECT * FROM USERS WHERE cell_phone like '%$search_term%'";
}

$retval = mysqli_query($conn, $sql);

if(!$retval){
	die('Could not execute query: ' . mysql_error());
}

while($row=$retval->fetch_assoc()){
echo 'First Name:  '.$row["first_name"].'<br>Last Name: '.$row["last_name"].'<br>Email: '.$row["email"].'<br>Home Address: '.$row["home_address"].'<br>Home Phone: '.$row["home_phone"].'<br>Cell Phone: '.$row["cell_phone"];
}       

mysqli_close($conn);
}
?>
</body>
</html>