<?php
require 'koneksi.php';
// print_r($_GET);
$con->query("DELETE FROM penjualan_cash where id_cash=$_GET[id]");
?>
<script>
    document.location = 'Penjualan_barang.php'
</script>