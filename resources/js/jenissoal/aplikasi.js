(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {
		
		// deklarasikan variabel
		var id_jenissoal = 0;
		var main = "index.php";
		
		// tampilkan data mahasiswa dari berkas mahasiswa.data.php 
		// ke dalam <div id="data-mahasiswa"></div>
		$("#data-jenissoal").load(main);
		
		// ketika tombol ubah/tambah di tekan
		$('.ubah, .tambah').live("click", function(){
			
			var url = "jenissoal.form.php";
			// ambil nilai id dari tombol ubah
			id_jenissoal = this.id;
			
			if(id_jenissoal != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Jenis Soal");
			} else {
				// saran dari mas hangs 
				$("#myModalLabel").html("Tambah Jenis Soal");
			}

			$.post(url, {id: id_jenissoal} ,function(data) {
				// tampilkan mahasiswa.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});
		
		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "jenissoal.input.php";
			// ambil nilai id dari tombol hapus
			id_jenissoal = this.id;
			
			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");
			
			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_jenissoal} ,function() {
					// tampilkan data mahasiswa yang sudah di perbaharui
					// ke dalam <div id="data-mahasiswa"></div>
					$("#data-jenissoal").load(main);
				});
			}
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-jenissoal").bind("click", function(event) {
			var url = "jenissoal.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			var v_id_jenissoal = $('input:text[name=jenis_soal_id]').val();
			var v_nama = $('input:text[name=nama]').val();
			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {nim: v_id, nama: v_nama} ,function() {
				// tampilkan data mahasiswa yang sudah di perbaharui
				// ke dalam <div id="data-mahasiswa"></div>
				$("#data-jenissoal").load(main);

				// sembunyikan modal dialog
				$('#dialog-jenissoal').modal('hide');
				
				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data");
			});
		});
	});
}) (jQuery);
