<?php

include ('php/helper.php');

session_start();
$user = array();
//dapetin profile
if(isset($_SESSION['userEmail'])){
    $email = $_SESSION['userEmail'];
    $connection = new mysqli("localhost", "root", "", "BukuLapukdb");
    $squery = mysqli_query($connection, "SELECT userID FROM usertb WHERE email = '$email'");
    $user = get_user_info($connection, $email);
}
else{
    echo "<script>location.href='login.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="css/style.css?v=1.0" rel="stylesheet" type="text/css" />
        <!--<link rel="stylesheet" href="css/style.css" type="text/css">-->
        <!--Font Awesome-->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!--Bootstrap CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <section id="main-site">
        <div class="container py-5">
            <div class="row">
                <div class="col-4 offset-4 shadow py-3" style="border-radius: 4px;">

                    <div class="upload-profile-image d-flex justify-content-center py-4">
                        <div class="text-center">
                            <img class="img rounded-circle" style="height: 256px;" src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : './assets/profile/avatar_fix.jpg';?>" alt="">
                            <h4 class="pt-3">
                                <?php
                                    if(isset($user['userName'])){
                                        printf('%s', $user['userName']);
                                    }
                                ?>
                            </h4>
                            <h6 class="pb-3">
                                <?php
                                    echo isset($user['userBio']) ? $user['userBio'] : '';
                                ?>
                            </h6>
                        </div>
                    </div>
                    <div class="user-info px-3">
                        <ul class="font-ubuntu navbar-nav">
                                <li class="nav-link"><b>Username : </b><span><?php echo isset($user['userName']) ? $user['userName'] : '';?></span></li>
                                <li class="nav-link"><b>Email : </b><span><?php echo isset($user['email']) ? $user['email'] : '';?></span></li>  
                                <li class="nav-link"><b>Register Date : </b><span><?php echo isset($user['registerDate']) ? $user['registerDate'] : '';?></span></li> 
                        </ul>
                    </div>
                    <div class="tombol-tombol py-4">
                        <button class="btn btn-warning rounded-pill text-dark px-4" onclick="location='php/editProfile.php'">Edit Profile</button>
                        <button class="btn btn-danger rounded-pill text-dark px-4" onclick="location='logout.php'">Log Out</button>
                    </div>

                </div>
            </div>
        </div>
    </section>
    
</body>
</html>

