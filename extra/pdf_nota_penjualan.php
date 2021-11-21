<?php
include("../koneksi.php");
require_once("dompdf_config.inc.php");

$html = "<html>";
$html .= "<head>";
$html .= '<link rel="stylesheet" type="text/css" href="assets/css/print.css">';
$html .= "</head>";
$html .= "<body>";

$sql = "SELECT penjualan_cash.*, barang.* FROM penjualan_cash, barang WHERE id_cash=".$_GET['id'];
$query = "SELECT penjualan_cash.*, barang.*, suplier.* FROM penjualan_cash, barang, suplier WHERE suplier_id=$r[suplier_id]";
$recordset = mysqli_query($mysqli, $sql);
$recordset = mysqli_query($mysqli, $query);

$html .= '<caption><h4>LIST MEMBER</h4></caption>';
$html .= '<table border=1 align=center">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>NO</th>';
$html .= '<th>FULL NAME</th>';
$html .= '<th>NIM</th>';
$html .= '<th>SEMESTER</th>';
$html .= '<th>PRODI</th>';
$html .= '<th>ADDRESS</th>';
$html .= '<th>PHONE NUMBER</th>';
$html .= '<th>STATUS MEMBER</th>';
	// $html .= '<th></th>';
$html .= '</tr>';
$html .= '</thead>';
$no=1;
$html .= '<tbody>';
while ($row = mysqli_fetch_array($recordset)){
	$html .= '<tr>';
	$html .= '<td style="text-align:center;">'.$no.'.</td>';
	$html .= '<td style="text-align:center;">'.$row['full_name'].'</td>';
	$html .= '<td style="text-align:center;">'.$row['nim'].'</td>';
	$html .= '<td style="text-align:center;">'.$row['semester'].'</td>';
	$html .= '<td style="text-align:center;">'.$row['prodi'].'</td>';			
	$html .= '<td style="text-align:center;">'.$row['alamat'].'</td>';		
	$html .= '<td style="text-align:center;">'.$row['telepon'].'</td>';				
	$html .= '<td style="text-align:center;">'.$row['status_member'].'</td>';				
		// $html .= '<td>'.$row[''].'</td>';		
	$html .= '</tr>';
	$no++;
}
$html .= '</tbody>';
$html .='</table>';
$html .= "</body>";
$html .= "</html>";

/*$html = "<html>
		<body>
		<h1> ini contoh isian file PDF</h1>
		</body>
		</html>";*/

	// membuat instance objek dari class DOMPDF

		$dompdf = new DOMPDF();	

		$dompdf->set_paper('A4','portrait');
		$dompdf->load_html($html);
		$dompdf->render();	
		$dompdf->stream('list_member.pdf', array("Attachment"=>0));
		?>