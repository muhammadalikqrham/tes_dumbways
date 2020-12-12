<?php 
session_start();
include 'config/koneksi.php';
if (isset($_POST['edit'])) {
    $id = $_POST['id_user'];
    $nama = $_POST['nama'];
    $dir = addslashes(($_FILES['img']['tmp_name']));
    $nameFile = $_FILES['img']['name'];
    $sizeFile = $_FILES['img']['size'];
    $error = $_FILES['img']['error'];
    $ekstensiValid = ['jpg','jpeg','png'];
    $ekstensiIMG = explode('.',$nameFile);
    $ekstensiIMG = strtolower(end($ekstensiIMG));
    if ($error === 4) {
        $sql = "UPDATE  user_tb SET name_user = '$nama' WHERE id_user = '$id'";
        $query = mysqli_query($koneksi,$sql);
        echo $koneksi->error;
        if ($query) {
            $_SESSION['notif'] = "Anda Berhasil Menngubah Data Karakter";
            echo "<script>
                window.location = 'index.php'
            </script>";
        }
    }
    else if ($sizeFile > 512000) {
        $status = "File Anda Terlalu Besar";
    }
    else if (!in_array($ekstensiIMG,$ekstensiValid )) {
        $status = "Ekstensi File Yang Anda Masukkan Bukan Gambar";
    }
    else
    {
        $sql = "UPDATE user_tb SET name_user = '$nama',
                                        photo = LOAD_FILE('$dir')
                                     WHERE id_user = '$id'";
        $query = mysqli_query($koneksi,$sql);
        if ($query) {
            $_SESSION['notif'] = "Anda Berhasil Mengubah Data Karakter";
            echo "<script>
                window.location = 'index.php'
            </script>";
        }
    }
}
?>