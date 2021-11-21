<?php
include "koneksi.php";

$nama 		= mysqli_real_escape_string($con, $_POST['nama_barang']);
$barang 	= mysqli_real_escape_string($con, $_POST['barang_id']);
$pembeli	= mysqli_real_escape_string($con, $_POST['nama_pembeli']);
$alamat		= mysqli_real_escape_string($con, $_POST['alamat']);
$telp		= mysqli_real_escape_string($con, $_POST['no_hp']);
$email		= mysqli_real_escape_string($con, $_POST['email']);
$jml 		= mysqli_real_escape_string($con, $_POST['jumlah_barang']);
$harga 		= mysqli_real_escape_string($con, $_POST['harga_satuan']);
$uang 		= mysqli_real_escape_string($con, $_POST['uang_muka']);

$total 		= ($harga*$jml) - $uang;

$query = "INSERT INTO penjualan_kredit (nama_barang, nama_pembeli, alamat, no_hp, email, jumlah_pembelian, harga_satuan, uang_muka, total, barang_id) VALUES ('$nama','$pembeli','$alamat','$telp','$email','$jml','$harga','$uang','$total','$barang')";
if (mysqli_query($con, $query)) {
	session_start();
	$_SESSION['success_kredit'] = 'Tambah Kredit Berhasil.';
 	echo "<script language='JavaScript'>
 	document.location = 'Pembelian_kredit.php'
 	</script>";
 }else{
		echo "Error: " . $query . "<br/>" . mysqli_error($con);
 }