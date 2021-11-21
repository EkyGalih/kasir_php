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
							<div class="col-lg-6">
								<form action="proses_bayar_cicilan.php" method="POST" onsubmit="return validateForm()">
									<label for="kredit_id">Nama Kreditor</label>
									<select name="kredit_id" class="form-control" id="bayar" required>
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
									<label for="tgl_bayar">Tanggal Bayar</label>
									<input type="date" name="tanggal_bayar" class="form-control" required><br/>
									<label for="kode_kredit">Kode Kredit</label>
									<input type="text" name="kode_kredit" class="form-control" required><br/>
									<label for="jumlah">Uang Muka</label>
									<input type="text" name="jumlah" class="form-control" readonly><br/>
									<label for="sisa_bayar">Sisa Pembayaran</label>
									<input type="text" name="sisa_bayar" class="form-control" readonly><br/>
									<!-- <p><font color="red">* dilakukan saat input cicilan pertama</font></p><br/> -->
									<label for="cicilan_ke">Cicilan Ke</label>
									<input type="text" name="cicilan_ke" value="0" class="form-control" required readonly><br/>
									<button type="submit" class="btn btn-success">
										<i class="fa fa-save"></i> Bayar
									</button>
									<button type="reset" class="btn btn-default">
										<i class="fa fa-refresh"></i> Reset
									</button>
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
			$( "#bayar" ).change(function() {
				var b = $("#bayar").find(":selected").val();
				$.ajax({url: "getdetail_cicilan_lunas.php?id="+b, success: function(result){
					// console.log(b);
					var b = JSON.parse(result);
					$("input[name='sisa_bayar']").val(b.total);
					$("input[name='jumlah']").val(b.uang_muka);
					// $("input[name='procesor']").val(b.processor);
					// $("input[name='warna']").val(b.warna);
					// $("input[name='kelengkapan']").val(b.kelengkapan);
					// $("input[name='harga_satuan']").val(b.harga_jual);
				}});
			});
		});
	</script>
</body>
</html>