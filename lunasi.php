<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bayar Cicilan</title>
	<?php include "css.php" ?>
</head>
<body>
	<div id="wrapper">
		<?php include "navbar.php" ?>
		<?php include "sidebar.php" ?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Cicilan Awal</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-pencil"></i> Input data pembelian
						</div>
						<div class="panel-body">
							<div class="col-lg-12">
								<form action="Proses_lunasi.php" method="POST" onsubmit="return validateForm()">
									<div class="col-lg-6 pull-left">
										<label for="kredit_id">Nama Kreditor</label>
										<select name="kredit_id" class="form-control" id="cicilan" required>
											<option>Nama Kreditor</option>
											<?php
											include "koneksi.php";
											$sql = "SELECT * FROM penjualan_kredit ORDER BY id DESC";
											$rows = $con->query($sql);
											if ($rows == FALSE) {
												trigger_error("Syntax Mysql Error: " . $sql . "Error: " . $con->error, E_USER_ERROR);
											}else{
												$no=1;
												while ($r = $rows->fetch_array()) {
													?>
													<option value="<?php echo $r['id'] ?>"><?php echo $r['nama_pembeli'] ?></option>
													<?php
													$no++;
												}
											}
											?>
										</select><br/>
										<label for="alamat">Alamat</label>
										<input type="text" name="alamat" class="form-control" required readonly><br/>
										<label for="no_hp">Telepon</label>
										<input type="text" name="no_hp" class="form-control" required readonly><br/>
										<label for="email">Email</label>
										<input type="text" name="email" class="form-control" required readonly><br/>
										<label for="jumlah_pembelian">Jumlah Barang</label>
										<input type="text" name="jumlah_pembelian" class="form-control" readonly><br/>
										<label for="harga_satuan">Harga Satuan</label>
										<input type="text" name="harga_satuan" class="form-control" readonly><br/>
										<label for="uang_muka">Uang Muka</label>
										<input type="text" name="uang_muka" class="form-control" readonly><br/>
									</div>
									<div class="col-lg-6 pull-right">
										<label for="tgl_bayar">Tanggal Bayar Terakhir</label>
										<input type="date" name="tanggal_bayar" class="form-control" required><br/>
										<label for="kode_kredit">Kode Kredit</label>
										<input type="text" name="kode_kredit" class="form-control" required readonly><br/>
										<label for="sisa_cicilan">Sisa Cicilan</label>
										<input type="text" name="sisa_bayar" class="form-control" readonly><br/>
										<label for="cicilan_ke">Cicilan Terakhir</label>
										<input type="text" name="cicilan_ke" value="<?php echo $r['cicilan_ke'] ?>" class="form-control" required><br/>
										<label for="uang_pembayaran">Uang Pembayaran</label>
										<input type="text" name="jumlah" class="form-control" required><br/>
										<button type="submit" class="btn btn-success">
											<i class="fa fa-save"></i> Bayar
										</button>
										<button type="reset" class="btn btn-default">
											<i class="fa fa-refresh"></i> Reset
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include "js.php" ?>
	<script type="text/javascript">
		$(document).ready(function () {
			$( "#cicilan" ).change(function() {
				var c = $("#cicilan").find(":selected").val();
				$.ajax({url: "getdetail_cicilan.php?kredit_id="+c, success: function(result){
					var b = JSON.parse(result);
					$("input[name='cicilan_ke']").val(b.cicilan_ke);
					$("input[name='alamat']").val(b.alamat);
					$("input[name='no_hp']").val(b.no_hp);
					$("input[name='email']").val(b.email);
					$("input[name='jumlah_pembelian']").val(b.jumlah_pembelian);
					$("input[name='harga_satuan']").val(b.harga_satuan);
					$("input[name='uang_muka']").val(b.uang_muka);
					$("input[name='tanggal_bayar']").val(b.tanggal_bayar);
					$("input[name='kode_kredit']").val(b.kode_kredit);
					$("input[name='sisa_bayar']").val(b.sisa_bayar);
				}});
			});
		});
	</script>
</body>
</html>