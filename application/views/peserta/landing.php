<!doctype html>
<html lang="en">

<head>
    <title>Hello | Roadshow</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/chartist/css/chartist-custom.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>assets/img/favicon.png">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">


    <!-- DATA TABLE BLM BS BEKERJA -->
</head>

<body id="body-peserta">
<!-- MAIN -->
<div class="main" id="main">
    <!-- MAIN CONTENT -->
    <div class="container-fluid contain-peserta">
        <div class="">
            <!-- OVERVIEW -->
            <div class="image-side2"></div>
            <div class="main2">
                <div class="title">
                    <h1>Halo, <?php echo $data_diri->nama_peserta;?></h1>
                </div>
                <div class="panel panel-default panel-peserta2">
                    <div class="panel-body" id="panel-peserta2">
                        <div class="col-md-6 landing">
                            <form action="" class="form-peserta">
                                <div class="group" style="margin-top: 10px;">
                                    <input type="text" class="input-md" id="input-peserta2" name="input_nopes" value="<?php echo $data_diri->nomor_peserta;?>" disabled>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nomor Peserta</label>
                                </div>
                                <div class="group">
                                    <input type="text" class="input-md" id="input-peserta2" name="input_nopes" value="<?php echo $data_diri->nama_peserta;?>" disabled>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nama</label>
                                </div>
                                <div class="group">
                                    <input type="text" class="input-md" id="input-peserta2" name="input_nopes" value="<?php echo $data_diri->email;?>" disabled>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Email</label>
                                </div>
                                <div class="group">
                                    <input type="text" class="input-md" id="input-peserta2" name="input_nopes" value="<?php echo $data_diri->no_hp;?>"disabled>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nomor HP</label>
                                </div>
                                <div class="group">
                                    <input type="text" class="input-md" id="input-peserta2" name="input_nopes" value="<?php echo $data_diri->nama_sekolah;?>"  disabled>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Asal Sekolah</label>
                                </div>
                                <!-- <div class="group">
                                    <input type="text" class="input-md" id="input-peserta2" name="input_nopes" value="<?php echo $data_diri->kelas;?>"  disabled>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Kelas</label>
                                </div> -->
                                <div class="group">
                                    <input type="text" class="input-md" id="input-peserta2" name="input_nopes" value="<?php echo $data_diri->nama_ruang;?>"  disabled>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Ruang Tryout</label>
                                </div>

                                <div class="group">
                                    <a class="btn btn-default" href="<?php echo base_url();?>Peserta/end_session">Back to Home</a>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-6 landing">
                            <h3 class="judul-maps">Lokasi Tryout</h3>
                            <img src="<?php echo base_url();?>assets/img/image.png" alt="" class="map-gambar">
                        </div>
            </div>



        </div>
    </div>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>
<footer>
    <div class="container-fluid" style="position: relative;">
        <p class="copyright">&copy; RoadShow2k18. All Rights Reserved.</p>
    </div>
</footer>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/chartist/js/chartist.min.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/klorofil-common.js"></script>

<?php $this->load->view($JSON); ?>

<!-- DATA TABLE BLM BS BEKERJTA -->



</body>

</html>

