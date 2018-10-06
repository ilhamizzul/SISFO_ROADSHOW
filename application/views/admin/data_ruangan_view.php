
<div class="col-md-12">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Ruangan</h3>
            <a class="btn btn-default">Tambah Ruangan</a>
        </div>

        <!--TOLONG NANTI TAMBAHKAN PRINT-->




        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Letak Ruangan</th>
                    <th>Opsi</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>1</td>
                    <td>RDTO-1</td>
                    <td>XII IPS 4</td>
                    <td>
                        <a data-toggle="modal" data-target="#modalHapus" class="btn btn-danger">Hapus</a>
                        <a class="btn btn-default">Edit Letak Ruangan</a>
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