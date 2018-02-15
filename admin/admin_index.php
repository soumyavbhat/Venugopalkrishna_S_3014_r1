<?php
require_once('phpscripts/config.php');

confirm_logged_in();
date_default_timezone_set('America/Toronto');
$time = date('H:m:s');
$m = date("12:00:00");
$n = date("16:00:00");
$e = date("18:00:00");

// $d = date("Y-m-d ",$time)."16:00:00";

if($time<$m)
{
  $msg = "Good Morning";
  $msg2 = "Get sipping on that coffee and have a great day!";
}

elseif($time<$n){
  $msg = "Good Afternoon";
  $msg2 = "Welcome back from your afternoon nap!";
}

elseif($time<$e){
  $msg = "Good Evening";
  $msg2 = "The day is still young, don't miss out on today's fun!";
}


else {
  $msg = "Good Evening";
  $msg2 = "Get some good rest after you are done here.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300" rel="stylesheet">
  <title>Document</title>
</head>
<body>

  <div class="container bg">

    <h2><?php echo $msg; ?>, <?php echo $_SESSION['user_name']; ?> !</h2>
    <h3><?php echo $msg2; ?></h3>

<div class="lastlog">
<h3>Last log in : <?php echo $_SESSION['user_date']; ?></h3>
</div>
<br>
  </div>
</body>
</html>
