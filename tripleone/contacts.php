<?php
echo '<!DOCTYPE html>
<html>
<head>
<title>Contacts - 111 Technologies</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<nav>
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      	<li><a href="index.php">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="blog.html">News</a></li>
        <li><a href="contacts.php">Contacts</a></li>
      </ul>
    </div>
  </nav><h2>Company Contacts</h2><table><tbody>';
$file="./contacts.txt";
$doc=file_get_contents($file);
$line=explode("\n",$doc);
foreach($line as $newline){
    echo '<tr><h4 style="color:#453288">'.$newline.'</h4></tr>';
}
echo '</tbody></table><script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script></body></html>'
?>