<?php
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
/////// SISFOKOL_SMP_v6.78_(Code:Tekniknih)                          ///////
/////// (Sistem Informasi Sekolah untuk SMP)                    ///////
///////////////////////////////////////////////////////////////////////
/////// Dibuat oleh :                                           ///////
/////// Agus Muhajir, S.Kom                                     ///////
/////// URL 	:                                               ///////
///////     * http://github.com/hajirodeon/                          ///////
///////     * http://sisfokol.wordpress.com/                    ///////
///////     * http://hajirodeon.wordpress.com/                  ///////
///////     * http://yahoogroup.com/groups/sisfokol/            ///////
///////     * https://www.youtube.com/@hajirodeon       ///////
/////// E-Mail	:                                               ///////
///////     * hajirodeon@yahoo.com                              ///////
///////     * hajirodeon@gmail.com                              ///////
/////// HP/SMS/WA : 081-829-88-54                               ///////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////



if($_POST["save"])
	{
	$type = $_POST["type"];
	if($_POST["name"] and ($type=="JPG" or $type=="PNG"))
		{
		$img = base64_decode($_POST["image"]);
		$myFile = "../../filebox/equation/".$_POST["name"].".".$type ;
		header('Content-Type: image/jpeg');

		$fh = fopen($myFile, 'w');
		fwrite($fh, $img);
		fclose($fh);
		echo "../../filebox/equation/".$_POST["name"].".".$type;
		}
	}
else
	{
	$img = base64_decode($_POST["image"]);
	header('Content-Type: image/jpeg');
	header("Content-Disposition: attachment; filename=$img" );
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
	header("Pragma: public");
	echo base64_decode($_POST["image"]);
	}
?>
