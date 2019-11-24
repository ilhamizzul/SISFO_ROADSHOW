<div class="panel panel-headline">
	<div class="panel-heading">
		<h3 class="panel-title">TRYOUT OVERVIEW</h3>
		<p class="panel-subtitle">Period: <?php echo date("M d, Y")?> - Now</p>
	</div>
</div>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-3">
				<div class="metric">
					<span class="icon"><i class="fa fa-bullseye"></i></span>
					<p>
						<span class="number">250</span>
						<span class="title">Target Peserta</span>
					</p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="metric">
					<span class="icon"><i class="fa fa-user"></i></span>
					<p>
						<span class="number"><?php echo $count_peserta; ?></span>
						<span class="title">Peserta</span>
					</p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="metric">
					<span class="icon"><i class="fa fa-eye"></i></span>
					<p>
						<span class="number"><?php echo $count_peserta_hadir ?></span>
						<span class="title">Hadir</span>
					</p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="metric">
					<span class="icon"><i class="fa fa-eye-slash"></i></span>
					<p>
						<span class="number"><?php echo $count_peserta_tidak_hadir ?></span>
						<span class="title">Tidak Hadir</span>
					</p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="metric">
					<span class="icon"><i class="fa fa-file"></i></span>
					<p>
						<span class="number"><?php echo $count_dokumen ?></span>
						<span class="title">Dokumen</span>
					</p>
				</div>
			</div>
		</div>
		
	</div>
</div>
<div class="panel panel-headline">
	<div class="panel-body">
		<div id="graph">
		</div>
	</div>
</div>