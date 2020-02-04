 <?php

  include 'conn.php';


  	$nama = $_POST["nama_lengkap"];
    $username = $_POST["username"];
    $level = $_POST["level"];
    $password = $_POST["password"];

    $ambil = mysqli_query($koneksi,"SELECT * FROM tbl_admin where username='$username'");
    $data = mysqli_fetch_array($ambil);
    $hasil = $data['username'];
  

    if($username!=$hasil){
  	$hasil2 = mysqli_query($koneksi,"INSERT INTO tbl_admin (idadmin, username, nama_lengkap, password, level)  VALUES ('', '$username', '$nama', '$password', '$level')");

    header("Location: login.php");
    }
    else{
      echo "maaf username sudah digunakan";

    }

  ?>