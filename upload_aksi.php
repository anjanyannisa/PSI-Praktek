<?php 
// menghubungkan dengan koneksi
include 'conn.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['tbl_sales']['name']) ;
move_uploaded_file($_FILES['tbl_sales']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['tbl_sales']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['tbl_sales']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$tanggal = $data->val($i, 1);
	$jam     = $data->val($i, 2);
	$NoInet     = $data->val($i, 3);
	$nama  = $data->val($i, 4);
	$alamat  = $data->val($i, 5);
	$CP  = $data->val($i, 6);
	$keluhan  = $data->val($i, 7);
	$Jenis_Gangguan  = $data->val($i, 8);
	$Sub_Gangguan  = $data->val($i, 9);
	$status  = $data->val($i, 10);
	$tiket  = $data->val($i, 11);	

	if( $tanggal !="" && $jam != "" && $NoInet != ""&& $nama != "" && $alamat != "" && $CP != "" && $keluhan != "" && $Jenis_Gangguan != "" && $Sub_Gangguan != "" && $status != "" && $tiket != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT into tbl_gangguan values('$tanggal','$jam','$NoInet','$nama','$alamat','$CP','$keluhan','$Jenis_Gangguan','$Sub_Gangguan','$status','$tiket')");
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['tbl_sales']['name']);

// alihkan halaman ke index.php
header("location:import.php?berhasil=$berhasil");
?>