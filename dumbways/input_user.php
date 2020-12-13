<?php 
session_start();
include 'config/koneksi.php';
if (isset($_POST['add'])) {
    $status = '';
    $nama = $_POST['nama'];
    $dir = addslashes(($_FILES['img']['tmp_name']));
    $nameFile = $_FILES['img']['name'];
    $sizeFile = $_FILES['img']['size'];
    $error = $_FILES['img']['error'];

    $ekstensiValid = ['jpg','jpeg','png'];
    $ekstensiIMG = explode('.',$nameFile);
    $ekstensiIMG = strtolower(end($ekstensiIMG));
    if ($sizeFile > 512000) {
        $status = "File Anda Terlalu Besar";
    }
    if (!in_array($ekstensiIMG,$ekstensiValid)) {
        $status = "Ekstensi File Yang Anda Masukkan Bukan Gambar";
    }
    if ($error === 4) {
       $status = "Anda Belum Mengupload Gambar";
    }
    if ($status != '') {
        echo "<script>
        alert('".$status."');
       window.location = 'index.php'
    </script>";
    }
    else
    {
        $sql = "INSERT INTO user_tb VALUES('','$nama',LOAD_FILE('$dir'))";
        $query = mysqli_query($koneksi,$sql);
        if ($query) {
            $_SESSION['notif'] = "Anda Berhasil Menambahkan Karakter";
            echo "<script>
                window.location = 'index.php'
            </script>";
        }
    }
    
}
    


?>