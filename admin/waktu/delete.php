<?php
require_once '../../inc/config.php';

$id_waktu = $_GET['id_waktu'];

$query = "DELETE FROM settingwaktu WHERE id_waktu='$id_waktu'";
$result = mysql_query($query) or die(mysql_error());

mysql_close();

header('Location:index.php?halaman=1');


?>