<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | Roadshow</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="theme-color" content="#303441"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/morris.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>assets/img/favicon.png">





    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-admin.css">


    <!-- DATA TABLE BLM BS BEKERJA -->
</head>

<body>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href=""><b>RoadShow<?php echo date('Y') ?></b></a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span>
                                <?php
                                    if ($this->session->userdata('status') == 'super_admin') {
                                        echo 'Super Admin';
                                    } else {
                                        echo $this->session->userdata('status');
                                    }
                                    

                                ?>
                            </span> 
                            <i class="icon-submenu lnr lnr-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url() ?>login/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li>
                        <a href="<?php echo base_url() ?>dashboard" class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>">
                            <i class="lnr lnr-home"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>data_peserta" class="<?php if($this->uri->segment(1)=="data_peserta"){echo "active";}?>">
                            <i class="lnr lnr-users"></i> <span>Data Peserta</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>data_ruangan" class="<?php if($this->uri->segment(1)=="data_ruangan"){echo "active";}?>"><i class="lnr lnr-database"></i> <span>Data Ruangan</span>
                        </a>
                    </li>
                    <!--<li>
                        <a href="<?php /*echo base_url() */?>data_ruangan_peserta" class="<?php /*if($this->uri->segment(1)=="data_ruangan_peserta"){echo "active";}*/?>">
                            <i class="lnr lnr-apartment"></i> <span>Data Ruangan Peserta</span>
                        </a>
                    </li>-->
                    <li>
                        <a href="<?php echo base_url() ?>data_nomor_peserta" class="<?php if($this->uri->segment(1)=="data_nomor_peserta"){echo "active";}?>">
                            <i class="lnr lnr-list"></i> <span>Data Nomor Peserta</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>data_dokumen_soal" class="<?php if($this->uri->segment(1)=="data_dokumen_soal"){echo "active";}?>">
                            <i class="lnr lnr-file-empty"></i> <span>Dokumen Soal</span>
                        </a>
                    </li>
                    <?php
                        if ($this->session->userdata('status') == 'super_admin') {
                            echo '
                                <li>
                                    <a href="'.base_url().'data_admin" class="';
                                    if($this->uri->segment(1)=="data_admin"){echo "active";};
                                    echo '">
                                        <i class="lnr lnr-user"></i> <span>Data Admin</span>
                                    </a>
                                </li>
                                <li class="btn-danger btn" type="button" data-toggle="modal" data-target="#modalRecap">
                                    <a class="';
                                    if($this->uri->segment(1)=="data_admin"){echo "active";};
                                    echo '">
                                        <i class="lnr lnr-file-empty"></i> <span>RECAP ALL DATA</span>
                                    </a>
                                </li>
                            ';
                        }
                    ?>   
                </ul>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- NOTIFICATION -->
                <?php 
                    $success = $this->session->flashdata('success');
                    $failed = $this->session->flashdata('failed');

                    if (!empty($failed)) {
                        echo '
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class="fa fa-times-circle"></i> '.$failed.'
                            </div>
                        ';
                    }

                    if (!empty($success)) {
                        echo '
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class="fa fa-check-circle"></i> '.$success.'
                            </div>
                        ';
                    }
                ?>
                <!-- END NOTIFICATION -->
                <!-- OVERVIEW -->
                    <?php 
                        $this->load->view($main_view);
                     ?>
                <!-- END OVERVIEW -->
                <div id="modalRecap" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body">
                                <center>
                                <h4>
                                    Apakah Anda Yakin?
                                </h4>
                                <h5>
                                    Setelah anda menyetujui ini, anda tidak bisa menginput data lagi hingga event mendatang.
                                </h5>
                                </center>
                            </div>
                            <div class="modal-footer">
                                <a href="<?php echo base_url() ?>Dashboard/recap_all_data" class="btn btn-danger">YA</a>
                                <a href="" class="btn btn-default" data-dismiss="modal">TIDAK</a>
                            </div>
                        </div>
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
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/klorofil-common.js"></script>
<script src="<?php echo base_url(); ?>assets/js/morris.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/raphael-min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<script>
    Morris.Bar({
      element: 'graph',
      data: <?php echo $recap_data;?>,
      xkey: 'tahun',
      ykeys: ['total_terdaftar', 'total_hadir', 'total_tidak_hadir'],
      labels: ['total terdaftar', 'total hadir', 'total tidak hadir']
    });
</script>





<script src="<?php echo base_url();?>assets/js/jquery-datatable.js"></script>



<?php $this->load->view($JSON); ?>

<!-- DATA TABLE BLM BS BEKERJTA -->


</body>

</html>
