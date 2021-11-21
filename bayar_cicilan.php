<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Cicilan</title>
	<?php include "css.php" ?>
</head>
<body>
	<div id="wrapper">
		<?php include "navbar.php" ?>
		<?php include "sidebar.php" ?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Daftar Cicilan</h1>
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
											<th>Nama Lengkap</th>
											<th>Alamat</th>
											<th>Telepon</th>
											<th>Email</th>
											<th>Kode Kredit</th>
											<th>Jumlah Barang kredit</th>
											<th>Sisa Pembayaran</th>
											<th>Pembayaran Terakhir</th>
											<th>Keterangan</th>
											<th>Waktu Pembayaran terakhir</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include "koneksi.php";
										$sql = "SELECT bayar_cicilan.*, penjualan_kredit.* FROM bayar_cicilan, penjualan_kredit WHERE bayar_cicilan.kredit_id=penjualan_kredit.id";
										$rows = $con->query($sql);
										if ($rows == FALSE) {
											trigger_error("Syntax Mysql Error: " . $sql . "Error: " . $con->error, E_USER_ERROR);
										}else{
											$no=1;
											while ($r = $rows->fetch_array()) {
												?>
												<tr>
													<td><?php echo $no ?></td>
													<td><?php echo $r['nama_pembeli'] ?></td>
													<td><?php echo $r['alamat'] ?></td>
													<td><?php echo $r['no_hp'] ?></td>
													<td><?php echo $r['email'] ?></td>
													<td align="center"><?php echo $r['kode_kredit'] ?></td>
													<td><?php echo $r['jumlah_pembelian'] ?> Unit</td>
													<td><?php echo $r['sisa_bayar'] ?></td>
													<td><?php echo $r['jumlah'] ?></td>
													<td><?php echo $r['keterangan'] ?></td>
													<td><?php echo $r['tanggal_bayar'] ?></td>
													<td>
														<a type="button" class="btn btn-success" href="lunasi.php?id=<?php echo $r['id'] ?>">
															Bayar
														</a>
														<a type="button" class="btn btn-default btn-sm" href="cetak_nota_kredit.php?id=<?php echo $r['id'] ?>">
															<i class="fa fa-print"></i> Nota
														</a>
														<a type="button" class="btn btn-danger btn-sm" href="hapus_kredit.php?id=<?php echo $r['ID'] ?>">
															<i class="fa fa-trash-o"></i> Hapus
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
								<a href="form_bayar_cicilan.php" type="button" class="btn btn-default">
									<i class="fa fa-plus"></i> Bayar Cicilan Awal
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