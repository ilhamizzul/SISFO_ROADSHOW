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
                    <h3>Silahkan Isi Data Diri Anda.<br> Nomor Peserta: <?php echo $this->session->userdata('nomor_peserta'); ?></h3>
                </div>
                <div class="panel panel-default panel-peserta2">
                    <div class="panel-body" id="panel-peserta2">
                        <div class="col-md-12 landing">
                            <form action="<?php echo base_url();?>Peserta/save_registrasi" method="post" class="form-peserta">
                                <div class="group" style="margin-top: 10px;">
                                    <input type="text" class="input-md" id="input-peserta2" name="nama_peserta"  required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nama Peserta</label>
                                </div>
                                <div class="group">
                                    <input type="text" class="input-md" id="input-peserta2" name="email" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Email</label>
                                </div>
                                <div class="group">
                                    <input type="text" class="input-md" id="input-peserta2" name="no_hp" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nomor HP</label>
                                </div>
                                <div class="group">
                                    <select class="input-md" id="input-peserta2" name="asal_sekolah" required>
                                        <option disabled selected value>Asal Sekolah</option>
                                        <option value="SMAN 1 KOTA PROBOLINGGO">SMAN 1 KOTA PROBOLINGGO</option>
                                        <option value="SMAN 2 KOTA PROBOLINGGO">SMAN 2 KOTA PROBOLINGGO</option>
                                        <option value="SMAN 3 KOTA PROBOLINGGO">SMAN 3 KOTA PROBOLINGGO</option>
                                        <option value="SMAN 4 KOTA PROBOLINGGO">SMAN 4 KOTA PROBOLINGGO</option>
                                        <option value="SMKN 1 KOTA PROBOLINGGO">SMKN 1 KOTA PROBOLINGGO</option>
                                        <option value="SMKN 2 KOTA PROBOLINGGO">SMKN 2 KOTA PROBOLINGGO</option>
                                        <option value="SMKN 3 KOTA PROBOLINGGO">SMKN 3 KOTA PROBOLINGGO</option>
                                        <option value="SMKN 4 KOTA PROBOLINGGO">SMKN 4 KOTA PROBOLINGGO</option>
                                        <option value="MAN 1 KOTA PROBOLINGGO"> MAN 1 KOTA PROBOLINGGO</option>
                                        <option value="MAN 2 KOTA PROBOLINGGO"> MAN 2 KOTA PROBOLINGGO</option>
                                        <option value="SMA TARUNA DRA. ZULAEHA">SMA TARUNA DRA. ZULAEHA</option>
                                        <option value="SMAN 1 DRINGU">SMAN 1 DRINGU</option>
                                        <option value="SMAN 1 KRAKSAAN">SMAN 1 KRAKSAAN</option>
                                        <option value="SMA TUNAS LUHUR">SMA TUNAS LUHUR</option>
                                        <option value="SMAN 1 TONGAS">SMAN 1 TONGAS</option>
                                        <option value="SMAN 1 LECES">SMAN 1 LECES</option>
                                        <option value="SMAK MATER DEI">SMAK MATER DEI</option>
                                        <option value="MAN PAJARAKAN">MAN PAJARAKAN</option>
                                        <option value="SMAN 1 PAITON">SMAN 1 PAITON</option>
                                        <option value="SMAN 1 GENDING">SMAN 1 GENDING</option>
                                    </select>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                </div>
                                <div class="group">
                                    <input type="text" class="input-md" id="input-peserta2" name="kelas" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Kelas</label>
                                </div>
                                <button type="submit" class="btn btn-submit btn-peserta2" required>
                                    Submit
                                </button>
                            </form>

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
    <div class="container-fluid">
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

