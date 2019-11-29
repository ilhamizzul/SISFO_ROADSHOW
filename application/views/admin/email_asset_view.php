<div class="col-md-12">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Asset Email</h3><br>
        </div>

        <div class="panel-body">
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            <style>

                table {
                    margin: 0px auto;
                    background-color: white;
                    width: 600px;
                    padding: 0px;
                    border-collapse: collapse; }

                td {
                    padding-left: 4%;
                    margin: 0px; }

                .header {
                    width: 100%;
                    color: #af7bb5;
                    background-color: white; }
                .header a {
                    text-decoration: none; }
                .header a:hover {
                    color: #eaa2f0; }

                .title {
                    width: 60%; }

                .body {
                    width: 60%; }

                p {
                    margin-bottom: 25%;
                    font-size: 14px; }
                p span {
                    font-weight: bold;
                    font-size: 16px;
                    color: #af7bb5; }

                #line {
                    background-color: transparent; }

                .img-right {
                    width: 40%;
                    padding: 0px;
                    text-align: right; }

                .img-bottom {
                    width: 40%;
                    padding: 0px;
                    text-align: right;
                    vertical-align: bottom; }

                .footer {
                    width: 100%;
                    color: #af7bb5;
                    background-color: white; }
                .footer a {
                    text-decoration: none; }
                .footer a:hover {
                    color: #eaa2f0; }
            </style>
            <div class="panel" style="background-color: #8395a7">
                <table border="0" >
                    <!--header-->
                    <tr id="header">
                        <td class="header">
                            <a href=""><b><img src="http://funkyimg.com/i/2MMYc.png" style="height:40px; width:200px;"></b></a>
                        </td>
                        <td class="img-right" id="line" rowspan="2">
                            <img src="http://funkyimg.com/i/2MMTE.png" alt="">
                        </td>
                    </tr>
                    <!--title-->
                    <tr>
                        <td class="title">
                            <h2>Hello, User!</h2>
                        </td>
                    </tr>
                    <!--body-->
                    <tr>
                        <td class="body">
                            <p id="body">
                                Selamat Anda sudah terdaftar untuk mengikuti Try Out SMB Telkom University dengan nomor peserta <span>******</span>
                                <br><br>
                                Untuk mengingatkan, Try Out akan dilaksakan pada:
                                <br><br>
                                Hari, Tanggal: <span>Minggu, 06 Januari 2019</span>
                                <br>
                                Tempat: <span>SMAN 1 Kota Probolinggo</span>
                                <br><br>
                                Ruangan peserta akan di update pada website protect pada tanggal 5 Januari 2019.
                                <br><br>
                                Terimakasih.
                            </p>
                        </td>

                        <td class="img-bottom" rowspan="2">
                            <img src="http://funkyimg.com/i/2MMT7.png" alt="">
                        </td>
                    </tr>
                    <!--footer-->
                    <tr>
                        <td class="footer">
                            <a href="https://www.instagram.com/protect.telkom/?hl=en"><h5>@protect.telkom</h5></a>
                        </td>
                    </tr>

                </table>
            </div>
            
            <br>
            <div class="panel">
                <div class="panel-body">
                    <form class="form-tambah" method="POST" action="<?php echo base_url() ?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" style="color: #7f8c8d">Up Corner Image</label>
                                <input type="file" class="form-control" required name="up_img" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label class="control-label" style="color: #7f8c8d">Down Corner Image</label>
                                <input type="file" class="form-control" required name="down_img" placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" style="color: #7f8c8d">Try Out Location</label>
                                <input type="text" class="form-control" required name="location" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label class="control-label" style="color: #7f8c8d">Try Out Due Date</label>
                                <input type="date" class="form-control" required name="duedate" placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <center>
                                <button type="submit" style="width: 50%" class="btn btn-md btn-info">Update</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
