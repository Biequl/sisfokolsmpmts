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
$filenya = "ekstra.php";
$judul = "Ekstra Siswa";
$judulku = "$judul";
$judulx = $judul;
$kdx = nosql($_REQUEST['kdx']);
$nis = $nis2_session;
$pelkd = nosql($_REQUEST['pelkd']);
$swkd = $kd2_session;
$s = nosql($_REQUEST['s']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}

$ke = "$filenya";




//focus...
if (empty($nis))
	{
	$diload = "document.formx.nis.focus();";
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




//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//query
$qccx = mysqli_query($koneksi, "SELECT * FROM m_siswa ".
									"WHERE kode = '$nis' ".
									"AND kd = '$swkd' ".
									"ORDER BY tapel DESC");
$rccx = mysqli_fetch_assoc($qccx);
$tccx = mysqli_num_rows($qccx);
$e_swkd = nosql($rccx['kd']);
$e_nama = balikin($rccx['nama']);
$e_kelas = balikin($rccx['kelas']);
$e_tapel = balikin($rccx['tapel']);


	
//ketahui totalnya
$qccx = mysqli_query($koneksi, "SELECT * FROM siswa_ekstra ".
									"WHERE siswa_kd = '$swkd'");
$rccx = mysqli_fetch_assoc($qccx);
$e_total = mysqli_num_rows($qccx);

//jika null
if (empty($e_total))
	{
	$e_total = "0";
	}
?>


	<div class="row">
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-success"><i class="fa fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">NIS, NAMA SISWA</span>
            <span class="info-box-number"><?php echo "$nis. <br>$e_nama";?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Tahun Pelajaran</span>
            <span class="info-box-number"><?php echo $e_tapel;?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-success"><i class="fa fa-building-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Kelas</span>
            <span class="info-box-number"><?php echo $e_kelas;?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-success"><i class="fa fa-briefcase"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Jumlah Ekstra</span>
            <span class="info-box-number"><?php echo $e_total;?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    
    



	<div class="card card-success card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">HISTORY EKSTRA</a>
          </li>

        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

				<?php
				//query
				$p = new Pager();
				$limit = 1000;
				$start = $p->findStart($limit);
				
				$sqlcount = "SELECT * FROM siswa_ekstra ".
								"WHERE siswa_kd = '$swkd' ".
								"ORDER BY tapel DESC, ".
								"smt ASC";
				$sqlresult = $sqlcount;
				
				$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
				$pages = $p->findPages($count, $limit);
				$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
				$target = "$filenya?s=detail&swkd=$swkd&nis=$nis";
				$pagelist = $p->pageList($_GET['page'], $pages, $target);
				$data = mysqli_fetch_array($result);
				
				
				

				//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				echo '<div class="row">
				
					<div class="col-md-12">
						<div class="box">
						
							<div class="box-body">
								<div class="table-responsive">          
								<table class="table" border="1">
								<thead>
								
								<tr valign="top" bgcolor="'.$warnaheader.'">
								<td width="50"><strong><font color="'.$warnatext.'">SEMESTER</font></strong></td>
								<td><strong><font color="'.$warnatext.'">NAMA EKSTRA</font></strong></td>
								<td width="150" align="center"><strong><font color="'.$warnatext.'">PREDIKAT</font></strong></td>
								<td><strong><font color="'.$warnatext.'">KETERANGAN</font></strong></td>
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
										$i_smt = balikin($data['smt']);
										$i_nama = balikin($data['ekstra_nama']);
										$i_nilai = balikin($data['predikat']);
										$i_ket = balikin($data['ket']);
								
										echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
										echo '<td align="center">
										'.$i_smt.'
										</td>
										<td>'.$i_nama.'</td>
										<td align="center">'.$i_nilai.'</td>
										<td>'.$i_ket.'</td>
								        </tr>';
										}
									while ($data = mysqli_fetch_assoc($result));
									}
								
								
								echo '</tbody>
								  </table>
								  </div>
		
							</div>
						</div>
					</div>';
					?>



 
                  </div>

        </div>
      </div>
      <!-- /.card -->
    </div>
	<?php
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