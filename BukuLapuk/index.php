<?php

//start session
session_start();

require_once('php/CreateDb.php');
require_once('./php/component.php');

//create instance of CreateDb class
$database = new CreateDb("BukuLapukdb","Producttb");

if(isset($_POST['add'])) {  //add adalah name dari tombol Tambahkan ke Rak
    //print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])) {

        $item_array_id = array_column($_SESSION['cart'],"product_id");
        //print_r($item_array_id);
        //print_r($_SESSION['cart']);

        if(in_array($_POST['product_id'], $item_array_id)) {    //jika product_id berada di dalam item_array_id
            echo "<script>alert('This book is already added in the Bookshelf...!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }  
        else{
            $count = count($_SESSION['cart']);  //menghitung berapa banyak item di array
            $item_array = array(
                'product_id'=>$_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
            //print_r($_SESSION['cart']);
        }

    }
    else {  //jika belum ke set maka buat array
        $item_array = array(
            'product_id'=>$_POST['product_id']
        );

        //Create new session variable
        $_SESSION['cart'][0] = $item_array;
        //print_r($_SESSION['cart']);
    }
}

//search php
if (isset($_POST['submit'])) {
    $connection = new mysqli("localhost", "root", "", "BukuLapukdb");
    $q = $connection->real_escape_string($_POST['q']);
    
    $sql = $connection->query("SELECT * FROM producttb WHERE product_name LIKE '%$q%'");
    
    if ($sql->num_rows > 0) {
        while ($row = $sql->fetch_array()){
        //while($row = mysqli_fetch_assoc($sql)) {
            component($row['product_name'], $row['product_owner'], $row['product_image'], $row['id']);
        }
    }
    else {
        echo "Tidak ada buku yang sesuai";
    }

}

?>

<!DOCTYPE html>

<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <title>::BukuLapuk::</title>
        <link href="css/style.css?v=1.0" rel="stylesheet" type="text/css" />
        <!--<link rel="stylesheet" href="css/style.css" type="text/css">-->
        <!--Font Awesome-->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!--Bootstrap CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <section>
            <div id="wrapper">
                <div id="header">
                    <div id="subheader">
                        <div class="sub-container">
                            <div id="slogan">
                                <h6>Buku Lapuk? Pinjemin Aja</h6>
                            </div>
                            <div id="sub-menu">
                                <a href="#">Chat</a>
                                <a href="pinjamkan.php"> Pinjamkan</a>
                                <a href="#">Bantuan</a>
                                
                            </div>
                        </div>
                    </div>
                    <div id="main-header">
                        <div class="main-container">
                            <div id="logo">
                                <span id="logo-name">BukuLapuk</span>
                            </div>
                            <div id="search">
                                <form method="post" action="index.php">
                                    <input class="search-area" type="text" name="q" placeholder="Aku mau minjem buku..." autocomplete="off">
                                    <input class="search-button" type="submit" name="submit" value="Cari">
                                </form>
                            </div>
                            <div id="user-menu">
                                <li><a href="rak.php" class="nav-item active">
                                    <i class="fas fa-address-book"></i>
                                    Rak                               
                                    <?php

                                    if(isset($_SESSION['cart'])) {
                                        $count = count($_SESSION['cart']);
                                        echo "<span id=\"cart_count\" style=\"text-align: center; padding: 0 0.9rem 0.1rem 0.9rem; border-radius: 3rem;\" class=\"text-light bg-primary\">$count</span>";
                                    }
                                    else {
                                        echo "<span id=\"cart_count\" style=\"text-align: center; padding: 0 0.9rem 0.1rem 0.9rem; border-radius: 3rem;\" class=\"text-light bg-primary\">0</span>";
                                    }

                                    ?>
                                </a></li>
                                <div id="profile-section">Profile</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
              
            <div class="container">
                <div class="row text-center py-2">  <!--padding y = 5-->
                    <?php
                    $result = $database->getData();
                        while($row = mysqli_fetch_assoc($result)) {
                            component($row['product_name'], $row['product_owner'], $row['product_image'], $row['id']);
                            
                        }
                    ?>
                </div>
            </div>
         
        </section>

        <script src="js/index.js"></script>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>