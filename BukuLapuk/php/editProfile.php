<?php

include ('helper.php');

session_start();
$user = array();
//dapetin profile
if(isset($_SESSION['userEmail'])){
    //echo "<h1>Welcome ".$_SESSION['userEmail']."</h1>";
    $email = $_SESSION['userEmail'];
    $connection = new mysqli("localhost", "root", "", "BukuLapukdb");
    $squery = mysqli_query($connection, "SELECT userID FROM usertb WHERE email = '$email'");
    $user = get_user_info($connection, $email);
}
else{
    echo "<script>location.href='login.php'</script>";
}

$connect = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connect, 'BukuLapukdb');
$email = $_SESSION['userEmail'];

if(isset($_POST['selesai-edit'])){
    $query = "UPDATE usertb SET userName='$_POST[userName]', userBio='$_POST[userBio]' WHERE email='$email'";
    $query_run = mysqli_query($connect, $query);

    if($query_run){
        echo '<script type="text/javascript"> alert("Data berhasil di Update...!") </script>';
        echo "<script>location.href='../profile.php'</script>";
    }
    else{
        echo '<script type="text/javascript"> alert("Data gagal di Update...!") </script>';
        echo "<script>location.href='../profile.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit My Profile</title>
    <link href="css/style.css?v=1.0" rel="stylesheet" type="text/css" />
        <!--<link rel="stylesheet" href="css/style.css" type="text/css">-->
        <!--Font Awesome-->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!--Bootstrap CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <section id="edit-profile" style="padding: 3.45% 0;">
    <div class="container py-5">
        <form action="editProfile.php" method="post" enctype="multipart/form-data">
            <div class="row m-0">
                <div class="col-lg-4 offset-lg-4 shadow py-3" style="background: rgba(255, 255, 255, 0.25); border-radius: 4px;">
                    
                    <div class="form-group">
                        <label for="userName">Username</label>
                        <input type="text" name="userName" id="userName" class="form-control">    
                    </div>
                    <div class="form-group">
                        <label for="userBio">Bio</label>
                        <textarea name="userBio" id="userBio" class="form-control"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="selesai-edit" class="btn btn-warning btn-block">Selesai</button>
                    </div>

                </div>
            </div>
        </form>
    </div>            
    </section>
</body>
</html>