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
nocache;

//nilai
$filenya = "pegawai_qrcode.php";
$judul = "Data pegawai";
$judulku = "$judul";
$judulx = $judul;
$kd = nosql($_REQUEST['kd']);
$kode = cegah($_REQUEST['kode']);

	
	


//bikin qrcode ///////////////////////////////////////////////////////////////////////////////////
include('../../inc/class/phpqrcode/qrlib.php');
include('../../inc/class/phpqrcode/qrconfig.php');

// how to save PNG codes to server

//$tempDir = EXAMPLE_TMP_SERVERPATH;
$tempDir = "../../filebox/qrcode/";

$codeContents = $kode;

// we need to generate filename somehow, 
// with md5 or with database ID used to obtains $codeContents...
//$fileName = '005_file_'.md5($codeContents).'.png';
$fileName = "$codeContents.png";

$pngAbsoluteFilePath = $tempDir.$fileName;
$urlRelativeFilePath = EXAMPLE_TMP_URLRELPATH.$fileName;

// generating
if (!file_exists($pngAbsoluteFilePath)) {
    QRcode::png($codeContents, $pngAbsoluteFilePath);
    //echo 'File generated!';
    //echo '<hr />';
} else {
    //echo 'File already generated! We can use this cached file to speed up site on common codes!';
    //echo '<hr />';
}


	

//re-direct
$ke = "pegawai_pdf.php?kd=$kd&kode=$kode";
xloc($ke);
exit();
?>