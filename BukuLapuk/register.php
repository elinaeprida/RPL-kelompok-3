<?php
    //header.php
    include('php/header.php');
?>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require('php/prosesRegister.php');
    }
?>

<!--Registration Area-->
    <section id="register" style="padding: 3.45% 0;
    background: url('assets/background.jpg') no-repeat;
    background-size: cover;">
        <div class="row m-0">
            <div class="col-lg-4 offset-lg-2 shadow" style="background: rgba(255, 255, 255, 0.25); border-radius: 4px;">
                <div class="text-center pb-4">
                    <h1 class="login-title text-dark">Register</h1>
                    <p class="p-1 m-0 font-ubuntu text-black-50">Register sekarang dan cari buku yang kamu inginkan :)</p>
                    <span class="font-ubuntu text-black-50">Sudah punya akun? <a href="login.php">Login</a></span>
                </div>

                <div class="upload-profile-image d-flex justify-content-center pb-4">
                    <div class="text-center">
                        <div class="d-flex justify-content-center">
                            <img class="camera-icon" src="./assets/camera.svg" alt="camera" >
                        </div>
                        <img class="img rounded-circle" src="./assets/profile/avatar_fix.jpg" alt="profile" style="width: 200px; height 50px;">
                        <small class="form-text text-black-50">Pilih Foto</small>
                        <input type="file" form="reg-form" class="form-control-file" name="profileUpload" id="upload-profile">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <form action="register.php" method="post" enctype="multipart/form-data" id="reg-form"><!--return to itself-->
                        <div class="form-row">
                            <div class="col">
                                <input type="text" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>" name="userName" id="userName" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-row my-2">
                            <div class="col">
                                <input type="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required name="email" id="email" class="form-control" placeholder="Email*">
                            </div>
                        </div>
                        <div class="form-row my-2">
                            <div class="col">
                                <input type="password" required name="password" id="password" class="form-control" placeholder="Password*">
                            </div>
                        </div>
                        <div class="form-row my-2">
                            <div class="col">
                                <input type="password" required name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password*">
                                <small id="confirm_error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="agreement" class="form-check-input" required>
                            <label for="agreement" class="form-check-label font-ubuntu text-white">I agree <a href="#">term and condition</a>(*)</label>
                        </div>

                        <div class="submit-btn text-center my-3">
                            <button type="submit" class="btn btn-primary rounded-pill text-dark px-4">Register</button>
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
