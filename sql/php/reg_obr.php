<?php

header('Content-Type: text/html; charset=UTF-8');

$mysqli = mysqli_connect("localhost", "oefnbvtr_0155", "123456", "oefnbvtr_0155");
if ($mysqli == false) {
  print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} else {
  //print("Соединение установлено успешно");

  $name = $_POST["name"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $pass = $_POST["pass"];

  $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email' AND `pass` = '$pass'");

  if ($result->num_rows != 0) {
    print("exist");
  } else {
    $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
    print("ok");
  }


}
