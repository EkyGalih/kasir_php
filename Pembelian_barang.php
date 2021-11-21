<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Pembelian Barang</title>
	<?php include "css.php" ?>
</head>
<body>
	<div id="wrapper">
		<?php include "navbar.php" ?>
		<?php include "sidebar.php" ?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Laporan Pembelian Barang</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!-- Advanced Tables -->
					<div class="panel panel-default">
						<div class="panel-heading">
							Daftar Barang
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Barang</th>
											<th>Jenis Barang</th>
											<th>Harga Beli</th>
											<th>Jumlah Pembelian</th>
											<th>Total Harga Pembelian</th>
											<th>Tanggal Pembelian</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include "koneksi.php";
										$sql = "SELECT pembelian.*, barang.* FROM pembelian, barang WHERE pembelian.barang_id=barang.id";
										$rows = $con->query($sql);
										if ($rows == FALSE) {
											trigger_error("Syntax Mysql Error: " . $sql . "Error: " . $con->error, E_USER_ERROR);
										}else{
											$no=1;
											while ($r = $rows->fetch_array()) {
												?>
												<tr>
													<td><?php echo $no ?></td>
													<td><?php echo $r['nama_barang'] ?></td>
													<td><?php echo $r['jenis_barang'] ?></td>
													<td><?php echo $r['harga_beli'] ?></td>
													<td><?php echo $r['stok'] ?> Unit</td>
													<td><?php echo $r['total'] ?></td>
													<td><?php echo $r['tgl_pembelian'] ?></td>
													<td>
														<a class="btn btn-danger btn-sm" type="button" href="hapus_barang.php?id=<?php echo $r['id_pemb'] ?>">
															<i class="fa fa-trash-o"></i>
														</a>
														<a class="btn btn-default btn-sm" type="button" href="cetak_nota_pembelian.php?id=<?php echo $r['id'] ?>">
															<i class="fa fa-list"></i>
														</a>
													</td>
												</tr>
												<?php
												$no++;
											}
										}
										?>
									</tbody>
								</table>
								<a href="Tambah_Barang.php" type="button" class="btn btn-default">
								<i class="fa fa-plus"></i> Pesan Barang
								</a>
							</div>

						</div>
					</div>
					<!--End Advanced Tables -->
				</div>
			</div>
		</div>
	</div>
	<?php include "js.php" ?>
</body>
</html>