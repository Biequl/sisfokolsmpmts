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

//ambil nilai
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/admwk.php");
require("../../inc/class/paging.php");
$tpl = LoadTpl("../../template/admwk.html");

nocache;

//nilai
$filenya = "detail.php";
$judul = "Daftar Siswa";
$judulku = "[AKADEMIK]. $judul";
$juduli = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd";









//isi *START
ob_start();

//js
require("../../inc/js/swap.js");


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<table>
<tr>
<td>[<a href="../index.php" title="Daftar Kelas">Daftar Kelas</a>]</td>
</table>';



//tapel
$qpel = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
						"WHERE kd = '$tapelkd'");
$rpel = mysqli_fetch_assoc($qpel);
$pel_thn1 = nosql($rpel['tahun1']);
$pel_thn2 = nosql($rpel['tahun2']);

//kelas
$qkel = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
						"WHERE kd = '$kelkd'");
$rkel = mysqli_fetch_assoc($qkel);
$kel_kelas = balikin($rkel['kelas']);






//query data siswa
$p = new Pager();
$start = $p->findStart($limit);
$sqlcount = "SELECT m_siswa.*, m_siswa.kd AS mskd, ".
		"siswa_kelas.*, siswa_kelas.kd AS skkd ".
		"FROM m_siswa, siswa_kelas ".
		"WHERE siswa_kelas.kd_siswa = m_siswa.kd ".
		"AND siswa_kelas.kd_tapel = '$tapelkd' ".
		"AND siswa_kelas.kd_kelas = '$kelkd' ".
		"ORDER BY round(siswa_kelas.no_absen) ASC";
$sqlresult = $sqlcount;

$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
$pages = $p->findPages($count, $limit);
$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
$target = $ke;
$pagelist = $p->pageList($_GET['page'], $pages, $target);
$data = mysqli_fetch_array($result);



echo '<table bgcolor="'.$warnaover.'" width="100%" cellspacing="0" cellpadding="3">
<tr valign="top">
<td>
<strong>Tahun Pelajaran :</strong> '.$pel_thn1.'/'.$pel_thn2.',
<strong>Kelas :</strong> '.$kel_kelas.'
</td>
</tr>
</table>
<br>';

//nek gak null
if ($count != 0)
	{
	echo '<table width="100%" border="1" cellspacing="0" cellpadding="3">
	<tr bgcolor="'.$warnaheader.'">
	<td width="20" align="center"><strong>No.</strong></td>
	<td width="50" align="center"><strong>NIS</strong></td>
	<td align="center"><strong>Nama Siswa</strong></td>
	<td width="50" align="center"><strong>Absensi</strong></td>
	<td width="50" align="center"><strong>Keuangan</strong></td>
	<td width="50" align="center"><strong>Raport</strong></td>
	<td width="50" align="center"><strong>Buku Induk</strong></td>
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
		$y_mskd = nosql($data['mskd']);
		$y_skkd = nosql($data['skkd']);
		$y_no = nosql($data['no_absen']);
		$y_nis = nosql($data['nis']);
		$y_nama = balikin($data['nama']);

		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>'.$y_no.'</td>
		<td>'.$y_nis.'</td>
		<td>'.$y_nama.'</td>
		<td>
		<a href="absensi.php?page='.$page.'&nis='.$y_nis.'&swkd='.$y_mskd.'&skkd='.$y_skkd.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'"
		title="Tahun Pelajaran = '.$pel_thn1.'/'.$pel_thn2.', Kelas = '.$kel_kelas.'">
		<img src="'.$sumber.'/img/preview.gif" width="16" height="16" border="0"></a>
		</td>
		<td>
		<a href="keuangan.php?page='.$page.'&nis='.$y_nis.'&swkd='.$y_mskd.'&skkd='.$y_skkd.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'"
		title="Tahun Pelajaran = '.$pel_thn1.'/'.$pel_thn2.', Kelas = '.$kel_kelas.'">
		<img src="'.$sumber.'/img/preview.gif" width="16" height="16" border="0"></a>
		</td>
		<td>
		<a href="raport.php?page='.$page.'&nis='.$y_nis.'&swkd='.$y_mskd.'&skkd='.$y_skkd.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'"
		title="Tahun Pelajaran = '.$pel_thn1.'/'.$pel_thn2.', Kelas = '.$kel_kelas.'">
		<img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0"></a>
		</td>
		<td>
		<a href="buku_induk.php?page='.$page.'&nis='.$y_nis.'&swkd='.$y_mskd.'&skkd='.$y_skkd.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'"
		title="Tahun Pelajaran = '.$pel_thn1.'/'.$pel_thn2.', Kelas = '.$kel_kelas.'">
		<img src="'.$sumber.'/img/xls.gif" width="16" height="16" border="0"></a>
		</td>
		</tr>';
		}
	while ($data = mysqli_fetch_assoc($result));

	echo '</table>
	<font color="red">
	<strong>'.$count.'</strong>
	</font> Data. '.$pagelist.'';
	}
else
	{
	echo '<p>
	<font color="red">
	<strong>TIDAK ADA DATA.</strong>
	</font>
	</p>';
	}


echo '<br><br><br>';
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