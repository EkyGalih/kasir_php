<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cetak Nota Penjualan</title>
	<?php include "css.php" ?>
</head>
<body>
	<div id="wrapper">
		<?php //include "navbar.php" ?>
		<?php //include "sidebar.php" ?>
		<div id="page-wrapper">
			<?php
			include "koneksi.php";
			$sql = "SELECT penjualan_kredit.*, barang.* FROM penjualan_kredit, barang WHERE barang_id=$_GET[id]";
			$rows = $con->query($sql);
			$r = $rows->fetch_array();

			$query = "SELECT penjualan_kredit.*, barang.*, suplier.* FROM penjualan_kredit, barang, suplier WHERE suplier_id=$r[suplier_id]";
			$hasil = $con->query($query);
			$h = $hasil->fetch_array();
			?>
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Nota Penjualan <u><?php echo $r['nama_barang'] ?></u></h1>
				</div>
			</div>
			<?php //print_r($r); ?>
			<!-- <br/> -->
			<?php //print_r($h); ?>
			<div class="row">
				<div class="col-lg-10">
					<div class="panel panel-default">
						<div class="panel-body">
							<hr/>
							<h4>PT. Eky Galih - Cahaya Mandiri</h4>
							<p>jl.tempat beli laptop no.192</p>
							<h4 align="right">Nota Pembelian No: LPN0<?php echo $r['id'] ?></h4>
							<hr/>
							<div class="col-lg-5">
								<h4><font color="blue"><strong><i>Informasi Produk</i></strong></font></h4>
								<table class="table table-striped">
									<tr>
										<td>Nama Produk</td>
										<td>:</td>
										<td> <?php echo $r['nama_barang'] ?></td>
									</tr>
									<tr>
										<td>Merek Produk</td>
										<td>:</td>
										<td> <?php echo $h['nama'] ?></td>
									</tr>
									<tr>
										<td>Spesifikasi</td>
										<td>:</td>
										<td><?php echo $h['processor'] ?>, <?php echo $h['memory'] ?>, <?php echo $h['hardisk'] ?>, <?php echo $h['warna'] ?></td>
									</tr>
									<tr>
										<td>Kelengkapan</td>
										<td>:</td>
										<td><?php echo $h['kelengkapan'] ?></td>
									</tr>
								</table>
							</div>
							<div class="col-lg-5 pull-right">
								<h4><strong>Informasi Pelanggan</strong></h4>
								<table class="table table-striped">
									<tr>
										<td>Nama Pelanggan</td>
										<td>:</td>
										<td><?php echo $r['nama_pembeli'] ?></td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>:</td>
										<td><?php echo $r['alamat'] ?></td>
									</tr>
									<tr>
										<td>Telepon</td>
										<td>:</td>
										<td><?php echo $r['no_hp'] ?></td>
									</tr>
									<tr>
										<td>Email</td>
										<td>:</td>
										<td><?php echo $r['email'] ?></td>
									</tr>
									<tr>
										<td>Status Pembayaran</td>
										<td>:</td>
										<td>Cash</td>
									</tr>
								</table>
							</div>
							<div class="col-sm-3 pull-right">
								<button type="button" class="btn btn-success">
									<i class="fa fa-print"></i> Cetak Nota
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include "js.php" ?>
</body>
</html>