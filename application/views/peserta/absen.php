<!doctype html>
<html lang="en">

<head>
    <title>Hello | Roadshow</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="theme-color" content="#B500D5"/>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 side-image">
                    <img src="<?php echo base_url();?>assets/img/win.svg" alt="">
                </div>
                <div class="col-md-6 panel-peserta">
                    <h3>Absensi Try Out Roadshow 2018</h3>
                    <div class="panel-body" id="panel-peserta">
                        <form action="<?php echo base_url();?>peserta/do_absen" method="post" class="form-peserta">
                            <div class="group">
                                <input type="text" class="input-md" id="input-peserta" name="input_nopes" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Masukkan Nomor Peserta</label>
                            </div>

                            <button type="submit" class="btn btn-submit btn-peserta">
                                Submit
                            </button>
                        </form>

                    </div>
                </div>
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
