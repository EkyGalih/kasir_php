<?php
require 'koneksi.php';

$con->query("DELETE FROM bayar_cicilan where id=$_GET[id]");
?>
<script>
    document.location = 'bayar_cicilan.php'
</script>