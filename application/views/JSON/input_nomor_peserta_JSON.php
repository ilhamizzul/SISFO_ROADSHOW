<script type="text/javascript">
	$(function() {

		$('#add_data').click(function() {
			var no = $('#table_data tbody tr').length + 1;
			var nomor_peserta = $('#nomor_peserta').val();

			$('#table_data tbody:last-child').append(
					'<tr>' + 
						'<td>' + no + '</td>'+
						'<td>' + nomor_peserta + '</td>' + 
					'</tr>'
				);

			$('#nomor_peserta').val('');
		});

		$('#save_data').click(function() {
			
			var table_data = [];

			$('#table_data tr').each(function(row, tr) {
				
				if ($(tr).find('td:eq(0)').text() == '') {

				} else {
					var sub = {
						'nomor_peserta' : $(tr).find('td:eq(1)').text(),
						'status' : 'nonaktif'
					};

					table_data.push(sub);
				}

			});
			// function xxxx() {
				$.ajax({
					data: {'data_table' : table_data},
					url: '<?php echo base_url(); ?>Data_nomor_peserta/save',
					type: 'POST',
					success : function(result) {
						location.href = '<?php echo base_url() ?>Data_nomor_peserta';
						alert('Insert berhasil');
					}
				});
				
			// };
		});
	});
</script>