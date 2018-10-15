<script type="text/javascript">
	$(function () {
		$('#add_data_peserta').click(function() {
			$('.form-tambah').submit();
		});
	});	

	function delete_peserta(id_peserta) {
		$.getJSON('<?php echo base_url(); ?>data_peserta/get_peserta_by_id/' + id_peserta, function(data)
		{
			$('#delete_data_peserta').attr('href', '<?php echo base_url()?>Data_peserta/delete_peserta/' + data.id_peserta);  
		});
		
	}
</script>