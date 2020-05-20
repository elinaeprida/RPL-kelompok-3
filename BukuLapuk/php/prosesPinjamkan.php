<?php

$msg = "";
$css_class = "";

$conn = mysqli_connect('localhost', 'root', '', 'BukuLapukdb');

if(isset($_POST['pinjamkan-sekarang'])) {
    //echo "<pre>", print_r($_POST), "</pre>";
    //echo "<pre>", print_r($_FILES), "</pre>"; //$_FILES bisa nge post image
    //echo "<pre>", print_r($_FILES['fotoBuku']), "</pre>"; //untuk menampilkan langsung ke array fotoBuku
    //echo "<pre>", print_r($_FILES['fotoBuku']['name']), "</pre>"; // langsung menampilkan isi kolom nama
    //die();

    $_POST['pemilikBuku'] = $user['userName'];
    $judulBuku = $_POST['judulBuku'];
    $pemilikBuku = $_POST['pemilikBuku'];
    $deskripsiBuku = $_POST['deskripsiBuku'];
    $namaFotoBuku = time() . '_' . $_FILES['fotoBuku']['name'];

    $target = 'uploads/' . $namaFotoBuku;
    //memindahkan foto ke folder uploads
    if (move_uploaded_file($_FILES['fotoBuku']['tmp_name'], $target)) { 
        $sql = "INSERT INTO producttb (product_name, product_owner, product_image, product_description) VALUES ('$judulBuku', '$pemilikBuku', '$namaFotoBuku', '$deskripsiBuku')";
        if (mysqli_query($conn, $sql)) {
            $msg = "Buku berhasil di unggah...! Silahkan cek di Homescreen";
            $css_class = "alert-success";
        }
        else {
            $msg = "Database Error: Gagal mengunggah buku...!";
            $css_class = "alert-danger";
        } 
    }
    else {
        $msg = "Gagal mengunggah foto...!";
        $css_class = "alert-danger";
    }
}

?>