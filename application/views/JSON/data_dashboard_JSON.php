<script type="text/javascript">
	$(function () {
		document.title = 'Dashboard | RoadShow' + <?php echo date('Y') ?>;
	});

                Morris.Bar({
                  element: "graph",
                  data: <?php echo $recap_data ?>,
                  xkey: "tahun",
                  ykeys: ["total_terdaftar", "total_hadir", "total_tidak_hadir"],
                  labels: ["total terdaftar", "total hadir", "total tidak hadir"]
                });
</script>