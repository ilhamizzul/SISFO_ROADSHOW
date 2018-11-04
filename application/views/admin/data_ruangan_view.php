
<div class="col-md-12">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Ruangan</h3><br>
            <a data-toggle="modal" data-target="#modalTambah"  class="btn btn-default">Tambah Ruangan</a>
        </div>

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
                            echo '<tr>
                                    <td>'.$no++.'</td>
                                    <td>'.$data->nama_ruang.'</td>
                                    <td>'.$data->letak_ruang.'</td>
                                    <td>
                                        ';if($data->id_ruang != 1){
                                                echo '
                                                <a href="Data_ruangan_peserta/data_peserta/'.$data->id_ruang.'" class="btn btn-default">Lihat Daftar Peserta</a>
                                                <button type="button" data-toggle="modal" data-target="#modalEditLetak" onclick="edit_ruang('.$data->id_ruang.')" class="btn btn-primary">Edit Letak Ruangan</button>
                                                <button type="button" data-toggle="modal" data-target="#modalHapus" onclick="delete_ruang('.$data->id_ruang.')" class="btn btn-danger">Hapus</button>';
                                            }else{
                                                echo '<a href="Data_ruangan_peserta/get_data_by_id/'.$data->id_ruang.'" class="btn btn-default">Daftar Peserta Belum Memiliki Ruangan</a>';
                                            }'
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
                <a href="" id="delete_data_ruangan" class="btn btn-danger">YA</a>
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
                            <form class="form-tambah" method="post" action="<?php echo base_url() ?>Data_ruangan/tambah_ruangan" >
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama_ruang" placeholder="Nama Ruangan">        
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="letak_ruang" placeholder="Letak Ruangan">
                                </div>
                            </form>
                        </div>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                <input type="button" class="btn btn-default" value="TAMBAH" id="submit_data_ruangan" >
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDIT LETAK -->
<div id="modalEditLetak" class="modal fade" role="dialog">
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
                            <h3 class="panel-title">Edit Ruangan</h3>
                        </div>
                        <div class="panel-body">
                            <form id="form_edit" class="form-tambah" method="post" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control"name="nama_ruang" placeholder="Nama Ruangan">       
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"name="letak_ruang" placeholder="Letak Ruangan">
                                </div>
                                <button style="float: left;" type="submit" class="btn btn-default" id="submit_data_ruangan">Save</button>  
                                <a style="float: left;margin-left: 5px;"href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                            </form>
                        </div>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>