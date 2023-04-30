<?php
    // properties database: host, user, password, database yang digunakan
    $con = mysqli_connect("localhost","root","root123","data_pegawai");

    // jika koneksi gagal akan muncul keterangan di bawah ini
    if(!$con){
        die('Connection Failed'. mysqli_connect_error());
    }

?>