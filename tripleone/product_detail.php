<?php

session_start();
if (isset($_SESSION['u_id'])) {
  $url1 = 'http://qurizm.com/market/api.php';
  $fields1 = array(
    'api' => "check_user_status",
    'user_id' => $_SESSION['u_id']
  );

  $fields_string1 = "";
  //url-ify the data for the POST
  foreach($fields1 as $key=>$value) { $fields_string1 .= $key.'='.$value.'&'; }
  rtrim($fields_string1, '&');

  //open connection
  $ch1 = curl_init();

  //set the url, number of POST vars, POST data
  curl_setopt($ch1,CURLOPT_URL, $url1);
  curl_setopt($ch1,CURLOPT_POST, count($fields1));
  curl_setopt($ch1,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch1,CURLOPT_POSTFIELDS, $fields_string1);

  //execute post
  $response1 = curl_exec($ch1);

  //close connection
  curl_close($ch1);
  // var_dump($response);

  $result1 = json_decode($response1, true);

  if($result1['data']['active'] == "1") {
    // echo "status is 1";
  } else {
    // echo "status is 0";
    $current_url = "http://www.labassignments.xyz/product_detail.php?ID=".$_GET['ID'];
    // //$current_url = $_SERVER['REQUEST_URI'];
    header("Location: https://qurizm.com/market/g_login1.php?f_url=$current_url");
  }
} else {
  header("Location: http://www.labassignments.xyz/product.php/");
}



$url = 'http://qurizm.com/market/api.php';
$fields = array(
    'api' => "get_products_by_id",
    'product_id' => $_GET['ID']
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

//print_r($result);

//Access the session user id
//echo $_SESSION['u_id'];

$p_total_visits = $result['data']["p_total_visits"];


$url3 = 'http://qurizm.com/market/api.php';
$fields3 = array(
    'api' => "track_user",
  'user_id' => $_SESSION['u_id'],
  'product_id' => $_GET['ID'],
  'p_total_visits' => $p_total_visits
);

$fields_string3 = "";
//url-ify the data for the POST
foreach($fields3 as $key=>$value) { $fields_string3 .= $key.'='.$value.'&'; }
rtrim($fields_string3, '&');

//open connection
$ch3 = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch3,CURLOPT_URL, $url3);
curl_setopt($ch3,CURLOPT_POST, count($fields3));
curl_setopt($ch3,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch3,CURLOPT_POSTFIELDS, $fields_string3);

//execute post
$response3 = curl_exec($ch3);

//close connection
curl_close($ch3);
// var_dump($response);

$result3 = json_decode($response3, true);

//Access the session user id
//echo $_SESSION['u_id'];

?>
<!DOCTYPE html>
  <html>
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
      body{
        background-color: #f2f2f2;
      }
        div.stars {
          width: 270px;
          display: inline-block;
        }

        input.star { display: none; }

        label.star {
          float: right;
          padding: 10px;
          font-size: 36px;
          color: #444;
          transition: all .2s;
        }

        input.star:checked ~ label.star:before {
          content: '\f005';
          color: #FD4;
          transition: all .25s;
        }

        input.star-5:checked ~ label.star:before {
          color: #FE7;
          text-shadow: 0 0 20px #952;
        }

        input.star-1:checked ~ label.star:before { color: #F62; }

        label.star:hover { transform: rotate(-15deg) scale(1.3); }

        label.star:before {
          content: '\f006';
          font-family: FontAwesome;
        }

        .product-price {
          display: flex;
          align-items: center;
        }
         
        .product-price span {
          font-size: 26px;
          font-weight: 300;
          color: #43474D;
          margin-right: 20px;
        }
         
        .cart-btn {
          display: inline-block;
          background-color: #7DC855;
          border-radius: 6px;
          font-size: 16px;
          color: #FFFFFF;
          text-decoration: none;
          padding: 12px 30px;
          transition: all .5s;
        }
        .cart-btn:hover {
          background-color: #64af3d;
        }

        .cable-choose {
          margin-bottom: 20px;
        }
         
        .cable-choose button {
          border: 2px solid #E1E8EE;
          border-radius: 6px;
          padding: 13px 20px;
          font-size: 14px;
          color: #5E6977;
          background-color: #fff;
          cursor: pointer;
          transition: all .5s;
        }
         
        .cable-choose button:hover,
        .cable-choose button:active,
        .cable-choose button:focus {
          border: 2px solid #86939E;
          outline: none;
        }
         
        .cable-config {
          border-bottom: 1px solid #E1E8EE;
          margin-bottom: 20px;
        }
         
        .cable-config a {
          color: #358ED7;
          text-decoration: none;
          font-size: 12px;
          position: relative;
          margin: 10px 0;
          display: inline-block;
        }
        .cable-config a:before {
          content: &quot;?&quot;;
          height: 15px;
          width: 15px;
          border-radius: 50%;
          border: 2px solid rgba(53, 142, 215, 0.5);
          display: inline-block;
          text-align: center;
          line-height: 16px;
          opacity: 0.5;
          margin-right: 5px;
        }
      </style>
    </head>
    <body>
    <nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">Triple One Technologies</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="http://qurizm.com/market/">Master</a></li>
        <li class="nav-item"><a href="user_tracking.php" class="nav-link">User Tracking</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
  <div class="container" style="margin-top: 20px;">
    <div class="row">
      <div class="col s4">
      <img src=<?php echo $result['data']['img_url1']; ?> alt="product1" height="300" width="350">
    </div>
      <div class="col s4 offset-s2">
        <span style="font-size: 12px; color:#358ED7;">TEXT EDITOR</span><br>
        <h4 align="center" style="font-weight: 300; font-size: 40px; color: #43484D; letter-spacing: -2px;"><?php echo $result['data']['p_title']; ?></h4>
      <p style="font-size: 10px; font-weight: 300; color: #7a858e; line-height: 14px;">
        <?php echo $result['data']['p_desc']; ?>
      </p>
      <hr style="border-top: 1px solid #8c8b8b;">
     <div class="cable-config">
        <span>Software configuration</span>
        <div class="cable-choose">
          <button>Community</button>
          <button>Professional</button>
        </div>
    <div class="product-price">
      <span><?php echo $result['data']['p_price']; ?>$</span>
      <a href="#" class="cart-btn">Add to cart</a>
    </div> 
    </div>
  </div>
  </div>
  <div class="container">
    <h4 class="center">Add a review:</h4>
  <form class="col s12" action="http://qurizm.com/market/api.php" method="post" accept-charset="utf-8">
    <input type="hidden" name="api" value="add_rating_review"/>
        <input type="hidden" name="product_id" value="<?php echo $result['data']['id'];  ?>"/>
        <input type="hidden" name="product_avg_rating" value="<?php echo $result['data']['p_avg_rating'];   ?>"/>
        <input type="hidden" name="product_total_rating" value="<?php echo $result['data']['p_total_rating']; ?>"/>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['u_id']; ?>"/>
        <input type="hidden" name="back_url" value="<?php echo "http://www.labassignments.xyz/product_detail.php?ID=".$result['data']['id'];?>"/>
     <div class="stars">
    <input class="star star-5" id="star-5" type="radio" name="product_given_rating" value="5" />
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="product_given_rating" value="4" />
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="product_given_rating" value="3" />
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="product_given_rating" value="2" />
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="product_given_rating" value="1" />
    <label class="star star-1" for="star-1"></label>
  </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="review" name="product_review" class="materialize-textarea"></textarea>
          <label for="review">Review</label>
        </div>
      </div>
      <div class="row">
        <div class="center">
      <button class="btn waves-effect waves-light" type="submit" name="Review">Post Review
        <i class="material-icons right">send</i>
      </button>
      </div>
      </div>
</form>
</div>
<div class="container">
      <div class="row">
                  <h5 style="font-weight:600">  <?php 
                    echo $result['data']['p_total_reviews'];
                    ?>  Customer Reviews  </h5>
                  <h6>Average Customer Rating</h6>
                  
                <?php

                    $integer_rating = intval($result['data']['p_avg_rating']);

                    $float_remainder = fmod($result['data']['p_avg_rating'],1);

                for($i=0;$i<$integer_rating;$i++){
                echo "<i class=\"material-icons\">star</i>";
          }
          $flag = false;
          if($float_remainder<=0.5 && $float_remainder>0.00){
                echo "<i class=\"material-icons\">star_half</i>";
                $flag=true;
          }
          else if($float_remainder>0.5){
                echo "<i class=\"material-icons\">star</i>";
                $flag=true;
          }
          if($flag==true){
          for($i=0;$i<(4-$integer_rating);$i++){
                echo "<i class=\"material-icons\">star_border</i>"; 
          }
          }
          else{
            for($i=0;$i<(5-$integer_rating);$i++){
                echo "<i class=\"material-icons\" >star_border</i>"; 
          }
          }
            echo "<div class=\"\">".$result['data']['p_avg_rating']."<span> out of 5 stars</span></div>";
          
          ?>
              </div>
                <ul class="collection">
                  <?php
                          
                           for ($i=0; $i <count($result['data']['reviews']); $i++) { 
                                        
                        ?>
                  <li class="collection-item avatar">
                    <i class="material-icons circle" style="font-size: 24px;">person</i>
                    <span class="title"> <?php echo $result['data']['reviews'][$i]['fb_fname']; ?> </span>
                    <span class="title"> <?php echo $result['data']['reviews'][$i]['fb_lname']; ?> </span>
                    <br>
                    <?php 
                      for($j=0;$j<$result['data']['reviews'][$i]['rating'];$j++){
                    ?>
                      <i class="material-icons">star</i>
                    <?php 
                      }
                    ?>

                    <?php 
                      for($k=0;$k< 5 - $result['data']['reviews'][$i]['rating'];$k++){
                    ?>
                      <i class="material-icons">star_border</i>
                    <?php 
                      }
                    ?>
                    <p><span style="font-size: 12px;"><?php echo $result['data']['reviews'][$i]['timestamp']; ?></span></p>
                    <p><span><?php echo $result['data']['reviews'][$i]['review']; ?></span></p>
                  </li>

                  <?php
                    }
                  ?>

                </ul>
    </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script type="text/javascript">
         $('#textarea1').val('New Text');
         M.textareaAutoResize($('#textarea1'));
         $(document).ready(function() {
          $('.color-choose input').on('click', function() {
      var headphonesColor = $(this).attr('data-image');
      $('.active').removeClass('active');
      $('.left-column img[data-image = ' + headphonesColor + ']').addClass('active');
      $(this).addClass('active');
  });
 });
      </script>
    </body>
  </html>