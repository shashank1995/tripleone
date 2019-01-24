<!DOCTYPE html>
<html>
<head>
	<title>5 most visited products</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<h4 align="center">5 Most Visited Products</h4>
<?php
if(isset($_COOKIE["last_five"])){
$allVisit = $_COOKIE["last_five"];
$allVisitArray = explode(',',$allVisit);
$freq = array_count_values($allVisitArray);
arsort($freq);
$count=0;
echo "<table>
        <thead>
          <tr>
              <th>Product Name</th>
              <th>Visit Count</th>
          </tr>
        </thead>
		<tbody>";
foreach($freq as $key => $value){
	if($count<5){
	echo"<tr><td>$key</td><td>$value</td></tr>";
	$count++;
}
else{
	break;
}
}
echo "</tbody></table>";
}
else{
	echo"<h3>No product visited yet.</h3>";
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>