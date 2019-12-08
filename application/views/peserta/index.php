<!doctype html>
<html lang="en">

<head>
	<title>Roadshow 2K20</title>
	<meta name="theme-color" content="#1F2438"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/css.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>
<div class="container-fluid" id="content">
	<div class="col-lg-6 col-md-6 col-sm-12 welcome">
		<h1 class="title row" id="selamat-datang">
			Selamat Datang,
		</h1>
		<form action="<?php echo base_url();?>peserta/cek_nomor_peserta" class="row form" id="form-enter" method="post">
			<div class="form-group input col-lg-12 col-md-12 col-sm-12" id="noPeserta">
				<input type="text" placeholder="Masukkan Nomor Peserta" name="input_nopes" id="input-peserta" required>
			</div>
			<div class="form-group input col-lg-12 col-md-12 col-sm-12">
				<button class="btn btn-info btn-roadshow" id="btn-enter" type="submit">
					Enter
				</button>
			</div>
		</form>
	</div>
</div>
<?php $this->load->view($JSON); ?>
</body>

</html>
