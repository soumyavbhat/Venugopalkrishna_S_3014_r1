<?php require_once('phpscripts/config.php');

$ip = $_SERVER['REMOTE_ADDR'];
// echo $ip;
if(isset($_POST['submit']))
{
  // echo "works";
  // CHECK IF FIELDS ARE FILLED
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
if($username !== "" && $password !== "")
{
$result = logIn($username, $password, $ip);
$message = $result;

}
else {
$message = "Please fill out all fields";
}
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

  <title>Login page</title>
</head>
<body>


  <div class="container">
    <!-- <h3>Return Home</h3> -->
    <div class="login">
<h1>Sign In</h1>
<p>Sign In with your username and password to get access to your account.</p>
    <form action="admin_login.php" method="post">
      <!-- <label for="">Username</label> -->
      <input type="text" name="username" value="" placeholder="USERNAME">
    <br>
      <!-- <label for="">Password</label> -->
      <input type="password" name="password" value="" placeholder="PASSWORD">
    <br>
      <input type="submit" name="submit" value="SIGN IN" class="submit">
<p>Forgot Password? Click <span style="  border-bottom: 1px solid #696B46 ">here</span></p>
<h3><?php if(!empty($message)){
  echo $message;
} ?></h3>

    </form>
  </div>
  <div class="log">
    <img src="images/logo.png" alt="">

<h1>Hello there, <br>welcome to our site.  </h1>

<p>We have some pretty exciting news along with some amazing deals. All you need to do is log in to know more.</p>
</div>

  </div>

</body>
</html>
