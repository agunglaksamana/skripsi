<?php
require_once '../../inc/config.php';
//MENANGKAP VARIABLE FIELD DITABLE YANG DIKIRIM DENGAN METHODE POST
$id_waktu = $_POST['id_waktu'];
$waktu_verbal = $_POST['waktu_pengerjaan_verbal'];
$waktu_numerik = $_POST['waktu_pengerjaan_numerik'];
$waktu_logikal = $_POST['waktu_pengerjaan_logikal'];
$waktu_gambar = $_POST['waktu_pengerjaan_gambar'];

$query_validasi = "SELECT * FROM settingwaktu WHERE id_waktu='".$id_waktu."'";
$result_validasi = mysql_query($query_validasi);

$query_validasi_final = mysql_fetch_array($result_validasi);
echo $query_validasi_final['id_waktu'];

if ($query_validasi_final['id_waktu']!="") {
echo "<script>alert('Data sudah ada!');
		location.href='tambah.php';
		</script>";
		
} else if ($query_validasi_final['id_waktu']=="") {

$query = "INSERT INTO settingwaktu 
(waktu_pengerjaan_verbal,waktu_pengerjaan_numerik,waktu_pengerjaan_logikal,waktu_pengerjaan_gambar) 
VALUES('".$waktu_verbal."','".$waktu_numerik."',
    '".$waktu_logikal."','".$waktu_gambar."')";
$result = mysql_query($query);
header('Location:index.php?halaman=1');
}
?>