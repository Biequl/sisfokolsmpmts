<?php
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
/////// SISFOKOL_SMA_v6.78_(Code:Tekniknih)                     ///////
/////// (Sistem Informasi Sekolah untuk SMA)                    ///////
///////////////////////////////////////////////////////////////////////
/////// Dibuat oleh :                                           ///////
/////// Agus Muhajir, S.Kom                                     ///////
/////// URL 	:                                               ///////
///////     * http://github.com/hajirodeon                      ///////
///////     * http://gitlab.com/hajirodeon                      ///////
///////     * http://sisfokol.wordpress.com                     ///////
///////     * http://hajirodeon.wordpress.com                   ///////
///////     * http://yahoogroup.com/groups/sisfokol             ///////
///////     * https://www.youtube.com/@hajirodeon               ///////
///////////////////////////////////////////////////////////////////////
/////// E-Mail	:                                               ///////
///////     * hajirodeon@yahoo.com                              ///////
///////     * hajirodeon@gmail.com                              ///////
/////// HP/SMS/WA : 081-829-88-54                               ///////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////



session_start();


require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/adm.php");
nocache;

//nilai
$filenya = "siswa_pdf.php";
$judul = "Data siswa";
$judulku = "$judul";
$judulx = $judul;
$kd = nosql($_REQUEST['kd']);


require_once("../../inc/class/dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();





//detail
$qku = mysqli_query($koneksi, "SELECT * FROM m_siswa ".
								"WHERE kd = '$kd'");
$rku = mysqli_fetch_assoc($qku);
$ku_tapel = balikin($rku['tapel']);
$ku_kelas = balikin($rku['kelas']);
$ku_kode = balikin($rku['kode']);
$ku_nama = balikin($rku['nama']);



$ku_nama2 = seo_friendly_url($ku_nama);





//isi *START
ob_start();




//file image qrcode
$fileku = "../../filebox/qrcode/$ku_kode.png";
?>



<table width="200" cellpadding="1" cellspacing="0" border="1">
	<tr valign="top">
		<td width="200" align="center">


			<img src="<?php echo $fileku;?>" width="150" />
			
			<table width="200" cellpadding="1" cellspacing="0">
				<tr valign="top">
					<td width="200" align="center">
						<font face="Sans, sans-serif"><font size="2" style="font-size: 14pt">
							<b>KARTU SISWA</b>
							</font></font>
						<hr>
					</td>
				</tr>
			</table>	
			
			<table width="200" cellpadding="1" cellspacing="0">
				<tr valign="top">
					<td width="75">
						<font face="Sans, sans-serif"><font size="2" style="font-size: 10pt">
							NIS
							</font></font>
					</td>
					<td width="125">
						<font face="Sans, sans-serif"><font size="2" style="font-size: 10pt">: 
							<?php echo $ku_kode;?>
						</font></font>
					</td>
				</tr>
				<tr valign="top">
					<td width="75">
						<font face="Sans, sans-serif"><font size="2" style="font-size: 10pt">NAMA</font></font>
						
					</td>
					<td width="125">
						<font face="Sans, sans-serif"><font size="2" style="font-size: 10pt">: <?php echo $ku_nama;?></font></font>
					</td>
				</tr>
				
				<tr valign="top">
					<td width="75">
						<font face="Sans, sans-serif"><font size="2" style="font-size: 10pt">TAPEL</font></font>
						
					</td>
					<td width="125">
						<font face="Sans, sans-serif"><font size="2" style="font-size: 10pt">: <?php echo $ku_tapel;?></font></font>
					</td>
				</tr>
				
				<tr valign="top">
					<td width="75">
						<font face="Sans, sans-serif"><font size="2" style="font-size: 10pt">KELAS</font></font>
						
					</td>
					<td width="125">
						<font face="Sans, sans-serif"><font size="2" style="font-size: 10pt">: <?php echo $ku_kelas;?></font></font>
					</td>
				</tr>
			</table>

		</td>
	</tr>
</table>



<?php
//isi
$isi = ob_get_contents();
ob_end_clean();



//echo $isi;





$dompdf->loadHtml($isi);

// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
//$dompdf->stream('raport-$nis-$ku_nama2.pdf');
$dompdf->stream('siswa-'.$ku_kode.'-'.$ku_nama2.'.pdf');
?>
