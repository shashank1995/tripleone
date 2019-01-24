<?php
if(!isset($_COOKIE["last_five"])){
  setcookie("last_five","Atom",time()+(86400*30),"/");
}
else{
  $last_five_updated = $_COOKIE["last_five"].','."Atom";
  setcookie("last_five",$last_five_updated,time()+(86400*30),"/");
}
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
      </ul>
    </div>
  </nav>
  <div class="container" style="margin-top: 20px;">
    <div class="row">
      <div class="col s4">
      <img src="images/product4.png" alt="product1" height="300" width="350">
    </div>
      <div class="col s4 offset-s2">
        <span style="font-size: 12px; color:#358ED7;">TEXT EDITOR</span><br>
        <h4 align="center" style="font-weight: 300; font-size: 40px; color: #43484D; letter-spacing: -2px;">Atom</h4>
      <p style="font-size: 10px; font-weight: 300; color: #7a858e; line-height: 14px;">
        Atom is a free and open-source text and source code editor for macOS, Linux, and Microsoft Windows with support for plug-ins written in Node.js, and embedded Git Control, developed by GitHub. Atom is a desktop application built using web technologies. Most of the extending packages have free software licenses and are community-built and maintained. Atom is based on Electron (formerly known as Atom Shell), a framework that enables cross-platform desktop applications using Chromium and Node.js. It is written in CoffeeScript and Less. It can also be used as an integrated development environment (IDE). Atom was released from beta, as version 1.0, on 25 June 2015. Its developers call it a "hackable text editor for the 21st Century".
      </p>
      <hr style="border-top: 1px solid #8c8b8b;">
     <div class="cable-config">
        <span>Software configuration</span>
        <div class="cable-choose">
          <button>Community</button>
          <button>Professional</button>
        </div>
    <div class="product-price">
      <span>450$</span>
      <a href="#" class="cart-btn">Add to cart</a>
    </div> 
    </div>
  </div>
  </div>
  </div>
     <div class="container">
    <h4 class="center">Add a review:</h4>
  <form class="col s12" action="review.php" method="post">
     <div class="stars">
    <input class="star star-5" id="star-5" type="radio" name="star" value="star-5" />
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star" value="star-4" />
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star" value="star-3" />
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star" value="star-2" />
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star" value="star-1" />
    <label class="star star-1" for="star-1"></label>
  </div>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="username" name="username" type="text" class="validate">
          <label for="username">User Name</label>
        </div>
        <div class="input-field col s1">
          <input readonly value="4" id="product_id" name="product_id" type="text" class="validate">
          <label for="product_id">Product ID</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="review" name="review" class="materialize-textarea"></textarea>
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
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'cmpe272lab';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(mysqli_connect_errno()){
  die('Could not connect: ' . mysql_connect_error());
}

echo "<div class=\"container\">";

$review_num = mysqli_query($conn,"SELECT COUNT(*) FROM `review` WHERE product_id=4");
while($total_num = $review_num->fetch_assoc()){
  echo "<div class=\"row\"><h5 style=\"font-weight:600\">".$total_num['COUNT(*)']." customer reviews</h5></div>";
}

$avg_rating = mysqli_query($conn,"SELECT avg(rating) FROM `review` WHERE product_id=4");
$rating_star = $avg_rating->fetch_assoc();
$rating_star = $rating_star['avg(rating)'];
$integer_rating = intval($rating_star);
$float_remainder = fmod($rating_star,1);
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
      echo "<i class=\"material-icons\">star_border</i>"; 
}
}
mysqli_data_seek($avg_rating,0);
while($rating = $avg_rating->fetch_assoc()){
  echo "<div class=\"row\">".$rating['avg(rating)']."<span> out of 5 stars</span></div>";
}
echo "</div>";

$sql = "SELECT * FROM `review` WHERE product_id=4";
$all_review = mysqli_query($conn, $sql);

echo"<div class=\"container\"><ul class=\"collection\">";
while($review = $all_review->fetch_assoc()){
  echo "<li class=\"collection-item avatar\">
  <i class=\"material-icons circle\">person</i>
      <span class=\"title\">".$review['username']."</span><br>";
    for($i=0;$i<$review['rating'];$i++){
      echo "<i class=\"material-icons\">star</i>";
    }
    for($i=0;$i<(5-$review['rating']);$i++){
      echo "<i class=\"material-icons\">star_border</i>"; 
    }
    echo"<p><span style=\"font-size: 12px;\">".$review['date_published']."</span><br>".$review['review']."</p>";
    echo"</li>";
}
echo"</ul></div>";

if(!$all_review){
  die('Could not fetch reviews: ' . mysql_error());
}

mysqli_close($conn);
?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script type="text/javascript">
         $('#textarea1').val('New Text');
         M.textareaAutoResize($('#textarea1'));
      </script>
    </body>
  </html>