<?php

$server = "localhost";
$user = "root";
$password = "";
$database="perpustakaan";

$db = mysqli_connect($server, $user, $password, $database);

if(!$db){
    die("Gagal Menyambung : ". mysqli_connect_error());
}

?>