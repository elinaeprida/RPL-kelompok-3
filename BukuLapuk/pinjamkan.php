<?php

include "php/prosesPinjamkan.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--BootStrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="css/style.css" type="text/css">-->
    
    <title>Pinjamkan</title>
</head>
<body>

    <div class="container">
        <h3 class="text-center" style="margin-top: 64px">Pinjamkan Bukumu</h3>
       
            
        <form action="pinjamkan.php" method="post" enctype="multipart/form-data"> <!--enctype nya harus untuk image upload-->
            <div class="row" style="margin-top: 16px; border: 1px solid #e0e0e0; border-radius: 4px;  padding-top: 16px;">
                <div class="col-lg-4 form-div">

                    <?php if(!empty($msg)): ?>
                        <div class="alert <?php echo $css_class; ?>">
                            <?php echo $msg; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="form-group text-center">
                        <img src="uploads/placeholder.jpg" onclick="triggerClick()" id="photoDisplay" style="display: block; width: 72%; margin: 16px auto; border-radius: 4px;">
                        <label for="fotoBuku">Upload Foto Bukumu! :)</label>
                        <input type="file" name="fotoBuku" onchange="displayImage(this)" id="fotoBuku" style="display: none;"> 
                        <script>
                            function triggerClick() {
                                document.querySelector('#fotoBuku').click();
                            }

                            function displayImage(e) {
                                if (e.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        document.querySelector('#photoDisplay').setAttribute('src', e.target.result);
                                    }
                                    reader.readAsDataURL(e.files[0]);
                                }
                            }
                        </script>          
                    </div>

                </div>
                <div class="col-lg-8 form-div">

                    <div class="form-group">
                        <label for="judulBuku">Judul Buku</label>
                        <input type="text" name="judulBuku" id="judulBuku" class="form-control">    
                    </div>

                    <div class="form-group">
                        <label for="pemilikBuku">Pemilik</label>
                        <input type="text" name="pemilikBuku" id="pemilikBuku" class="form-control">    
                    </div>

                    <div class="form-group">
                        <label for="deskripsiBuku">Deskripsi Buku</label>
                        <textarea name="deskripsiBuku" id="deskripsiBuku" class="form-control"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="pinjamkan-sekarang" class="btn btn-primary btn-block">Pinjamkan Sekarang</button>
                    </div>
                   
                </div>

            </div>
        </form>       
        
    </div>
    
   
</body>
</html>