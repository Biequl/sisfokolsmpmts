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
$filenya = "mapel.php";
$judul = "Mata Pelajaran";
$judulku = "[AKADEMIK]. $judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$jnskd = nosql($_REQUEST['jnskd']);



//focus
if (empty($jnskd))
	{
	$diload = "document.formx.jenis.focus();";
	}
else
	{
	$diload = "document.formx.no.focus();";
	}







//isi *START
ob_start();



//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/number.js");
require("../../inc/js/checkall.js");
require("../../inc/js/swap.js");


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Jenis Mata Pelajaran : ';
echo "<select name=\"jenis\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qtpx = mysqli_query($koneksi, "SELECT * FROM m_prog_pddkn_jns ".
				"WHERE kd = '$jnskd'");
$rowtpx = mysqli_fetch_assoc($qtpx);
$tpx_kd = nosql($rowtpx['kd']);
$tpx_jenis = balikin($rowtpx['jenis']);

echo '<option value="'.$tpx_kd.'">'.$tpx_jenis.'</option>';

$qtp = mysqli_query($koneksi, "SELECT * FROM m_prog_pddkn_jns ".
			"WHERE kd <> '$jnskd' ".
			"ORDER BY jenis ASC");
$rowtp = mysqli_fetch_assoc($qtp);

do
	{
	$tp_kd = nosql($rowtp['kd']);
	$tp_jns = balikin($rowtp['jenis']);

	echo '<option value="'.$filenya.'?jnskd='.$tp_kd.'">'.$tp_jns.'</option>';
	}
while ($rowtp = mysqli_fetch_assoc($qtp));

echo '</select>
</td>
</tr>
</table>';

if (empty($jnskd))
	{
	echo '<p>
	<strong><font color="#FF0000">JENIS MATA PELAJARAN Belum Dipilih...!</font></strong>
	</p>';
	}
else
	{
	//query
	$q = mysqli_query($koneksi, "SELECT * FROM m_prog_pddkn ".
				"WHERE kd_jenis = '$jnskd' ".
				"ORDER BY round(no) ASC, ".
				"round(no_sub) ASC, ".
				"round(no_sub2) ASC");
	$row = mysqli_fetch_assoc($q);
	$total = mysqli_num_rows($q);


	echo '<p>
	<table width="100%" border="1" cellspacing="0" cellpadding="3">
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td width="10"><strong><font color="'.$warnatext.'">No.</font></strong></td>
	<td><strong><font color="'.$warnatext.'">Nama</font></strong></td>
	<td width="100"><strong><font color="'.$warnatext.'">Singkatan</font></strong></td>
	</tr>';

	if ($total != 0)
		{
		do {
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
			$kd = nosql($row['kd']);
			$no = nosql($row['no']);
			$no_sub = nosql($row['no_sub']);
			$no_sub2 = nosql($row['no_sub2']);
			$pel = balikin($row['prog_pddkn']);
			$xpel = balikin($row['xpel']);


			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>'.$nomer.'</td>
			<td>'.$pel.'</td>
			<td>'.$xpel.'</td>
	        	</tr>';
			}
		while ($row = mysqli_fetch_assoc($q));
		}

	echo '</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="3">
	<tr>
	<td align="right">Total : <strong><font color="#FF0000">'.$total.'</font></strong> Data.</td>
	</tr>
	</table>
	</p>';
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