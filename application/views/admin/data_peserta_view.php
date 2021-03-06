
                <div class="col-md-12">
                    <!-- TABLE HOVER -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Peserta</h3><br>
                            <a data-toggle="modal" data-target="#modalTambah" class="btn btn-default">Tambah Peserta</a>
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
                                        <th>Pilihan Soal</th>
                                        <th>Ruang Try Out</th>
                                        <!-- <th>Status Absen</th> -->
                                        <th>Opsi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        if ($data_peserta != NULL) {
                                            $no = 1;
                                            foreach ($data_peserta as $data) {
                                                echo '
                                                    <tr>
                                                        <td>'.$no++.'</td>
                                                        <td>'.$data->nomor_peserta.'</td>
                                                        <td>'.$data->nama_peserta.'</td>
                                                        <td>'.$data->email.'</td>
                                                        <td>'.$data->no_hp.'</td>
                                                        <td>'.$data->nama_sekolah.'</td>
                                                        <td>'.$data->pilihan_soal.'</td>
                                                        <td>'.$data->nama_ruang.'</td>
                                                        <!-- <td>'.$data->status_absen.'</td>-->
                                                        <td>
                                                            <a data-toggle="modal" data-target="#modalHapus" onclick="delete_peserta('.$data->id_peserta.')" class="btn btn-danger">Hapus</a>';
                                                            // if ($data->status_absen == 'tidak_hadir') {
                                                            //     echo '<a data-toggle="modal" data-target="#modalEditStatus" onclick="update_absen('.$data->id_peserta.')" class="btn btn-default">Absen</a>';
                                                            // };
                                                        echo'</td>
                                                    </tr>
                                                ';
                                            }
                                        } 
                                        // else {
                                        //     echo '
                                        //         <tr>
                                        //             <td colspan="9">
                                        //                 <center>
                                        //                     <img style="width:25%;height:auto" src="'.base_url().'assets/img/cry.png">
                                        //                     <h2>Masih Belum Ada Data Peserta~</h2>
                                        //                 </center>
                                        //             </td>
                                        //         </tr>  
                                        //     ';
                                        // }

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
                <a href="" id="delete_data_peserta" class="btn btn-danger">YA</a>
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
                            <h3 class="panel-title">Tambah Peserta</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-tambah" method="POST" action="<?php echo base_url() ?>Data_peserta/tambah_data_peserta/">
                                <div class="form-group">
                                    <input type="text" class="form-control" required name="nama_peserta" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="id_nmr">
                                        <option><-- Nomor Peserta --></option>
                                        <?php 
                                            foreach ($data_nomor_peserta as $data) {
                                                echo '
                                                    <option value="'.$data->id_nmr.'">'.$data->nomor_peserta.'</option>
                                                ';
                                            }
                                        ?>
                                    </select>   
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email">    
                                </div>
                                <div class="form-group">
                                    <input type="number" maxlength="14" class="form-control" required name="no_hp" placeholder="Nomor HP">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="asal_sekolah">
                                        <option value=""><-- Asal Sekolah --></option>
                                        
                                        <?php 
                                            foreach ($data_sekolah as $data) {
                                                echo '
                                                    <option value="'.$data->id_sekolah.'">'.$data->nama_sekolah.'</option>
                                                ';
                                            }
                                        ?>
                                    </select>    
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="pilihan_soal">
                                        <option><-- Pilihan Soal --></option>
                                        <option value="teknik">Teknik</option>
                                        <option value="non_teknik">Non Teknik</option>
                                    </select>   
                                </div>
                                <input type="hidden" name="ruang_ujian" value="1">
                            </form>
                        </div>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                <input type="button" value="TAMBAH" class="btn btn-default" id="add_data_peserta">
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