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

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/admks.php");
$tpl = LoadTpl("../../template/admks.html");

nocache;

//nilai
$filenya = "guru_mapel_tmp.php";
$judul = "Penempatan Guru Mengajar";
$judulku = "[AKADEMIK]. $judul";
$judulx = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$jnskd = nosql($_REQUEST['jnskd']);
$s = nosql($_REQUEST['s']);
$ke = "$filenya?tapelkd=$tapelkd&jnskd=$jnskd";




//focus...
if (empty($tapelkd))
	{
	$diload = "document.formx.tapel.focus();";
	}

else if (empty($jnskd))
	{
	$diload = "document.formx.jenis.focus();";
	}











//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/checkall.js");
require("../../inc/js/swap.js");



//VIEW //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form name="formx" method="post" action="'.$ke.'">
<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Tahun Pelajaran : ';
echo "<select name=\"tapel\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qtpx = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
						"WHERE kd = '$tapelkd'");
$rowtpx = mysqli_fetch_assoc($qtpx);
$tpx_kd = nosql($rowtpx['kd']);
$tpx_thn1 = nosql($rowtpx['tahun1']);
$tpx_thn2 = nosql($rowtpx['tahun2']);

echo '<option value="'.$tpx_kd.'">'.$tpx_thn1.'/'.$tpx_thn2.'</option>';

$qtp = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
						"WHERE kd <> '$tapelkd' ".
						"ORDER BY tahun1 ASC");
$rowtp = mysqli_fetch_assoc($qtp);

do
	{
	$tpkd = nosql($rowtp['kd']);
	$tpth1 = nosql($rowtp['tahun1']);
	$tpth2 = nosql($rowtp['tahun2']);

	echo '<option value="'.$filenya.'?tapelkd='.$tpkd.'">'.$tpth1.'/'.$tpth2.'</option>';
	}
while ($rowtp = mysqli_fetch_assoc($qtp));

echo '</select>,


</td>
</tr>
</table>

<table bgcolor="'.$warna02.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Jenis Program Pendidikan : ';
echo "<select name=\"jenis\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qjnx = mysqli_query($koneksi, "SELECT * FROM m_prog_pddkn_jns ".
						"WHERE kd = '$jnskd'");
$rowjnx = mysqli_fetch_assoc($qjnx);

$jnx_kd = nosql($rowjnx['kd']);
$jnx_jns = nosql($rowjnx['jenis']);

echo '<option value="'.$jnx_kd.'">'.$jnx_jns.'</option>';

//jenis
$qjn = mysqli_query($koneksi, "SELECT * FROM m_prog_pddkn_jns ".
						"WHERE kd <> '$jnskd' ".
						"ORDER BY jenis ASC");
$rowjn = mysqli_fetch_assoc($qjn);

do
	{
	$jn_kd = nosql($rowjn['kd']);
	$jn_jns = balikin($rowjn['jenis']);

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&jnskd='.$jn_kd.'">'.$jn_jns.'</option>';
	}
while ($rowjn = mysqli_fetch_assoc($qjn));

echo '</select>

<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
<input name="jnskd" type="hidden" value="'.$jnskd.'">
</td>
</tr>
</table>
<br>';


//nek blm
if (empty($tapelkd))
	{
	echo '<p>
	<strong><font color="#FF0000">TAHUN PELAJARAN Belum Dipilih...!</font></strong>
	</p>';
	}

else if (empty($jnskd))
	{
	echo '<p>
	<strong><font color="#FF0000">JENIS PROGRAM PENDIDIKAN Belum Dipilih...!</font></strong>
	</p>';
	}
else
	{
	//query
	$q = mysqli_query($koneksi, "SELECT DISTINCT(m_pegawai.nip) AS nip ".
				"FROM m_guru, m_pegawai ".
				"WHERE m_guru.kd_pegawai = m_pegawai.kd ".
				"ORDER BY round(m_pegawai.nip) ASC");
	$row = mysqli_fetch_assoc($q);
	$total = mysqli_num_rows($q);

	if ($total != 0)
		{
		echo '<table width="100%" border="1" cellpadding="3" cellspacing="0">
    	<tr bgcolor="'.$warnaheader.'">
		<td width="5" valign="top"><strong>No.</strong></td>
		<td width="5" valign="top"><strong>NIP</strong></td>
    	<td valign="top"><strong><font color="'.$warnatext.'">Guru</font></strong></td>
    	<td width="300" valign="top"><strong><font color="'.$warnatext.'">Kelas - Mapel</font></strong></td>
    	</tr>';

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
			$i_nip = nosql($row['nip']);

			//detail
			$qpd = mysqli_query($koneksi, "SELECT * FROM m_pegawai ".
						"WHERE nip = '$i_nip'");
			$rpd = mysqli_fetch_assoc($qpd);
			$pd_kd = nosql($rpd['kd']);
			$pd_nama = balikin($rpd['nama']);


			//nek null
			if (empty($i_nip))
				{
				$i_nip = "-";
				}

			echo "<tr bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td valign="top">'.$nomer.'. </td>
    			<td valign="top">'.$i_nip.'</td>
			<td valign="top">
			'.$pd_nama.'
			</td>
			<td valign="top">';

			//pel-nya
			$quru = mysqli_query($koneksi, "SELECT m_guru_prog_pddkn.*, m_guru_prog_pddkn.kd AS mgkd, m_guru.* ".
						"FROM m_guru_prog_pddkn, m_guru ".
						"WHERE m_guru_prog_pddkn.kd_guru = m_guru.kd ".
						"AND m_guru.kd_pegawai = '$pd_kd'");
			$ruru = mysqli_fetch_assoc($quru);


			do
				{
				$gkd = nosql($ruru['mgkd']);
				$kd_prog_pddkn = nosql($ruru['kd_prog_pddkn']);
				$pkd = nosql($ruru['kd_prog_pddkn']);
				$kd_kelas = nosql($ruru['kd_kelas']);


				//mapel
				$q1 = mysqli_query($koneksi, "SELECT * FROM m_prog_pddkn ".
							"WHERE kd = '$kd_prog_pddkn'");
				$r1 = mysqli_fetch_assoc($q1);
				$gpel = balikin($r1['prog_pddkn']);


				//kelas
				$q2 = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
							"WHERE kd = '$kd_kelas'");
				$r2 = mysqli_fetch_assoc($q2);
				$gkelas = balikin($r2['kelas']);


				//nek null
				if (empty($gkd))
					{
					echo "-";
					}
				else
					{
					echo '<strong>*</strong>('.$gkelas.') '.$gpel.'
					<br>';
					}
				}
			while ($ruru = mysqli_fetch_assoc($quru));



			echo '</td>
    			</tr>';
			}
		while ($row = mysqli_fetch_assoc($q));

		echo '</table>
		<table width="100%" border="0" cellspacing="0" cellpadding="3">
    	<tr>
    	<td align="right">Total : <strong><font color="#FF0000">'.$total.'</font></strong> Data.</td>
    	</tr>
	  	</table>';
		}
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
?>