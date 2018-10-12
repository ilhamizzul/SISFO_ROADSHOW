
<div class="col-md-12">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Ruangan</h3><br>
            <a data-toggle="modal" data-target="#modalTambah"  class="btn btn-default">Tambah Ruangan</a>
        </div>

        <!--TOLONG NANTI TAMBAHKAN PRINT-->




        <div class="panel-body table-responsive">
            <table class="display table table-hover dataTable js-exportable" id="dataTable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Letak Ruangan</th>
                    <th>Opsi</th>
                </tr>
                </thead>

                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($data_ruangan as $data) {
                            echo '
                                <tr>
                                    <td>'.$no++.'</td>
                                    <td>'.$data->nama_ruang.'</td>
                                    <td>'.$data->letak_ruang.'</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalHapus" class="btn btn-danger">Hapus</a>
                                        <a class="btn btn-default">Edit Letak Ruangan</a>
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


<!-- modal HAPUS -->
<div id="modalHapus" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content panel">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <div class="modal-body panel-body">
                <center>
                <h4>
                    Apakah Anda Yakin?
                </h4>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger">YA</a>
                <a href="" class="btn btn-default" data-dismiss="modal">TIDAK</a>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah -->
<div id="modalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content panel">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <div class="modal-body panel-body">
                <center>
                <div class="panel panel-modal">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Tambah Ruangan</h3>
                                </div>
                                <div class="panel-body">
                                    <form class="form-tambah">
                                    <input type="text" class="form-control" placeholder="Nama Ruangan">
                                    <br>
                                    <input type="text" class="form-control" placeholder="Letak Ruangan">
                                    <br>    
                                    </form>
                                    
                                </div>
                </div>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger">Cancel</a>
                <a href="" class="btn btn-default" data-dismiss="modal">TAMBAH</a>
            </div>
        </div>
    </div>
</div>
