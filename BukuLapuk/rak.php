<?php

session_start();

require_once("php/CreateDb.php");
require_once("php/component.php");

$db = new CreateDb("BukuLapukdb", "Producttb");

//return id if remove
if(isset($_POST['remove'])) {
    //print_r($_GET['id']);
    if($_GET['action'] == 'remove') {
        foreach($_SESSION['cart'] as $key=>$value) {
            if($value["product_id"]==$_GET['id']) { //if product id is in the cart
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Buku sudah dikembalikan...!')</script>";
                echo "<script>window.location = 'rak.php'</script>";
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rak</title>

        <link rel="stylesheet" href="css/style.css" type="text/css">
        <!--Font Awesome-->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!--Bootstrap CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
    </head>
    <body class="bg-light">

        <div class="container-fluid">
            <div class="row px-5">
                <div class="col-lg-7">
                    <div class="rak-buku" style="padding: 3% 0;">
                        <h6>Rak Buku Saya</h6>
                        <hr>

                        <?php

                        if(isset($_SESSION['cart'])) {
                            $product_id = array_column($_SESSION['cart'],'product_id');

                            $result = $db->getData();
                            while($row = mysqli_fetch_assoc($result)) {
                                foreach($product_id as $id) {
                                    if($row['id']==$id) {
                                        ractElement($row['product_image'], $row['product_name'], $row['product_owner'], $row['id']);
                                    }
                                }
                            }
                        }
                        else {
                            echo"<h5>Rak kamu kosong :(</h5>";
                        }

                        ?>

                    </div>
                </div>
                <div class="col-md-5">
                        <button type="submit" name="kembali" style="padding: 3% 0;">Kembali ke Index.php</button>
                        <button onclick="history.go(-1);">Back </button>
                </div>
            </div>
        </div>

       
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>