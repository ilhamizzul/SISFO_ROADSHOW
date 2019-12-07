<div class="col-md-12">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Asset Gambar</h3><br>
        </div>

        <div class="panel-body">
            <form class="form-tambah" method="POST" action="<?php echo base_url() ?>Data_peserta/tambah_data_peserta/">
            	<div class="panel">
					<div class="panel-body">
						<img src="http://funkyimg.com/i/2MMT7.png" alt="">
					</div>
				</div>
                <div class="form-group">
                    <input type="text" class="form-control" required name="nama_peserta" placeholder="Nama">
                </div>

                <input type="hidden" name="ruang_ujian" value="1">
            </form>
        </div>
    </div>
</div>
