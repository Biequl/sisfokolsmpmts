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
require("../../inc/class/paging.php");
require("../../inc/cek/admks.php");
$tpl = LoadTpl("../../template/admks.html");


nocache;

//nilai
$filenya = "guru.php";
$judul = "Guru";
$judulku = "[AKADEMIK]. $judul";
$judulx = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}

$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&page=$page";







//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/swap.js");
require("../../inc/js/checkall.js");
require("../../inc/js/number.js");



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

Kelas : ';
echo "<select name=\"kelas\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qbtx = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
			"WHERE kd = '$kelkd'");
$rowbtx = mysqli_fetch_assoc($qbtx);
$btxkd = nosql($rowbtx['kd']);
$btxkelas = balikin($rowbtx['kelas']);

echo '<option value="'.$btxkd.'">'.$btxkelas.'</option>';

$qbt = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
			"WHERE kd <> '$kelkd' ".
			"AND kelas LIKE '%$keax_singk%' ".
			"ORDER BY round(no) ASC, ".
			"kelas ASC");
$rowbt = mysqli_fetch_assoc($qbt);

do
	{
	$btkd = nosql($rowbt['kd']);
	$btkelas = balikin($rowbt['kelas']);

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$btkd.'">'.$btkelas.'</option>';
	}
while ($rowbt = mysqli_fetch_assoc($qbt));

echo '</select>
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

else if (empty($kelkd))
	{
	echo '<p>
	<strong><font color="#FF0000">KELAS Belum Dipilih...!</font></strong>
	</p>';
	}
else
	{
	//query
	$p = new Pager();
	$start = $p->findStart($limit);


	$sqlcount = "SELECT DISTINCT(m_pegawai.kd) AS mpkd  ".
			"FROM m_guru, m_pegawai ".
			"WHERE m_guru.kd_pegawai = m_pegawai.kd ".
			"AND m_guru.kd_tapel = '$tapelkd' ".
			"AND m_guru.kd_kelas = '$kelkd' ".
			"ORDER BY round(m_pegawai.nip) ASC";
	$sqlresult = $sqlcount;

	$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysqli_fetch_array($result);

	if ($count != 0)
		{
		//detail
		echo '<p>
		<table width="100%" border="1" cellspacing="0" cellpadding="3">
		<tr bgcolor="'.$warnaheader.'">
		<td width="1"><strong><font color="'.$warnatext.'">No.</font></strong></td>
		<td width="100"><strong><font color="'.$warnatext.'">NIP</font></strong></td>
		<td><strong><font color="'.$warnatext.'">Nama</font></strong></td>
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


			//nilai
			$nomer = $nomer + 1;
			$mpkd = nosql($data['mpkd']);


			//detail e
			$qku = mysqli_query($koneksi, "SELECT * FROM m_pegawai ".
						"WHERE kd = '$mpkd'");
			$rku = mysqli_fetch_assoc($qku);
			$nip = nosql($rku['nip']);
			$nama = balikin($rku['nama']);


			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>'.$nomer.'</td>
			<td>'.$nip.'</td>
			<td>'.$nama.'</td>
			</tr>';
			}
		while ($data = mysqli_fetch_assoc($result));

		echo '</table>
		<table width="100%" border="0" cellspacing="0" cellpadding="3">
		<tr>
		<td align="right">
		<strong><font color="#FF0000">'.$count.'</font></strong> Data. '.$pagelist.'
		</td>
		</tr>
		</table>';
		}
	else
		{
		echo '<p>
		<font color="red">
		<strong>TIDAK ADA DATA.</strong>
		</font>
		</p>';
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