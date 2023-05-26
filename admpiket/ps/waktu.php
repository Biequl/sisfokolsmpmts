<?php
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
/////// SISFOKOL_SMP_v6.78_(Code:Tekniknih)                     ///////
/////// (Sistem Informasi Sekolah untuk SMP)                    ///////
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


//ambil nilai
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/admpiket.php");
$tpl = LoadTpl("../../template/admpiket.html");


nocache;

//nilai
$filenya = "waktu.php";
$judul = "[PRESENSI]. Setting Waktu Masuk dan Pulang";
$judulku = "$judul";




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//simpan
if ($_POST['btnSMP'])
	{
	//ambil nilai
	$masuk_jam = cegah($_POST["masuk_jam"]);
	$masuk_menit = cegah($_POST["masuk_menit"]);
	$pulang_jam = cegah($_POST["pulang_jam"]);
	$pulang_menit = cegah($_POST["pulang_menit"]);

	//cek
	//nek null
	if ((empty($masuk_jam)) OR (empty($masuk_menit)) OR (empty($pulang_jam)) OR (empty($pulang_menit)))
		{
		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		exit();
		}

	else
		{
		//perintah SQL
		mysqli_query($koneksi, "UPDATE m_waktu SET masuk_jam = '$masuk_jam', ".
									"masuk_menit = '$masuk_menit', ".
									"pulang_jam = '$pulang_jam', ".
									"pulang_menit = '$pulang_menit', ".
									"postdate = '$today'");


		//auto-kembali
		xloc($filenya);
		exit();
		}
	}
	
	
	
	
	
	
	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






//isi *START
ob_start();






     	
echo '<form action="'.$filenya.'" method="post" name="formx">';


//detail
$qku = mysqli_query($koneksi, "SELECT * FROM m_waktu");
$rku = mysqli_fetch_assoc($qku);
$masuk_jam = balikin($rku['masuk_jam']);
$masuk_menit = balikin($rku['masuk_menit']);
$pulang_jam = balikin($rku['pulang_jam']);
$pulang_menit = balikin($rku['pulang_menit']);
$update_akhir = balikin($rku['postdate']);


echo '<div class="row">

<div class="col-md-3">


<p>
Jam Masuk : 
<br>
<input name="masuk_jam" type="text" size="5" value="'.$masuk_jam.'" class="btn-warning">:
<input name="masuk_menit" type="text" size="5" value="'.$masuk_menit.'" class="btn-warning">
</p>




<p>
Jam Pulang : 
<br>
<input name="pulang_jam" type="text" size="5" value="'.$pulang_jam.'" class="btn-warning">:
<input name="pulang_menit" type="text" size="5" value="'.$pulang_menit.'" class="btn-warning">
</p>




<p>
<input name="btnSMP" type="submit" value="SIMPAN" class="btn btn-danger">
</p>

<hr>
<i>
Update Terakhir : '.$update_akhir.'
</i>

</div>


</div>


</form>';



//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");

//diskonek
xfree($qbw);
xclose($koneksi);
exit();
?>