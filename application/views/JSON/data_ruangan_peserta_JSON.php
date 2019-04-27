<script type="text/javascript">
	$(function () {
		document.title = 'Dashboard | RoadShow' + <?php echo date('Y') ?>;

		$('#edit_data').click(function() {
			var getVar = [];
			$(".select_update:checked").each(function() {
				getVar.push($(this).val());
			});
			console.log(getVar);
			$.ajax({
				url: '<?php echo base_url() ?>Data_ruangan_peserta/update_absensi',
				type: 'POST',
				dataType: 'JSON',
				data: {'id_peserta' : getVar},
				success: function(response) {
					if (response) {
						location.href = '<?php echo base_url() ?>Data_ruangan_peserta/absensi_peserta/<?php $this->uri->segment(3) ?>';
						alert('Edit Absensi Berhasil');
					}
				}
			})
		});
	});
</script>