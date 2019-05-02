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

	Morris.Bar({
      element: "total_peserta",
      data: <?php echo $data_count ?>,
      xkey: "tahun",
      ykeys: ["total_peserta"],
      labels: ["total peserta"]
    });

    Morris.Bar({
      element: "total_peserta_by_tipe_soal",
      data: <?php echo $data_count_tipe_soal ?>,
      xkey: "tahun",
      ykeys: ["teknik", "non_teknik"],
      labels: ["Teknik", "Non Teknik"]
    });
</script>