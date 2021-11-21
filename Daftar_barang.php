<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Stok Barang</title>
	<?php include "css.php" ?>
</head>
<body>
	<div id="wrapper">
		<?php include "navbar.php" ?>
		<?php include "sidebar.php" ?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Stok Barang Tersedia</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!-- Advanced Tables -->
					<div class="panel panel-default">
						<div class="panel-heading">
							Daftar Stok Barang
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
										<tr>
											<th>No</th>
											<th>Merek Barang</th>
											<th>Hardisk</th>
											<th>Memory</th>
											<th>Processor</th>
											<th>Warna</th>
											<th>Kelengkapan</th>
											<th>Stok</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include "koneksi.php";
										$sql = "SELECT barang.*, suplier.* FROM barang, suplier WHERE barang.suplier_id=suplier.id";
										$rows = $con->query($sql);
										if ($rows == FALSE) {
											trigger_error("Syntax Mysql Error: " . $sql . "Error: " . $con->error, E_USER_ERROR);
										}else{
											$no=1;
											while ($r = $rows->fetch_array()) {
												?>
												<tr>
													<td><?php echo $no ?></td>
													<td><?php echo $r['nama'] ?></td>
													<td><?php echo $r['hardisk'] ?></td>
													<td><?php echo $r['memory'] ?></td>
													<td><?php echo $r['processor'] ?></td>
													<td><?php echo $r['warna'] ?></td>
													<td><?php echo $r['kelengkapan'] ?></td>
													<td align="center"><?php echo $r['stok'] ?> Unit</td>
													<td>
														<a type="button" class="btn btn-success btn-sm" href="Tambah_Barang.php">
															<i class="fa fa-plus"></i> Pesan Barang
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