
<div class="col-md-6">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Nomor Peserta (Non Active)</h3><br>
            <a href="<?php base_url();?>Data_nomor_peserta/input_nomor_peserta" class="btn btn-default">Tambah Nomor Peserta</a>
        </div>

        <!--TOLONG NANTI TAMBAHKAN PRINT-->
        <div class="panel-body table-responsive">
            <table class="display table table-hover dataTable js-exportable" id="dataTable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Peserta</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
                </thead>

                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($data_nomor_peserta_non_active as $data) {
                            echo '
                                <tr>
                                    <td>'.$no++.'</td>
                                    <td>'.$data->nomor_peserta.'</td>
                                    <td>'.$data->status.'</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalHapus" onclick="delete_nomor_peserta('.$data->id_nmr.')" class="btn btn-danger">Hapus</a>
                                        <!--<a class="btn btn-default">Aktifasi</a>-->
                                    </td>
                                </tr>                
                            ';
                        }
                    ?>
                

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-6">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Nomor Peserta (Active)</h3><br>
        </div>

        <!--TOLONG NANTI TAMBAHKAN PRINT-->
        <div class="panel-body table-responsive">
            <table class="display table table-hover dataTable js-exportable" id="dataTable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Peserta</th>
                    <th>Status</th>
                </tr>
                </thead>

                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($data_nomor_peserta_active as $data) {
                            echo '
                                <tr>
                                    <td>'.$no++.'</td>
                                    <td>'.$data->nomor_peserta.'</td>
                                    <td>'.$data->status.'</td>
                                </tr>                
                            ';
                        }
                    ?>
                

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal HAPUS -->
<div id="modalHapus" class="modal fade" role="dialog">
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
                </center>
            </div>
            <div class="modal-footer">
                <a href="" id="delete_nmr_peserta" class="btn btn-danger">YA</a>
                <a href="" class="btn btn-default" data-dismiss="modal">TIDAK</a>
            </div>
        </div>
    </div>
</div>