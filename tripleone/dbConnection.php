<!DOCTYPE html>
<html>
<head>
<title>Users List</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<table class="striped">
<thead>
<tr>
<th>Name</th>
</tr>
</thead>
<tbody>
<?php
$con = mysqli_connect("localhost","root","root","Cmpe272_lab_users");
if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysql_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM `Users`");
while($user = $result->fetch_assoc()){
	echo"<tr><td>".$user["user_name"]."</td></tr>";
}
mysqli_close($con);
?>
</tbody>
</table>
</body>
</html>