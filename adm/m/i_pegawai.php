<?php
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
	
nocache;




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//lihat gambar
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'lihat1'))
	{
	//ambil nilai
	$kd = nosql($_GET['kd']);
	$e_filex1 = "$kd-1.jpg";
	

	$nil_foto = "$sumber/filebox/pegawai/$kd/$e_filex1";

	echo '<img src="'.$nil_foto.'" height="200">';
	}
	
	
	

?>