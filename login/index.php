<?php
include('php/login.php'); // Memasuk-kan skrip Login

if((isset($_SESSION['login_user'] ))){
header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>LOGIN SPK</title>


    <link rel="stylesheet" href="css/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="css/style.css">
  </head>

  <body>


<div class="container">
  <div class="info">
    <h1>Login SPK Web Universitas</h1>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="hat.svg"/></div>
  <form class="request-form" action="" method="post" id="reqform">
    <input type="text" placeholder="name" name="name"/>
    <input type="text" placeholder="email address" name="email"/>
    <button type="submit" value="submit" form="reqform">Kirim</button>
    <p class="message">Already registered? <a href="#">Sign In</a></p>
  </form>
  <form class="login-form" action="" method="post" id="logform">
    <input type="text" placeholder="username" name="username"/>
    <input type="password" placeholder="password" name="password"/>
    <button type="submit" value="Submit" name="submit" form="logform" />login</button>
    <p class="message">Lupa Password? <a href="#">Request Password</a></p>
  </form>
</div>
<video id="video" autoplay="autoplay" loop="loop" poster="polina.jpg">
  <source src="http://andytran.me/A%20peaceful%20nature%20timelapse%20video.mp4" type="video/mp4"/>
</video>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>




  </body>
</html>
