<?php 
session_start();
include 'config/koneksi.php';
        $id = $_GET['id'];
        $sql = "DELETE FROM skill_tb WHERE id_user = '$id'";
        $run_query = mysqli_query($koneksi,$sql);
        $sql2 = "DELETE FROM user_tb WHERE id_user = '$id'";
        $run_query2 = mysqli_query($koneksi,$sql2);
        echo $koneksi->error;
        if ($run_query || $run_query2) {
            $_SESSION['notif'] = "Anda Berhasil Menghapus Karakter";
            echo "<script>
                window.location = 'index.php'
            </script>";
        }
?>