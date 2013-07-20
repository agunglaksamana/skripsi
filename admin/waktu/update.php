<?php

require_once '../../inc/config.php';

$id_waktu = $_POST['id_waktu'];
$waktu_verbal = $_POST['waktu_pengerjaan_verbal'];
$waktu_numerik = $_POST['waktu_pengerjaan_numerik'];
$waktu_logikal = $_POST['waktu_pengerjaan_logikal'];
$waktu_gambar = $_POST['waktu_pengerjaan_gambar'];

$query = "UPDATE settingwaktu SET waktu_pengerjaan_verbal='$waktu_verbal',waktu_pengerjaan_numerik='$waktu_numerik',
    waktu_pengerjaan_logikal='$waktu_logikal',waktu_pengerjaan_gambar='$waktu_gambar' WHERE id_waktu='$id_waktu'";
$result = mysql_query($query) or die(mysql_error());

mysql_close();

if ($result > 0) {
	header('Location:index.php?halaman=1');
} else {
	header('Location:update.php');
}
?>