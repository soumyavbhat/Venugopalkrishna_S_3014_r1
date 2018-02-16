<?php
function logIn($username, $password, $ip)
{
  require_once('connect.php');
  $username = mysqli_real_escape_string($link, $username);
  $password = mysqli_real_escape_string($link, $password);
  $loginstring = "Select * from tbl_user where user_name = '{$username}' and user_pass = '{$password}'";
  $loginstringuser = "Select * from tbl_user where user_name = '{$username}'";

  // echo $loginstring;
  $user_set = mysqli_query($link, $loginstring);
  $user_only = mysqli_query($link, $loginstringuser);
  // echo mysqli_num_rows($user_set);
if(mysqli_num_rows($user_set))
{
  // CHECK IF USERNAME AND PASSWORD ARE RIGHT
  $founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
  $id = $founduser['user_id'];
  // echo $id;
  $_SESSION['user_id'] = $id;
  $_SESSION['user_name'] = $founduser['user_name'];
  $_SESSION['user_date'] = $founduser['user_date'];

  $_SESSION['user_attempts'] = $founduser['user_attempts'];


  if(mysqli_query($link, $loginstring))
  {
    $count = $founduser['user_attempts'];
    // CHECK IF ATTEMPTS ARE OVER 3
    if($count < 4)
    {
// IF NOT, lOGIN ACCEPTED
    $update = "update tbl_user set user_ip='{$ip}' where user_id = {$id}  ";
    $log = "select user_date from tbl_user where user_id = {$id}";
    $lastlog = mysqli_query($link, $log);
$time = "update tbl_user set user_date = CURRENT_TIMESTAMP where user_id = {$id}";
    // $time = "update tbl_user set user_date='" . date('Y-m-d H:m:s') . "' where user_id = {$id}";
    $updatequery = mysqli_query($link, $update);
    $timeupdate = mysqli_query($link, $time);
    $at =  "update tbl_user set user_attempts='0' where user_name = '{$username}'  ";
    $atupdate = mysqli_query($link, $at);
  }

  else{
    // IF COUNT IS MORE THAN THREE, THEN LOCKED OUT PERMANENTLY
    redirect_to("admin_index2.php");

  }
}

  {
    // IF FAILED ATTEMPTS LESS THAN 3, SUCCESSFUL LOGIN
  redirect_to("admin_index.php");
}

}
elseif(mysqli_num_rows($user_only)){

// IF THERE  IS AN ERROR IS PASSWORD, IT STORES THE NUMBER OF TIMES IN THE FAILED ATTEMPT
  $founduser = mysqli_fetch_array($user_only, MYSQLI_ASSOC);
  $_SESSION['user_name'] = $founduser['user_fname'];
  $_SESSION['user_attempts'] = $founduser['user_attempts'];

$_SESSION['user_attempts'] += 1;
  $attempts =  $_SESSION['user_attempts'];
  $fail = "update tbl_user set user_attempts='{$attempts}' where user_name = '{$username}'  ";
  $failupdate = mysqli_query($link, $fail);
  $message ="Wrong info";
  return $message;
}

else{
  // IF A USERNAME DOESN'T EXIST THIS MESSAGE IS SHOT
  $message ="Wrong ";
  return $message;
}
  mysqli_close($link);
}
 ?>
