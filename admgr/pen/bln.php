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
require("../../inc/cek/admgr.php");
require("../../inc/class/paging.php");
$tpl = LoadTpl("../../template/admgr.html");

nocache;

//nilai
$filenya = "bln.php";
$judul = "Nilai Bulanan";
$judulku = "[PENILAIAN MAPEL]. $judul";
$judulx = $judul;
$tapelkd = cegah($_REQUEST['tapelkd']);
$kelkd = cegah($_REQUEST['kelkd']);
$mjenis = cegah($_REQUEST['mjenis']);
$mkode = cegah($_REQUEST['mkode']);
$mnama = cegah($_REQUEST['mnama']);
$smt = cegah($_REQUEST['smt']);
$kat = cegah($_REQUEST['kat']);
$s = cegah($_REQUEST['s']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}

$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&mjenis=$mjenis&mkode=$mkode&mnama=$mnama&smt=$smt&kat=$kat&page=$page";


$limit = 5;




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
//jika simpan
if ($_POST['btnSMP'])
	{
	//nilai
	$tapelkd = cegah($_POST['tapelkd']);
	$tapelkd2 = balikin($_POST['tapelkd']);
	$kelkd = cegah($_POST['kelkd']);
	$mjenis = cegah($_POST['mjenis']);
	$mkode = cegah($_POST['mkode']);
	$smt = cegah($_POST['smt']);
	$kat = cegah($_POST['kat']);
	$page = nosql($_POST['page']);

	
	$pecahku = explode("/", $tapelkd2);
	$etahun1 = balikin($pecahku[0]);
	$etahun2 = balikin($pecahku[1]);
	
	
	
	//pecah tapel
	if ($smt == 1)
		{	
		$etahunku = $etahun1;
		}
		
	else if ($smt == 2)
		{	
		$etahunku = $etahun2;
		}
		
		
		
		
	
	
	//terpilih
	$qbtx = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
										"WHERE kode = '$mkode'");
	$rowbtx = mysqli_fetch_assoc($qbtx);
	$mno = cegah($rowbtx['no']);
	$mnama = cegah($rowbtx['nama']);
		
	

	//hapus dulu, sebelum entri
	mysqli_query($koneksi, "DELETE FROM siswa_nilai_bln ".
								"WHERE tapel = '$tapelkd' ".
								"AND kelas = '$kelkd' ".
								"AND smt = '$smt' ".
								"AND jenis = '$mjenis' ".
								"AND mapel_kode = '$mkode' ".
								"AND kategori = '$kat'");	
					
	
	
	
	for($i=1;$i<=$limit;$i++)
		{
		//ambil nilai
		$kd = "kdnya";
		$kd1 = "$kd$i";
		$kdx = nosql($_POST["$kd1"]);

		$abs = "nisnya";
		$abs1 = "$abs$i";
		$nisnya = cegah($_POST["$abs1"]);

		
		//terpilih
		$qbtx = mysqli_query($koneksi, "SELECT * FROM m_siswa ".
											"WHERE kode = '$nisnya'");
		$rowbtx = mysqli_fetch_assoc($qbtx);
		$swnama = cegah($rowbtx['nama']);
			



				
		for ($kk=1;$kk<=6;$kk++)
			{
			//jika smt 1
			if ($smt == 1)
				{
				$kj = $kk + 6;		
				}
				
			//jika smt 2
			else if ($smt == 2)
				{
				$kj = $kk;	
				}
	
				
				
			//kd nya
			for ($j=1;$j<=8;$j++)
				{
				$abs = "pnilai";
				$abs1 = "$abs$i$kk$j";
				$pnilai = cegah($_POST["$abs1"]);
				$jkode = "KD$j";
				
				
				//jika null
				if (empty($pnilai))
					{
					$pnilai = "0";
					}	


				//entri baru
				$xyz = md5("$tapelkd$smt$kelkd$nisnya$mkode$kat$i$kk$j");
				
				
				//jika ada
				if (!empty($swnama))
					{
					//query
					mysqli_query($koneksi, "INSERT INTO siswa_nilai_bln(kd, siswa_kode, siswa_nama, ".
												"tapel, kelas, smt, ".
												"jenis, mapel_no, mapel_kode, ".
												"mapel_nama, thn, bln, ".
												"kode, kategori, nilai, postdate) VALUES ".
												"('$xyz', '$nisnya', '$swnama', ".
												"'$tapelkd', '$kelkd', '$smt', ".
												"'$mjenis', '$mno', '$mkode', ".
												"'$mnama', '$etahunku', '$kj', ".
												"'$jkode', '$kat', '$pnilai', '$today')");
					}
					
					
				}
			}
	






			
		}


	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//re-direct
	$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&mjenis=$mjenis&mkode=$mkode&mnama=$mnama&smt=$smt&kat=$kat&page=$page";
	xloc($ke);
	exit();
	}











//jika hapus
if ($_POST['btnHPS'])
	{
	//nilai
	$tapelkd = cegah($_POST['tapelkd']);
	$kelkd = cegah($_POST['kelkd']);
	$mjenis = cegah($_POST['mjenis']);
	$mkode = cegah($_POST['mkode']);
	$smt = cegah($_POST['smt']);
	$kat = cegah($_POST['kat']);


	//hapus
	mysqli_query($koneksi, "DELETE FROM siswa_nilai_bln ".
								"WHERE tapel = '$tapelkd' ".
								"AND kelas = '$kelkd' ".
								"AND smt = '$smt' ".
								"AND jenis = '$mjenis' ".
								"AND mapel_kode = '$mkode' ".
								"AND kategori = '$kat'");	


	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//re-direct
	$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&mjenis=$mjenis&mkode=$mkode&mnama=$mnama&smt=$smt&kat=$kat";
	xloc($ke);
	exit();
	}
	
	
	
	
	
	
	
//jika import
if ($_POST['btnIM'])
	{
	//nilai
	$tapelkd = cegah($_POST['tapelkd']);
	$kelkd = cegah($_POST['kelkd']);
	$mjenis = cegah($_POST['mjenis']);
	$mkode = cegah($_POST['mkode']);
	$smt = cegah($_POST['smt']);
	$kat = cegah($_POST['kat']);
	
	
	
	//re-direct
	$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&mjenis=$mjenis&mkode=$mkode&mnama=$mnama&smt=$smt&kat=$kat&s=import";
	xloc($ke);
	exit();
	}












//import sekarang
if ($_POST['btnIMX'])
	{
	//nilai
	$tapelkd = cegah($_POST['tapelkd']);
	$tapelkd2 = balikin($_POST['tapelkd']);
	$kelkd = cegah($_POST['kelkd']);
	$mjenis = cegah($_POST['mjenis']);
	$mkode = cegah($_POST['mkode']);
	$smt = cegah($_POST['smt']);
	$kat = cegah($_POST['kat']);

	$pecahku = explode("/", $tapelkd2);
	$etahun1 = balikin($pecahku[0]);
	$etahun2 = balikin($pecahku[1]);
	
	
	
	//pecah tapel
	if ($smt == 1)
		{	
		$etahunku = $etahun1;
		}
		
	else if ($smt == 2)
		{	
		$etahunku = $etahun2;
		}




		
	//terpilih
	$qbtx = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
										"WHERE kode = '$mkode'");
	$rowbtx = mysqli_fetch_assoc($qbtx);
	$mno = cegah($rowbtx['no']);
	$mnama = cegah($rowbtx['nama']);
		
	
	$filex_namex2 = strip(strtolower($_FILES['filex_xls']['name']));

	//nek null
	if (empty($filex_namex2))
		{
		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&mjenis=$mjenis&mkode=$mkode&mnama=$mnama&smt=$smt&kat=$kat&s=import";
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
			$filex_namex2 = "mapel-$smt-$x.xls";

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
			    // karena data yang di excel di mulai dari baris ke 6
			    // maka jika $i lebih dari 1 data akan di masukan ke database
			    if ($i > 6) 
			    	{
				      // nama ada di kolom A
				      // sedangkan alamat ada di kolom B
				      $i_xyz = md5("$x$i");
				      $i_no = cegah($sheet['A']);
				      $i_swnis = cegah($sheet['B']);
				      $i_swnama = cegah($sheet['C']);
				      
				      
					  

						/*					  
					  for($m=4;$m<=51;$m++)
					  	{
					  	//hurufnya
					  	$i_hurufnya = $arrrkoloma[$m];
					  	$i_pnil = cegah($sheet[$i_hurufnya]);
					  				
					  	echo "$i_pnil. ";		
					  		
				      	}
						*/
						
						
											
							for ($kk=1;$kk<=6;$kk++)
								{
								//jika smt 1
								if ($smt == 1)
									{
									$kj = $kk + 6;	
									}
									
								//jika smt 2
								else if ($smt == 2)
									{
									$kj = $kk;	
									}
										
									
									
								//kd nya
								for ($j=1;$j<=8;$j++)
									{
									$knomer = $knomer + 1;
									

									//mulai D
									$knomerku = $knomer + 3;
									
									$i_hurufnya = $arrrkoloma[$knomerku];
								  	$i_pnil = cegah($sheet[$i_hurufnya]);				
									
									
									//echo "$i_pnil. ";
									$jkode = "KD$j";
									
									
									//jika null
									if (empty($i_pnil))
										{
										$i_pnil = "0";
										}	
					
					
									//entri baru
									$xyz = md5("$tapelkd$smt$kelkd$i_swnis$mkode$kat$kk$j");
									
									
									//query
									mysqli_query($koneksi, "INSERT INTO siswa_nilai_bln(kd, siswa_kode, siswa_nama, ".
																"tapel, kelas, smt, ".
																"jenis, mapel_no, mapel_kode, ".
																"mapel_nama, thn, bln, ".
																"kode, kategori, nilai, postdate) VALUES ".
																"('$xyz', '$i_swnis', '$i_swnama', ".
																"'$tapelkd', '$kelkd', '$smt', ".
																"'$mjenis', '$mno', '$mkode', ".
																"'$mnama', '$etahunku', '$kj', ".
																"'$jkode', '$kat', '$i_pnil', '$today')");
												
									}
									
								}
							
					  

					  	
				    }


				$knomer = 0;
				echo "<br>";
			
			    $i++;
			  }





			//hapus file, jika telah import
			$path1 = "../../filebox/excel/$filex_namex2";
			chmod($path1,0777);
			unlink ($path1);


			//re-direct
			$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&mjenis=$mjenis&mkode=$mkode&mnama=$mnama&smt=$smt&kat=$kat";
			xloc($ke);
			exit();
			}
		else
			{
			//salah
			$pesan = "Bukan File .xls . Harap Diperhatikan...!!";
			$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&mjenis=$mjenis&mkode=$mkode&mnama=$mnama&smt=$smt&s=import";
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
	$tapelkd = cegah($_POST['tapelkd']);
	$kelkd = cegah($_POST['kelkd']);
	$mjenis = cegah($_POST['mjenis']);
	$mkode = cegah($_POST['mkode']);
	$smt = cegah($_POST['smt']);
	$kat = cegah($_POST['kat']);
	$page = nosql($_POST['page']);

	
	//terpilih
	$qbtx = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
										"WHERE kode = '$mkode'");
	$rowbtx = mysqli_fetch_assoc($qbtx);
	$mno = cegah($rowbtx['no']);
	$mnama = cegah($rowbtx['nama']);

	$fileku = "nil_mapel-$mkode-$kat.xls";





	//query
	$limit = 1000;
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



	
	//terpilih
	$qbtx = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
										"WHERE kode = '$mkode'");
	$rowbtx = mysqli_fetch_assoc($qbtx);
	$mno = cegah($rowbtx['no']);
	$mnama = cegah($rowbtx['nama']);


	//nilai
	$qku = mysqli_query($koneksi, "SELECT * FROM siswa_nilai_bln ".
										"WHERE tapel = '$tapelkd' ".
										"AND kelas = '$kelkd' ".
										"AND smt = '$smt' ".
										"AND mapel_kode = '$mkode' ".
										"AND kategori = '$kat'");
	$rku = mysqli_fetch_assoc($qku);
	$i_postdate = balikin($rku['postdate']);





	
	//isi *START
	ob_start();
	

	

	echo '<div class="table-responsive">
	<h3>DAFTAR NILAI MAPEL</h3>

	Tahun Pelajaran : ';
	
	//terpilih
	$qtpx = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
							"WHERE nama = '$tapelkd'");
	$rowtpx = mysqli_fetch_assoc($qtpx);
	$tpx_kd = nosql($rowtpx['kd']);
	$tpx_thn1 = cegah($rowtpx['nama']);
	$tpx_thn2 = balikin($rowtpx['nama']);

	echo '<b>'.$tpx_thn2.'</b>, 
	
	Semester : <b>'.$smt.'</b>

	Kelas : ';
	
	//terpilih
	$qbtx = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
										"WHERE nama = '$kelkd'");
	$rowbtx = mysqli_fetch_assoc($qbtx);
	$btxkd = nosql($rowbtx['kd']);
	$btxkelas1 = cegah($rowbtx['nama']);
	$btxkelas2 = balikin($rowbtx['nama']);

	echo '<b>'.$btxkelas2.'</b>
	<br>

	Mata Pelajaran : ';
	
	//terpilih
	$qbtx = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
										"WHERE tapel = '$tapelkd' ".
										"AND kelas = '$kelkd' ".
										"AND jenis = '$mjenis' ".
										"AND kode = '$mkode'");
	$rowbtx = mysqli_fetch_assoc($qbtx);
	$btxkd = nosql($rowbtx['kd']);
	$btxkelas1 = cegah($rowbtx['nama']);
	$btxkelas2 = balikin($rowbtx['nama']);

	echo '<b>'.$btxkelas2.' ['.$mkode.']</b>, 
	
	
	Kategori : <b>'.$kat.'</b>
	
	
	<div class="table-responsive">          
	<table class="table" border="1">
	<thead>
		<tr valign="top" bgcolor="'.$warnaheader.'">
			<td rowspan="2" width="5">
				<p align="center"><b>NO.</b></p>
			</td>
			<td rowspan="2" width="50">
				<p align="center"><b>NIS</b></p>
			</td>
			<td rowspan="2" width="200">
				<p align="center"><b>NAMA</b></p>
			</td>';
			
			for ($k=1;$k<=6;$k++)
				{
				//jika smt 1
				if ($smt == 1)
					{
					$kj = $k + 6;
					}
					
				//jika smt 2
				else if ($smt == 2)
					{
					$kj = $k;	
					}
					
					
					
				echo '<td colspan="8">
					<p align="center"><b>'.$arrbln[$kj].' '.$etahunku.'</b></p>
				</td>';
				}


		echo '</tr>
		<tr valign="top" bgcolor="'.$warnaheader.'">';
		
			for ($kk=1;$kk<=6;$kk++)
				{
				//kd nya
				for ($j=1;$j<=8;$j++)
					{
					echo '<td>
						<p align="center"><b>KD'.$j.'</b></p>
					</td>';
					}
				}
		
		echo '</tr>

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
				<td align="left">
					'.$i_nama.'
				</td>';

		
				for ($kk=1;$kk<=6;$kk++)
					{
					//jika smt 1
					if ($smt == 1)
						{
						$kj = $kk + 6;	
						}
						
					//jika smt 2
					else if ($smt == 2)
						{
						$kj = $kk;	
						}
							
						
						
					//kd nya
					for ($j=1;$j<=8;$j++)
						{
						$jkode = "KD$j";
						

						//nilai
						$qku = mysqli_query($koneksi, "SELECT * FROM siswa_nilai_bln ".
															"WHERE tapel = '$tapelkd' ".
															"AND kelas = '$kelkd' ".
															"AND smt = '$smt' ".
															"AND siswa_kode = '$i_nis' ".
															"AND mapel_kode = '$mkode' ".
															"AND bln = '$kj' ".
															"AND kode = '$jkode' ".
															"AND kategori = '$kat'");
						$rku = mysqli_fetch_assoc($qku);
						$i_pnilai = balikin($rku['nilai']);

			
										
						echo '<td>'.$i_pnilai.'</td>';
						}
					}
				
			echo '</tr>';

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

$qtp = mysqli_query($koneksi, "SELECT DISTINCT(tapel) AS tapelnya ".
								"FROM m_mapel ".
								"WHERE pegawai_kd = '$kd1_session' ".
								"ORDER BY tapel DESC");
$rowtp = mysqli_fetch_assoc($qtp);

do
	{
	$tpth1 = cegah($rowtp['tapelnya']);
	$tpth2 = balikin($rowtp['tapelnya']);

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

$qbt = mysqli_query($koneksi, "SELECT DISTINCT(kelas) AS kelasnya ".
								"FROM m_mapel ".
								"WHERE pegawai_kd = '$kd1_session' ".
								"ORDER BY kelas ASC");
$rowbt = mysqli_fetch_assoc($qbt);

do
	{
	$btkelas1 = cegah($rowbt['kelasnya']);
	$btkelas2 = balikin($rowbt['kelasnya']);

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&smt='.$smt.'&kelkd='.$btkelas1.'">'.$btkelas2.'</option>';
	}
while ($rowbt = mysqli_fetch_assoc($qbt));

echo '</select>
</td>
</tr>

<tr>
<td>
Jenis : ';
echo "<select name=\"jenis\" onChange=\"MM_jumpMenu('self',this,0)\" class=\"btn btn-warning\">";

//terpilih
$qbtx = mysqli_query($koneksi, "SELECT * FROM m_mapel_jns ".
									"WHERE jenis = '$mjenis'");
$rowbtx = mysqli_fetch_assoc($qbtx);
$btxkd = nosql($rowbtx['kd']);
$btxkelas1 = cegah($rowbtx['jenis']);
$btxkelas2 = balikin($rowbtx['jenis']);

echo '<option value="'.$btxkelas1.'">'.$btxkelas2.'</option>';

$qbt = mysqli_query($koneksi, "SELECT * FROM m_mapel_jns ".
								"WHERE jenis <> '$mjenis' ".
								"ORDER BY jenis ASC");
$rowbt = mysqli_fetch_assoc($qbt);

do
	{
	$btkd = nosql($rowbt['kd']);
	$btkelas1 = cegah($rowbt['jenis']);
	$btkelas2 = balikin($rowbt['jenis']);

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&smt='.$smt.'&kelkd='.$kelkd.'&mjenis='.$btkelas1.'">'.$btkelas2.'</option>';
	}
while ($rowbt = mysqli_fetch_assoc($qbt));

echo '</select>, 


Mata Pelajaran : ';
echo "<select name=\"mapel\" onChange=\"MM_jumpMenu('self',this,0)\" class=\"btn btn-warning\">";

//terpilih
$qbtx = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
									"WHERE tapel = '$tapelkd' ".
									"AND kelas = '$kelkd' ".
									"AND jenis = '$mjenis' ".
									"AND kode = '$mkode'");
$rowbtx = mysqli_fetch_assoc($qbtx);
$btxkd = nosql($rowbtx['kd']);
$btxkelas1 = cegah($rowbtx['nama']);
$btxkelas2 = balikin($rowbtx['nama']);

echo '<option value="'.$btxkelas1.'">'.$btxkelas2.' ['.$mkode.']</option>';

$qbt = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
								"WHERE pegawai_kd = '$kd1_session' ".
								"AND tapel = '$tapelkd' ".
								"AND kelas = '$kelkd' ".
								"AND jenis = '$mjenis' ".
								"ORDER BY nama ASC");
$rowbt = mysqli_fetch_assoc($qbt);

do
	{
	$btkd = nosql($rowbt['kd']);
	$btkode = balikin($rowbt['kode']);
	$btkelas1 = cegah($rowbt['nama']);
	$btkelas2 = balikin($rowbt['nama']);

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&smt='.$smt.'&kelkd='.$kelkd.'&mjenis='.$mjenis.'&mnama='.$btkelas1.'&mkode='.$btkode.'">'.$btkelas2.' ['.$btkode.']</option>';
	}
while ($rowbt = mysqli_fetch_assoc($qbt));

echo '</select>,
<br>

Kategori : ';
echo "<select name=\"kat\" onChange=\"MM_jumpMenu('self',this,0)\" class=\"btn btn-warning\">";
echo '<option value="'.$kat.'" selected>'.$kat.'</option>
<option value="'.$filenya.'?tapelkd='.$tapelkd.'&smt='.$smt.'&kelkd='.$kelkd.'&mjenis='.$mjenis.'&mnama='.$mnama.'&mkode='.$mkode.'&kat=PENGETAHUAN">PENGETAHUAN</option>
<option value="'.$filenya.'?tapelkd='.$tapelkd.'&smt='.$smt.'&kelkd='.$kelkd.'&mjenis='.$mjenis.'&mnama='.$mnama.'&mkode='.$mkode.'&kat=KETERAMPILAN">KETERAMPILAN</option>
</select>


<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
<input name="kelkd" type="hidden" value="'.$kelkd.'">
<input name="mjenis" type="hidden" value="'.$mjenis.'">
<input name="mnama" type="hidden" value="'.$mnama.'">
<input name="mkode" type="hidden" value="'.$mkode.'">
<input name="smt" type="hidden" value="'.$smt.'">
<input name="kat" type="hidden" value="'.$kat.'">
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


else if (empty($mjenis))
	{
	echo '<p>
	<font color="#FF0000"><strong>JENIS MAPEL Belum Dipilih...!</strong></font>
	</p>';
	}
	

else if (empty($mkode))
	{
	echo '<p>
	<font color="#FF0000"><strong>MAPEL Belum Dipilih...!</strong></font>
	</p>';
	}

else if (empty($kat))
	{
	echo '<p>
	<font color="#FF0000"><strong>PENGETAHUAN/KETERAMPILAN Belum Dipilih...!</strong></font>
	</p>';
	}

else
	{
	//jika import
	if ($s == "import")
		{
		?>
		<div class="row">
	
		<div class="col-md-12">
			
		<?php
		echo '<form action="'.$filenya.'" method="post" enctype="multipart/form-data" name="formxx2">
		<p>
			<input name="filex_xls" type="file" size="30" class="btn btn-warning" required>
		</p>
	
		<p>
		
			<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
			<input name="kelkd" type="hidden" value="'.$kelkd.'">
			<input name="mjenis" type="hidden" value="'.$mjenis.'">
			<input name="mnama" type="hidden" value="'.$mnama.'">
			<input name="mkode" type="hidden" value="'.$mkode.'">
			<input name="smt" type="hidden" value="'.$smt.'">
			<input name="kat" type="hidden" value="'.$kat.'">
					
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
		$pecahku = explode("/", $tpx_thn2);
		$etahun1 = balikin($pecahku[0]);
		$etahun2 = balikin($pecahku[1]);
		
		
		
		//pecah tapel
		if ($smt == 1)
			{	
			$etahunku = $etahun1;
			}
			
		else if ($smt == 2)
			{	
			$etahunku = $etahun2;
			}
				
		echo '<form name="formx" method="post" action="'.$filenya.'">
		
		<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
		<input name="kelkd" type="hidden" value="'.$kelkd.'">
		<input name="mjenis" type="hidden" value="'.$mjenis.'">
		<input name="mnama" type="hidden" value="'.$mnama.'">
		<input name="mkode" type="hidden" value="'.$mkode.'">
		<input name="smt" type="hidden" value="'.$smt.'">
		<input name="kat" type="hidden" value="'.$kat.'">
				
		<input name="btnIM" type="submit" value="IMPORT" class="btn btn-primary">
		<input name="btnEX" type="submit" value="EXPORT" class="btn btn-success">
		<hr>';
		
		
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
		$target = "$filenya?tapelkd=$tapelkd&smt=$smt&kelkd=$kelkd&mjenis=$mjenis&mnama=$mnama&mkode=$mkode&kat=$kat";
		$pagelist = $p->pageList($_GET['page'], $pages, $target);
		$data = mysqli_fetch_array($result);
	
	
	
		
		//terpilih
		$qbtx = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
											"WHERE kode = '$mkode'");
		$rowbtx = mysqli_fetch_assoc($qbtx);
		$mno = cegah($rowbtx['no']);
		$mnama = cegah($rowbtx['nama']);
	
	
		//nilai
		$qku = mysqli_query($koneksi, "SELECT * FROM siswa_nilai_bln ".
											"WHERE tapel = '$tapelkd' ".
											"AND kelas = '$kelkd' ".
											"AND smt = '$smt' ".
											"AND mapel_kode = '$mkode' ".
											"AND kategori = '$kat'");
		$rku = mysqli_fetch_assoc($qku);
		$i_postdate = balikin($rku['postdate']);
	
	
	
	
		//nek ada
		if ($count != 0)
			{
			echo '<p>
			Update Terakhir : <font color="red"><b>'.$i_postdate.'</b></font>
			</p>
			
			<div class="table-responsive">          
			<table class="table" border="1">
			<thead>
				<tr valign="top" bgcolor="'.$warnaheader.'">
					<td rowspan="2" width="5">
						<p align="center"><b>NO.</b></p>
					</td>
					<td rowspan="2" width="50">
						<p align="center"><b>NIS</b></p>
					</td>
					<td rowspan="2" width="200">
						<p align="center"><b>NAMA</b></p>
					</td>';
					
					for ($k=1;$k<=6;$k++)
						{
						//jika smt 1
						if ($smt == 1)
							{
							$kj = $k + 6;
							}
							
						//jika smt 2
						else if ($smt == 2)
							{
							$kj = $k;	
							}
							
							
							
						echo '<td colspan="8">
							<p align="center"><b>'.$arrbln[$kj].' '.$etahunku.'</b></p>
						</td>';
						}
		
		
				echo '</tr>
				<tr valign="top" bgcolor="'.$warnaheader.'">';
				
					for ($kk=1;$kk<=6;$kk++)
						{
						//kd nya
						for ($j=1;$j<=8;$j++)
							{
							echo '<td>
								<p align="center"><b>KD'.$j.'</b></p>
							</td>';
							}
						}
				
				echo '</tr>
				
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
							<input name="kdnya'.$nomer.'" type="hidden" value="'.$i_kd.'">
							<input name="nisnya'.$nomer.'" type="hidden" value="'.$i_nis.'">
						</td>
						<td>
							'.$i_nama.'
						</td>';

				
						for ($kk=1;$kk<=6;$kk++)
							{
							//jika smt 1
							if ($smt == 1)
								{
								$kj = $kk + 6;	
								}
								
							//jika smt 2
							else if ($smt == 2)
								{
								$kj = $kk;	
								}
									
								
								
							//kd nya
							for ($j=1;$j<=8;$j++)
								{
								$jkode = "KD$j";
								

								//nilai
								$qku = mysqli_query($koneksi, "SELECT * FROM siswa_nilai_bln ".
																	"WHERE tapel = '$tapelkd' ".
																	"AND kelas = '$kelkd' ".
																	"AND smt = '$smt' ".
																	"AND siswa_kode = '$i_nis' ".
																	"AND mapel_kode = '$mkode' ".
																	"AND bln = '$kj' ".
																	"AND kode = '$jkode' ".
																	"AND kategori = '$kat'");
								$rku = mysqli_fetch_assoc($qku);
								$i_pnilai = balikin($rku['nilai']);

					
												
								echo '<td>
								<input name="pnilai'.$nomer.''.$kk.''.$j.'" type="text" value="'.$i_pnilai.'" size="2" maxlength="5" onKeyPress="return numbersonly(this, event)" class="btn btn-warning">
								</td>';
								}
							}
						
					echo '</tr>';
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
			<input name="btnSMP" type="submit" value="SIMPAN" class="btn btn-danger">
			<input name="btnHPS" type="submit" value="HAPUS" class="btn btn-primary">
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