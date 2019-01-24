<!DOCTYPE html>
<html>
<head>
	<title>Last 5 visited products</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<h4 align="center">Last 5 Visited Products</h4>
<?php
if(isset($_COOKIE["last_five"])){
$lastFiveString = $_COOKIE["last_five"];
$allVisitArray = explode(',',$lastFiveString);
if(sizeof($allVisitArray)>5){
$lastFiveVisit = array_slice($allVisitArray,-5);
}
else{
	$lastFiveVisit = $allVisitArray;
}
for($y=sizeof($lastFiveVisit)-1;$y>=0;$y--){
	echo"<ul class=\"collection\">
		<li class=\"collection-item\">$lastFiveVisit[$y]</li>
	</ul>";
}
}
else{
	echo"<h3>No product visited yet.</h3>";
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>