<?php
//ambil nilai
require("inc/config.php");
require("inc/fungsi.php");
require("inc/koneksi.php");




//jika pmasuk
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'pmasuk'))
	{
	//nilai
	$kd = cegah($_GET['kd']);
	$latx = cegah($_GET['latx']);
	$laty = cegah($_GET['laty']);


	$latx2 = balikin($_GET['latx']);
	$laty2 = balikin($_GET['laty']);
	


	$lat = balikin($latx2);
	$long = balikin($laty2);

	//jika ada
	if (!empty($lat))
		{		
		echo "$lat , $long";
		}
	else
		{
		?>
		
		<div class="row">
		
		  <div class="col-lg-12">
		    <div class="info-box mb-3 bg-danger">
		      <span class="info-box-icon"><i class="fa fa-user-secret"></i></span>
		
		      <div class="info-box-content">
		        <span class="info-box-number">
		        		<b>GPS TIDAK AKTIF</b>
					</span>
		      </div>
		    </div>
		
			</div>
			
		</div>

		

		<?php	
		}
	}
	




	

//jika error
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'error'))
	{
	?>
		
		<div class="row">
		
		  <div class="col-lg-12">
		    <div class="info-box mb-3 bg-danger">
		      <span class="info-box-icon"><i class="fa fa-user-secret"></i></span>
		
		      <div class="info-box-content">
		        <span class="info-box-number">
		        		<b>GPS TIDAK AKTIF</b>
					</span>
		      </div>
		    </div>
		
			</div>
			
		</div>

		

	<?php	
	}


exit();
?>