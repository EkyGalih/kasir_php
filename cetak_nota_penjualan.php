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
			$sql = "SELECT penjualan_cash.*, barang.* FROM penjualan_cash, barang WHERE id_cash=".$_GET['id'];
			$rows = $con->query($sql);
			$r = $rows->fetch_array();

			$query = "SELECT penjualan_cash.*, barang.*, suplier.* FROM penjualan_cash, barang, suplier WHERE suplier_id=$r[suplier_id]";
			$hasil = $con->query($query);
			$h = $hasil->fetch_array();
			?>
			<div class="row">
				<div class="col-lg-12">
					<!-- <h1 class="page-header">Nota Penjualan</h1> -->
				</div>
			</div>
			<?php //print_r($r); ?>
			<!-- <br/> -->
			<?php //print_r($h); ?>
			<div class="row">
				<div class="col-lg-8">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-lg-4 pull-left">
								<hr/>
								<h4>PT. Eky Galih - Cahaya Mandiri</h4>
								<p><font size="2px">jl.jelantik gosa no.23, mataram<br/>Telp : +6285205158187</font><br/>Email :<font color="blue"><u> ekygalih8@gmail.com</u></font></p>
								<hr/>
								<br/><br/>
								<h4><font color="black"><strong><i>Nota Penjualan</i></strong></font></h4>
							</div>
							<div class="col-lg-4 pull-right">
								<hr/>
								<h4><?php echo $r['nama_pembeli'] ?></h4>
								<p><font size="2px"><?php echo $r['alamat'] ?></font></p>
								<hr/>
								<br/><br/>
								<h5>Nota Pembelian No. 00000<?php echo $r['id_cash'] ?></h5>
							</div>
							<div class="col-lg-12">
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>No.</th>
											<th>Nama Barang</th>
											<th>Merek</th>
											<th>Qty</th>
											<th>Harga</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td><?php echo $r['nama_barang'] ?></td>
											<td><?php echo $h['nama'] ?></td>
											<td><?php echo $r['jumlah_pembelian'] ?></td>
											<td>Rp. <?php echo $r['harga_satuan'] ?>,-</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td><strong>Diskon</strong></td>
											<td><?php echo $r['diskon'] ?> %</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td><strong>Pajak</strong></td>
											<td><?php echo $r['pajak'] ?> %</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td><strong>Jlm Uang</strong></td>
											<td>Rp. <?php echo $r['jml_uang_pemb'] ?>,- </td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td><strong>Total</strong></td>
											<td>Rp. <?php echo $r['total'] ?>,-</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td><strong>Kembalian</strong></td>
											<td>Rp. <?php echo $r['kembalian'] ?>,-</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-lg-4 pull-left">
								<h5>Pemilik Toko</h5>
								<br/><br/><br/>
								<p>Eky Galih Gunanda</p>
								<br/><br/>
								<font size="1px">
									catatan : <br/>
									<ol type="1" start="1">
										<li>Barang tidak dapat dikembalikan</li>
										<li>Syarat &amp; ketentuan berlaku</li>
									</ol>
								</font>
							</div>
							<div class="col-lg-4 pull-right">
								<h5>Pembeli</h5>
								<br/><br/><br/>
								<p>nama pembeli</p>
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