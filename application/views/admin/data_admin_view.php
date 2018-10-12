
<div class="col-md-12">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Admin</h3><br>
            <a data-toggle="modal" data-target="#modalTambah" class="btn btn-default">Tambah Admin</a>
        </div>

        <!--TOLONG NANTI TAMBAHKAN PRINT-->




        <div class="panel-body table-responsive">
            <table class="display table table-hover dataTable js-exportable" id="dataTable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Passoword</th>
                    <th>Sekolah</th>
                    <th>Opsi</th>
                </tr>
                </thead>

                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($data_admin as $data) {
                            echo '
                                <tr>
                                    <td>'.$no++.'</td>
                                    <td>'.$data->username.'</td>
                                    <td>'.$data->password.'</td>
                                    <td>'.$data->sekolah.'</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalHapus" class="btn btn-danger">Hapus</a>
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
                                    <h3 class="panel-title">Tambah Admin</h3>
                                </div>
                                <div class="panel-body">
                                    <form class="form-tambah">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <br>
                                    <input type="password" class="form-control" placeholder="Password">
                                    <br>
                                    <select class="form-control">
                                        <option value="smasa">SMAN 1 Kota Probolinggo</option>
                                        <option value="smada">SMAN 2 Kota Probolinggo</option>
                                        <option value="bla">blablableble</option>
                                        <option value="bla">blablableble</option>
                                    </select>
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
