<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | Roadshow</title>
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

<body>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href=""><b>RoadShow2018</b></a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
               <!--  <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button> -->
            </div>
            <div id="navbar-menu">
                <!-- <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Option</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url() ?>login"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                        </ul>
                    </li>
                </ul> -->
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->

    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- OVERVIEW -->
                    <?php 
                        $this->load->view($main_view);
                     ?>
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
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/chartist/js/chartist.min.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/klorofil-common.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/buttons.print.min.js"></script>



<script src="<?php echo base_url();?>assets/js/jquery-datatable.js"></script>

<?php $this->load->view($JSON); ?>

<!-- DATA TABLE BLM BS BEKERJTA -->


</body>

</html>
