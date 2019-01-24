<?php
if(isset($_POST['Review'])){
extract($_POST);
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'cmpe272lab';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(mysqli_connect_errno()){
	die('Could not connect: ' . mysql_connect_error());
}

if($_POST['star']=='star-5'){
	$rating = 5;
}
else if($_POST['star']=='star-4'){
	$rating = 4;
}
else if($_POST['star']=='star-3'){
	$rating = 3;
}
else if($_POST['star']=='star-2'){
	$rating = 2;
}
else if($_POST['star']=='star-1'){
	$rating = 1;
}

$sql = "INSERT INTO review "."(username,review,rating,product_id)"."VALUES "."('$username','$review','$rating','$product_id')";
$retval = mysqli_query($conn, $sql);

if(!$retval){
	die('Could not enter data: ' . mysql_error());
}
echo"<h4>Review Added Successfully</h4>";
mysqli_close($conn);
}
?>