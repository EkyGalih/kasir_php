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
$total 		= ($harga*$jml);

$query = "INSERT INTO penjualan_cash (nama_barang, nama_pembeli, alamat, no_hp, email, jumlah_pembelian, harga_satuan, total, barang_id) VALUES ('$nama','$pembeli','$alamat','$telp','$email','$jml','$harga','$total','$barang')";
if (mysqli_query($con, $query)) {
 	echo "<script language='JavaScript'>
 	alert('Penjualan Berhasil');
 	document.location = 'Pembelian_cash.php'
 	</script>";
 }else{
		echo "Error: " . $query . "<br/>" . mysqli_error($con);
 }