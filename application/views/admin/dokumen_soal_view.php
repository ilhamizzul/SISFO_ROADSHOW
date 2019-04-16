<div class="col-md-10">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Dokumen Soal</h3><br>
            <a data-toggle="modal" data-target="#modalTambah" class="btn btn-info">Tambah Dokumen Soal</a>
        </div>

        <!--TOLONG NANTI TAMBAHKAN PRINT-->
        <div class="panel-body table-responsive">
            <table class="display table table-hover dataTable js-exportable" id="dataTable">
                <thead> 
                    <tr> 
                        <th class="col-md-1">No</th>
                        <th class="col-md-4">Nama Dokumen</th>
                        <th class="col-md-2">Tahun Dokumen</th>
                        <th class="col-md-5">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if ($dokumen_soal != NULL) {
                            $no = 1;
                            foreach ($dokumen_soal as $data) {
                                if ($data->tipe_dokumen_soal == 'jawaban') {
                                    $link = 'uploads/dokumen_soal/jawaban/';
                                } else {
                                    $link = 'uploads/dokumen_soal/soal/';
                                }
                                
                                echo '
                                    <tr>
                                        <td class="col-md-1">'.$no++.'</td>
                                        <td class="col-md-4"><a href="'.base_url().''.$link.''.$data->file_soal.'" target="blank">'.$data->nama_dokumen_soal.'</a></td>
                                        <td class="col-md-2">'.$data->tahun_dokumen_soal.'</td>
                                        <td class="col-md-5">
                                            <button type="button" data-toggle="modal" data-target="#modalHapus" onclick="delete_dokumen_soal('.$data->id_dokumen.')" class=" btn btn-danger btn-xs col-xs-2"><span class="glyphicon glyphicon-trash"></span></button>
                                            <button type="button" data-toggle="modal" data-target="#modalEdit" onclick="edit_dokumen_soal
                                            ('.$data->id_dokumen.')" class=" btn btn-warning btn-xs col-xs-2"><span class="glyphicon glyphicon-edit"></span></button>
                                        </td>
                                    </tr>
                                ';
                            }
                        } else {
                            echo '
                                <tr>
                                    <td colspan="4">
                                        <center>
                                            <img style="width:25%;height:auto" src="'.base_url().'assets/img/cry.png">
                                            <h2>Masih Belum Ada Dokumen~</h2>
                                        </center>
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

<div class="col-md-2">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Filter Dokumen</h3>
        </div>
        
        <!--TOLONG NANTI TAMBAHKAN PRINT-->
        <div class="panel-body">
            <form action="<?php echo base_url() ?>Data_dokumen_soal/filter_dokumen" method="post">
                <input type="radio" name="filter_dokumen" value="soal"> Soal <br>
                <input type="radio" name="filter_dokumen" value="jawaban"> Jawaban <br>
                <input type="radio" name="filter_dokumen" value="none"> None <br>
                <center><input type="submit" value="SUBMIT" class="btn btn-info"></center>
            </form>
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
                            <h3 class="panel-title">Tambah Dokumen</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-tambah" method="POST" action="<?php echo base_url() ?>Data_dokumen_soal/tambah_dokumen_soal/" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control" required name="nama_dokumen" placeholder="Nama Dokumen File">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="tipe_dokumen">
                                        <option><-- Tipe Dokumen Soal --></option>
                                        <option value="soal">Soal</option>
                                        <option value="jawaban">Jawaban</option>
                                    </select>    
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="tipe_soal">
                                        <option><-- Tipe Soal --></option>
                                        <option value="IPA">Ilmu Pengetahuan Alam</option>
                                        <option value="IPS">Ilmu Pengetahuan Sosial</option>
                                        <option value="MTK">Matematika</option>
                                        <option value="INDONESIA">Bahasa Indonesia</option>
                                        <option value="INGGRIS">Bahasa Inggris</option>
                                    </select>    
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" required name="file_soal">
                                </div>
                                <div class="form-group">
                                    <input type="number" maxlength="4" class="form-control" required name="tahun_dokumen_soal" placeholder="Tahun Soal">
                                </div>
                                <input type="submit" value="TAMBAH" class="btn btn-default" id="add_dokumen_soal">
                            </form>
                        </div>
                    </div>
                </center>
            </div>
            <!-- <div class="modal-footer">
                <a href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                <input type="button" value="TAMBAH" class="btn btn-default" id="add_dokumen_soal">
            </div> -->
        </div>
    </div>
</div>

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
                <a href="" id="delete_dokumen" class="btn btn-danger">YA</a>
                <a href="" class="btn btn-default" data-dismiss="modal">TIDAK</a>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah -->
<div id="modalEdit" class="modal fade" role="dialog">
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
                            <h3 class="panel-title">Edit Dokumen</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-tambah" method="POST" id="form_edit" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama_dokumen" value="" required name="nama_dokumen" placeholder="Nama Dokumen File">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="tipe_dokumen_soal" readonly="readonly" value="" required name="tipe_dokumen_soal">  
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="tipe_soal" readonly="readonly" value="" required name="tipe_soal">  
                                </div>
                                <div class="form-group col-md-6" style="padding-left: 0px;">
                                    <input type="file" class="form-control" name="file_soal">
                                </div>
                                <h6 class="col-md-6" id="nama_file">Nama File Sebelumnya</h6>
                                <div class="form-group">
                                    <input type="number" maxlength="4" id="tahun_dokumen_soal" class="form-control" required name="tahun_dokumen_soal" placeholder="Tahun Soal">
                                </div>
                                <input type="submit" value="UBAH" class="btn btn-default" id="edit_dokumen_soal">
                            </form>
                        </div>
                    </div>
                </center>
            </div>
            <!-- <div class="modal-footer">
                <a href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                <input type="button" value="TAMBAH" class="btn btn-default" id="add_dokumen_soal">
            </div> -->
        </div>
    </div>
</div>