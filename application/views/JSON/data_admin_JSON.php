<script type="text/javascript">
	$(function () {
		$('#tambah_admin').click(function() {
			$('.form-tambah').submit();
		});
		document.title = 'Data Admin | RoadShow2k18';	
	});

	function delete_admin(id_admin) {
		$.getJSON('<?php echo base_url() ?>Data_admin/get_data_admin_by_id/' + id_admin, function(data) {
				$('#delete_data_admin').attr('href', '<?php echo base_url() ?>Data_admin/delete_admin/' + data.id_admin);
		});
	}
</script>