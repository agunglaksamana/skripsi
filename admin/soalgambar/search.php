<?php
require_once '../../inc/config.php';

$pertanyaan = $_POST['pertanyaan'];

$query = "SELECT * FROM soal s inner join kategori k on s.id_kategori=k.id_kategori 
    WHERE pertanyaan LIKE '%$pertanyaan%'";
$result = mysql_query($query) or die(mysql_error());

mysql_close();

if ($result > 0) {
	header('Location:index.php?halaman=1');
}
?>