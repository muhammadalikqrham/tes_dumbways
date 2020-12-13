<?php 
session_start();
include 'config/koneksi.php';
if (isset($_POST['add_skill'])) {
    $id = $_POST['id_user'];
    $nama = $_POST['nama_skill'];
        $sql = "INSERT INTO skill_tb VALUES('','$nama','$id')";
        $query = mysqli_query($koneksi,$sql);
        if ($query) {
            $_SESSION['notif'] = "Anda Berhasil Menambahkan Skill";
            echo "<script>
                window.location = 'index.php'
            </script>";
        }
}
    


?>