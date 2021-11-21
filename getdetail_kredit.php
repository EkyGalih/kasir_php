<?php
include "koneksi.php";
$id = $_GET['id_supplier'];

$sql = "SELECT * FROM barang WHERE suplier_id=$id";
$rows = $con->query($sql);
$r = $rows->fetch_array();

echo json_encode($r);
