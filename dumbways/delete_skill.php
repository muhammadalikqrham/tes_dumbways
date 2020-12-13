<?php 
session_start();
include 'config/koneksi.php';
        $id = $_GET['id'];
        $sql = "DELETE FROM skill_tb WHERE id_skill = '$id'";
        $run_query = mysqli_query($koneksi,$sql);
        if ($run_query || $run_query2) {
            $_SESSION['notif'] = "Anda Berhasil Menghilangkan Skill Karakter";
            echo "<script>
                window.location = 'index.php'
            </script>";
        }
?>