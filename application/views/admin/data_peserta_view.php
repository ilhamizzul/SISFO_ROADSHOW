
                <div class="col-md-12">
                    <!-- TABLE HOVER -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Peserta</h3>
                            <a class="btn btn-default">Tambah Peserta</a>
                        </div>

                        <!--TOLONG NANTI TAMBAHKAN PRINT-->




                        <div class="panel-body table-responsive">
                            <table class="display table table-hover dataTable js-exportable" id="dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Peserta</th>
                                    <th>Nama Peserta</th>
                                    <th>Email</th>
                                    <th>Nomor Hp</th>
                                    <th>Asal Sekolah</th>
                                    <th>Kelas</th>
                                    <th>Ruang Try Out</th>
                                    <th>Status Absen</th>
                                    <th>Opsi</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>111111</td>
                                    <td>Andi Asandi</td>
                                    <td>andiasandi@gmail.com</td>
                                    <td>082232232232</td>
                                    <td>SMAN 2 Probolinggo</td>
                                    <td>XII IPA 2</td>
                                    <td></td>
                                    <td>tidak_hadir</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalHapus" class="btn btn-danger">Hapus</a>
                                        <a class="btn btn-default">Absen</a>
                                    </td>
                                </tr>

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
                <a href="" class="btn btn-danger">YA</a>
                <a href="" class="btn btn-default" data-dismiss="modal">TIDAK</a>
            </div>
        </div>
    </div>
</div>