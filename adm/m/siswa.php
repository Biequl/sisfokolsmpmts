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
$filenya = "siswa.php";
$judul = "[USER AKSES]. Data Siswa";
$judulku = "[USER AKSES]. Data Siswa";
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
	

	
	






//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
			$filex_namex2 = "siswa.xls";

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
			    // karena data yang di excel di mulai dari baris ke 5
			    // maka jika $i lebih dari 1 data akan di masukan ke database
			    if ($i > 1) 
			    	{
				      // nama ada di kolom A
				      // sedangkan alamat ada di kolom B
				      $i_xyz = md5("$x$i");
				      $i_no = cegah($sheet['A']);
				      $i_tapel = cegah($sheet['B']);
				      $i_kelas = cegah($sheet['C']);
				      $i_nourut = cegah($sheet['D']);
				      $i_kode = cegah($sheet['E']);
				      $i_nama = cegah($sheet['F']);
				      $i_nowa = cegah($sheet['G']);


				      

				  				  
					  
					  //user pass
					  $i_kodex = md5("$i_tapel$i_kode");
					  
					  
					  $i_qrcode = $i_kode;
					  
					  
						//cek
						$qcc = mysqli_query($koneksi, "SELECT * FROM m_siswa ".
														"WHERE tapel = '$i_tapel' ".
														"AND kode = '$i_kode'");
						$rcc = mysqli_fetch_assoc($qcc);
						$tcc = mysqli_num_rows($qcc);
		
						//jika ada, update				
						if (!empty($tcc))
							{
							mysqli_query($koneksi, "UPDATE m_siswa SET nama = '$i_nama' ".
														"WHERE tapel = '$i_tapel' ".
														"AND kode = '$i_kode'");
							}
		
		
						else
							{
							//insert
							mysqli_query($koneksi, "INSERT INTO m_siswa(kd, tapel, kelas, ".
														"nourut, kode, nama, qrcode, nowa, postdate) VALUES ".
														"('$i_kodex', '$i_tapel', '$i_kelas', ".
														"'$i_nourut', '$i_kode', '$i_nama', '$i_qrcode', '$i_nowa', '$today')");
														
																												
							
							//insert
							mysqli_query($koneksi, "INSERT INTO m_user(kd, usernamex, passwordx, ".
														"kode, nama, jabatan, nowa, ".
														"tapel, kelas, postdate) VALUES ".
														"('$i_kodex', '$i_kode', '$i_kodex', ".
														"'$i_kode', '$i_nama', 'SISWA', '$i_nowa', ".
														"'$i_tapel', '$i_kelas', '$today')");
														
							}
					  
					  

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
	$i_filename = "siswa.xls";
	$i_judul = "siswa";
	



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
	$worksheet1->write_string(0,3,"NOURUT");
	$worksheet1->write_string(0,4,"NIS");
	$worksheet1->write_string(0,5,"NAMA");
	$worksheet1->write_string(0,6,"NOWA");



	//data
	$qdt = mysqli_query($koneksi, "SELECT * FROM m_siswa ".
										"ORDER BY tapel DESC, ".
										"kelas ASC, ".
										"round(nourut) ASC");
	$rdt = mysqli_fetch_assoc($qdt);

	do
		{
		//nilai
		$dt_nox = $dt_nox + 1;
		$dt_tapel = balikin($rdt['tapel']);
		$dt_kelas = balikin($rdt['kelas']);
		$dt_nourut = balikin($rdt['nourut']);
		$dt_nip = balikin($rdt['kode']);
		$dt_nama = balikin($rdt['nama']);
		$dt_nowa = balikin($rdt['nowa']);



		//ciptakan
		$worksheet1->write_string($dt_nox,0,$dt_nox);
		$worksheet1->write_string($dt_nox,1,$dt_tapel);
		$worksheet1->write_string($dt_nox,2,$dt_kelas);
		$worksheet1->write_string($dt_nox,3,$dt_nourut);
		$worksheet1->write_string($dt_nox,4,$dt_nip);
		$worksheet1->write_string($dt_nox,5,$dt_nama);
		$worksheet1->write_string($dt_nox,6,$dt_nowa);
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
	$e_tapel = cegah($_POST['e_tapel']);
	$e_kelas = cegah($_POST['e_kelas']);
	$e_nourut = cegah($_POST['e_nourut']);
	$e_nip = cegah($_POST['e_nip']);
	$e_nama = cegah($_POST['e_nama']);
	$e_nowa = cegah($_POST['e_nowa']);



	//nek null
	if ((empty($e_nip)) OR (empty($e_nama)))
		{
		//re-direct
		$pesan = "Belum Ditulis. Harap Diulangi...!!";
		$ke = "$filenya?s=$s&kd=$kd";
		pekem($pesan,$ke);
		exit();
		}
	else
		{
		//set qrcode 
		$kdepan = rand(1000, 10000);
		$e_qrcode = "$kdepan$e_nip";
		
		
		$e_nipx = md5($e_nip);
		$e_kd = md5("$e_tapel$e_nip");
		
		
		//jika update
		if ($s == "edit")
			{
			mysqli_query($koneksi, "UPDATE m_siswa SET tapel = '$e_tapel', ".
										"kelas = '$e_kelas', ".
										"nourut = '$e_nourut', ".
										"kode = '$e_nip', ".
										"nowa = '$e_nowa', ".
										"nama = '$e_nama' ".
										"WHERE kd = '$kd'");

			//re-direct
			xloc($filenya);
			exit();
			}



		//jika baru
		if ($s == "baru")
			{
			//cek
			$qcc = mysqli_query($koneksi, "SELECT * FROM m_siswa ".
												"WHERE tapel = '$e_tapel' ".
												"AND kode = '$e_nip'");
			$rcc = mysqli_fetch_assoc($qcc);
			$tcc = mysqli_num_rows($qcc);

			//nek ada
			if ($tcc != 0)
				{
				//re-direct
				$pesan = "Sudah Ada. Silahkan Ganti Yang Lain...!!";
				$ke = "$filenya?s=baru&kd=$kd";
				pekem($pesan,$ke);
				exit();
				}
			else
				{
				mysqli_query($koneksi, "INSERT INTO m_siswa(kd, tapel, kelas, ".
										"nourut, kode, nama, qrcode, nowa, postdate) VALUES ".
										"('$e_kd', '$e_tapel', '$e_kelas', ".
										"'$e_nourut', '$e_nip', '$e_nama', '$e_qrcode', '$e_nowa', '$today')");


				
				//insert
				mysqli_query($koneksi, "INSERT INTO m_user(kd, usernamex, passwordx, ".
											"kode, nama, jabatan, nowa, ".
											"tapel, kelas, postdate) VALUES ".
											"('$e_kd', '$e_nip', '$e_nipx', ".
											"'$e_nip', '$e_nama', 'SISWA', '$e_nowa', ".
											"'$e_tapel', '$e_kelas', '$today')");



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
		mysqli_query($koneksi, "DELETE FROM m_siswa ".
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
	mysqli_query($koneksi, "UPDATE m_siswa SET passwordx = '$passbarux' ".
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
//jika import
if ($s == "import")
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








//jika edit / baru
else if (($s == "baru") OR ($s == "edit"))
	{
	$kdx = nosql($_REQUEST['kd']);

	$qx = mysqli_query($koneksi, "SELECT * FROM m_siswa ".
									"WHERE kd = '$kdx'");
	$rowx = mysqli_fetch_assoc($qx);
	$e_tapel = balikin($rowx['tapel']);
	$e_kelas = balikin($rowx['kelas']);
	$e_nourut = balikin($rowx['nourut']);
	$e_nip = balikin($rowx['kode']);
	$e_nama = balikin($rowx['nama']);
	$e_nowa = balikin($rowx['nowa']);
	?>
	
	
	
	<div class="row">

		<div class="col-md-6">
			
		<?php
		echo '<form action="'.$filenya.'" method="post" name="formx2">
		
		
		<p>
		TAPEL : 
		<br>
		<select name="e_tapel" id="e_tapel" class="btn btn-warning" required>
		<option value="'.$e_tapel.'" selected>--'.$e_tapel.'--</option>';
		
		$qst = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
											"ORDER BY nama DESC");
		$rowst = mysqli_fetch_assoc($qst);
		
		do
			{
			$st_kd = cegah($rowst['nama']);
			$st_nama1 = balikin($rowst['nama']);
		
		
			echo '<option value="'.$st_kd.'">'.$st_nama1.'</option>';
			}
		while ($rowst = mysqli_fetch_assoc($qst));
		
		echo '</select>
		</p>
		
		
		<p>
		KELAS : 
		<br>
		<select name="e_kelas" id="e_kelas" class="btn btn-warning" required>
		<option value="'.$e_kelas.'" selected>--'.$e_kelas.'--</option>';
		
		$qst = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
											"ORDER BY nama ASC");
		$rowst = mysqli_fetch_assoc($qst);
		
		do
			{
			$st_kd = cegah($rowst['nama']);
			$st_nama1 = balikin($rowst['nama']);
		
		
			echo '<option value="'.$st_kd.'">'.$st_nama1.'</option>';
			}
		while ($rowst = mysqli_fetch_assoc($qst));
		
		echo '</select>
		</p>
		
		<p>
		NOURUT : 
		<br>
		<input name="e_nourut" type="text" value="'.$e_nourut.'" size="5" class="btn btn-warning" required>
		</p>
		
		<p>
		NIS : 
		<br>
		<input name="e_nip" type="text" value="'.$e_nip.'" size="10" class="btn btn-warning" required>
		</p>
		
		
		<p>
		Nama : 
		<br>
		<input name="e_nama" type="text" value="'.$e_nama.'" size="30" class="btn btn-warning" required>
		</p>
		
		
		
		
		<p>
		No.WA : 
		<br>
		+62<input name="e_nowa" type="text" value="'.$e_nowa.'" size="20" class="btn btn-warning" required>
		</p>
		
		<p>
		<input name="jml" type="hidden" value="'.$count.'">
		<input name="s" type="hidden" value="'.$s.'">
		<input name="kd" type="hidden" value="'.$kdx.'">
		<input name="page" type="hidden" value="'.$page.'">
		
		<input name="btnSMP" type="submit" value="SIMPAN" class="btn btn-danger">
		<input name="btnBTL" type="submit" value="BATAL" class="btn btn-info">
		</p>
		
		
		</form>

	
	</div>
	
	<div class="col-md-6">';
	?>
	

		
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
			
			
			
		       $('#image-holder').load("<?php echo $sumber;?>/adm/m/i_siswa.php?aksi=lihat1&kd=<?php echo $kd;?>");
	
		
		
		        
		    $('#upload_image').on('change', function(event){
		     event.preventDefault();
		     
				$('#loading').show();
		
		
			
			     $.ajax({
			      url:"i_siswa_upload.php?kd=<?php echo $kd;?>",
			      method:"POST",
			      data:new FormData(this),
			      contentType:false,
			      cache:false,
			      processData:false,
			      success:function(data){
					$('#loading').hide();
			       $('#preview').load("<?php echo $sumber;?>/adm/m/i_siswa.php?aksi=lihat&kd=<?php echo $kd;?>");
			       	
			      }
			     })
			    });
			    
			    
		});  
		</script>
	
	


		</div>
	
	</div>
	

	<?php
	}
	














else
	{
	//jika null
	if (empty($kunci))
		{
		$sqlcount = "SELECT * FROM m_siswa ".
						"ORDER BY tapel DESC, ".
						"kelas ASC, ".
						"nama ASC";
		}
		
	else
		{
		$sqlcount = "SELECT * FROM m_siswa ".
						"WHERE kode LIKE '%$kunci%' ".
						"OR nama LIKE '%$kunci%' ".
						"OR nowa LIKE '%$kunci%' ".
						"ORDER BY tapel DESC, ".
						"kelas ASC, ".
						"round(nourut) ASC";
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
	<td width="100"><strong><font color="'.$warnatext.'">TAPEL</font></strong></td>
	<td width="100"><strong><font color="'.$warnatext.'">KELAS</font></strong></td>
	<td width="50"><strong><font color="'.$warnatext.'">NoURUT</font></strong></td>
	<td width="50"><strong><font color="'.$warnatext.'">NIS/USERNAME</font></strong></td>
	<td><strong><font color="'.$warnatext.'">NAMA</font></strong></td>
	<td width="200"><strong><font color="'.$warnatext.'">NOWA</font></strong></td>
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
			$i_user = balikin($data['usernamex']);
			$i_tapel = balikin($data['tapel']);
			$i_tapelx = cegah($data['tapel']);
			$i_kelas = balikin($data['kelas']);
			$i_kelasx = cegah($data['kelas']);
			$i_kode = balikin($data['kode']);
			$i_nourut = balikin($data['nourut']);
			$i_nowa = balikin($data['nowa']);
			$i_nama = balikin($data['nama']);
			$i_namax = cegah($data['nama']);
			$i_qrcode = balikin($data['qrcode']);
			$i_login = balikin($data['postdate_last_login']);
			$i_akses = $i_kode;
			$i_kodex = md5($i_kode);
	

			/*
			//jika null, kasi kode
			if (empty($i_kode))
				{
				$kdepan = rand(100, 999);
				$kodenya = "$kdepan$menit$detik";
				
				//update...
				mysqli_query($koneksi, "UPDATE m_siswa SET kode = '$kodenya', ".
										"qrcode = '$kodenya' ".
										"WHERE kd = '$i_kd'");
				}
			*/
				
				
				
			//jika null, kasi kode
			if (empty($i_user))
				{
				$kodex = md5($i_kode);
				
				//update...
				mysqli_query($koneksi, "UPDATE m_siswa SET usernamex = '$i_kode', ".
										"passwordx = '$kodex' ".
										"WHERE kd = '$i_kd'");
				}
				
		
		
		
		
		
			//insert
			mysqli_query($koneksi, "INSERT INTO m_user(kd, usernamex, passwordx, ".
										"kode, nama, jabatan, nowa, ".
										"tapel, kelas, qrcode, postdate) VALUES ".
										"('$i_kodex', '$i_kode', '$i_kodex', ".
										"'$i_kode', '$i_namax', 'SISWA', '$i_nowa', ".
										"'$i_tapelx', '$i_kelasx', '$i_qrcode', '$today')");
	
	
	
				
			
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>
			<input type="checkbox" name="item'.$nomer.'" value="'.$i_kd.'">
	        </td>
			<td>
			<a href="'.$filenya.'?s=edit&page='.$page.'&kd='.$i_kd.'"><img src="'.$sumber.'/template/img/edit.gif" width="16" height="16" border="0"></a>
			</td>
			<td>'.$i_tapel.'</td>
			<td>'.$i_kelas.'</td>
			<td>'.$i_nourut.'</td>
			<td>'.$i_kode.'</td>
			<td>
			'.$i_nama.'
			
			<hr>
			<a href="siswa_qrcode.php?kd='.$i_kd.'&kode='.$i_kode.'" target="_blank" class="btn btn-danger">PRINT QRCODE >></a>			
			<hr>
			<a href="'.$filenya.'?s=reset&kd='.$i_kd.'" class="btn btn-primary">RESET PASSWORD >></a>
					
			</td>
			<td>+62'.$i_nowa.'</td>
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


//null-kan
xclose($koneksi);
exit();
?>