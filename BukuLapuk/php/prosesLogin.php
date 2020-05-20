<?php

$error = array();

$email = validate_input_email($_POST['email']);
if(empty($email)){
    $error[] = "You forgot to enter your email";
}

$password = validate_input_text($_POST['password']);
if(empty($password)){
    $error[] = "You forgot to enter your password";
}

if(empty($error)){
    //sql query
    $query = "SELECT userID, userName, email, password, profileImage FROM usertb WHERE email=?";
    
    $q = mysqli_stmt_init($con);
    mysqli_stmt_prepare($q, $query);

    //bind parameter
    mysqli_stmt_bind_param($q, 's', $email);
    
    //execute query
    mysqli_stmt_execute($q);

    $result = mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if(!empty($row)){
        //verify password
        if(password_verify($password, $row['password'])){
            
            //start session
            
            $_SESSION['userEmail'] = $email;

            header("location: index.php");
            exit();
            
        }
    }
    else{
        print "Kamu belum register silahkan register terlebih dahulu...!";
    }

}
else{
    echo "Please fill out email and password to login!";
}