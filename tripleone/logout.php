<?php 


session_start();

$_SESSION['u_id'] = $_POST['u_id'];

unset($_SESSION['u_id']);

session_destroy();


$url = 'http://qurizm.com/market/api.php';
$fields = array(
    'api' => "user_logout",
    'user_id' => $_SESSION['u_id']
);


$fields_string = "";
//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$response = curl_exec($ch);

//close connection
curl_close($ch);
// var_dump($response);

$result = json_decode($response, true);

header('Location: index.php');

?>