<?php
require_once('phpscripts/config.php');

// PAGE WHEN LOCKED OUT
$msg = "Sorry";
$msg2 = "Due to Security reasons, your account has been blocked. Please contact us to reactivate your account.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300" rel="stylesheet">
  <title>Error Page</title>
</head>
<body>

  <div class="container bg2">

    <h2><?php echo $msg; ?>, <?php echo $_SESSION['user_name']; ?> !</h2>
    <h3><?php echo $msg2; ?></h3>

<div class="lastlog">
</div>
<br>
  </div>
</body>
</html>
