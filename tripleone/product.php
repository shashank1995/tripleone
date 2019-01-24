<?php

if (isset($_POST['u_id'])){

} else {
	$current_url = "http://www.labassignments.xyz/product.php";
	header("Location: https://qurizm.com/market/g_login1.php?f_url=$current_url");
}

session_start();

$_SESSION['u_id'] = $_POST['u_id'];

$url = 'http://qurizm.com/market/api.php';
$fields = array(
    'api' => "get_products_by_domain",
    'domain' => "Text Editor"
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

// var_dump($result);
$status = $result['status'];
$status_message = $result['status_message'];
$id =  $result['data'][0]["id"];
$domain = $result['data'][0]["domain"];
$p_url = $result['data'][0]["p_url"];
$img_url1 = $result['data'][0]["img_url1"];
$p_title = $result['data'][1]["p_title"];
$p_desc = $result['data'][0]["p_desc"];
$p_price = $result['data'][0]["p_price"];
$p_avg_rating = $result['data'][0]["p_avg_rating"];
$p_total_reviews = $result['data'][0]["p_total_reviews"];
$p_total_visits = $result['data'][0]["p_total_visits"];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Products - 111 Technologies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" data-aos="fade-down" data-aos-delay="500">
      <div class="container">
        <a class="navbar-brand" href="index.php" style="color: #ffffff">Triple One Technologies</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto" style="color: #ffffff">
            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="products.php" class="nav-link">Products</a></li>
            <li class="nav-item"><a href="http://qurizm.com/market/" class="nav-link">Master</a></li>
            <li class="nav-item active"><a href="visited_products.php" class="nav-link">Top Products</a></li>
            <li class="nav-item"><a href="user_tracking.php" class="nav-link">User Tracking</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <section class="ftco-cover" style="background-image: url(images/image_11.png);" id="section-home" data-aos="fade"  data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center ftco-vh-75">
          <div class="col-md-7">
            <h1 class="ftco-heading mb-3" data-aos="fade-up" data-aos-delay="500">Our Products</h1>
            <h2 class="h5 ftco-subheading mb-5" data-aos="fade-up"  data-aos-delay="600" style="color: #ffffff">Sublime Text is built from custom components, providing for unmatched responsiveness.</h2>    
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

<div class="container">
  <div class="section">
  <div clas="row">
    <div class="center">
    <a href="visited_products.php" class="waves-effect waves-light btn-large">Top 5 Rated Products</a>
  </div>
</div>
</div>
</div>

    <div class="container" id="ourProductRange" style="padding-top:35px;">
    <div class="section">
      <div class="row">
        <div class="col s3 offset-s1">
        <h4 class="center" style="color:black">Our Products</h4>
        </div>
      </div>
      <div class="row">
        <?php
        for($i=0;$i<count($result['data']);$i++){
        ?>
        <div class="col s12 m6">
          <div class="card">
            <div class="card-content center">
              <p itemprop="name"><a href="product1.php"><?php echo $result['data'][$i]['p_title']  ?></a></p>
            </div>
            <div class="card-image">
              <a href=<?php echo $result['data'][$i]['p_url'];  ?> itemprop="url"><img itemprop="image" src=<?php echo $result['data'][$i]['img_url1'];  ?>></a>
            </div>
            <div class="card-action center">
              <a href=<?php echo $result['data'][$i]['p_url'];  ?> itemprop="url" class="waves-effect waves-light btn-large" style="background-color:teal">View More</a></li>
            </div>
          </div>
        </div>
        <?php
    	}
        ?>
        
  </div>
  </div>
  </div>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>