<?php
include "koneksi.php";

print_r($_POST);
$tanggal 	= mysqli_real_escape_string($con, $_POST['tanggal_bayar']);
$kode 		= mysqli_real_escape_string($con, $_POST['kode_kredit']);
$uang 		= mysqli_real_escape_string($con, $_POST['sisa_bayar']);
$cicilan 	= mysqli_real_escape_string($con, $_POST['cicilan_ke']);
$nama 		= mysqli_real_escape_string($con, $_POST['kredit_id']);
$bayar 		= mysqli_real_escape_string($con, $_POST['jumlah']);

$total 		= ($uang-$bayar);
if ($total == '0') {
	echo $lunas = "Cicilan Lunas";
}else{
	echo $lunas = "Cicilan Belum Lunas";
}

$query = "UPDATE bayar_cicilan SET tanggal_bayar='$tanggal',kode_kredit='$kode',sisa_bayar='$total', cicilan_ke='$cicilan', jumlah='$bayar', keterangan='$lunas'";
if (mysqli_query($con, $query)) {
 	echo "<script language='JavaScript'>
 	alert('Cicilan berhasil dibayar');
 	document.location = 'bayar_cicilan.php'
 	</script>";
 }else{
		echo "Error: " . $query . "<br/>" . mysqli_error($con);
 }