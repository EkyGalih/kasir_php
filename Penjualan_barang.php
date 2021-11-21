<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Penjualan Barang</title>
	<?php include "css.php" ?>
</head>
<body>
	<div id="wrapper">
		<?php include "navbar.php" ?>
		<?php include "sidebar.php" ?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Daftar Pembelian Cash &amp; Kredit</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!-- Advanced Tables -->
					<button class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">
						<i class="fa fa-plus"></i> Pembelian
					</button>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">Model Pembelian</h4>
								</div>
								<div class="modal-body">
									<center>
										<h2>Model Pembelian :</h2>
										<a href="Pembelian_cash.php" class="btn btn-success">
											<i class="fa fa-plus"></i> Cash
										</a>
										<a href="Pembelian_kredit.php" class="btn btn-primary">
											<i class="fa fa-plus"></i> Kredit
										</a>
									</center>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							Daftar Pembelian Cash
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover" id="kasir">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Barang</th>
											<th>Nama Pembeli</th>
											<th>Alamat</th>
											<th>Telpon</th>
											<th>E-Mail</th>
											<th>Jumlah Barang</th>
											<th>Harga Barang</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include "koneksi.php";
										$sql = "SELECT penjualan_cash.*, barang.* FROM penjualan_cash, barang WHERE penjualan_cash.barang_id=barang.id ORDER BY id_cash DESC";
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
													<td><?php echo $r['nama_pembeli'] ?></td>
													<td><?php echo $r['alamat'] ?></td>
													<td><?php echo $r['no_hp'] ?></td>
													<td><?php echo $r['email'] ?></td>
													<td><?php echo $r['jumlah_pembelian'] ?> Unit</td>
													<td><?php echo $r['harga_satuan'] ?></td>
													<td>
														<a type="button" class="btn btn-danger btn-sm" href="hapus_penjualan_cash.php?id=<?php echo $r['id_cash'] ?>">
															<i class="fa fa-trash-o"></i>
														</a>
														<a type="button" class="btn btn-default btn-sm" href="cetak_nota_penjualan.php?id=<?php echo $r['id_cash'] ?>">
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
							</div>

						</div>
					</div>
					<!--End Advanced Tables -->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!-- Advanced Tables -->
					<div class="panel panel-default">
						<div class="panel-heading">
							Daftar Barang Kredit
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover" id="kasir2">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Barang</th>
											<th>Nama Pembeli</th>
											<th>Alamat</th>
											<th>Telepon</th>
											<th>E-Mail</th>
											<th>Jumlah Barang</th>
											<th>Harga Barang</th>
											<th>Uang Muka</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include "koneksi.php";
										$sql = "SELECT penjualan_kredit.*, barang.* FROM penjualan_kredit, barang WHERE penjualan_kredit.barang_id=barang.id";
										$rows = $con->query($sql);
										if ($rows == FALSE) {
											trigger_error("Syntax Mysql Error: " . $sql . "Error: " . $con->error, E_USER_ERROR);
										}else{
											$no=1;
											while ($k = $rows->fetch_array()) {
												?>
												<tr>
													<td><?php echo $no ?></td>
													<td><?php echo $k['nama_barang'] ?></td>
													<td><?php echo $k['nama_pembeli'] ?></td>
													<td><?php echo $k['alamat'] ?></td>
													<td><?php echo $k['no_hp'] ?></td>
													<td><?php echo $k['email'] ?></td>
													<td><?php echo $k['jumlah_pembelian'] ?> Unit</td>
													<td><?php echo $k['harga_satuan'] ?></td>
													<td><?php echo $k['uang_muka'] ?></td>
													<td>
														<a type="button" class="btn btn-danger btn-sm" href="hapus_penjualan_kredit.php?id=<?php echo $k['id_kredit'] ?>">
															<i class="fa fa-trash-o"></i>
														</a>
														<a type="button" class="btn btn-default btn-sm" href="cetak_nota_penjualan_kredit.php?id=<?php echo $k['id'] ?>">
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