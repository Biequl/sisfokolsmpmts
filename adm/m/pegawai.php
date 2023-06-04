<?php
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
/////// SISFOKOL_SMA_v6.78_(Code:Tekniknih)                     ///////
/////// (Sistem Informasi Sekolah untuk SMA)                    ///////
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
$filenya = "pegawai.php";
$judul = "[MASTER] Data Pegawai";
$judulku = "$judul";
$judulx = $judul;
$kd = nosql($_REQUEST['kd']);
$s = nosql($_REQUEST['s']);
$kunci = cegah($_REQUEST['kunci']);
$kunci2 = balikin($_REQUEST['kunci']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}


require '../../inc/class/PhpOffice/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
	
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
	
	




	
	


$limit = 5;


//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika import
if ($_POST['btnIM'])
	{
	//re-direct
	$ke = "$filenya?s=import";
	xloc($ke);
	exit();
	}













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
			$filex_namex2 = "pegawai.xls";

			//mengkopi file
			copy($_FILES['filex_xls']['tmp_name'],"../../filebox/excel/$filex_namex2");

			//chmod
            $path3 = "../../filebox/excel/$filex_namex2";
			chmod($path1,0755);
			chmod($path2,0777);
			chmod($path3,0777);

			//file-nya...
			$uploadfile = $path3;

		
			$spreadsheet = $reader->load($uploadfile);
			
			$d=$spreadsheet->getSheet(0)->toArray();
			
			$sheetData = $spreadsheet->getActiveSheet()->toArray();
			
			$i=1;
			unset($sheetData[0]);
			
			foreach ($sheetData as $t) {
				//nilai
				$i_no = cegah($t[0]);
				$i_nip = cegah($t[1]);
				$i_username = cegah($t[2]);
				$i_nama = cegah($t[3]);
				$i_jabatan = cegah($t[4]);
				
				
				//echo "$i_no. $i_nip. $i_username. $i_nama. $i_jabatan <br>";
				
				$i_xyz = md5($i_nip);
					  
				//user pass
				$i_user = $i_username;
				$i_pass = md5($i_nip);


				//insert
				mysqli_query($koneksi, "INSERT INTO m_pegawai(kd, kode, nama, ".
										"jabatan, usernamex, ".
										"passwordx, postdate) VALUES ".
										"('$i_xyz', '$i_nip', '$i_nama', ".
										"'$i_jabatan', '$i_user', ".
										"'$i_pass', '$today')");
			
				
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
	$i_filename = "pegawai.xls";
	$i_judul = "pegawai";
	



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
	$worksheet1->write_string(0,1,"NIP");
	$worksheet1->write_string(0,2,"USERNAME");
	$worksheet1->write_string(0,3,"NAMA");
	$worksheet1->write_string(0,4,"JABATAN");

	
	//data
	$qdt = mysqli_query($koneksi, "SELECT * FROM m_pegawai ".
										"ORDER BY nama ASC");
	$rdt = mysqli_fetch_assoc($qdt);

	do
		{
		//nilai
		$dt_nox = $dt_nox + 1;
		$i_nip = balikin($rdt['kode']);
		$i_user = balikin($rdt['usernamex']);
		$i_nama = balikin($rdt['nama']);
		$i_jabatan = balikin($rdt['jabatan']);



		//ciptakan
		$worksheet1->write_string($dt_nox,0,$dt_nox);
		$worksheet1->write_string($dt_nox,1,$i_nip);
		$worksheet1->write_string($dt_nox,2,$i_user);
		$worksheet1->write_string($dt_nox,3,$i_nama);
		$worksheet1->write_string($dt_nox,4,$i_jabatan);
		}
	while ($rdt = mysqli_fetch_assoc($qdt));


	//close
	$workbook->close();

	
	
	//re-direct
	xloc($filenya);
	exit();
	}








//nek batal
if ($_POST['btnBTL'])
	{
	//re-direct
	xloc($filenya);
	exit();
	}





//jika cari
if ($_POST['btnCARI'])
	{
	//nilai
	$kunci = cegah($_POST['kunci']);


	//re-direct
	$ke = "$filenya?kunci=$kunci";
	xloc($ke);
	exit();
	}




//nek entri baru
if ($_POST['btnBARU'])
	{
	//re-direct
	$ke = "$filenya?s=baru&kd=$x";
	xloc($ke);
	exit();
	}







//jika simpan
if ($_POST['btnSMP'])
	{
	$s = nosql($_POST['s']);
	$kd = nosql($_POST['kd']);
	$page = nosql($_POST['page']);
	$e_nip = cegah($_POST['e_nip']);
	$e_user = cegah($_POST['e_user']);
	$e_nama = cegah($_POST['e_nama']);
	$e_jabatan = cegah($_POST['e_jabatan']);


	$kd2 = md5($e_nip);
	
	//user pass
	$e_user = $e_user;
	$e_pass = md5($e_nip);
	
	


	//nek null
	if ((empty($e_nama)) OR (empty($e_nip)))
		{
		//re-direct
		$pesan = "Belum Ditulis. Harap Diulangi...!!";
		$ke = "$filenya?s=$s&kd=$kd";
		pekem($pesan,$ke);
		exit();
		}
	else
		{
		//jika update
		if ($s == "edit")
			{
			mysqli_query($koneksi, "UPDATE m_pegawai SET kode = '$e_nip', ".
										"usernamex = '$e_user', ".
										"nama = '$e_nama', ".
										"jabatan = '$e_jabatan' ".
										"WHERE kd = '$kd'");


			//update
			mysqli_query($koneksi, "UPDATE m_user SET usernamex = '$e_user', ".
										"passwordx = '$e_pass', ".
										"kode = '$e_nip', ".
										"nama = '$e_nama', ".
										"qrcode = '$e_nip' ".
										"WHERE kd = '$kd'");



			//re-direct
			xloc($filenya);
			exit();
			}



		//jika baru
		if ($s == "baru")
			{
			//cek
			$qcc = mysqli_query($koneksi, "SELECT * FROM m_pegawai ".
												"WHERE kode = '$e_nip'");
			$rcc = mysqli_fetch_assoc($qcc);
			$tcc = mysqli_num_rows($qcc);

			//nek ada
			if ($tcc != 0)
				{
				//re-direct
				$pesan = "Kode Sudah Ada. Silahkan Ganti Yang Lain...!!";
				$ke = "$filenya?s=baru&kd=$kd";
				pekem($pesan,$ke);
				exit();
				}
			else
				{
				//insert
				mysqli_query($koneksi, "INSERT INTO m_pegawai(kd, kode, nama, ".
										"jabatan, usernamex, ".
										"passwordx, postdate) VALUES ".
										"('$kd2', '$e_nip', '$e_nama', ".
										"'$e_jabatan', '$e_user', ".
										"'$e_pass', '$today')");


				//insert
				mysqli_query($koneksi, "INSERT INTO m_user(kd, usernamex, passwordx, ".
											"kode, nama, jabatan, ".
											"tapel, kelas, qrcode, postdate) VALUES ".
											"('$kd2', '$e_user', '$e_pass', ".
											"'$e_nip', '$e_nama', 'PEGAWAI', ".
											"'-', '-', '$e_nip', '$today')");


				//re-direct
				xloc($filenya);
				exit();
				}
			}
		}
	}




//jika hapus
if ($_POST['btnHPS'])
	{
	//ambil nilai
	$jml = nosql($_POST['jml']);
	$page = nosql($_POST['page']);
	$ke = "$filenya?page=$page";

	//ambil semua
	for ($i=1; $i<=$jml;$i++)
		{
		//ambil nilai
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kd = nosql($_POST["$yuhu"]);

		//del
		mysqli_query($koneksi, "DELETE FROM m_pegawai ".
									"WHERE kd = '$kd'");
		}

	//auto-kembali
	xloc($filenya);
	exit();
	}
	
	
	
	
		
	
	
	
//nek pegawai : reset
if ($s == "reset")
	{ 
	//nilai
	$nilku = rand(111,999);
	
	//pass baru
	$passbarux = md5($nilku);
	
	
	//update
	mysqli_query($koneksi, "UPDATE m_pegawai SET passwordx = '$passbarux' ".
								"WHERE kd = '$kd'"); 
	
	
	//update
	mysqli_query($koneksi, "UPDATE m_user SET passwordx = '$passbarux' ".
								"WHERE kd = '$kd'"); 
	
	
	
	//re-direct
	$pesan = "Password Baru : $nilku";
	pekem($pesan,$filenya);
	exit();
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();


//require
require("../../template/js/jumpmenu.js");
require("../../template/js/checkall.js");
require("../../template/js/swap.js");
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
//jika edit / baru
if (($s == "baru") OR ($s == "edit"))
	{
	$kdx = nosql($_REQUEST['kd']);

	$qx = mysqli_query($koneksi, "SELECT * FROM m_pegawai ".
									"WHERE kd = '$kdx'");
	$rowx = mysqli_fetch_assoc($qx);
	$e_nip = balikin($rowx['kode']);
	$e_user = balikin($rowx['usernamex']);
	$e_nama = balikin($rowx['nama']);
	$e_jabatan = balikin($rowx['jabatan']);




	$i_filex1 = "$kdx-1.jpg";
	$nil_foto1 = "$sumber/filebox/pegawai/$kdx/$i_filex1";				


	?>
	
	
	
	<div class="row">

	<div class="col-md-6">
		
	<?php
	echo '<form action="'.$filenya.'" method="post" name="formx2">
	

	<p>
	KODE/NIP : 
	<br>
	<input name="e_nip" type="text" value="'.$e_nip.'" size="30" class="btn-warning" required>
	</p>
	


	<p>
	Username : 
	<br>
	<input name="e_user" type="text" value="'.$e_user.'" size="30" class="btn-warning" required>
	</p>

	<p>
	NAMA : 
	<br>
	<input name="e_nama" type="text" value="'.$e_nama.'" size="30" class="btn-warning" required>
	</p>


	<p>
	JABATAN : 
	<br>
	<input name="e_jabatan" type="text" value="'.$e_jabatan.'" size="30" class="btn-warning" required>
	</p>



	<p>
	<input name="jml" type="hidden" value="'.$count.'">
	<input name="s" type="hidden" value="'.$s.'">
	<input name="kd" type="hidden" value="'.$kdx.'">
	<input name="page" type="hidden" value="'.$page.'">
	
	<input name="btnSMP" type="submit" value="SIMPAN" class="btn btn-danger">
	<input name="btnBTL" type="submit" value="BATAL" class="btn btn-info">
	</p>
	
	
	</form>';
	
	?>
		
	
	
	</div>
	
	<div class="col-md-6">
	

	
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  


	<style type="text/css">
	.thumb-image{
	 float:left;
	 width:150px;
	 height:150px;
	 position:relative;
	 padding:5px;
	}
	</style>
	
	
	
	
		<table border="0" cellspacing="0" cellpadding="3">
		<tr valign="top">
		<td width="100">
			<div id="image-holder"></div>
		</td>
		

		</tr>
		</table>
	
	<script>
	$(document).ready(function() {
		
		
	        $("#image_upload").on('change', function() {
	          //Get count of selected files
	          var countFiles = $(this)[0].files.length;
	          var imgPath = $(this)[0].value;
	          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
	          var image_holder = $("#image-holder");
	          image_holder.empty();
	          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
	            if (typeof(FileReader) != "undefined") {
	              //loop for each file selected for uploaded.
	              for (var i = 0; i < countFiles; i++) 
	              {
	                var reader = new FileReader();
	                reader.onload = function(e) {
	                  $("<img />", {
	                    "src": e.target.result,
	                    "class": "thumb-image"
	                  }).appendTo(image_holder);
	                }
	                image_holder.show();
	                reader.readAsDataURL($(this)[0].files[i]);
	              }
	              
	
		    
	            } else {
	              alert("This browser does not support FileReader.");
	            }
	          } else {
	            alert("Pls select only images");
	          }
	        });
	        
	        


	        
	        
	        
	      });
	</script>

	<?php
	echo '<div id="loading" style="display:none">
	<img src="'.$sumber.'/template/img/progress-bar.gif" width="100" height="16">
	</div>
	
	
   <form method="post" id="upload_image" enctype="multipart/form-data">
	<input type="file" name="image_upload" id="image_upload" class="btn btn-warning" />

   </form>
   
   <hr>';
	
	?>
	
	
	<script>  
	$(document).ready(function(){
		
		
		
	       $('#image-holder').load("<?php echo $sumber;?>/adm/m/i_pegawai.php?aksi=lihat1&kd=<?php echo $kd;?>");

	
	
	        
	    $('#upload_image').on('change', function(event){
	     event.preventDefault();
	     
			$('#loading').show();
	
	
		
		     $.ajax({
		      url:"i_pegawai_upload.php?kd=<?php echo $kd;?>",
		      method:"POST",
		      data:new FormData(this),
		      contentType:false,
		      cache:false,
		      processData:false,
		      success:function(data){
				$('#loading').hide();
		       $('#preview').load("<?php echo $sumber;?>/adm/m/i_pegawai.php?aksi=lihat&kd=<?php echo $kd;?>");
		       	
		      }
		     })
		    });
		    
		    
	});  
	</script>




	</div>
	
	</div>


	<?php
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
		$sqlcount = "SELECT * FROM m_pegawai ".
						"ORDER BY nama ASC";
		}
		
	else
		{
		$sqlcount = "SELECT * FROM m_pegawai ".
						"WHERE kode LIKE '%$kunci%' ".
						"OR usernamex LIKE '%$kunci%' ".
						"OR nama LIKE '%$kunci%' ".
						"OR jabatan LIKE '%$kunci%' ".
						"ORDER BY nama ASC";
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
	<input name="btnBARU" type="submit" value="ENTRI BARU" class="btn btn-danger">
	<input name="btnIM" type="submit" value="IMPORT" class="btn btn-primary">
	<input name="btnEX" type="submit" value="EXPORT" class="btn btn-success">
	</p>
	<br>
	
	</form>



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
	<td width="50"><strong><font color="'.$warnatext.'">FOTO</font></strong></td>
	<td><strong><font color="'.$warnatext.'">NAMA</font></strong></td>
	<td><strong><font color="'.$warnatext.'">JABATAN</font></strong></td>
	<td width="50"><strong><font color="'.$warnatext.'">POSTDATE</font></strong></td>
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
			$i_nip = balikin($data['kode']);
			$i_nama = balikin($data['nama']);
			$i_namax = cegah($data['nama']);
			$i_username = balikin($data['usernamex']);
			$i_usernamex = cegah($data['usernamex']);
			$i_jabatan = balikin($data['jabatan']);
			$i_postdate = balikin($data['postdate']);
			$i_qrcode = balikin($data['kode']);
			$i_akses = $i_nip;
			$kodex = md5($i_nip);
			

			$i_filex1 = "$i_kd-1.jpg";
			$nil_foto1 = "$sumber/filebox/pegawai/$i_kd/$i_filex1";	



			//insert
			mysqli_query($koneksi, "INSERT INTO m_user(kd, usernamex, passwordx, ".
										"kode, nama, jabatan, ".
										"tapel, kelas, qrcode, postdate) VALUES ".
										"('$kodex', '$i_usernamex', '$kodex', ".
										"'$i_nip', '$i_namax', 'PEGAWAI', ".
										"'-', '-', '$i_qrcode', '$today')");

			
			
			
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>
			<input type="checkbox" name="item'.$nomer.'" value="'.$i_kd.'">
	        </td>
			<td>
			<a href="'.$filenya.'?s=edit&page='.$page.'&kd='.$i_kd.'"><img src="'.$sumber.'/template/img/edit.gif" width="16" height="16" border="0"></a>
			</td>
			<td>
			
			<img src="'.$nil_foto1.'" width="150">
			
			</td>
			<td>
			'.$i_nama.'
			<br>
			NIP:'.$i_nip.'
			<br>
			USERNAME:'.$i_username.'
			
			
			
			<hr>
			<a href="pegawai_qrcode.php?kd='.$i_kd.'" target="_blank" class="btn btn-danger">PRINT QRCODE >></a>			
			<hr>
			<a href="'.$filenya.'?s=reset&kd='.$i_kd.'" class="btn btn-primary">RESET PASSWORD >></a>
			
			</td>
			<td>'.$i_jabatan.'</td>
			<td>'.$i_postdate.'</td>
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


//null-kan
xclose($koneksi);
exit();
?>