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


//ambil nilai
require("../inc/config.php");
require("../inc/fungsi.php");
require("../inc/koneksi.php");
require("../inc/cek/adminv.php");
require("../inc/class/paging.php");
$tpl = LoadTpl("../template/adminv.html");


nocache;

//nilai
$filenya = "index.php";
$judul = "Selamat Datang....";
$judulku = "$judul  [$sarpras_session]";








//isi *START
ob_start();

//tanggal sekarang
$m = date("m");
$de = date("d");
$y = date("Y");

//ambil 14hari terakhir
for($i=0; $i<=14; $i++)
	{
	$nilku = date('Ymd',mktime(0,0,0,$m,($de-$i),$y)); 

	echo "$nilku, ";
	}


//isi
$isi_data1 = ob_get_contents();
ob_end_clean();










//isi *START
ob_start();

//tanggal sekarang
$m = date("m");
$de = date("d");
$y = date("Y");

//ambil 14hari terakhir
for($i=0; $i<=14; $i++)
	{
	$nilku = date('Y-m-d',mktime(0,0,0,$m,($de-$i),$y)); 


	//pecah
	$ipecah = explode("-", $nilku);
	$itahun = trim($ipecah[0]);  
	$ibln = trim($ipecah[1]);
	$itgl = trim($ipecah[2]);    


	//ketahui ordernya...
	$qyuk = mysqli_query($koneksi, "SELECT * FROM user_log_login ".
							"WHERE round(DATE_FORMAT(postdate, '%d')) = '$itgl' ".
							"AND round(DATE_FORMAT(postdate, '%m')) = '$ibln' ".
							"AND round(DATE_FORMAT(postdate, '%Y')) = '$itahun'");
	$tyuk = mysqli_num_rows($qyuk);
									
									
	if (empty($tyuk))
		{
		$tyuk = "0";
		}
		
	echo "$tyuk, ";
	}


//isi
$isi_data2 = ob_get_contents();
ob_end_clean();









//isi *START
ob_start();

//tanggal sekarang
$m = date("m");
$de = date("d");
$y = date("Y");

//ambil 14hari terakhir
for($i=0; $i<=14; $i++)
	{
	$nilku = date('Y-m-d',mktime(0,0,0,$m,($de-$i),$y)); 


	//pecah
	$ipecah = explode("-", $nilku);
	$itahun = trim($ipecah[0]);  
	$ibln = trim($ipecah[1]);
	$itgl = trim($ipecah[2]);    


	//ketahui
	$qyuk = mysqli_query($koneksi, "SELECT * FROM user_log_entri ".
							"WHERE round(DATE_FORMAT(postdate, '%d')) = '$itgl' ".
							"AND round(DATE_FORMAT(postdate, '%m')) = '$ibln' ".
							"AND round(DATE_FORMAT(postdate, '%Y')) = '$itahun'");
	$tyuk = mysqli_num_rows($qyuk);
	
	if (empty($tyuk))
		{
		$tyuk = "0";
		}
		
	echo "$tyuk, ";
	}


//isi
$isi_data3 = ob_get_contents();
ob_end_clean();


















//isi *START
ob_start();


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//postdate entri
$qyuk = mysqli_query($koneksi, "SELECT * FROM user_log_entri ".
									"WHERE user_kd = '$kd41_session' ".
									"ORDER BY postdate DESC");
$ryuk = mysqli_fetch_assoc($qyuk);
$yuk_entri_terakhir = balikin($ryuk['postdate']);






//postdate login
$qyuk = mysqli_query($koneksi, "SELECT * FROM user_log_login ".
									"WHERE user_kd = '$kd41_session' ".
									"ORDER BY postdate DESC");
$ryuk = mysqli_fetch_assoc($qyuk);
$yuk_login_terakhir = balikin($ryuk['postdate']);








?>







		<!-- Info boxes -->
      <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">LOGIN TERAKHIR</span>
              <span class="info-box-number"><?php echo $yuk_login_terakhir;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        





        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fa fa-calendar-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ENTRI TERAKHIR</span>
              <span class="info-box-number"><?php echo $yuk_entri_terakhir;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        
                
      </div>
      <!-- /.row -->







				<script>
					$(function () {
					  'use strict'
					
					  var ticksStyle = {
					    fontColor: '#495057',
					    fontStyle: 'bold'
					  }
					
					  var mode      = 'index'
					  var intersect = true
					
					
					  var $visitorsChart = $('#visitors-chart')
					  var visitorsChart  = new Chart($visitorsChart, {
					    data   : {
					      labels  : [<?php echo $isi_data1;?>],
					      datasets: [{
					        type                : 'line',
					        data                : [<?php echo $isi_data2;?>],
					        backgroundColor     : 'transparent',
					        borderColor         : 'blue',
					        pointBorderColor    : 'blue',
					        pointBackgroundColor: 'blue',
					        fill                : false
					        // pointHoverBackgroundColor: '#007bff',
					        // pointHoverBorderColor    : '#007bff'
					      },
					        {
					          type                : 'line',
					          data                : [<?php echo $isi_data3;?>],
					          backgroundColor     : 'tansparent',
					          borderColor         : 'orange',
					          pointBorderColor    : 'orange',
					          pointBackgroundColor: 'orange',
					          fill                : false
					          // pointHoverBackgroundColor: '#ced4da',
					          // pointHoverBorderColor    : '#ced4da'
					        }]
					    },
					    options: {
					      maintainAspectRatio: false,
					      tooltips           : {
					        mode     : mode,
					        intersect: intersect
					      },
					      hover              : {
					        mode     : mode,
					        intersect: intersect
					      },
					      legend             : {
					        display: false
					      },
					      scales             : {
					        yAxes: [{
					          // display: false,
					          gridLines: {
					            display      : true,
					            lineWidth    : '4px',
					            color        : 'rgba(0, 0, 0, .2)',
					            zeroLineColor: 'transparent'
					          },
					          ticks    : $.extend({
					            beginAtZero : true,
					            suggestedMax: 200
					          }, ticksStyle)
					        }],
					        xAxes: [{
					          display  : true,
					          gridLines: {
					            display: false
					          },
					          ticks    : ticksStyle
					        }]
					      }
					    }
					  })
					})
	
				</script>
	
	
	
	
	
	

		<!-- Info boxes -->
      <div class="row">
	
        <!-- /.col -->
        <div class="col-md-12">
	
	

	            <div class="card">
	              <div class="card-header border-transparent">
	                <h3 class="card-title">Grafik : Login, Entri</h3>
	
	                <div class="card-tools">
	                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
	                    <i class="fas fa-minus"></i>
	                  </button>
	                </div>
	              </div>
	              <div class="card-body">
	
	
	
	                <div class="position-relative mb-4">
	                  <canvas id="visitors-chart" height="200"></canvas>
	                </div>
	
	                <div class="d-flex flex-row justify-content-end">
	                  <span class="mr-2">
	                    <i class="fas fa-square text-blue"></i> Login
	                  </span>
	                  &nbsp;
	
	                  <span>
	                    <i class="fas fa-square text-orange"></i> Entri
	                  </span>
	                  
	                  
	                </div>
	
	
	                
	                
	              </div>
	            </div>
	
			</div>
			
		</div>
			            
	          

	





	
            
		<!-- Info boxes -->
      <div class="row">
	
        <!-- /.col -->
        <div class="col-md-6">
            
			<?php
			$limit = 30;
			$sqlcount = "SELECT * FROM user_log_login ".
							"ORDER BY postdate DESC";

			//query
			$p = new Pager();
			$start = $p->findStart($limit);
			
			$sqlresult = $sqlcount;
			
			$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
			$pages = $p->findPages($count, $limit);
			$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
			$pagelist = $p->pageList($_GET['page'], $pages, $target);
			$data = mysqli_fetch_array($result);
			?>
			
			
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">HISTORY LOGIN</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>POSTDATE</th>
                      <th>USER</th>
                      <th>IP ADDRESS</th>
                    </tr>
                    </thead>
                    <tbody>
                    	
                    <?php
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
							$i_postdate  = balikin($data['postdate']);
							$i_kode = balikin($data['user_kode']);
							$i_nama = balikin($data['user_nama']);
							$i_ket = balikin($data['ipnya']);
							

							$i_uposisi = balikin($data['user_posisi']);					
						


							echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
							echo '<td>'.$i_postdate.'</td>
							<td>
							'.$i_nama.'
							
							<br>
							'.$i_uposisi.' : 
							<br>
							'.$i_kode.'
							</td>
							<td>'.$i_ket.'</td>
					        </tr>';
							}
						while ($data = mysqli_fetch_assoc($result));
						?>
						
						
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>



              <div class="card-footer">

				<a href="h/login.php" class="btn btn-block btn-danger">SELENGKAPNYA >></a>
              </div>



              <!-- /.card-footer -->
            </div>
            <!-- /.card -->



		</div>
		
		
		
		
		<!-- /.col -->
        <div class="col-md-6">

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">TOTAL ASET</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                </div>
              </div>
              <!-- /.card-header -->

              <!-- /.card-body -->
              <div class="card-footer clearfix">


			



				<?php
				//jumlah 
				$qyuk21 = mysqli_query($koneksi, "SELECT SUM(harga) AS harganya ".
													"FROM inv_kib_a");
				$ryuk21 = mysqli_fetch_assoc($qyuk21);
				$j_harga = balikin($ryuk21['harganya']);
				
				
				
				//jumlah 
				$qyuk21 = mysqli_query($koneksi, "SELECT SUM(luas) AS harganya ".
													"FROM inv_kib_a");
				$ryuk21 = mysqli_fetch_assoc($qyuk21);
				$j_luas = balikin($ryuk21['harganya']);
				
				


				//last update
				$qyuk21 = mysqli_query($koneksi, "SELECT postdate FROM inv_kib_a ".
													"ORDER BY postdate DESC");
				$ryuk21 = mysqli_fetch_assoc($qyuk21);
				$j_postdate = balikin($ryuk21['postdate']);
				
				
				
				
				

				?>
		            <div class="info-box mb-3 bg-warning">
		              <span class="info-box-icon"><i class="fa fa-archive"></i></span>
		
		              <div class="info-box-content">
		                <span class="info-box-text">A.TANAH</span>
		                <span class="info-box-number"><?php echo xduit3($j_harga);?></span>
		                <span class="info-box-number">Luas : <?php echo $j_luas;?> M2</span>
		                <span class="info-box-text"><i>Per Update : <?php echo $j_postdate;?></i></span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>




				<?php
					//jumlah 
					$qyuk21 = mysqli_query($koneksi, "SELECT SUM(harga) AS harganya ".
														"FROM inv_kib_b ".
														"WHERE barang_kode LIKE '$kodeku%'");
					$ryuk21 = mysqli_fetch_assoc($qyuk21);
					$j_harga = balikin($ryuk21['harganya']);


					//last update
					$qyuk21 = mysqli_query($koneksi, "SELECT postdate FROM inv_kib_b ".
														"WHERE barang_kode LIKE '$kodeku%' ".
														"ORDER BY postdate DESC");
					$ryuk21 = mysqli_fetch_assoc($qyuk21);
					$j_postdate = balikin($ryuk21['postdate']);
					
					
				
	
				?>

		            <div class="info-box mb-3 bg-warning">
		              <span class="info-box-icon"><i class="fa fa-archive"></i></span>
		
		              <div class="info-box-content">
		                <span class="info-box-text">B.PERALATAN DAN MESIN</span>
		                <span class="info-box-number"><?php echo xduit3($j_harga);?></span>
		                <span class="info-box-text"><i>Per Update : <?php echo $j_postdate;?></i></span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>

			


				<?php
				//jumlah 
				$qyuk21 = mysqli_query($koneksi, "SELECT SUM(harga) AS harganya ".
													"FROM inv_kib_c ".
													"WHERE barang_kode LIKE '03%'");
				$ryuk21 = mysqli_fetch_assoc($qyuk21);
				$j_harga = balikin($ryuk21['harganya']);
				
				
				
				//jumlah 
				$qyuk21 = mysqli_query($koneksi, "SELECT SUM(luas_lantai) AS harganya ".
													"FROM inv_kib_c ".
													"WHERE barang_kode LIKE '03%'");
				$ryuk21 = mysqli_fetch_assoc($qyuk21);
				$j_luas_lantai = balikin($ryuk21['harganya']);
				
				
				
				//jumlah 
				$qyuk21 = mysqli_query($koneksi, "SELECT SUM(tanah_luas) AS harganya ".
													"FROM inv_kib_c ".
													"WHERE barang_kode LIKE '03%'");
				$ryuk21 = mysqli_fetch_assoc($qyuk21);
				$j_luas_tanah = balikin($ryuk21['harganya']);
				
				
				
				


				//last update
				$qyuk21 = mysqli_query($koneksi, "SELECT postdate FROM inv_kib_c ".
													"WHERE barang_kode LIKE '03%' ".
													"ORDER BY postdate DESC");
				$ryuk21 = mysqli_fetch_assoc($qyuk21);
				$j_postdate = balikin($ryuk21['postdate']);
				
				
				
				

				?>			
		            <div class="info-box mb-3 bg-warning">
		              <span class="info-box-icon"><i class="fa fa-archive"></i></span>
		
		              <div class="info-box-content">
		                <span class="info-box-text">C.GEDUNG DAN BANGUNAN</span>
		                <span class="info-box-number"><?php echo xduit3($j_harga);?></span>
		                <span class="info-box-number">Luas Lantai : <?php echo $j_luas_lantai;?> M2</span>
		                <span class="info-box-number">Luas Tanah : <?php echo $j_luas_lantai;?> M2</span>
		                <span class="info-box-text"><i>Per Update : <?php echo $j_postdate;?></i></span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>
		            
		            


				<?php
					//jumlah 
					$qyuk21 = mysqli_query($koneksi, "SELECT SUM(harga) AS harganya ".
														"FROM inv_kib_d ".
														"WHERE barang_kode LIKE '04%'");
					$ryuk21 = mysqli_fetch_assoc($qyuk21);
					$j_harga = balikin($ryuk21['harganya']);

					
					//jumlah 
					$qyuk21 = mysqli_query($koneksi, "SELECT SUM(luas) AS harganya ".
														"FROM inv_kib_d ".
														"WHERE barang_kode LIKE '04%'");
					$ryuk21 = mysqli_fetch_assoc($qyuk21);
					$j_luas = balikin($ryuk21['harganya']);
					
					
					

					//last update
					$qyuk21 = mysqli_query($koneksi, "SELECT postdate FROM inv_kib_d ".
														"WHERE barang_kode LIKE '04%' ".
														"ORDER BY postdate DESC");
					$ryuk21 = mysqli_fetch_assoc($qyuk21);
					$j_postdate = balikin($ryuk21['postdate']);
				
				
					

			
				?>		            
		            <div class="info-box mb-3 bg-warning">
		              <span class="info-box-icon"><i class="fa fa-archive"></i></span>
		
		              <div class="info-box-content">
		                <span class="info-box-text">D.JALAN,IRIGASI DAN JARINGAN</span>
		                <span class="info-box-number"><?php echo xduit3($j_harga);?></span>
		                <span class="info-box-number">Luas : <?php echo $j_luas;?> M2</span>
		                <span class="info-box-text"><i>Per Update : <?php echo $j_postdate;?></i></span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>





				<?php
						//jumlah 
						$qyuk21 = mysqli_query($koneksi, "SELECT SUM(harga) AS harganya ".
															"FROM inv_kib_e ".
															"WHERE buku_judul <> '' ".
															"AND barang_kode LIKE '05%'");
						$ryuk21 = mysqli_fetch_assoc($qyuk21);
						$j_harga = balikin($ryuk21['harganya']);

	
						//last update
						$qyuk21 = mysqli_query($koneksi, "SELECT postdate FROM inv_kib_e ".
															"WHERE buku_judul <> '' ".
															"AND barang_kode LIKE '05%' ".
															"ORDER BY postdate DESC");
						$ryuk21 = mysqli_fetch_assoc($qyuk21);
						$j_postdate = balikin($ryuk21['postdate']);


				
						


				
				?>

		            <div class="info-box mb-3 bg-warning">
		              <span class="info-box-icon"><i class="fa fa-archive"></i></span>
		
		              <div class="info-box-content">
		                <span class="info-box-text">E.ASET TETAP LAINNYA</span>
		                <span class="info-box-number"><?php echo xduit3($j_harga);?></span>
		                <span class="info-box-text"><i>Per Update : <?php echo $j_postdate;?></i></span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>


			
			



            
			<?php
			$limit = 30;
			$sqlcount = "SELECT * FROM user_log_entri ".
							"ORDER BY postdate DESC";

			//query
			$p = new Pager();
			$start = $p->findStart($limit);
			
			$sqlresult = $sqlcount;
			
			$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
			$pages = $p->findPages($count, $limit);
			$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
			$pagelist = $p->pageList($_GET['page'], $pages, $target);
			$data = mysqli_fetch_array($result);
			?>
			
			
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">HISTORY ENTRI</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>POSTDATE</th>
                      <th>USER</th>
                      <th>KETERANGAN</th>
                    </tr>
                    </thead>
                    <tbody>
                    	
                    <?php
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
							$i_postdate = balikin($data['postdate']);
							$i_nama = balikin($data['user_nama']);
							$i_ket = balikin($data['ket']);
							
						


							echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
							echo '<td>'.$i_postdate.'</td>
							<td>'.$i_nama.'</td>
							<td>'.$i_ket.'</td>
					        </tr>';
							}
						while ($data = mysqli_fetch_assoc($result));
						?>
						
						
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>



              <div class="card-footer">

				<a href="h/entri.php" class="btn btn-block btn-danger">SELENGKAPNYA >></a>
              </div>



              <!-- /.card-footer -->
            </div>
            <!-- /.card -->



		</div>
		
		
		
		

		</div>
	</div>



            


		<!-- OPTIONAL SCRIPTS -->
		<script src="../template/adminlte3/plugins/chart.js/Chart.min.js"></script>
		




	
	<script language='javascript'>
	//membuat document jquery
	$(document).ready(function(){
	
	$.noConflict();

	});
	
	</script>
	






<?php
//isi
$isi = ob_get_contents();
ob_end_clean();

require("../inc/niltpl.php");

//diskonek
xfree($qbw);
xclose($koneksi);
exit();
?>