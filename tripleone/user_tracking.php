<?php
session_start();

if (isset($_SESSION['u_id'])){

}else{
    if (isset($_POST['u_id'])) {

    } else {

        $current_url = "http://www.labassignments.xyz/user_tracking.php";
        header("Location: https://qurizm.com/market/g_login1.php?f_url=$current_url");
    }
}


if (isset($_POST['u_id'])) {
   $u_id = $_POST['u_id'];
   // echo $_POST['u_id'];
} else {
   $current_url = "http://www.labassignments.xyz/user_tracking.php";
   header("Location: https://qurizm.com/market/g_login1.php?f_url=$current_url");
}
   $url1 = 'http://qurizm.com/market/api.php';
    $fields1 = array(
        'api' => "get_user_track",
        'user_id' => $u_id
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
   // $row = $result1->fetch_assoc();
   // var_dump($result1);

?>

<!DOCTYPE html>
<html>

<head>
   <title>User Tracking</title>
   <link rel="stylesheet" type="text/css" href="style.css">
   <!-- BOOTSTRAP CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>


   <div class="content">
       <table class="table table-hover table-dark">
           <thead>
               <tr>
                   <th scope="col">#</th>
                   <th scope="col">Name</th>
                   <th scope="col">Visited Page</th>
               </tr>
           </thead>
           <tbody>
               <?php
                   if (count($result1['data'])>0) {
                       // output data of each row
                       for ($i=0; $i <count($result1['data']) ; $i++) {
               ?>
               <tr>
                   <th scope="row">
                       <?php echo ($i+1); ?>
                   </th>
                   <td>
                       <?php echo $result1['data'][$i]['fb_fname']." ".$result1['data'][$i]['fb_lname']; ?>
                   </td>
                   <td>
                       <a href="<?php echo $result1['data'][$i]['p_url'];?>"><?php echo $result1['data'][$i]['p_title']; ?></a>
                   </td>
               </tr>
               <?php
                   }
               }
               ?>

           </tbody>
       </table>
   </div>

</body>

</html>


