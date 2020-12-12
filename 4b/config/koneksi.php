<?php
  $koneksi = mysqli_connect("localhost", "root", "", "dumbwaysdb");
  if(!$koneksi){
    echo 'Koneksi tidak berhasil';
  }
?>  