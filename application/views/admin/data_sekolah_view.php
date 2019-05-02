
                <div class="col-md-12">
                    <!-- TABLE HOVER -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Sekolah</h3><br>
                            <a data-toggle="modal" data-target="#modalTambah" class="btn btn-default">Tambah Sekolah</a>
                        </div>

                        <!--TOLONG NANTI TAMBAHKAN PRINT-->

                        <div class="panel-body table-responsive">
                            <table class="display table table-hover dataTable js-exportable" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Sekolah</th>
                                        <th>Alamat Sekolah</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        if ($data_sekolah != NULL) {
                                            $no = 1;
                                            foreach ($data_sekolah as $data) {
                                                echo '
                                                    <tr>
                                                        <td>'.$no++.'</td>
                                                        <td><a href="'.base_url().'Data_sekolah/data_per_sekolah/'.$data->id_sekolah.'/'.$data->nama_sekolah.'">'.$data->nama_sekolah.'</a></td>
                                                        <td>'.$data->alamat_sekolah.'</td>
                                                        <td>
                                                            <a data-toggle="modal" data-target="#modalHapus" onclick="delete_sekolah('.$data->id_sekolah.')" class="btn btn-danger">Hapus</a>';
                                                            // if ($data->status_absen == 'tidak_hadir') {
                                                            //     echo '<a data-toggle="modal" data-target="#modalEditStatus" onclick="update_absen('.$data->id_peserta.')" class="btn btn-default">Absen</a>';
                                                            // };
                                                        echo'</td>
                                                    </tr>
                                                ';
                                            }
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
                    Apakah Anda Yakin? <br>
                    Semua Data Siswa yang Berada dalam Sekolah <b id="nama_sekolah"></b> Ini Juga Akan Hilang
                </h4>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" id="delete_data_sekolah" class="btn btn-danger">YA</a>
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
                            <h3 class="panel-title">Tambah Sekolah</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-tambah" method="POST" action="<?php echo base_url() ?>Data_sekolah/tambah_data_sekolah/">
                                <div class="form-group">
                                    <input type="text" class="form-control" required name="nama_sekolah" placeholder="Nama Sekolah">
                                </div>
                                <div class="form-group">
                                    <textarea style="resize:vertical" class="form-control" placeholder="Alamat Sekolah. . ." name="alamat_sekolah" rows="4"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                <input type="button" value="TAMBAH" class="btn btn-default" id="add_data_sekolah">
            </div>
        </div>
    </div>
</div>

<!-- MODAL UBAH STATUS ABSEN -->
<div id="modalEditStatus" class="modal fade" role="dialog">
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
                    Ubah Status Absen Atas Nama <b id="nama_peserta"></b>?
                </h4>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" id="edit_status_absen" class="btn btn-primary">YA</a>
                <a href="" class="btn btn-default" data-dismiss="modal">TIDAK</a>
            </div>
        </div>
    </div>
</div>