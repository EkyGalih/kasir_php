<?php
include "koneksi.php";
$id = $_GET['id'];

$sql = "SELECT * FROM barang WHERE id=$id";
$rows = $con->query($sql);
$r = $rows->fetch_array();

echo json_encode($r);
