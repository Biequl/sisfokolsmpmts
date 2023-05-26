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


require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/admgr.php");
require("../../inc/class/paging.php");
$tpl = LoadTpl("../../template/admgr.html");

nocache;

//nilai
$filenya = "mengajar.php";
$judul = "JADWAL MENGAJAR";
$judulku = $judul;
$judulx = $judul;

$s = nosql($_REQUEST['s']);
$m = nosql($_REQUEST['m']);
$kunci = cegah($_REQUEST['kunci']);
$kd = nosql($_REQUEST['kd']);
$ke = $filenya;
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}


$limit = 1000;



//PROSES ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//reset
if ($_POST['btnRST'])
	{
	//re-direct
	xloc($filenya);
	exit();
	}





//cari
if ($_POST['btnCARI'])
	{
	//nilai
	$kunci = cegah($_POST['kunci']);


	//cek
	if (empty($kunci))
		{
		//re-direct
		$pesan = "Input Pencarian Tidak Lengkap. Harap diperhatikan...!!";
		pekem($pesan,$filenya);
		exit();
		}
	else
		{
		//re-direct
		$ke = "$filenya?kunci=$kunci";
		xloc($ke);
		exit();
		}
	}



//batal
if ($_POST['btnBTL'])
	{
	//re-direct
	xloc($filenya);
	exit();
	}








//nek excel
if ($_POST['btnEX'])
	{
	//nilai
	$fileku = "jadwal_mengajar.xls";


	$sqlcount = "SELECT * FROM m_mapel ".
					"WHERE pegawai_kd = '$kd1_session' ".
					"ORDER BY tapel DESC, ".
					"nama ASC";
	
	
	//query
	$p = new Pager();
	$start = $p->findStart($limit);
	
	$sqlresult = $sqlcount;
	
	$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysqli_fetch_array($result);

	
	//isi *START
	ob_start();
	

	echo '<div class="table-responsive">
	<h3>JADWAL MENGAJAR</h3>
	                   
	<table class="table" border="1">
	<thead>

		<tr valign="top" bgcolor="'.$warnaheader.'">
		<td width="100"><strong><font color="'.$warnatext.'">TAPEL</font></strong></td>
		<td><strong><font color="'.$warnatext.'">MAPEL</font></strong></td>
		</tr>
	
	</thead>
	<tbody>';
	
	
	
	if ($count != 0)
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
	
			$nomer = $nomer + 1;
			$i_tapel = balikin($data['tapel']);
			$i_kode = balikin($data['kode']);
			$i_nama = balikin($data['nama']);
			
	
						
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>'.$i_tapel.'</td>
			<td>'.$i_nama.'
			<br>';
			
			//ketahui jadwalnya
			$qyuk3 = mysqli_query($koneksi, "SELECT * FROM jadwal ".
												"WHERE mapel_kode = '$i_kode' ".
												"ORDER BY tapel DESC, ".
												"smt DESC, ".
												"kelas ASC, ".
												"mapel_nama ASC, ".
												"jam_ke ASC");
			$ryuk3 = mysqli_fetch_assoc($qyuk3);
			$tyuk3 = mysqli_num_rows($qyuk3);
			
			
			//jika ada
			if (!empty($tyuk3))
				{
				echo "<ol>";
				
				do
					{
					//nilai
					$yuk3_tapel = balikin($ryuk3['tapel']);
					$yuk3_smt = balikin($ryuk3['smt']);
					$yuk3_kelas = balikin($ryuk3['kelas']);
					$yuk3_jam = balikin($ryuk3['jam_ke']);
					$yuk3_hari = balikin($ryuk3['hari']);
					
					echo "<li>SMT:<b>$yuk3_smt</b>. Kelas:<b>$yuk3_kelas</b>. Hari:<b>$yuk3_hari</b>. Jam ke-<b>$yuk3_jam</b></li>";
					}
				while ($ryuk3 = mysqli_fetch_assoc($qyuk3));
				
				echo "</ol>";
				}
			else
				{
				echo "<p>
				<b><font color='red'>Belum Punya Jadwal.</font></b>
				</p>";
				}
	
	
			echo '</td>
			</tr>';
			
			}
		while ($data = mysqli_fetch_assoc($result));
		}

	
	echo '</tbody>	
	  </table>';
	

	




	
	//isi
	$isiku = ob_get_contents();
	ob_end_clean();


	
	
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=$fileku");
	echo $isiku;


	exit();
	}	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




//isi *START
ob_start();




//require
require("../../inc/js/jumpmenu.js");
require("../../inc/js/checkall.js");
require("../../inc/js/number.js");
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
$sqlcount = "SELECT * FROM m_mapel ".
				"WHERE pegawai_kd = '$kd1_session' ".
				"ORDER BY tapel DESC, ".
				"nama ASC";


//query
$p = new Pager();
$start = $p->findStart($limit);

$sqlresult = $sqlcount;

$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
$pages = $p->findPages($count, $limit);
$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
$pagelist = $p->pageList($_GET['page'], $pages, $target);
$data = mysqli_fetch_array($result);



echo '<form action="'.$filenya.'" method="post" name="formxx">
<p>
<input name="btnEX" type="submit" value="EXPORT" class="btn btn-success">
</p>

</form>
<hr>


<form action="'.$filenya.'" method="post" name="formx">

	

<div class="table-responsive">          
<table class="table" border="1">
<thead>

<tr valign="top" bgcolor="'.$warnaheader.'">
<td width="100"><strong><font color="'.$warnatext.'">TAPEL</font></strong></td>
<td><strong><font color="'.$warnatext.'">MAPEL</font></strong></td>
</tr>
</thead>
<tbody>';

if ($count != 0)
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

		$nomer = $nomer + 1;
		$i_tapel = balikin($data['tapel']);
		$i_kode = balikin($data['kode']);
		$i_nama = balikin($data['nama']);
		

					
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>'.$i_tapel.'</td>
		<td>'.$i_nama.'
		<br>';
		
		//ketahui jadwalnya
		$qyuk3 = mysqli_query($koneksi, "SELECT * FROM jadwal ".
											"WHERE mapel_kode = '$i_kode' ".
											"ORDER BY tapel DESC, ".
											"smt DESC, ".
											"kelas ASC, ".
											"mapel_nama ASC, ".
											"jam_ke ASC");
		$ryuk3 = mysqli_fetch_assoc($qyuk3);
		$tyuk3 = mysqli_num_rows($qyuk3);
		
		
		//jika ada
		if (!empty($tyuk3))
			{
			echo "<ol>";
			
			do
				{
				//nilai
				$yuk3_tapel = balikin($ryuk3['tapel']);
				$yuk3_smt = balikin($ryuk3['smt']);
				$yuk3_kelas = balikin($ryuk3['kelas']);
				$yuk3_jam = balikin($ryuk3['jam_ke']);
				$yuk3_hari = balikin($ryuk3['hari']);
				
				echo "<li>SMT:<b>$yuk3_smt</b>. Kelas:<b>$yuk3_kelas</b>. Hari:<b>$yuk3_hari</b>. Jam ke-<b>$yuk3_jam</b></li>";
				}
			while ($ryuk3 = mysqli_fetch_assoc($qyuk3));
			
			echo "</ol>";
			}
		else
			{
			echo "<p>
			<b><font color='red'>Belum Punya Jadwal.</font></b>
			</p>";
			}


		echo '</td>
		</tr>';
		
		}
	while ($data = mysqli_fetch_assoc($result));
	}


echo '</tbody>
  </table>
  </div>


<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
<strong><font color="#FF0000">'.$count.'</font></strong> Data. '.$pagelist.'
<br>

<input name="jml" type="hidden" value="'.$count.'">
<input name="s" type="hidden" value="'.$s.'">
<input name="kd" type="hidden" value="'.$kdx.'">
<input name="page" type="hidden" value="'.$page.'">

</td>
</tr>
</table>
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