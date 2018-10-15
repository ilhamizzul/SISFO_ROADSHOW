<script type="text/javascript">
	document.title = 'Nomor Peserta | RoadShow2k18';	

	function delete_nomor_peserta(id_nmr_peserta) {
		$.getJSON('<?php echo base_url() ?>Data_nomor_peserta/get_nomor_peserta_by_id/' + id_nmr_peserta, function(data) {
			$('#delete_nmr_peserta').attr('href', '<?php echo base_url() ?>Data_nomor_peserta/delete_nmr_peserta/' + data.id_nmr);
		});
	}
</script>