<div class="col-md-12">
    <!-- TABLE HOVER -->
    <?php

    ?>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Peserta di Ruangan <?php echo $data_ruang->nama_ruang;?></h3>
            <br>
            <a class="btn btn-default" disabled=""><?php echo $data_ruang->letak_ruang;?></a>
            <?php
            if($this->uri->segment(3) != 1){
            echo '
                <a href="'.base_url().'Data_ruangan_peserta/input_ruangan_peserta/'.$data_ruang->id_ruang.'" class="btn btn-default" >Tambah Peserta</a>
                <a href="'.base_url().'Data_ruangan_peserta/absensi_peserta/'.$data_ruang->id_ruang.'" class="btn btn-default">Absen Peserta</a>
                ';
            }
            ?>
        </div>

        <!--TOLONG NANTI TAMBAHKAN PRINT-->

        <div class="panel-body table-responsive">
            <table class="display table table-hover dataTable js-exportable" id="dataTable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peserta</th>
                    <th>Nomor Peserta</th>
                    <th>Absensi Peserta</th>
                </tr>
                </thead>

                <tbody>

                <?php
                $no = 1;
                foreach ($data_peserta_ruang as $data) {
                    echo '
                        <tr>
                            <td>'.$no++.'</td>
                            <td>'.$data->nama_peserta.'</td>
                            <td>'.$data->nomor_peserta.'</td>
                            <td>'.$data->status_absen.'</td>
                        </tr>
                    ';
                }

                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

