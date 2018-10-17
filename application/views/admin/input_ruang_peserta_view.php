
<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Tambah Peserta Ruangan</h3>
        </div>
        <div class="panel-body">
            <form action="<?php echo base_url();?>Data_ruangan_peserta/edit_ruangan/<?php echo $data_ruang->id_ruang?>" method="post" class="">
                <select name="id_peserta" id="id_peserta" class="form-control">
                    <?php
                    $no = 1;
                    foreach ($data_peserta as $data) {
                    echo '
                        <option value="'.$data->id_peserta.'">'.$data->nama_peserta.'   |   <span>     '.$data->asal_sekolah.'</span></option>
                    ';}
                    ?>
                </select>
                <br>
                <button class="btn btn-primary" type="submit">Tambah Peserta</button>
            </form>

        </div>
    </div>
</div>