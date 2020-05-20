
<?php

    session_start();
    
    //header.php
    include('php/header.php');
    include "php/helper.php";
?>

<?php
   
//    $user = array();
    require('php/mysqli_connect.php');
/*    
    if(isset($_SESSION["userID"])){
        $user = get_user_info($con, $_SESSION["userID"]);
    }
*/

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require('php/prosesLogin.php');
    }
?>

<!--Registration Area-->
    <section id="login-form" style="padding: 8% 0;
    background: url('assets/background.jpg') no-repeat;
    background-size: cover;">
        <div class="row m-0">
            <div class="col-lg-4 offset-lg-2 shadow" style="background: rgba(255, 255, 255, 0.25); border-radius: 4px;">
                <div class="text-center pb-4">
                    <h1 class="login-title text-dark">Login</h1>
                    <p class="p-1 m-0 font-ubuntu text-black-50">Login dan pinjamkan buku lapuk mu :)</p>
                    <span class="font-ubuntu text-black-50">Belum punya akun? <a href="register.php">Register</a></span>
                </div>

                <div class="upload-profile-image d-flex justify-content-center pb-4">
                    <div class="text-center">
                        <img class="img rounded-circle" src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : './assets/profile/avatar_fix.jpg';?>" alt="profile" style="width: 200px; height 50px;">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <form action="login.php" method="post" enctype="multipart/form-data" id="log-form"><!--return to itself-->
                        
                        <div class="form-row my-2">
                            <div class="col">
                                <input type="email" required name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-row my-2">
                            <div class="col">
                                <input type="password" required name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                       
                        <div class="submit-btn text-center my-3">
                            <button type="submit" name="submit" class="btn btn-primary rounded-pill text-dark px-4">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<!--Registration Area-->

<?php
    //footer.php
    include('php/footer.php');
?>
