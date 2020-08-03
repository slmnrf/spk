<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <!-- /.card -->

        <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                <span class="fa fa-user-plus"> Tambah Data Kriteria</span>
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tabelGuru" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Kriteria</th>
                <th>Sifat</th>
                <th>Bobot</th>
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
        <div class="modal-header bg-success">
            <h4 class="modal-title">Input Data Kriteria</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form id="submit">
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                    <label>Kriteria :</label>
                    <input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Nama Kriteria">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                <label>Kriteria :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sifat" id="sifat" value="benefit" checked>
                            <label class="form-check-label">Benefit</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" value="cost" name="sifat" id="sifat">
                            <label class="form-check-label">Cost</label>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                    <label>Bobot :</label>
                    <input type="text" class="form-control" id="bobot" name="bobot" placeholder="Bobot Kriteria">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                    <label>Item Kriteria :</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="v1" name="v1">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-default">Value : 1</button>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="v2" name="v2">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-success">Value : 2</button>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="v3" name="v3">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-info">Value : 3</button>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="v4" name="v4">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-warning">Value : 4</button>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="v5" name="v5">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-danger">Value : 5</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
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

<div class="modal fade" id="modal-editKriteria">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-warning">
            <h4 class="modal-title">Edit Data Kriteria</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form id="submit">
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                    <label>Kriteria :</label>
                    <input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Nama Kriteria">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                <label>Kriteria :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio1" value="benefit" checked>
                            <label class="form-check-label">Benefit</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" value="cost" name="radio1">
                            <label class="form-check-label">Cost</label>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                    <label>Bobot :</label>
                    <input type="text" class="form-control" id="bobot" name="bobot" placeholder="Bobot Kriteria">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                    <label>Item Kriteria :</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="editeditv1" name="editv1">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-default">Value : 1</button>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="editv2" name="editv2">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-success">Value : 2</button>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="editv3" name="editv3">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-info">Value : 3</button>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="editv4" name="editv4">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-warning">Value : 4</button>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="editv5" name="editv5">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-danger">Value : 5</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
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
</section>
<!-- /.content -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#submit').on('submit',function(e){
    e.preventDefault(); 
            $.ajax({
                url:'<?php echo base_url();?>Kriteria/tambah',
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