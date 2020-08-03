<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <!-- /.card -->

        <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                <span class="fa fa-user-plus"> Tambah Data Guru</span>
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tabelGuru" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Lengkap</th>
                <th>Mata Pelajaran</th>
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
            <h4 class="modal-title">Input Data Guru</h4>
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
                    <label>NIP :</label>
                    <input type="text" class="form-control" id="nip" placeholder="Nomer Induk Pegawai" name="nip">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Lengkap :</label>
                        <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" placeholder="Masukan Nama Lengkap">
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
                            <input type="text" id="tanggalLahir" name="tanggalLahir" class="form-control datepickerku" placeholder="Tanggal Lahir" data-target="#tglLahir"/>
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
                        <option selected disabled>Pilih Satu</option>
                        <option value="L">Laki-laki</option>
                        <option value="p">Perempuan</option>
                    </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Mata Pelajaran :</label>
                    <select class="form-control" id="comboMapel" name="comboMapel">
                        <option selected disabled>Pilih Satu</option>   
                        <option value="mtk">MATEMATIKA</option>
                        <option value="bindo">BAHASA INDONESIA</option>
                        <option value="binggris">BAHASA INGGRIS</option>
                        <option value="ipa">IPA</option>
                        <option value="ips">IPS</option>
                    </select>
                    </div>
                    <!-- tempat block -->
                    <!-- <span id="blockBagian"></span> -->
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
            <h4 class="modal-title">Detail Data Guru</h4>
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
                    <label>NIP :</label>
                    <input type="text" class="form-control" id="detailNip" name="detailNip" readonly>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Lengkap :</label>
                        <input type="text" class="form-control" id="detailNamaLengkap" name="detailNamaLengkap" placeholder="Masukan Nama Lengkap">
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
                    <label>Mata Pelajaran :</label>
                    <div id="mapelEdit"></div>
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
                url:'<?php echo base_url();?>Guru/tambah',
                type:"POST", //method Submit
                data:new FormData(this), //penggunaan FormData
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function (cek) {
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
            });
        });
        });

function detailGuru(nip) {
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>Guru/detailGuru',
        data: '&nip=' + nip,
        success: function (data) {
            var json = data,
                    obj = JSON.parse(json);
            $("#detailNip").val(obj.nip);
            $("#detailNamaLengkap").val(obj.namaLengkap);
            $("#detailAlamat").val(obj.alamat);
            $("#detailTempatLahir").val(obj.tempatLahir);
            $("#detailTanggalLahir").val(obj.tanggalLahir);
    }
    }),

    $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>Guru/cmbJenisKelamin',
        data: '&nip=' + nip,
        dataType : 'html',
        success: function (data) {
            $('#jenisKelaminEdit').html(data);
        }
    }),

    $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>Guru/cmbMapel',
        data: '&nip=' + nip,
        dataType : 'html',
        success: function (data) {
            $('#mapelEdit').html(data);
        }
    })
}

$(document).ready(function(){
    $('#submitEdit').on('submit',function(e){
    e.preventDefault(); 
    $.ajax({
            url:'<?php echo base_url();?>Guru/editData',
            type:"POST", //method Submit
            data:new FormData(this), //penggunaan FormData
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function (cek) {
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
        }); 
});
});

function hapusData(nip){
        swal({
            title: "Oppss",
            text: "Yakin Ingin Menghapus?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonClass: 'btn-success',
            confirmButtonText: 'Yakin',
            cancelButtonText: 'Tidak',
        },
        function (isConfirm) {
            if(isConfirm){
                $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>guru/hapusData',
                data: '&nip=' + nip,
                success: function (data) {
                        swal({
                        title: "Yeah",
                        text: "Data Berhasil Dihapus !",
                        confirmButtonClass: 'btn-success',
                        confirmButtonText: 'Kembali',
                    },
                    function (isConfirm) {
                        if(isConfirm){
                          window.location.reload();
                        }
                    });
                    }
                })
            }
        });   
    }
</script>