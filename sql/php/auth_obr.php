<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');

$mysqli = mysqli_connect("localhost", "oefnbvtr_0155", "123456", "oefnbvtr_0155");
if ($mysqli == false) {
  print("error");
} else {

  $email = trim(mb_strtolower($_POST["email"]));
  $pass = trim($_POST["pass"]);

  $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");
  $result = $result->fetch_assoc();
  $hash = $result["pass"];

  if (password_verify($pass, $hash)) {
    echo "ok";
    $_SESSION["name"] = $result["name"];
    $_SESSION["lastname"] = $result["lastname"];
    $_SESSION["email"] = $result["email"];
    $_SESSION["id"] = $result["id"];

  } else {
    echo "user_not_found";
  }

}
