<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <!-- /.card -->

        <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                <span class="fa fa-user-plus"> Tambah Data Karyawan</span>
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tabelKaryawan" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Departement</th>
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
<script type="text/javascript">
$(document).ready(function(){
    $('#submit').on('submit',function(e){
    e.preventDefault(); 
            $.ajax({
                url:'<?php echo base_url();?>Karyawan/tambah',
                type:"POST", //method Submit
                data:new FormData(this), //penggunaan FormData
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function (cek) {
                if (cek == 0){
                    swal("Sorry", "Gagal Upload", "warning");
                    }else{
                    swal({
                        title: "Yeah",
                        text: "Tambah Data Sukses !",
                        type: "success",
                        confirmButtonClass: 'btn-success',
                        confirmButtonText: 'Ok',
                    },
                    function (isConfirm){
                        if(isConfirm){
                            window.location.reload();
                        }
                    });
                }
        }
    });
});
});

function detailKaryawan(nik) {
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>Karyawan/detailKaryawan',
        data: '&nik=' + nik,
        success: function (data) {
            var json = data,
                    obj = JSON.parse(json);
            $("#detailNik").val(obj.nik);
            $("#detailNamaLengkap").val(obj.namaLengkap);
            $("#detailAlamat").val(obj.alamat);
            $("#detailTempatLahir").val(obj.tempatLahir);
            $("#detailTanggalLahir").val(obj.tanggalLahir);
            $("#detailTanggalMasuk").val(obj.tanggalMasuk);
            $("#detailprev").html(obj.foto);

            if(obj.statusKaryawan == "magang"){
                $('#detailRangeDate').show();
                status = '<div class="col-sm-6">';
                status +=   '<div class="form-group">';
                status +=       '<label>Mulai Tanggal :</label>';
                status +=       '<div class="input-group date" id="detailtglMulai" data-target-input="nearest">';
                status +=           '<input type="text" id="detailTanggalMulai" name="detailTanggalMulai" class="form-control datetimepicker-input" data-target="#detailtglMulai"/>';
                status +=           '<div class="input-group-append" data-target="#detailtglMulai" data-toggle="datetimepicker">';
                status +=               '<div class="input-group-text"><i class="fa fa-calendar"></i></div>';
                status +=           '</div>';
                status +=       '</div>';
                status +=   '</div>';
                status += '</div>';

                status += '<div class="col-sm-6">';
                status +=   '<div class="form-group">';
                status +=       '<label>Habis Tanggal :</label>';
                status +=           '<div class="input-group date" id="detailtglHabis" data-target-input="nearest">';
                status +=               '<input type="text" id="detailTanggalHabis" name="detailTanggalHabis" class="form-control datetimepicker-input" data-target="#detailtglHabis"/>';
                status +=               '<div class="input-group-append" data-target="#detailtglHabis" data-toggle="datetimepicker">';
                status +=                   '<div class="input-group-text"><i class="fa fa-calendar"></i></div>';
                status +=               '</div>';
                status +=           '</div>';
                status +=   '</div>';
                status += '</div>';
            }else{
                $('#detailRangeDate').hide();
            }
            $('#detailRangeDate').html(status);
            $('#detailtglMulai').datetimepicker({
                format: 'DD-MM-YYYY'
            });
            $('#detailtglHabis').datetimepicker({
                format: 'DD-MM-YYYY'
            });
            $("#detailTanggalMulai").val(obj.mulaiTanggal);
            $("#detailTanggalHabis").val(obj.habisTanggal);
    }
    }),

    $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>Karyawan/cmbJenisKelamin',
        data: '&nik=' + nik,
        dataType : 'html',
        success: function (data) {
            $('#jenisKelaminEdit').html(data);
        }
    }),

    $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>Karyawan/cmbDepartement',
        data: '&nik=' + nik,
        dataType : 'html',
        success: function (data) {
            $('#departementEdit').html(data);
        }
    }),

    $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>Karyawan/cmbStatus',
        data: '&nik=' + nik,
        dataType : 'html',
        success: function (data) {
            $('#statusEdit').html(data);
        }
    });
}

function readURL(input) {
if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $('#prev_foto').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
}
}
function readURLedit(input) {
if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $('#detailprev_foto').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
}
}

$(document).ready(function(){
    $('#submitEdit').on('submit',function(e){
    e.preventDefault(); 
    $.ajax({
            url:'<?php echo base_url();?>Karyawan/editData',
            type:"POST", //method Submit
            data:new FormData(this), //penggunaan FormData
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function (cek) {
            if (cek == 0){
                swal("Sorry", "Gagal Upload", "warning");
                }else{
                swal({
                    title: "Yeah",
                    text: "Tambah Data Sukses !",
                    type: "success",
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'Ok',
                },
                function (isConfirm){
                    if(isConfirm){
                        window.location.reload();
                    }
                });
            }
            }
        }); 
});
});
</script>