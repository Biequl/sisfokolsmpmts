<?php
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
/////// SISFOKOL_SMK_v6.78_(Code:Tekniknih)                          ///////
/////// (Sistem Informasi Sekolah untuk SMK)                    ///////
///////////////////////////////////////////////////////////////////////
/////// Dibuat oleh :                                           ///////
/////// Agus Muhajir, S.Kom                                     ///////
/////// URL 	:                                               ///////
///////     * http://github.com/hajirodeon/                          ///////
///////     * http://sisfokol.wordpress.com/                    ///////
///////     * http://hajirodeon.wordpress.com/                  ///////
///////     * http://yahoogroup.com/groups/sisfokol/            ///////
///////     * https://www.youtube.com/@hajirodeon       ///////
/////// E-Mail	:                                               ///////
///////     * hajirodeon@yahoo.com                              ///////
///////     * hajirodeon@gmail.com                              ///////
/////// HP/SMS/WA : 081-829-88-54                               ///////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////



session_start();

//fungsi - fungsi
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/admks.php");
$tpl = LoadTpl("../../template/admks.html");


nocache;

//nilai
$filenya = "wk.php";
$judul = "Wali Kelas";
$judulku = "[AKADEMIK]. $judul";
$judulx = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$ke = "$filenya?tapelkd=$tapelkd";





//focus...
if (empty($tapelkd))
	{
	$diload = "document.formx.tapel.focus();";
	}











//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/swap.js");
require("../../inc/js/number.js");
require("../../inc/js/checkall.js");



//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form name="formx" method="post" action="'.$filenya.'">
<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Tahun Pelajaran : ';
echo "<select name=\"tapel\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qtpx = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
			"WHERE kd = '$tapelkd'");
$rowtpx = mysqli_fetch_assoc($qtpx);
$tpxkd = nosql($rowtpx['kd']);
$tpxtahun1 = nosql($rowtpx['tahun1']);
$tpxtahun2 = nosql($rowtpx['tahun2']);

echo '<option value="'.$tpxkd.'">'.$tpxtahun1.'/'.$tpxtahun2.'</option>';

$qtp = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
			"WHERE kd <> '$tapelkd' ".
			"ORDER BY tahun1 ASC");
$rowtp = mysqli_fetch_assoc($qtp);

do
	{
	$tpkd = nosql($rowtp['kd']);
	$tptahun1 = nosql($rowtp['tahun1']);
	$tptahun2 = nosql($rowtp['tahun2']);

	echo '<option value="'.$filenya.'?tapelkd='.$tpkd.'">'.$tptahun1.'/'.$tptahun2.'</option>';
	}
while ($rowtp = mysqli_fetch_assoc($qtp));

echo '</select>

</td>
</tr>
</table>
<br>';


//nek drg
if (empty($tapelkd))
	{
	echo '<p>
	<font color="#FF0000"><strong>TAHUN PELAJARAN Belum Diplih...!</strong></font>
	</p>';
	}


else
	{
	//query
	$q = mysqli_query($koneksi, "SELECT m_walikelas.*, m_walikelas.kd AS mwkd, ".
						"m_pegawai.*, m_pegawai.kd AS mpkd, m_kelas.* ".
						"FROM m_walikelas, m_pegawai, m_kelas ".
						"WHERE m_walikelas.kd_pegawai = m_pegawai.kd ".
						"AND m_walikelas.kd_kelas = m_kelas.kd ".
						"AND m_walikelas.kd_tapel = '$tapelkd' ".
						"ORDER BY round(m_kelas.no) ASC");
	$row = mysqli_fetch_assoc($q);
	$total = mysqli_num_rows($q);


	//detail
	echo '<table width="100%" border="1" cellspacing="0" cellpadding="3">
	<tr bgcolor="'.$warnaheader.'">
	<td width="1"><strong><font color="'.$warnatext.'">No.</font></strong></td>
	<td width="50"><strong><font color="'.$warnatext.'">Kelas</font></strong></td>
	<td width="100"><strong><font color="'.$warnatext.'">NIP</font></strong></td>
	<td><strong><font color="'.$warnatext.'">Nama</font></strong></td>
	</tr>';

	//nek ada
	if ($total != 0)
		{
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


			//nilai
			$i_nomer = $i_nomer + 1;
			$i_kd = nosql($row['mwkd']);
			$i_mpkd = nosql($row['mpkd']);
			$i_nip = nosql($row['nip']);
			$i_nama = balikin($row['nama']);
			$i_kelas = balikin($row['kelas']);


			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>'.$i_nomer.'.</td>
			<td>'.$i_kelas.'</td>
			<td>'.$i_nip.'</td>
			<td>'.$i_nama.'</td>
			</tr>';
			}
		while ($row = mysqli_fetch_assoc($q));
		}

	echo '</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="3">
	<tr>
	<td align="right"><strong><font color="#FF0000">'.$total.'</font></strong> Data. '.$pagelist.'</td>
	</tr>
	</table>';
	}

echo '</form>
<br>
<br>
<br>';
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