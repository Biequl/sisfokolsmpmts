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
$filenya = "mapel_desc.php";
$judul = "[AKADEMIK]. Deskripsi Mapel";
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




//jika import
if ($_POST['btnIM'])
	{
	//re-direct
	$ke = "$filenya?s=import";
	xloc($ke);
	exit();
	}












//lama
//import sekarang
if ($_POST['btnIMX'])
	{
	$filex_namex2 = strip(strtolower($_FILES['filex_xls']['name']));

	//nek null
	if (empty($filex_namex2))
		{
		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		$ke = "$filenya?s=import";
		pekem($pesan,$ke);
		exit();
		}
	else
		{
		//deteksi .xls
		$ext_filex = substr($filex_namex2, -4);

		if ($ext_filex == ".xls")
			{
			//nilai
			$path1 = "../../filebox";
			$path2 = "../../filebox/excel";
			chmod($path1,0777);
			chmod($path2,0777);

			//nama file import, diubah menjadi baru...
			$filex_namex2 = "mapel_desc.xls";

			//mengkopi file
			copy($_FILES['filex_xls']['tmp_name'],"../../filebox/excel/$filex_namex2");

			//chmod
            $path3 = "../../filebox/excel/$filex_namex2";
			chmod($path1,0755);
			chmod($path2,0777);
			chmod($path3,0777);

			//file-nya...
			$uploadfile = $path3;


			//require
			require('../../inc/class/PHPExcel.php');
			require('../../inc/class/PHPExcel/IOFactory.php');


			  // load excel
			  $load = PHPExcel_IOFactory::load($uploadfile);
			  $sheets = $load->getActiveSheet()->toArray(null,true,true,true);
			
			  $i = 1;
			  foreach ($sheets as $sheet) 
			  	{
			    // karena data yang di excel di mulai dari baris ke 2
			    // maka jika $i lebih dari 1 data akan di masukan ke database
			    if ($i > 1) 
			    	{
				      // nama ada di kolom A
				      // sedangkan alamat ada di kolom B
				      $i_tapel = cegah($sheet['A']);
				      $i_kelas = cegah($sheet['B']);
				      $i_jenis = cegah($sheet['C']);
				      $i_singkatan = cegah($sheet['D']);
				      $i_mapel = cegah($sheet['E']);
				      $i_smt1_pisi = cegah($sheet['F']);
				      $i_smt1_kisi = cegah($sheet['G']);
				      $i_smt2_pisi = cegah($sheet['H']);
				      $i_smt2_kisi = cegah($sheet['I']);



				      $i_xyz = md5("$i_tapel$i_kelas$i_singkatan");
					  
					  
					  //update
					  mysqli_query($koneksi, "UPDATE m_mapel_deskripsi SET smt1_p_isi = '$i_smt1_pisi', ".
					  								"smt1_k_isi = '$i_smt1_kisi', ".
													"smt2_p_isi = '$i_smt2_pisi', ".
													"smt2_k_isi = '$i_smt2_kisi', ".
													"postdate = '$today' ".
													"WHERE tapel = '$i_tapel' ".
													"AND kelas = '$i_kelas' ".
													"AND kode = '$i_singkatan'");
					  
				    }
			
			    $i++;
			  }




			//hapus file, jika telah import
			$path1 = "../../filebox/excel/$filex_namex2";
			chmod($path1,0777);
			unlink ($path1);


			//re-direct
			xloc($filenya);
			exit();
			}
		else
			{
			//salah
			$pesan = "Bukan File .xls . Harap Diperhatikan...!!";
			$ke = "$filenya?s=import";
			pekem($pesan,$ke);
			exit();
			}
		}
	}





//jika export
//export
if ($_POST['btnEX'])
	{
	//nilai
	$fileku = "daftar-mapel-deskripsi.xls";





	//query
	$limit = 1000;
	$p = new Pager();
	$start = $p->findStart($limit);

	$sqlcount = "SELECT * FROM m_mapel ".
					"WHERE pegawai_kd = '$kd1_session' ".
					"ORDER BY tapel ASC, ".
					"kelas ASC, ".
					"jenis ASC, ".
					"nama ASC";
	$sqlresult = $sqlcount;

	$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
	$target = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd";
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysqli_fetch_array($result);





	
	//isi *START
	ob_start();
	

	

	echo '<div class="table-responsive">
	<h3>DAFTAR MAPEL DESKRIPSI</h3>
	

	
	<div class="table-responsive">          
	<table class="table" border="1">
	<thead>
		<tr valign="top" bgcolor="'.$warnaheader.'">
		<td width="50"><strong><font color="'.$warnatext.'">TAPEL</font></strong></td>
		<td width="50"><strong><font color="'.$warnatext.'">KELAS</font></strong></td>
		<td width="100"><strong><font color="'.$warnatext.'">JENIS</font></strong></td>
		<td><strong><font color="'.$warnatext.'">KODE MAPEL</font></strong></td>
		<td><strong><font color="'.$warnatext.'">NAMA MAPEL</font></strong></td>
		<td><strong><font color="'.$warnatext.'">SMT.1 PENGETAHUAN</font></strong></td>
		<td><strong><font color="'.$warnatext.'">SMT.1 KETERAMPILAN</font></strong></td>
		<td><strong><font color="'.$warnatext.'">SMT.2 PENGETAHUAN</font></strong></td>
		<td><strong><font color="'.$warnatext.'">SMT.2 KETERAMPILAN</font></strong></td>	
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
			$i_tapel = balikin($data['tapel']);
			$i_tapel2 = cegah($data['tapel']);
			$i_smt = balikin($data['smt']);
			$i_kelas = balikin($data['kelas']);
			$i_kelas2 = cegah($data['kelas']);
			$i_jenis = balikin($data['jenis']);
			$i_jenis2 = cegah($data['jenis']);
			$i_mapel = balikin($data['nama']);
			$i_singkatan = balikin($data['kode']);
			$i_singkatan2 = cegah($data['kode']);
			$i_nourut = balikin($data['no']);
			$i_postdate = balikin($data['postdate']);
			



			//query
			$qx = mysqli_query($koneksi, "SELECT * FROM m_mapel_deskripsi ".
											"WHERE tapel = '$i_tapel2' ".
											"AND kelas = '$i_kelas2' ".
											"AND jenis = '$i_jenis2' ".
											"AND kode = '$i_singkatan2'");
			$rowx = mysqli_fetch_assoc($qx);
			$e_tapel = balikin($rowx['tapel']);
			$e_kelas = balikin($rowx['kelas']);
			$e_jenis = balikin($rowx['jenis']);
			$e_no = balikin($rowx['no']);
			$e_kode = balikin($rowx['kode']);
			$e_nama = balikin($rowx['nama']);
			$e_smt1_pisi = balikin($rowx['smt1_p_isi']);
			$e_smt1_kisi = balikin($rowx['smt1_k_isi']);
			$e_smt2_pisi = balikin($rowx['smt2_p_isi']);
			$e_smt2_kisi = balikin($rowx['smt2_k_isi']);
			
			
			
			$i_smt1_p_isi = $e_smt1_pisi;
			$i_smt1_k_isi = $e_smt1_kisi;
			
			$i_smt2_p_isi = $e_smt2_pisi;
			$i_smt2_k_isi = $e_smt2_kisi;
			
						
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>'.$i_tapel.'</td>
			<td>'.$i_kelas.'</td>
			<td>'.$i_jenis.'</td>
			<td>'.$i_singkatan.'</td>
			<td>'.$i_mapel.'</td>
			<td>'.$i_smt1_p_isi.'</td>
			<td>'.$i_smt1_k_isi.'</td>
			<td>'.$i_smt2_p_isi.'</td>
			<td>'.$i_smt2_k_isi.'</td>
	        </tr>';

			}
		while ($data = mysqli_fetch_assoc($result));
		


	echo '</tbody>
	  </table>
	  </div>';



	
	//isi
	$isiku = ob_get_contents();
	ob_end_clean();


	
	
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=$fileku");
	echo $isiku;
	exit();
	}












//jika edit
if ($s == "edit")
	{
	//nilai
	$kdx = nosql($_REQUEST['kd']);

	//query
	$qx = mysqli_query($koneksi, "SELECT * FROM m_mapel_deskripsi ".
									"WHERE kd = '$kdx'");
	$rowx = mysqli_fetch_assoc($qx);
	$e_tapel = balikin($rowx['tapel']);
	$e_kelas = balikin($rowx['kelas']);
	$e_jenis = balikin($rowx['jenis']);
	$e_no = balikin($rowx['no']);
	$e_kode = balikin($rowx['kode']);
	$e_nama = balikin($rowx['nama']);
	$e_smt1_pisi = balikin($rowx['smt1_p_isi']);
	$e_smt1_kisi = balikin($rowx['smt1_k_isi']);
	$e_smt2_pisi = balikin($rowx['smt2_p_isi']);
	$e_smt2_kisi = balikin($rowx['smt2_k_isi']);
	}






//jika simpan
if ($_POST['btnSMP'])
	{
	$s = nosql($_POST['s']);
	$kd = nosql($_POST['kd']);
	$e_smt1_pisi = cegah($_POST['e_smt1_pisi']);
	$e_smt1_kisi = cegah($_POST['e_smt1_kisi']);
	$e_smt2_pisi = cegah($_POST['e_smt2_pisi']);
	$e_smt2_kisi = cegah($_POST['e_smt2_kisi']);



	//nek null
	if (empty($e_smt1_pisi))
		{
		//diskonek
		xfree($qbw);
		xclose($koneksi);

		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		$ke = "$filenya?s=$s$kd=$kd";
		pekem($pesan,$ke);
		exit();
		}
	else
		{
		//query
		mysqli_query($koneksi, "UPDATE m_mapel_deskripsi SET smt1_p_isi = '$e_smt1_pisi', ".
								"smt1_k_isi = '$e_smt1_kisi', ".
								"smt2_p_isi = '$e_smt2_pisi', ".
								"smt2_k_isi = '$e_smt2_kisi', ".
								"postdate = '$today' ".
								"WHERE kd = '$kd'");

		//diskonek
		xfree($qbw);
		xclose($koneksi);

		//re-direct
		xloc($filenya);
		exit();
		}
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
//jika baru/edit
if (($s == "baru") OR ($s == "edit"))
	{
	echo '<form action="'.$filenya.'" method="post" name="formx">
	
	<div class="row">

    	<div class="col-md-6">
	
			<p>
			TaPel :
			<br>
			<b>'.$e_tapel.'</b>
			</p>
			

			<p>
			Kelas :
			<br>
			<b>'.$e_kelas.'</b>
			</p>
			
			<p>
			Jenis Mapel :
			<br>
			<b>'.$e_jenis.'</b>
			</p>
				
			

			<p>
			Nama Mapel :
			<br>
			<b>'.$e_no.'. '.$e_nama.'</b>
			</p>
				
			<p>
			Singkatan :
			<br>
			<b>'.$e_kode.'</b>
			</p>

		</div>
		
		<div class="col-md-3">
				
			<p>
			SMT.1 Deskripsi Pengetahuan :
			<br>
			<textarea cols="30" name="e_smt1_pisi" rows="5" wrap="yes" class="btn-warning" required>'.$e_smt1_pisi.'</textarea>
			</p>
			
			<p>
			SMT.1 Deskripsi Keterampilan :
			<br>
			<textarea cols="30" name="e_smt1_kisi" rows="5" wrap="yes" class="btn-warning" required>'.$e_smt1_kisi.'</textarea>
			</p>
		</div>
		
		
		<div class="col-md-3">
				
			<p>
			SMT.2 Deskripsi Pengetahuan :
			<br>
			
			<textarea cols="30" name="e_smt2_pisi" rows="5" wrap="yes" class="btn-warning" required>'.$e_smt2_pisi.'</textarea>
			</p>
			
			<p>
			SMT.2 Deskripsi Keterampilan :
			<br>
			
			<textarea cols="30" name="e_smt2_kisi" rows="5" wrap="yes" class="btn-warning" required>'.$e_smt2_kisi.'</textarea>
			</p>
		</div>
			
	</div>
	
	

	<div class="row">
	
    	<div class="col-md-6">
    	
		</div>
		
		
    	<div class="col-md-6">
			<input name="btnSMP" type="submit" value="SIMPAN >>" class="btn btn-block btn-danger">
			<a href="'.$filenya.'" class="btn btn-block btn-primary"><< BATAL</a>
			<input name="s" type="hidden" value="'.$s.'">
			<input name="kd" type="hidden" value="'.$kd.'">
		</div>
	</div>';
	}
	
	
//jika import
else if ($s == "import")
	{
	?>
	<div class="row">

	<div class="col-md-12">
		
	<?php
	echo '<form action="'.$filenya.'" method="post" enctype="multipart/form-data" name="formxx2">
	<p>
		<input name="filex_xls" type="file" size="30" class="btn btn-warning">
	</p>

	<p>
		<input name="btnBTL" type="submit" value="BATAL" class="btn btn-info">
		<input name="btnIMX" type="submit" value="IMPORT >>" class="btn btn-danger">
	</p>
	
	
	</form>';	
	?>
		


	</div>
	
	</div>


	<?php
	}









else
	{
	$sqlcount = "SELECT * FROM m_mapel ".
					"WHERE pegawai_kd = '$kd1_session' ".
					"ORDER BY tapel ASC, ".
					"kelas ASC, ".
					"jenis ASC, ".
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
	<input name="btnIM" type="submit" value="IMPORT" class="btn btn-primary">
	<input name="btnEX" type="submit" value="EXPORT" class="btn btn-success">
	</p>
	
	</form>
	<hr>


	<form action="'.$filenya.'" method="post" name="formx">

	<div class="table-responsive">          
	<table class="table" border="1">
	<thead>
	
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td width="20">&nbsp;</td>
	<td width="50"><strong><font color="'.$warnatext.'">TAPEL</font></strong></td>
	<td width="50"><strong><font color="'.$warnatext.'">KELAS</font></strong></td>
	<td width="100"><strong><font color="'.$warnatext.'">JENIS</font></strong></td>
	<td><strong><font color="'.$warnatext.'">NAMA MAPEL</font></strong></td>
	<td><strong><font color="'.$warnatext.'">SMT.1 PENGETAHUAN</font></strong></td>
	<td><strong><font color="'.$warnatext.'">SMT.1 KETERAMPILAN</font></strong></td>
	<td><strong><font color="'.$warnatext.'">SMT.2 PENGETAHUAN</font></strong></td>
	<td><strong><font color="'.$warnatext.'">SMT.2 KETERAMPILAN</font></strong></td>	
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
			$i_kd = nosql($data['kd']);
			$i_tapel = balikin($data['tapel']);
			$i_tapel2 = cegah($data['tapel']);
			$i_smt = balikin($data['smt']);
			$i_kelas = balikin($data['kelas']);
			$i_kelas2 = cegah($data['kelas']);
			$i_jenis = balikin($data['jenis']);
			$i_jenis2 = cegah($data['jenis']);
			$i_mapel = balikin($data['nama']);
			$i_singkatan = balikin($data['kode']);
			$i_singkatan2 = cegah($data['kode']);
			$i_nourut = balikin($data['no']);
			$i_postdate = balikin($data['postdate']);
			



			//query
			$qx = mysqli_query($koneksi, "SELECT * FROM m_mapel_deskripsi ".
											"WHERE tapel = '$i_tapel2' ".
											"AND kelas = '$i_kelas2' ".
											"AND jenis = '$i_jenis2' ".
											"AND kode = '$i_singkatan2'");
			$rowx = mysqli_fetch_assoc($qx);
			$e_tapel = balikin($rowx['tapel']);
			$e_kelas = balikin($rowx['kelas']);
			$e_jenis = balikin($rowx['jenis']);
			$e_no = balikin($rowx['no']);
			$e_kode = balikin($rowx['kode']);
			$e_nama = balikin($rowx['nama']);
			$e_smt1_pisi = balikin($rowx['smt1_p_isi']);
			$e_smt1_kisi = balikin($rowx['smt1_k_isi']);
			$e_smt2_pisi = balikin($rowx['smt2_p_isi']);
			$e_smt2_kisi = balikin($rowx['smt2_k_isi']);
			
			
			
			$i_smt1_p_isi = $e_smt1_pisi;
			$i_smt1_k_isi = $e_smt1_kisi;
			
			$i_smt2_p_isi = $e_smt2_pisi;
			$i_smt2_k_isi = $e_smt2_kisi;
			
						
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>
			<a href="'.$filenya.'?s=edit&kd='.$i_kd.'">
			<img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0">
			</a>
			</td>
			<td>'.$i_tapel.'</td>
			<td>'.$i_kelas.'</td>
			<td>'.$i_jenis.'</td>
			<td>
			'.$i_mapel.'
			<br>
			Kode:'.$i_singkatan.'
			</td>
			<td>'.$i_smt1_p_isi.'</td>
			<td>'.$i_smt1_k_isi.'</td>
			<td>'.$i_smt2_p_isi.'</td>
			<td>'.$i_smt2_k_isi.'</td>
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
	}




//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");


//diskonek
xfree($qbw);
xclose($koneksi);
exit();
?>