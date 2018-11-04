<div class="col-md-6">
   <!-- TABLE HOVER -->
   <div class="panel">
      <div class="panel-heading">
         <h3 class="panel-title">Data Peserta Tidak Hadir </h3>
      </div>
      <div class="panel-body table-responsive">
         <table class="display table table-hover" id="dataTable">
            <thead>
               <tr>
                  <th>Update Absen</th>
                  <th>Nama Peserta</th>
                  <th>Nomor Peserta</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $no = 1;
                  foreach ($data_peserta_non_hadir as $data) {
                      echo '
                        <tr id="">
                          <td><center><input type="checkbox" name="select_update[]" class="select_update" value="'.$data->id_peserta.'"></center></td>
                          <td>'.$data->nama_peserta.'</td>
                          <td>'.$data->nomor_peserta.'</td>
                        </tr>
                      ';
                  } 
                  ?>
            </tbody>
         </table>
         <br>
         <div class="col-md-12">
            <center>
                <input type="button" class="btn btn-md btn-primary" value="Update Absensi" id="edit_data">
            </center>
        </div>
      </div>
   </div>
</div>

<div class="col-md-6">
   <!-- TABLE HOVER -->
   <div class="panel">
      <div class="panel-heading">
         <h3 class="panel-title">Data Absensi Peserta Hadir </h3>
      </div>
      <div class="panel-body table-responsive">
         <table class="display table table-hover" id="dataTable">
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
                  foreach ($data_peserta_hadir as $data) {
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