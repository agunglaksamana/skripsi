<?php
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login");//jika belum login jangan lanjut..
}

//cek level user
if($_SESSION['role']!="Admin IT"){
    header('Location:index.php?konfirmasi=1');
echo mysql_error();//jika bukan admin jangan lanjut
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Computer Based-Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <script type="text/javascript" src="../resources/js/jquery.js"></script>
    <link href="../resources/css/style.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        body {
            background-image: url('../resources/img/grey.png');
        }
    </style>
    <script type="text/javascript" src="../assets/js/bootstrap-dropdown.js"></script>

  </head>

  <body>
     <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
            <div  class="nav-collapse collapse">
            <ul class="nav">
                <li><a href="MenuUtama.php"><i class="icon-home icon-white"></i> Beranda</a></li>
			  <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-book icon-white"></i> Data Master <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="user/index.php?halaman=1">Data User</a></li>
                  <li><a href="#">Data Calon Mahasiswa</a></li>
                </ul>
			  </li>
			  <li class="dropdown">
			  	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-folder-open icon-white"></i> Setting<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="grade/index.php?halaman=1">Setting Grade Lulus</a></li>
                  <li><a href="kategori/index.php?halaman=1">Setting Kategori</a></li>
                  <li><a href="soal/index.php?halaman=1">Setting Soal Text</a></li>
                  <li><a href="soalgambar/index.php?halaman=1">Setting Soal Gambar</a></li>
                  <li><a href="waktu/index.php?halaman=1">Setting Waktu</a></li>
                </ul>
              </li>
            </ul>
            <div class="btn-group pull-right">
                <button class="btn btn-primary"><i class="icon-user icon-white"></i><?php echo "".$_SESSION['username'].""; ?></button>
			  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
                                <li><a href="logout.php"><i class="icon-off"></i>Log Out</a></li>
			  </ul>
			</div>
          </div><!--/.nav-collapse -->
         
        </div>
         </div>
    </div>
  </body>
</html>
