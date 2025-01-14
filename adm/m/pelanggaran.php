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
$tpl = LoadTpl("../../template/adm.html");

nocache;

//nilai
$filenya = "pelanggaran.php";
$judul = "Data Pelanggaran";
$judulku = "[MASTER]. $judul";
$judulx = $judul;
$jnskd = nosql($_REQUEST['jnskd']);
$s = nosql($_REQUEST['s']);





//focus
if (empty($jnskd))
	{
	$diload = "document.formx.jenis.focus();";
	}
else
	{
	$diload = "document.formx.e_no.focus();";
	}






//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek batal
if ($_POST['btnBTL'])
	{
	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//re-direct
	xloc($filenya);
	exit();
	}



//jika edit
if ($s == "edit")
	{
	//nilai
	$jnskd = nosql($_REQUEST['jnskd']);
	$kdx = nosql($_REQUEST['kd']);

	//query
	$qx = mysqli_query($koneksi, "SELECT * FROM m_bk_point ".
									"WHERE jenis_kd = '$jnskd' ".
									"AND kd = '$kdx'");
	$rowx = mysqli_fetch_assoc($qx);
	$e_no = nosql($rowx['no']);
	$e_nama = balikin($rowx['nama']);
	$e_point = balikin($rowx['point']);
	$e_sanksi = balikin($rowx['sanksi']);
	}



//jika simpan
if ($_POST['btnSMP'])
	{
	$s = nosql($_POST['s']);
	$kd = nosql($_POST['kd']);
	$jnskd = nosql($_POST['jnskd']);
	$e_no = cegah2($_POST['e_no']);
	$e_nama = cegah2($_POST['e_nama']);
	$e_point = cegah2($_POST['e_point']);
	$e_sanksi = cegah2($_POST['e_sanksi']);

	
	//query
	$qx = mysqli_query($koneksi, "SELECT * FROM m_bk_point_jenis ".
									"WHERE kd = '$jnskd'");
	$rowx = mysqli_fetch_assoc($qx);
	$e_jenis = cegah($rowx['jenis']);





	//nek null
	if ((empty($e_nama)) OR (empty($e_point)))
		{
		//diskonek
		xfree($qbw);
		xclose($koneksi);

		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		exit();
		}
	else
		{
		//jika baru
		if (empty($s))
			{
			///cek
			$qcc = mysqli_query($koneksi, "SELECT * FROM m_bk_point ".
											"WHERE nama = '$nama'");
			$rcc = mysqli_fetch_assoc($qcc);
			$tcc = mysqli_num_rows($qcc);

			//nek ada
			if ($tcc != 0)
				{
				//diskonek
				xfree($qbw);
				xclose($koneksi);

				//re-direct
				$pesan = "Data Pelanggaran ini, Sudah Ada. Silahkan Ganti Yang Lain...!!";
				$ke = "$filenya?jnskd=$jnskd";
				pekem($pesan,$ke);
				exit();
				}
			else
				{
				//query
				mysqli_query($koneksi, "INSERT INTO m_bk_point(kd, jenis_kd, jenis_nama, ".
										"no, nama, point, sanksi, postdate) VALUES ".
										"('$x', '$jnskd', '$e_jenis', ".
										"'$e_no', '$e_nama','$e_point', '$e_sanksi', '$today')");

				//diskonek
				xfree($qbw);
				xclose($koneksi);

				//re-direct
				$ke = "$filenya?jnskd=$jnskd";
				xloc($ke);
				exit();
				}
			}


		//jika update
		else if ($s == "edit")
			{
			//query
			mysqli_query($koneksi, "UPDATE m_bk_point SET no = '$e_no', ".
										"nama = '$e_nama', ".
										"point = '$e_point', ".
										"sanksi = '$e_sanksi', ".
										"jenis_nama = '$e_jenis', ".
										"postdate = '$today' ".
										"WHERE jenis_kd = '$jnskd' ".
										"AND kd = '$kd'");

			//diskonek
			xfree($qbw);
			xclose($koneksi);

			//re-direct
			$ke = "$filenya?jnskd=$jnskd";
			xloc($ke);
			exit();
			}
		}
	}


//jika hapus
if ($_POST['btnHPS'])
	{
	//ambil nilai
	$jml = nosql($_POST['jml']);

	//ambil semua
	for ($i=1; $i<=$jml;$i++)
		{
		//ambil nilai
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kd = nosql($_POST["$yuhu"]);

		//del
		mysqli_query($koneksi, "DELETE FROM m_bk_point ".
								"WHERE jenis_kd = '$jnskd' ".
								"AND kd = '$kd'");
		}

	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//auto-kembali
	$ke = "$filenya?jnskd=$jnskd";
	xloc($ke);
	exit();
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////







//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/checkall.js");
require("../../inc/js/swap.js");
?>


  
  <script>
  	$(document).ready(function() {
    $('#table-responsive').dataTable( {
        "scrollX": true
    } );
} );
  </script>
  
<?php
//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Jenis Pelanggaran : ';
echo "<select name=\"jenis\" class=\"btn btn-warning\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qtpx = mysqli_query($koneksi, "SELECT * FROM m_bk_point_jenis ".
			"WHERE kd = '$jnskd'");
$rowtpx = mysqli_fetch_assoc($qtpx);
$tpx_kd = nosql($rowtpx['kd']);
$tpx_no = balikin($rowtpx['no']);
$tpx_jenis = balikin($rowtpx['jenis']);


echo '<option value="'.$tpx_kd.'">'.$tpx_no.'.'.$tpx_jenis.'</option>';

$qtp = mysqli_query($koneksi, "SELECT * FROM m_bk_point_jenis ".
			"WHERE kd <> '$jnskd' ".
			"ORDER BY round(no) ASC");
$rowtp = mysqli_fetch_assoc($qtp);

do
	{
	$tpkd = nosql($rowtp['kd']);
	$tpno = nosql($rowtp['no']);
	$tpjenis = balikin($rowtp['jenis']);

	echo '<option value="'.$filenya.'?jnskd='.$tpkd.'">'.$tpno.'.'.$tpjenis.'</option>';
	}
while ($rowtp = mysqli_fetch_assoc($qtp));

echo '</select>
</td>
</tr>
</table>
<br>';


//jika null
if (empty($jnskd))
	{
	echo '<p>
	<font color="red">
	<strong>Jenis Pelanggaran Belum Dipilih.</strong>
	</font>
	</p>';
	}
else
	{
	echo '<p>
	No.:
	<input name="e_no" type="text" value="'.$e_no.'" size="5" class="btn btn-warning">
	</p>

	<p>
	Nama :
	<input name="e_nama" type="text" value="'.$e_nama.'" size="50" class="btn btn-warning">
	</p>
	
	<p>	
	Point :
	<input name="e_point" type="text" value="'.$e_point.'" size="5" class="btn btn-warning">
	</p>

	<p>
	Sanksi :
	<input name="e_sanksi" type="text" value="'.$e_sanksi.'" size="50" class="btn btn-warning">
	</p>
	
	<p>
	<INPUT type="hidden" name="jnskd" value="'.$jnskd.'">
	<INPUT type="hidden" name="s" value="'.$s.'">
	<input name="btnSMP" type="submit" value="SIMPAN" class="btn btn-danger">
	<input name="btnBTL" type="submit" value="BATAL" class="btn btn-primary">
	</p>';


	//query
	$q = mysqli_query($koneksi, "SELECT * FROM m_bk_point ".
									"WHERE jenis_kd = '$jnskd' ".
									"ORDER BY round(no) ASC");
	$row = mysqli_fetch_assoc($q);
	$total = mysqli_num_rows($q);


	if ($total != 0)
		{
		echo '<p>
		<div class="table-responsive">
		<table class="table" border="1">
		<thead>
		<tr valign="top" bgcolor="'.$warnaheader.'">
		<td width="1%">&nbsp;</td>
		<td width="1%">&nbsp;</td>
		<td width="10"><strong><font color="'.$warnatext.'">No.</font></strong></td>
		<td><strong><font color="'.$warnatext.'">Nama</font></strong></td>
		<td width="50"><strong><font color="'.$warnatext.'">Point</font></strong></td>
		<td width="300"><strong><font color="'.$warnatext.'">Sanksi</font></strong></td>
		</tr>
		</thead>
		<tbody>';

		do
			{
			if ($warna_set ==0)
				{
				$warna = $warna01;
				$warna_set = 1;
				}
			else
				{
				$warna = $warna02;
				$warna_set = 0;
				}

			$nomer = $nomer + 1;
			$i_kd = nosql($row['kd']);
			$i_no = balikin2($row['no']);
			$i_nama = balikin2($row['nama']);
			$i_point = balikin2($row['point']);
			$i_sanksi = balikin2($row['sanksi']);



			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>
			<input type="checkbox" name="item'.$nomer.'" value="'.$i_kd.'">
			</td>
			<td>
			<a href="'.$filenya.'?s=edit&jnskd='.$jnskd.'&kd='.$i_kd.'">
			<img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0">
			</a>
			</td>
			<td>'.$i_no.'</td>
			<td>'.$i_nama.'</td>
			<td>'.$i_point.'</td>
			<td>'.$i_sanksi.'</td>
			</tr>';
			}
		while ($row = mysqli_fetch_assoc($q));

		echo '</tbody>
		</table>
		</div>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="3">
		<tr>
		<td width="263">
		<input name="jml" type="hidden" value="'.$total.'">
		<input name="s" type="hidden" value="'.$s.'">
		<input name="kd" type="hidden" value="'.$kdx.'">
		<input name="jnskd" type="hidden" value="'.$jnskd.'">
		<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$total.')" class="btn btn-primary">
		<input name="btnBTL" type="submit" value="BATAL" class="btn btn-warning">
		<input name="btnHPS" type="submit" value="HAPUS" class="btn btn-danger">
		</td>
		<td align="right">Total : <strong><font color="#FF0000">'.$total.'</font></strong> Data.</td>
		</tr>
		</table>
		</p>';
		}
	else
		{
		echo '<p>
		<font color="red">
		<strong>TIDAK ADA DATA. Silahkan Entry Dahulu...!!</strong>
		</font>
		</p>';
		}
	}


echo '</form>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");



//diskonek
xfree($qbw);
xclose($koneksi);
exit();
?>