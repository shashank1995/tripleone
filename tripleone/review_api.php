<?php
header("Content-Type:application/json");

$servername = "";
$username = "";
$password = "";
$dbname = "";

$output[] = array();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if(!empty($_GET['product_id']))
{
	$product_id=$_GET['product_id'];
	$sql = "SELECT * FROM `review` WHERE product_id=$product_id";
	// $price = get_price($name);
	$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  $i = 0;
  while($row = $result->fetch_assoc()) {
    $output[$i] = array('username' => $row["username"], 'rating' => $row["rating"], 'date_published' => $row["date_published"], 'review' => $row['review']);
    $i++;
  }
} else {
  echo "0 results";
}

	if(count($output)==0)
	{
		response(200,"Product Not Found",NULL);
	}
	else
	{
		response(200,"Product Found",$output);
	}
	
}
else
{
	response(400,"Invalid Request",NULL);
}

if(isset($_POST['Review'])){
extract($_POST);

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
$retval = $conn->query($sql);

if(!$retval){
	die('Could not add review: ' . mysql_error());
}
else{
response(201,"Review added successfully.",NULL);
}

$conn->close();

function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	
	$json_response = json_encode($response,JSON_PRETTY_PRINT);
	echo $json_response;
}
?>