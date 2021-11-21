<?php
include "koneksi.php";
$id = $_GET['kredit_id'];

$sql = "SELECT bayar_cicilan.*, penjualan_kredit.* FROM bayar_cicilan, penjualan_kredit WHERE kredit_id=$id";
$rows = $con->query($sql);
$r = $rows->fetch_array();

echo json_encode($r);
