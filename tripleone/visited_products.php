<?php

$url = 'http://qurizm.com/market/api.php';
$fields = array(
    'api' => "get_products_top_rating_by_domain",
    'domain' => "Text Editor"
);

// Login before shoeing products page

// if (isset($_POST['u_id'])) {

// } else {
//     $current_url = "http://www.mayankpadshala.com/KawaiiShop/products.php";
//     header("Location: https://qurizm.com/market/g_login1.php?f_url=$current_url");
// }


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

//print_r($result);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Top Five Products</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>

<nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">Triple One Technologies</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="product.php" class="nav-link">Products</a></li>
        <li class="nav-item"><a href="http://qurizm.com/market/" class="nav-link">Master</a></li>
        <li class="nav-item"><a href="user_tracking.php" class="nav-link">User Tracking</a></li>
      </ul>
    </div>
</nav>
<h3 align="center">Top 5 Rated Products</h3>
<div class="container">
 <div class="row">
<?php 
for ($i=0;$i<5;$i++) {  
?>
    <div class="col s12 m5">
      <div class="card">
        <div class="card-image">
          <img src=<?php echo $result['data'][$i]['img_url1'];?>>
          <h6 align="center" style="color:#0000b3;"><?php echo $result['data'][$i]['p_title'];?></h6>
        </div>
        <div class="card-content">
          <h6>Average Rating</h6>
          <span><?php echo $result['data'][$i]['p_avg_rating'];?></span>
        </div>
        <div class="card-action">
          <a href=<?php echo $result['data'][$i]['p_url'];?>>View More</a>
        </div>
      </div>
    </div>
<?php
}
?>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>