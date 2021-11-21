<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pembelian Barang</title>
	<?php include "css.php" ?>
</head>
<body>
	<div id="wrapper">
		<?php include "navbar.php" ?>
		<?php include "sidebar.php" ?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Pembelian Barang</h1>
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
								<form action="Proses_tambah_beli.php" method="POST" onsubmit="return validateForm()">
									<label for="nama_barang">Nama Barang</label>
									<select name="nama_barang" class="form-control" id="beli" required>
										<option>Nama Barang</option>
										<option value="2">Asus A455L</option>
										<option value="2">Asus A893L</option>
										<option value="3">Acer Mini</option>
										<option value="3">Acer Ox-2t4</option>
										<option value="4">Lenovo corp</option>
										<option value="4">Lenovo AS776</option>
										<option value="5">Hp-mini 4100</option>
										<option value="5">Hp 1772</option>
									</select><br/>
									<label for="jenis_barang">Jenis Barang</label>
									<input type="text" name="jenis_barang" value="Laptop" class="form-control" required readonly=""><br/>
									<label for="harga_barang">Harga Satuan</label>
									<input type="text" name="harga_satuan" class="form-control" required readonly><br/>
									<label for="merek">Merek</label>
									<select name="merek" class="form-control" required>
									<option>Merek</option>
										<?php
										include "koneksi.php";
										$sql = "SELECT barang.*, suplier.* FROM barang, suplier WHERE barang.suplier_id=suplier.id GROUP BY suplier_id";
										$rows = $con->query($sql);
										if ($rows == FALSE) {
											trigger_error("Syntax Mysql Error: " . $sql . "Error: " . $con->error, E_USER_ERROR);
										}else{
											$no=1;
											while ($r = $rows->fetch_array()) {
												?>
												<option value="<?php echo $r['id'] ?>"><?php echo $r['nama'] ?></option>
												<?php
												$no++;
											}
										}
										?>
									</select><br/>
									<label for="stok">Jumlah Pembelian</label>
									<input type="text" name="stok" class="form-control" required><br/><label for="stok">harga Jual</label>
									<input type="text" name="harga_jual" class="form-control" required><br/>
									<button type="submit" class="btn btn-success">
										<i class="fa fa-save"></i> Stok Barang
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
		$(document).ready(function(){
			$( "#beli" ).change(function() {
				var b = $("#beli").find(":selected").val();
				$.ajax({url: "getdetail_pembelian.php?id="+b, success: function(result){
					var b = JSON.parse(result);
					$("input[name='harga_satuan']").val(b.harga_jual);
				}});
			});
		});
	</script>
</body>
</html>