<script text="text/javascript">
	$(function () {
		$('#add_dokumen_soal').click(function() {
			$('.form_tambah').submit();
		});
		document.title = "Dokumen Soal | RoadShow2k18";


	});

	function delete_dokumen_soal(id_dokumen) {
		$.getJSON('<?php echo base_url() ?>Data_dokumen_soal/get_dokumen_by_id/' + id_dokumen, function(data) {
			$('#delete_dokumen').attr('href', '<?php echo base_url() ?>Data_dokumen_soal/delete_dokumen/' + data.id_dokumen + '/' + data.tipe_dokumen_soal + '/' + data.file_soal);
		});
	}

	function edit_dokumen_soal(id_dokumen) {
		$.getJSON('<?php echo base_url() ?>Data_dokumen_soal/get_dokumen_by_id/' + id_dokumen, function(data) {
			$('#nama_dokumen').val(data.nama_dokumen_soal);
			$('#nama_file').text('File Saat Ini : ' + data.file_soal);
			$('#tahun_dokumen_soal').val(data.tahun_dokumen_soal);
			$('#tipe_dokumen_soal').val('Tipe Dokumen : ' + data.tipe_dokumen_soal);
			$('#tipe_soal').val('Tipe Soal : ' + data.tipe_soal);
			$('#form_edit').attr('action','<?php echo base_url() ?>Data_dokumen_soal/edit_dokumen_soal/' + data.id_dokumen + '/' + data.file_soal + '/' + data.tipe_dokumen_soal);
		});
	}
	
</script>