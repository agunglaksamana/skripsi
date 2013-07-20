<?php 
session_start();
include "../inc/config.php";
$username=$_POST['username'];
$password=  md5($_POST['password']);
$role = $_POST['role'];

$query=mysql_query("select * from admin where username='$username' and password='$password' and role= 'Admin IT' ");
$query2=mysql_query("select * from admin where username='$username' and password='$password' and role= 'Operator' ");
$cek=mysql_num_rows($query);
$cek2=  mysql_num_rows($query2);
if($cek){
$_SESSION['username']=$username;
$_SESSION['role']=$role;
?> 
    <?php header('Location:MenuUtama.php');
}elseif ($cek2) {
    $_SESSION['username']=$username;
    $_SESSION['role']=$role;
?> 
    <?php header('Location:menuoperator.php');
}else{
?>
    <?php header('Location:index.php?konfirmasi=1');
echo mysql_error();
}
?>  