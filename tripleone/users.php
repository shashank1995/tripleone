<!DOCTYPE html>
<html>
<head>
<title>Users List</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<h4 class="center" style="color:black">Shashank Users Table</h4>
<?php
include 'dbConnection.php';
echo "<h4 class=\"center\" style=\"color:black\">Prajwal Users Table</h4>";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"www.prajwalk.com/dbConnection.php");
curl_exec($ch);
echo "<h4 class=\"center\" style=\"color:black\">Ramya Users Table</h4>";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"http://www.ramyaiyer.com/dbconnection.php");
curl_exec($ch);
?>
</body>
</html>