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

<div class="container-fluid">
	<div class="col-lg-6 col-md-6 col-sm-12 welcome">
		<h1 class="title row" id="selamat-datang">
			Nomor Peserta: <?php echo $this->session->userdata('nomor_peserta'); ?>
		</h1>
		<form action="<?php echo base_url();?>Peserta/save_registrasi" class="row form" id="form-enter" method="post">
			<div class="form-group input col-lg-12 col-md-12 col-sm-12" id="nama">
				<input placeholder="Masukkan Nama" required type="text" name="nama_peserta">
			</div>
			<div class="form-group input col-lg-12 col-md-12 col-sm-12" id="email">
				<input placeholder="your@mail.com" required type="email" name="email">
			</div>
			<div class="form-group input col-lg-12 col-md-12 col-sm-12" id="noHp">
				<input placeholder="Nomor Hp" required type="text" name="no_hp">
			</div>
			<div class="form-group input col-lg-12 col-md-12 col-sm-12" id="asalSekolah">
				<select class="input" id="" name="asal_sekolah">
					<option disabled selected value>Asal Sekolah</option>
					<?php
					foreach ($data_sekolah as $data) {
						echo '
                                                    <option value="'.$data->id_sekolah.'">'.$data->nama_sekolah.'</option>
                                                ';
					}
					?>
				</select>
			</div>
			<div class="form-group input col-lg-12 col-md-12 col-sm-12" id="pilihanSoal">
				<select class="input" id="" name="pilihan_soal">
					<option disabled selected value>Tipe Soal</option>
					<option value="teknik">Teknik</option>
					<option value="non_teknik">Non Teknik</option>
				</select>
			</div>
			<div class="form-group input col-lg-12 col-md-12 col-sm-12">
				<button class="btn btn-info btn-roadshow" id="btn-enter" type="submit">
					Submit
				</button>
			</div>
		</form>
	</div>
</div>
<?php $this->load->view($JSON); ?>
</body>

</html>

