<?php
///cek session //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$kd3_session = nosql($_SESSION['kd3_session']);
$tipe_session = balikin2($_SESSION['tipe_session']);
$nip3_session = nosql($_SESSION['nip3_session']);
$nm3_session = balikin2($_SESSION['nm3_session']);
$username3_session = nosql($_SESSION['username3_session']);
$wk_session = nosql($_SESSION['wk_session']);
$pass3_session = nosql($_SESSION['pass3_session']);
$hajirobe_session = nosql($_SESSION['hajirobe_session']);
$janiskd = "admwk";


$qbw = mysqli_query($koneksi, "SELECT m_walikelas.kd ".
									"FROM m_walikelas, m_pegawai ".
									"WHERE m_walikelas.peg_kd = m_pegawai.kd ".
									"AND m_pegawai.kd = '$kd3_session' ".
									"AND m_pegawai.usernamex = '$username3_session' ".
									"AND m_pegawai.passwordx = '$pass3_session'");
$rbw = mysqli_fetch_assoc($qbw);
$tbw = mysqli_num_rows($qbw);

if (($tbw == 0) OR (empty($kd3_session))
	OR (empty($username3_session))
	OR (empty($nip3_session))
	OR (empty($nm3_session))
	OR (empty($pass3_session))
	OR (empty($wk_session))
	OR (empty($hajirobe_session)))
	{
	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//re-direct
	$pesan = "ANDA BELUM LOGIN. SILAHKAN LOGIN DAHULU...!!!";
	pekem($pesan, $sumber);
	exit();
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




















//kasi log entri ///////////////////////////////////////////////////////////////////////////////////
$kuz_kd = $kd3_session;
$kuz_kode = $nip3_session;
$kuz_nama = $nm3_session;
$kuz_posisi = "Wali Kelas";
$kuz_jabatan = "Wali Kelas";
//kasi log entri ///////////////////////////////////////////////////////////////////////////////////

















//isi *START
ob_start();



//jml notif
$qyuk = mysqli_query($koneksi, "SELECT * FROM user_log_entri ".
						"WHERE user_kd = '$kd3_session' ".
						"AND user_posisi = '$kuz_posisi' ".
						"AND dibaca = 'false'");
$jml_notif = mysqli_num_rows($qyuk);

echo $jml_notif;


//isi
$i_loker1 = ob_get_contents();
ob_end_clean();





//isi *START
ob_start();



//jml notif
$qyuk = mysqli_query($koneksi, "SELECT * FROM user_log_login ".
						"WHERE user_kd = '$kd3_session' ".
						"AND user_posisi = '$kuz_posisi' ".
						"AND dibaca = 'false'");
$jml_notif = mysqli_num_rows($qyuk);

echo $jml_notif;


//isi
$i_loker2 = ob_get_contents();
ob_end_clean();











//isi *START
ob_start();



//jml notif
$jml_notif = $i_loker1 + $i_loker2;
echo $jml_notif;


//isi
$i_loker = ob_get_contents();
ob_end_clean();
?>