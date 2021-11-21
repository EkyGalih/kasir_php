<?php
include "koneksi.php";


$nama 		= mysqli_real_escape_string($con, $_POST['kredit_id']);
$tangggal 	= mysqli_real_escape_string($con, $_POST['tanggal_bayar']);
$kode 		= mysqli_real_escape_string($con, $_POST['kode_kredit']);
$uang 		= mysqli_real_escape_string($con, $_POST['sisa_bayar']);
$cicilan 	= mysqli_real_escape_string($con, $_POST['cicilan_ke']);
$uang_muka	= mysqli_real_escape_string($con, $_POST['jumlah']);

if ($uang == '0') {
	echo $lunas = "Cicilan Lunas";
}else{
	echo $lunas = "Cicilan Belum Lunas";
}

$query = "INSERT INTO bayar_cicilan (tanggal_bayar, kode_kredit, jumlah, sisa_bayar, cicilan_ke, keterangan, kredit_id) VALUES ('$tangggal','$kode','$uang_muka','$uang','$cicilan','$lunas','$nama')";
if (mysqli_query($con, $query)) {
 	echo "<script language='JavaScript'>
 	alert('Cicilan berhasil dibayar');
 	document.location = 'bayar_cicilan.php'
 	</script>";
 }else{
		echo "Error: " . $query . "<br/>" . mysqli_error($con);
 }