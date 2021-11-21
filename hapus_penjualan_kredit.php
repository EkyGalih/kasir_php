<?php
require 'koneksi.php';
// print_r($_GET);
$con->query("DELETE FROM penjualan_kredit where id_kredit=$_GET[id]");
?>
<script>
    document.location = 'Penjualan_barang.php'
</script>