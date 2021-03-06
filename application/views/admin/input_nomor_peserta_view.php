<div class="col-md-6">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Input Nomor Peserta</h3>
        </div>
        <div class="panel-body">
            <input class="form-control input-md" id="nomor_peserta" maxlength="6" placeholder="Nomor Peserta (6 input)" type="text">
            <br>
            <!-- <a class="btn btn-primary">Tambah Input</a> -->
            <input type="button" class="btn btn-md btn-primary" value="Tambah Input" id="add_data">
        </div>
    </div>
</div>

<div class="col-md-6">
    <!-- TABLE HOVER -->
    <div class="panel panel-nomor-peserta">
        <div class="panel-heading">
            <h3 class="panel-title">Daftar Nomor Peserta</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive table-wrapper-scroll-y">
                <table class=" display table table-hover" id="table_data">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>Nomor Peserta</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
            
            <div class="col-md-12">
                <center>
                    <input type="button" class="btn btn-md btn-primary" value="TAMBAH DATA KE DATABASE" id="save_data">
                </center>
            </div>
        </div>
    </div>
</div>
