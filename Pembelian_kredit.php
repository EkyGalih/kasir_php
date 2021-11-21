<?php session_start(); ?>
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
					<h1 class="page-header">Penjualan Barang [kredit]</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-pencil"></i> Input data Penjualan
						</div>
						<div class="panel-body">
							<?php
							if ($_SESSION['success_kredit']) {
								?>
								<div class="alert alert-success" id="Pesan">
									<?php echo $_SESSION['success_kredit'] ?>
								</div>
								<?php
							}
							$_SESSION['success_kredit'] = "";
							?>
							<form action="Proses_kredit.php" method="POST" onsubmit="return validateForm()">
								<div class="col-lg-6 pull-left">
									<label for="nama_barang">Nama Barang</label>
									<select name="nama_barang" class="form-control" id="kredit" required>
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
									<label for="merek">Merek</label>
									<select name="barang_id" class="form-control" required>
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
									<label>Hardisk</label>
										<input type="text" name="hardisk" class="form-control" readonly><br/>
										<label>Memory</label>
										<input type="text" name="memory" class="form-control" readonly><br/>
										<label>Procesor</label>
										<input type="text" name="procesor" class="form-control" readonly><br/>
										<label>Warna</label>
										<input type="text" name="warna" class="form-control" readonly><br/>
										<label>Kelengkapan</label>
										<input type="text" name="kelengkapan" class="form-control" readonly><br/>
								</div>
								<div class="col-sm-6 pull-right">
									<label for="nama_pembeli">Nama Pembeli</label>
									<input type="text" name="nama_pembeli" class="form-control" required><br/>
									<label for="alamat">Alamat</label>
									<input type="text" name="alamat" class="form-control" required><br/>
									<label for="no_hp">No Hp</label>
									<input type="text" name="no_hp" class="form-control" max-length="12" required><br/>
									<label for="email">E-Mail</label>
									<input type="text" name="email" class="form-control" placeholder="exp: example@example.com" required><br/>
									<label for="jumlah_barang">Jumlah Barang</label>
									<input type="text" name="jumlah_barang" class="form-control" required><br/>
									<label for="harga_satuan">Harga Satuan</label>
									<input type="text" name="harga_satuan" class="form-control" required readonly><br/>
									<label for="uang_muka">Uang Muka</label>
									<input type="text" name="uang_muka" class="form-control" required><br/>
									<button type="submit" class="btn btn-success">
										<i class="fa fa-save"></i> Kredit
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
<script>
	$(document).ready(function(){
		$( "#kredit" ).change(function() {
				var k = $("#kredit").find(":selected").val();
				$.ajax({url: "getdetail_kredit.php?id_supplier="+k, success: function(result){
					var b = JSON.parse(result);
					$("input[name='hardisk']").val(b.hardisk);
					$("input[name='memory']").val(b.memory);
					$("input[name='procesor']").val(b.processor);
					$("input[name='warna']").val(b.warna);
					$("input[name='kelengkapan']").val(b.kelengkapan);
					$("input[name='harga_satuan']").val(b.harga_jual);
				}});
			});
		setTimeout(function(){
			$("#Pesan").fadeIn('slow');
		}, 500);
	});
	setTimeout(function(){
		$("#Pesan").fadeOut('slow');
	}, 2500);
</script>
</body>
</html>