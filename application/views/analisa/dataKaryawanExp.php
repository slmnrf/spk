
<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <!-- /.card -->

        <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tableMagang" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Habis</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h4 class="modal-title">Input Data Karyawan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form id="submit">
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                    <label>NIK :</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="<?= $autoNik;?>" readonly>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <img class="profile-user-img img-fluid img-square"
                        id="prev_foto" src="./assets/photo/default.jpg" width="100" height="100" alt="Preview Image">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Lengkap :</label>
                        <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" placeholder="Masukan Nama Lengkap">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Memilih Photo :</label>
                        <input type="file" id="file_gambar" name="file_gambar">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                    <label>Alamat :</label>
                    <textarea class="form-control" rows="5" id="alamat" name="alamat" placeholder="Masukan Alamat Lengkap Anda"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Tempat Lahir :</label>
                    <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir :</label>
                        <div class="input-group date" id="tglLahir" data-target-input="nearest">
                            <input type="text" id="tanggalLahir" name="tanggalLahir" class="form-control datepickerku" data-target="#tglLahir"/>
                            <div class="input-group-append" data-target="#tglLahir" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <!-- select -->
                    <div class="form-group">
                    <label>Jenis Kelamin :</label>
                    <select id="jenisKelamin" name="jenisKelamin" class="form-control">
                        <option value="L">Laki-laki</option>
                        <option value="p">Perempuan</option>
                    </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Departement :</label>
                    <select class="form-control" id="comboDepartement" name="comboDepartement">
                        <option value="spinning">Spinning</option>
                        <option value="weaving">Weaving</option>
                        <option value="finishing">Finishing</option>
                    </select>
                    </div>
                    <!-- tempat block -->
                    <!-- <span id="blockBagian"></span> -->
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tanggal Masuk :</label>
                        <div class="input-group date" id="tglMasuk"  data-target-input="nearest">
                            <input type="text" id="tanggalMasuk" name="tanggalMasuk" class="form-control datepickerku" data-target="#tglMasuk"/>
                            <div class="input-group-append" data-target="#tglMasuk" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Status Karyawan :</label>
                    <select class="form-control" id="comboStatus" name="comboStatus">
                        <option value="tetap">Tetap</option>
                        <option value="magang">Magang</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="row" id="rangeDate"></div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary" id="submit1">Simpan</button>
        </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h4 class="modal-title">Detail Data Karyawan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form id="submitEdit">
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                    <label>NIK :</label>
                    <input type="text" class="form-control" id="detailNik" name="detailNik" readonly>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <div id="detailprev"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Lengkap :</label>
                        <input type="text" class="form-control" id="detailNamaLengkap" name="detailNamaLengkap" placeholder="Masukan Nama Lengkap">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Memilih Photo :</label>
                        <input type="file" id="detailFile_gambar" name="detailFile_gambar">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                    <label>Alamat :</label>
                    <textarea class="form-control" rows="5" id="detailAlamat" name="detailAlamat" placeholder="Masukan Alamat Lengkap Anda"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Tempat Lahir :</label>
                    <input type="text" class="form-control" id="detailTempatLahir" name="detailTempatLahir" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir :</label>
                        <div class="input-group date" id="detailtglLahir" data-target-input="nearest">
                            <input type="text" id="detailTanggalLahir" name="detailTanggalLahir" class="form-control datepickerku" data-target="#detailtglLahir"/>
                            <div class="input-group-append" data-target="#detailtglLahir" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <!-- select -->
                    <div class="form-group">
                    <label>Jenis Kelamin :</label>
                    <div id="jenisKelaminEdit"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Departement :</label>
                    <div id="departementEdit"></div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tanggal Masuk :</label>
                        <div class="input-group date" id="detailtglMasuk"  data-target-input="nearest">
                            <input type="text" id="detailTanggalMasuk" name="detailTanggalMasuk" class="form-control datepickerku" data-target="#detailtglMasuk"/>
                            <div class="input-group-append" data-target="#detailtglMasuk" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Status Karyawan :</label>
                    <div id="statusEdit"></div>
                    </div>
                </div>
            </div>
            <div class="row" id="detailRangeDate"></div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary" id="submitEditButton">Ubah</button>
        </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
</section>
<!-- /.content -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
