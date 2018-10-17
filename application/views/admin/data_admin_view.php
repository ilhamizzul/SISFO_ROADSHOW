
<div class="col-md-12">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Admin</h3><br>
            <a data-toggle="modal" data-target="#modalTambah" class="btn btn-default">Tambah Admin</a>
        </div>
        
        <div class="panel-body table-responsive">
            <table class="display table table-hover dataTable js-exportable" id="dataTable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
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
                                        <a data-toggle="modal" data-target="#modalHapus" class="btn btn-danger" onclick="delete_admin('.$data->id_admin.')">Hapus</a>
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
                    Apakah Anda Yakin Menghapus Admin Ini?
                </h4>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger" id="delete_data_admin">YA</a>
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
                        <form class="form-tambah" method="POST" action="<?php echo base_url() ?>Data_admin/tambah_admin">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="sekolah">
                                    <option><-- Asal Sekolah --></option>
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
                            </div>
                        </form>
                    </div>
                </div>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                <input type="button" value="TAMBAH" class="btn btn-default" id="tambah_admin" >
            </div>
        </div>
    </div>
</div>
