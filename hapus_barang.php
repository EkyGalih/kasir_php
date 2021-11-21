<?php
require 'koneksi.php';

$con->query("DELETE FROM pembelian where id_pemb=$_GET[id]");
?>
<script>
    document.location = 'Pembelian_barang.php'
</script>