<?php

require '../db/dbconnect.php';
require 'sanitizeInput.php';


$errors = array();
// REGISTER USER
if (isset($_POST)) {
  // receive all input values from the form and sanitize
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['repassword']);

  $email = sanitizeInput($email);
  $password_1 = sanitizeInput($password_1);
  $password_2 = sanitizeInput($password_2);


  //make sure form is filled in correctily

  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password_1)) {
    array_push($errors, "Password is required");
  }
  if ($password_1 != $password_2) {
    array_push($errors, "Passwords must match");
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Invalid Email Format");
  }
  if ($email == 'NULL' || $password_1 == 'NULL' || $password_2 == 'NULL') {
    array_push($errors, 'Inputs must not be NULL');
  }

  // Check the database to make sure 
  // a user does not already exist with the same username and/or email


  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";

  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  //if no errors add to database
  if (count($errors) == 0) {
    $password = md5($password_1); //encrypt the password before saving in the database

    $query = "INSERT INTO users (password, email) VALUES('$password','$email')";
    if (mysqli_query($conn, $query)) {
      $conn->close();
      echo "You have signed up!";
    } else {
      echo ("Error inserting data");
      echo(nl2br("\n") . $conn->error);
    }
  } else { //if errors found print errors
    foreach ($errors as $error) {
      echo  nl2br("\n") . $error;
      exit();
    }
  }
} else { //if not from form submission via POST method
  echo ("error receving files from form");
}
exit(); //close connection to database

?>