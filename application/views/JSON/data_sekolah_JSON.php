<script>
	$(function () {
		$('#add_data_sekolah').click(function() {
			$('.form-tambah').submit();
		});

		document.title = 'Dashboard | RoadShow' + <?php echo date('Y') ?>;
	});	

	function delete_sekolah(id_sekolah) {
		$.getJSON('<?php echo base_url() ?>data_sekolah/get_sekolah_by_id/' + id_sekolah, function(data) {
			$('#delete_data_sekolah').attr('href', '<?php echo base_url() ?>data_sekolah/hapus_data_sekolah/'+id_sekolah);
			$('#nama_sekolah').text(data.nama_sekolah);
		});
	}
</script>