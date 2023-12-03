<?php

// Koneksi ke database

$connect = mysqli_connect('localhost', 'root', '', 'web_berita');

if (!$connect) {
    echo "Gagal koneksi ke Database". mysqli_connect_error();
} 

