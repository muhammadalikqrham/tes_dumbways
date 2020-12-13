<?php 
include 'config/koneksi.php';
$sql = "SELECT id_user,name_user,photo FROM user_tb ORDER BY id_user DESC";
$query = mysqli_query($koneksi,$sql);
?>