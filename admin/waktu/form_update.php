<?php
require_once '../../inc/config.php';

// $username = $_GET['username'];

$id_waktu = isset($_GET['id_waktu']) ? $_GET['id_waktu'] : null;
//atau:
//$page = isset($_GET['page']) ? $_GET['page'] : false;
//atau bisa juga dengan:
//$page = isset($_GET['page']) ? $_GET['page'] : "";

$query = "SELECT * FROM settingwaktu WHERE id_waktu='$id_waktu'";
$result = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_array($result) or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
		<style type="text/css">
			body {
				padding-top: 60px;
				padding-bottom: 40px;
				background: url('../../assets/img/grey.png') repeat;
			}
			.atas {
				padding-top: 9px;
			}
			label.error {
				color: red;
			}
		</style>
                <link href="../../assets/css/bootstrap.css" rel="stylesheet">
                <link href="../../assets/css/bootstrap-responsive.css" rel="stylesheet">
                <link href="../../resources/css/validationEngine.jquery.css" rel="stylesheet" type="text/css">

                <script type="text/javascript" src="../../assets/js/jquery-1.8.3.min.js"></script>
                <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>		
                <script type="text/javascript" src="../../resources/js/jquery.validationEngine-en.js"></script>
                <script type="text/javascript" src="../../resources/js/jquery.validationEngine.js"></script>
                
<script type="text/javascript">
        jQuery(document).ready(function () {
// binds form submission and fields to the validation engine
            jQuery("#formupdate").validationEngine();
        });
    </script>

  </head>

  <body>
      <div class="well" style="width: 1200px; margin:10px auto;"> 
      <div class="container">
          <form action="update.php" method="post" id="formupdate" name="formupdate">
          <a href="index.php?halaman=1" <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
              <legend>Input Grade_User</legend>
            <input type="hidden" name="id_waktu" value="<?php echo $id_waktu; ?>" />
            <div class="control-group">
            <label class="control-label" for="nama_hukuman">Waktu Pengerjaan Verbal :</label>
            <div class="controls">
            <input value="<?php echo $data['waktu_pengerjaan_verbal']; ?>" type="text" style="width:300px;" name="waktu_pengerjaan_verbal" class="span2 validate[required,custom[integer]] text-input">
            </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="nama_hukuman">Waktu Pengerjaan Numerik :</label>
            <div class="controls">
            <input value="<?php echo $data['waktu_pengerjaan_numerik']; ?>" type="text" style="width:300px;" name="waktu_pengerjaan_numerik" class="span2 validate[required,custom[integer]] text-input">
            </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="nama_hukuman">Waktu Pengerjaan Logikal :</label>
            <div class="controls">
                <input value="<?php echo $data['waktu_pengerjaan_logikal']; ?>" type="text" style="width:300px;" name="waktu_pengerjaan_logikal" class="span2 validate[required,custom[integer]] text-input">
            </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="nama_hukuman">Waktu Pengerjaan Gambar :</label>
            <div class="controls">
                <input value="<?php echo $data['waktu_pengerjaan_gambar']; ?>" type="text" style="width:300px;" name="waktu_pengerjaan_gambar" class="span2 validate[required,custom[integer]] text-input">
            </div>
            </div>
		<?php
		if (isset($_GET['halaman'])) {
			echo "<div id='form_alert' style='color:#DD1144' class='alert alert-success'>";
			echo "<a class='close' data-dismiss='alert' href='#'>x</a>Data berhasil disimpan!";
			echo "</div>";
		}
		?>

		<div class="control-group">
			<button type="submit" class="btn btn-primary">
				<i class="icon icon-plus"></i> Simpan Data
			</button>
			<button type="reset" class="btn btn-warning">
				<i class="icon icon-refresh"></i> Batal
			</button>
		</div>
            
	</form>
</div>
</div>
  </body>
</html>
