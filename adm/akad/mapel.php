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
require("../../inc/cek/adm.php");
require("../../inc/class/paging.php");
$tpl = LoadTpl("../../template/adm.html");

nocache;

//nilai
$filenya = "mapel.php";
$judul = "[AKADEMIK]. Data Mapel";
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
			$filex_namex2 = "mapel.xls";

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
				      $i_no = cegah($sheet['A']);
				      $i_tapel = cegah($sheet['B']);
				      $i_kelas = cegah($sheet['C']);
				      $i_jenis = cegah($sheet['D']);
				      $i_nourut = cegah($sheet['E']);
				      $i_mapel = cegah($sheet['F']);
				      $i_singkatan = cegah($sheet['G']);
				      $i_kkm = cegah($sheet['H']);

				      $i_xyz = md5("$i_tapel$i_kelas$i_mapel");
					  
						//insert
						mysqli_query($koneksi, "INSERT INTO m_mapel(kd, tapel, kelas, ".
													"jenis, no, nama, kode, ".
													"kkm, postdate) VALUES ".
													"('$i_xyz', '$i_tapel', '$i_kelas', ".
													"'$i_jenis', '$i_nourut', '$i_mapel', '$i_singkatan', ".
													"'$i_kkm', '$today')");

					  
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
	//require
	require('../../inc/class/excel/OLEwriter.php');
	require('../../inc/class/excel/BIFFwriter.php');
	require('../../inc/class/excel/worksheet.php');
	require('../../inc/class/excel/workbook.php');


	//nama file e...
	$i_filename = "mapel.xls";
	$i_judul = "Mapel";
	



	//header file
	function HeaderingExcel($i_filename)
		{
		header("Content-type:application/vnd.ms-excel");
		header("Content-Disposition:attachment;filename=$i_filename");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Pragma: public");
		}

	
	
	
	//bikin...
	HeaderingExcel($i_filename);
	$workbook = new Workbook("-");
	$worksheet1 =& $workbook->add_worksheet($i_judul);
	$worksheet1->write_string(0,0,"NO.");
	$worksheet1->write_string(0,1,"TAPEL");
	$worksheet1->write_string(0,2,"KELAS");
	$worksheet1->write_string(0,3,"JENIS");
	$worksheet1->write_string(0,4,"NOURUT");
	$worksheet1->write_string(0,5,"NAMA");
	$worksheet1->write_string(0,6,"SINGKATAN");
	$worksheet1->write_string(0,7,"KKM");



	//data
	$qdt = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
										"ORDER BY tapel ASC, ".
										"kelas ASC, ".
										"jenis ASC, ".
										"nama ASC");
	$rdt = mysqli_fetch_assoc($qdt);

	do
		{
		//nilai
		$dt_nox = $dt_nox + 1;
		$dt_tapel = balikin($rdt['tapel']);
		$dt_kelas = balikin($rdt['kelas']);
		$dt_jenis = balikin($rdt['jenis']);
		$dt_mapel = balikin($rdt['nama']);
		$dt_singkatan = balikin($rdt['kode']);
		$dt_kkm = balikin($rdt['kkm']);
		$dt_nourut = balikin($rdt['no']);



		//ciptakan
		$worksheet1->write_string($dt_nox,0,$dt_nox);
		$worksheet1->write_string($dt_nox,1,$dt_tapel);
		$worksheet1->write_string($dt_nox,2,$dt_kelas);
		$worksheet1->write_string($dt_nox,3,$dt_jenis);
		$worksheet1->write_string($dt_nox,4,$dt_nourut);
		$worksheet1->write_string($dt_nox,5,$dt_mapel);
		$worksheet1->write_string($dt_nox,6,$dt_singkatan);
		$worksheet1->write_string($dt_nox,7,$dt_kkm);
		}
	while ($rdt = mysqli_fetch_assoc($qdt));


	//close
	$workbook->close();

	
	
	//re-direct
	xloc($filenya);
	exit();
	}









//jika hapus
if ($_POST['btnHPS'])
	{
	//ambil nilai
	$jml = nosql($_POST['jml']);
	$page = nosql($_REQUEST['page']);
	if ((empty($page)) OR ($page == "0"))
		{
		$page = "1";
		}


	//query
	$p = new Pager();
	$start = $p->findStart($limit);

	$sqlcount = "SELECT * FROM m_mapel ".
					"ORDER BY tapel ASC, ".
					"kelas ASC, ".
					"jenis ASC, ".
					"nama ASC";
	$sqlresult = $sqlcount;

	$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysqli_fetch_array($result);


	//ambil semua
	do
		{
		//ambil nilai
		$i = $i + 1;
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kd = nosql($_POST["$yuhu"]);

		//del
		mysqli_query($koneksi, "DELETE FROM m_mapel ".
						"WHERE kd = '$kd'");
		}
	while ($data = mysqli_fetch_assoc($result));


	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//auto-kembali
	$ke = "$filenya?page=$page";
	xloc($ke);
	exit();
	}






//jika edit
if ($s == "edit")
	{
	//nilai
	$kdx = nosql($_REQUEST['kd']);

	//query
	$qx = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
									"WHERE kd = '$kdx'");
	$rowx = mysqli_fetch_assoc($qx);
	$e_tapel = balikin($rowx['tapel']);
	$e_kelas = balikin($rowx['kelas']);
	$e_jenis = balikin($rowx['jenis']);
	$e_no = balikin($rowx['no']);
	$e_kode = balikin($rowx['kode']);
	$e_nama = balikin($rowx['nama']);
	$e_kkm = balikin($rowx['kkm']);
	}






//jika simpan
if ($_POST['btnSMP'])
	{
	$s = nosql($_POST['s']);
	$kd = nosql($_POST['kd']);
	$e_no = cegah($_POST['e_no']);
	$e_tapel = cegah($_POST['e_tapel']);
	$e_kelas = cegah($_POST['e_kelas']);
	$e_jenis = cegah($_POST['e_jenis']);
	$e_nama = cegah($_POST['e_nama']);
	$e_kode = cegah($_POST['e_kode']);
	$e_kkm = cegah($_POST['e_kkm']);



	//nek null
	if ((empty($e_tapel)) OR (empty($e_nama)))
		{
		//diskonek
		xfree($qbw);
		xclose($koneksi);

		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		$ke = "$filenya?s=s$kd=$kd";
		pekem($pesan,$ke);
		exit();
		}
	else
		{
		//jika baru
		if ($s == "baru")
			{
			//cek
			$qcc = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
												"WHERE tapel = '$e_tapel' ".
												"AND kelas = '$e_kelas' ".
												"AND nama = '$e_nama'");
			$rcc = mysqli_fetch_assoc($qcc);
			$tcc = mysqli_num_rows($qcc);
	
			//nek ada
			if ($tcc != 0)
				{
				//diskonek
				xfree($qbw);
				xclose($koneksi);
	
				//re-direct
				$pesan = "Sudah Ada. Silahkan Ganti Yang Lain...!!";
				$ke = "$filenya?s=s$kd=$kd";
				pekem($pesan,$ke);
				exit();
				}
			else
				{
				//insert
				mysqli_query($koneksi, "INSERT INTO m_mapel(kd, tapel, kelas, ".
											"jenis, no, nama, kode, ".
											"kkm, postdate) VALUES ".
											"('$x', '$e_tapel', '$e_kelas', ".
											"'$e_jenis', '$e_no', '$e_nama', '$e_kode', ".
											"'$e_kkm', '$today')");

													
													
				//diskonek
				xfree($qbw);
				xclose($koneksi);

				//re-direct
				xloc($filenya);
				exit();
				}
			}
			
			
		//jika update
		else if ($s == "edit")
			{
			//query
			mysqli_query($koneksi, "UPDATE m_mapel SET tapel = '$e_tapel', ".
									"kelas = '$e_kelas', ".
									"jenis = '$e_jenis', ".
									"no = '$e_no', ".
									"nama = '$e_nama', ".
									"kode = '$e_kode', ".
									"kkm = '$e_kkm', ".
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

    	<div class="col-md-2">
	
			<p>
			TaPel :
			<br>
			<select name="e_tapel" class="btn btn-block btn-warning" required>
			<option value="'.$e_tapel.'" selected>'.$e_tapel.'</option>"';
			
			//list
			$qrua = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
												"ORDER BY nama DESC");
			$rrua = mysqli_fetch_assoc($qrua);
		
			do
				{
				$rua = balikin($rrua['nama']);
				$rua2 = cegah($rrua['nama']);
		
				echo '<option value="'.$rua2.'">'.$rua.'</option>';
				}
			while ($rrua = mysqli_fetch_assoc($qrua));
			
			echo '</select>
			</p>
			
			
			<p>
			Kelas :
			<br>
			<select name="e_kelas" class="btn btn-block btn-warning" required>
			<option value="'.$e_kelas.'" selected>'.$e_kelas.'</option>"';
			
			//list
			$qrua = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
												"ORDER BY nama ASC");
			$rrua = mysqli_fetch_assoc($qrua);
		
			do
				{
				$rua = balikin($rrua['nama']);
				$rua2 = cegah($rrua['nama']);
		
				echo '<option value="'.$rua2.'">'.$rua.'</option>';
				}
			while ($rrua = mysqli_fetch_assoc($qrua));
			
			echo '</select>
			</p>
		</div>
		
		<div class="col-md-3">
			<p>
			Jenis Mapel :
			<br>
			<select name="e_jenis" class="btn btn-block btn-warning" required>
			<option value="'.$e_jenis.'" selected>'.$e_jenis.'</option>"';
			
			//list
			$qrua = mysqli_query($koneksi, "SELECT * FROM m_mapel_jns ".
												"ORDER BY round(no) ASC");
			$rrua = mysqli_fetch_assoc($qrua);
		
			do
				{
				$rua3 = balikin($rrua['no']);
				$rua = balikin($rrua['jenis']);
				$rua2 = cegah($rrua['jenis']);
		
				echo '<option value="'.$rua2.'">'.$rua3.'. '.$rua.'</option>';
				}
			while ($rrua = mysqli_fetch_assoc($qrua));
			
			echo '</select>
			</p>
				
				
			<p>
			No.Urut :
			<br>
			<input name="e_no" type="text" value="'.$e_no.'" size="5" class="btn btn-warning" required>
			</p>
			
			<p>
			Nama Mapel :
			<br>
			<input name="e_nama" type="text" value="'.$e_nama.'" size="30" class="btn btn-warning" required>
			</p>
			
		</div>
		
		<div class="col-md-3">
				
			<p>
			Singkatan :
			<br>
			<input name="e_kode" type="text" value="'.$e_kode.'" size="10" class="btn btn-warning" required>
			</p>
				
			<p>
			KKM :
			<br>
			<input name="e_kkm" type="text" value="'.$e_kkm.'" size="5" class="btn btn-warning" required>
			</p>
		</div>
			
	</div>
	
	

	<div class="row">
    	<div class="col-md-7">
			<input name="btnSMP" type="submit" value="SIMPAN" class="btn btn-block btn-danger">
			<input name="btnBTL" type="submit" value="BATAL" class="btn btn-block btn-primary">
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
	//jika null
	if (empty($kunci))
		{
		$sqlcount = "SELECT * FROM m_mapel ".
						"ORDER BY tapel ASC, ".
						"kelas ASC, ".
						"jenis ASC, ".
						"round(no) ASC";
		}
		
	else
		{
		$sqlcount = "SELECT * FROM m_mapel ".
						"WHERE tapel LIKE '%$kunci%' ".
						"OR kelas LIKE '%$kunci%' ".
						"OR jenis LIKE '%$kunci%' ".
						"OR nama LIKE '%$kunci%' ".
						"OR kode LIKE '%$kunci%' ".
						"OR kkm LIKE '%$kunci%' ".
						"ORDER BY tapel ASC, ".
						"kelas ASC, ".
						"jenis ASC, ".
						"round(no) ASC";
		}

	
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
	<a href="'.$filenya.'?s=baru" class="btn btn-danger">ENTRI BARU</a>
	<input name="btnIM" type="submit" value="IMPORT" class="btn btn-primary">
	<input name="btnEX" type="submit" value="EXPORT" class="btn btn-success">
	</p>
	
	</form>
	<hr>


	<form action="'.$filenya.'" method="post" name="formx">
	<p>
	<input name="kunci" type="text" value="'.$kunci2.'" size="20" class="btn btn-warning" placeholder="Kata Kunci...">
	<input name="btnCARI" type="submit" value="CARI" class="btn btn-danger">
	<input name="btnBTL" type="submit" value="RESET" class="btn btn-info">
	</p>
		
	
	<div class="table-responsive">          
	<table class="table" border="1">
	<thead>
	
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td width="20">&nbsp;</td>
	<td width="20">&nbsp;</td>
	<td width="100"><strong><font color="'.$warnatext.'">TAPEL</font></strong></td>
	<td width="100"><strong><font color="'.$warnatext.'">KELAS</font></strong></td>
	<td width="100"><strong><font color="'.$warnatext.'">JENIS</font></strong></td>
	<td width="5"><strong><font color="'.$warnatext.'">NOURUT</font></strong></td>
	<td><strong><font color="'.$warnatext.'">NAMA MAPEL</font></strong></td>
	<td width="150"><strong><font color="'.$warnatext.'">SINGKATAN</font></strong></td>
	<td width="150"><strong><font color="'.$warnatext.'">KKM</font></strong></td>
	
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
			$i_kelas = balikin($data['kelas']);
			$i_jenis = balikin($data['jenis']);
			$i_mapel = balikin($data['nama']);
			$i_kkm = balikin($data['kkm']);
			$i_singkatan = balikin($data['kode']);
			$i_nourut = balikin($data['no']);
			$i_postdate = balikin($data['postdate']);
			
			
						
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>
			<input type="checkbox" name="item'.$nomer.'" value="'.$i_kd.'">
	        </td>
			<td>
			<a href="'.$filenya.'?s=edit&kd='.$i_kd.'">
			<img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0">
			</a>
			</td>
			<td>'.$i_tapel.'</td>
			<td>'.$i_kelas.'</td>
			<td>'.$i_jenis.'</td>
			<td>'.$i_nourut.'</td>
			<td>'.$i_mapel.'</td>
			<td>'.$i_singkatan.'</td>
			<td>'.$i_kkm.'</td>
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
	
	<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$count.')" class="btn btn-primary">
	<input name="btnBTL" type="reset" value="BATAL" class="btn btn-warning">
	<input name="btnHPS" type="submit" value="HAPUS" class="btn btn-danger">
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