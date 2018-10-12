<script type="text/javascript">
	$(function(){

		$('#submit_data_ruangan').click(function() {
			$('.form-tambah').submit();
		});

		function delete_ruang(id_ruang) {
			$.getJSON('<?php echo base_url() ?>Data_ruangan/get_ruang_by_id/' + id_ruang, function(data) {
				$('#delete_data_ruangan').attr('href', '<?php echo base_url() ?>Data_ruangan/hapus/' + data.id_ruang);
			})
		}
	});
</script>