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
	  

	  
	  
//nilai /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$konten = ParseVal($tpl, array ("judul" => $judul,
					"judulku" => $judulku,
					"sumber" => $sumber,
					"isi" => $isi,
					"isi_banner" => $isi_banner,
					"ke" => $ke,
					"i_menu" => $i_menu,
					"i_slideshow" => $i_slideshow,
					"i_headline" => $i_headline,
					"i_sambutan_ks" => $i_sambutan_ks,
					"i_terbaru" => $i_terbaru,
					"i_populer" => $i_populer,
					"i_kategori" => $i_kategori,
					"i_keahlian" => $i_keahlian,
					"tipe_session" => $tipe_session,
					"isi_menu" => $isi_menu,
					"i_foto" => $i_foto,
					"i_video" => $i_video,
					"i_loker" => $i_loker,
					"i_loker1" => $i_loker1,
					"i_loker2" => $i_loker2,
					"i_loker3" => $i_loker3,
					"i_loker4" => $i_loker4,
					"i_loker5" => $i_loker5,
					"i_pegawai" => $i_pegawai,
					"i_guru" => $i_guru,
					"i_siswa" => $i_siswa,
					"i_alumni" => $i_alumni,
					"i_download" => $i_download,
					"i_link_internal" => $i_link_internal,
					"i_kalender" => $i_kalender,
					"i_polling" => $i_polling,
					"i_link" => $i_link,
					"i_newsletter" => $i_newsletter,
					"i_mitra" => $i_mitra,
					"i_mutiara" => $i_mutiara,
					"i_visitor" => $i_visitor,
					"i_footer" => $i_footer,
					"i_artikel_detail" => $i_artikel_detail,
					"i_artikel_bcrumb" => $i_artikel_bcrumb,
					"i_artikel_image" => $i_artikel_image,
					"i_artikel_terkait" => $i_artikel_terkait,
					"i_artikel_komentar" => $i_artikel_komentar,
					"i_artikel_komentar_beri" => $i_artikel_komentar_beri,
					"diload" => $diload,
					"versi" => $versi,
					"x_author" => $x_author,
					"x_keywords" => $x_keywords,
					"x_url" => $x_url,
					"sesidt" => $sesidt,
					"filenya" => $filenya,
					"wkdet" => $wkdet,
					"wkurl" => $wkurl,
					"sek_nama" => $sek_nama,
					"sek_alamat" => $sek_alamat,
					"sek_kontak" => $sek_kontak,
					"sek_kota" => $sek_kota,
					"sek_filex" => $sek_filex,
					"sek_filexx" => $sek_filexx,
					"x_description" => $x_description));

//tampilkan
echo $konten;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////












//kasi log entri ///////////////////////////////////////////////////////////////////////////////////
$kuz_ket = cegah("MENU : $judulku");			




//insert
mysqli_query($koneksi, "INSERT INTO user_log_entri(kd, user_kd, user_kode, user_nama, ".
				"user_posisi, user_jabatan, ket, postdate) VALUES ".
				"('$x', '$kuz_kd', '$kuz_kode', '$kuz_nama', ".
				"'$kuz_posisi', '$kuz_jabatan', '$kuz_ket', '$today')");
//kasi log login ///////////////////////////////////////////////////////////////////////////////////

?>