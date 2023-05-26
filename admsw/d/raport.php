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


//fungsi - fungsi
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/admsw.php");
require("../../inc/class/paging.php");
$tpl = LoadTpl("../../template/admsw.html");

nocache;

//nilai
$filenya = "raport.php";
$judul = "Cetak Raport";
$judulku = "[PENILAIAN RAPORT]. $judul";
$judulx = $judul;
$tapelkd = cegah($_REQUEST['tapelkd']);
$kelkd = cegah($_REQUEST['kelkd']);
$smt = cegah($_REQUEST['smt']);
$s = cegah($_REQUEST['s']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}

$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&smt=$smt&page=$page";




//focus...
if (empty($tapelkd))
	{
	$diload = "document.formx.tapel.focus();";
	}

else if (empty($kelkd))
	{
	$diload = "document.formx.kelas.focus();";
	}





//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////








//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/swap.js");
require("../../inc/js/checkall.js");
require("../../inc/js/number.js");
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
echo '<form name="formxx" method="post" action="'.$filenya.'">
<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Tahun Pelajaran : ';
echo "<select name=\"tapel\" onChange=\"MM_jumpMenu('self',this,0)\" class=\"btn btn-warning\">";

//terpilih
$qtpx = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
						"WHERE nama = '$tapelkd'");
$rowtpx = mysqli_fetch_assoc($qtpx);
$tpx_kd = nosql($rowtpx['kd']);
$tpx_thn1 = cegah($rowtpx['nama']);
$tpx_thn2 = balikin($rowtpx['nama']);

echo '<option value="'.$tpx_thn1.'" selected>'.$tpx_thn2.'</option>';


$qtp = mysqli_query($koneksi, "SELECT * FROM m_siswa ".
								"WHERE kd = '$kd2_session' ".
								"ORDER BY tapel DESC");
$rowtp = mysqli_fetch_assoc($qtp);

do
	{
	$tpkd = nosql($rowtp['kd']);
	$tpth1 = cegah($rowtp['tapel']);
	$tpth2 = balikin($rowtp['tapel']);

	echo '<option value="'.$filenya.'?tapelkd='.$tpth1.'">'.$tpth2.'</option>';
	}
while ($rowtp = mysqli_fetch_assoc($qtp));

echo '</select>, 



Semester : ';
echo "<select name=\"smt\" onChange=\"MM_jumpMenu('self',this,0)\" class=\"btn btn-warning\">";
echo '<option value="'.$smt.'" selected>'.$smt.'</option>
<option value="'.$filenya.'?tapelkd='.$tapelkd.'&smt=1">1</option>
<option value="'.$filenya.'?tapelkd='.$tapelkd.'&smt=2">2</option>
</select>, 


Kelas : ';
echo "<select name=\"kelas\" onChange=\"MM_jumpMenu('self',this,0)\" class=\"btn btn-warning\">";

//terpilih
$qbtx = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
									"WHERE nama = '$kelkd'");
$rowbtx = mysqli_fetch_assoc($qbtx);
$btxkd = nosql($rowbtx['kd']);
$btxkelas1 = cegah($rowbtx['nama']);
$btxkelas2 = balikin($rowbtx['nama']);

echo '<option value="'.$btxkelas1.'">'.$btxkelas2.'</option>';

$qbt = mysqli_query($koneksi, "SELECT * FROM m_siswa ".
								"WHERE kd = '$kd2_session' ".
								"ORDER BY tapel DESC");
$rowbt = mysqli_fetch_assoc($qbt);

do
	{
	$btkd = nosql($rowbt['kd']);
	$btkelas1 = cegah($rowbt['kelas']);
	$btkelas2 = balikin($rowbt['kelas']);

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&smt='.$smt.'&kelkd='.$btkelas1.'">'.$btkelas2.'</option>';
	}
while ($rowbt = mysqli_fetch_assoc($qbt));

echo '</select> 

<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
<input name="kelkd" type="hidden" value="'.$kelkd.'">
<input name="smt" type="hidden" value="'.$smt.'">
</td>
</tr>
</table>

</form>
<br>';


//nek blm dipilih
if (empty($tapelkd))
	{
	echo '<p>
	<font color="#FF0000"><strong>TAHUN PELAJARAN Belum Dipilih...!</strong></font>
	</p>';
	}

else if (empty($smt))
	{
	echo '<p>
	<font color="#FF0000"><strong>SEMESTER Belum Dipilih...!</strong></font>
	</p>';
	}

else if (empty($kelkd))
	{
	echo '<p>
	<font color="#FF0000"><strong>KELAS Belum Dipilih...!</strong></font>
	</p>';
	}


else
	{
	echo '<form name="formx" method="post" action="'.$filenya.'">
	
	<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
	<input name="kelkd" type="hidden" value="'.$kelkd.'">
	<input name="smt" type="hidden" value="'.$smt.'">';
	
	
	//query
	$p = new Pager();
	$start = $p->findStart($limit);

	$sqlcount = "SELECT * FROM m_siswa ".
					"WHERE tapel = '$tapelkd' ".
					"AND kelas = '$kelkd' ".
					"ORDER BY round(nourut) ASC";
	$sqlresult = $sqlcount;

	$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
	$target = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd";
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysqli_fetch_array($result);





	//nek ada
	if ($count != 0)
		{
		echo '<div class="table-responsive">          
		<table class="table" border="1">
		<thead>
			<tr valign="top" bgcolor="'.$warnaheader.'">
				<td width="5">
					<p align="center"><b>NO.</b></p>
				</td>
				<td width="50">
					<p align="center"><b>NIS</b></p>
				</td>
				<td>
					<p align="center"><b>NAMA</b></p>
				</td>
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
	
				$i_kd = nosql($data['kd']);
				$i_nis = nosql($data['kode']);
				$i_nis2 = cegah($data['kode']);
				$i_abs = nosql($data['nourut']);
				$i_nama = balikin2($data['nama']);
				$i_nama2 = cegah($data['nama']);
	

	
	
				echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
				echo '<td>
						'.$i_abs.'.
					</td>
					<td>
						'.$i_nis.'
					</td>
					<td>
						'.$i_nama.'
						<br>
						<a href="raport_pdf.php?swkd='.$i_kd.'&swnis='.$i_nis.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&smt='.$smt.'" class="btn btn-danger" target="_blank">CETAK RAPORT >></a>
					</td>

				</tr>';
				}
			while ($data = mysqli_fetch_assoc($result));
			
			
			echo '</tbody>
		</table>
		</div>

		<table width="100%" border="0" cellspacing="0" cellpadding="3">
		<tr>
		<td>
		<strong><font color="#FF0000">'.$count.'</font></strong> Data. '.$pagelist.'
		<br>
		<br>
	
		<input name="jml" type="hidden" value="'.$count.'">
		<input name="s" type="hidden" value="'.$s.'">
		<input name="kd" type="hidden" value="'.$kdx.'">
		<input name="page" type="hidden" value="'.$page.'">
		</td>
		</tr>
		</table>
		</form>';
		}

	else
		{
		echo '<p>
		<font color="red"><strong>TIDAK ADA DATA.</strong></font>
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


//diskonek
xfree($qbw);
xclose($koneksi);
exit();
?>