<?php
require('php/helper.php');

//error variable
$error = array();

$userName = validate_input_text($_POST['userName']);
if(empty($userName)){
    $error[] = "You forgot to enter your username";
}

$email = validate_input_email($_POST['email']);
if(empty($email)){
    $error[] = "You forgot to enter your email";
}

$password = validate_input_text($_POST['password']);
if(empty($password)){
    $error[] = "You forgot to enter your password";
}

$confirm_password = validate_input_text($_POST['confirm_password']);
if(empty($confirm_password)){
    $error[] = "You forgot to enter your confirm password";
}

$files = $_FILES['profileUpload'];
$profileImage = upload_profile('./assets/profile/', $files);

if(empty($error)){
   // echo 'validate';
   //register a new user
   $hashed_password = password_hash($password, PASSWORD_DEFAULT);

   require('php/mysqli_connect.php');

   //make a query
   $query = "INSERT INTO usertb (userID, userName, email, password, profileImage, registerDate)";
   $query .= "VALUES ('', ?, ?, ?, ?, NOW())";

   //initialize a statement
   $q = mysqli_stmt_init($con);

   //prepare sql statement
   mysqli_stmt_prepare($q, $query);

   //bind values
   mysqli_stmt_bind_param($q, 'ssss', $userName, $email, $hashed_password, $profileImage);

   //execute statement
   mysqli_stmt_execute($q);

   if(mysqli_stmt_affected_rows($q)==1){
       //print "recoded successfully inserted...!";
/*
       //start new session
       session_start();

       //create session variable
       $_SESSION['userID'] = mysqli_insert_id($con);
*/
       header('location: login.php');
       exit();

   }
   else{
       print "Error while registration...!";
   }

}
else{
    echo 'not validate';
}