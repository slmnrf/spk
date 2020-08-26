<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-success" data-toggle="modal" data-target="#modal-tambahData">
                        <span class="fa fa-user-plus"> Tambah Data Kriteria</span>
                    </button>
                </div>
                <div class="card-body">
                    <table id="tabelKriteria" class="table table-bordered table-striped">
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
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tambahData">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Data Kriteria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formInput">
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
                                    <input class="form-check-input" type="radio" name="sifat" value="b" checked>
                                    <label class="form-check-label">Benefit</label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" value="c" name="sifat">
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
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-lihatData">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title">Data Kriteria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="callout callout-info">
                        <dl class="row">
                            <!-- <h5>Kriteria</h5> -->
                            <dt class="col-sm-4">Kode Kriteria</dt>
                            <dd class="col-sm-8">:&nbsp;<span id="lihatKdKriteria"></span></dd>
                            <dt class="col-sm-4">Nama Kriteria</dt>
                            <dd class="col-sm-8">:&nbsp;<span id="lihatNamaKriteria"></span></dd>
                            <dt class="col-sm-4">Sifat</dt>
                            <dd class="col-sm-8">:&nbsp;<span id="lihatSifat"></span></dd>
                            <dt class="col-sm-4">Bobot</dt>
                            <dd class="col-sm-8">:&nbsp;<span id="lihatBobot"></span></dd>
                        </dl>
                    </div>
                    <div class="callout callout-info">
                        <dl class="row">
                            <dt class="col-sm-4">Item Kriteria 1</dt>
                            <dd class="col-sm-8">:&nbsp;<span id="lihatSubKritera0"></span>
                            <dt class="col-sm-4">Item Kriteria 2</dt>
                            <dd class="col-sm-8">:&nbsp;<span id="lihatSubKritera1"></span>
                            <dt class="col-sm-4">Item Kriteria 3</dt>
                            <dd class="col-sm-8">:&nbsp;<span id="lihatSubKritera2"></span>
                            <dt class="col-sm-4">Item Kriteria 4</dt>
                            <dd class="col-sm-8">:&nbsp;<span id="lihatSubKritera3"></span>
                            <dt class="col-sm-4">Item Kriteria 5</dt>
                            <dd class="col-sm-8">:&nbsp;<span id="lihatSubKritera4"></span>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-editKriteria">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title text-white">Edit Kriteria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditKriteria">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Kriteria :</label>
                                <input type="text" class="form-control" id="eKriteria" name="eKriteria" placeholder="Kode Kriteria" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nama Kriteria :</label>
                                <input type="text" class="form-control" id="eNamaKriteria" name="eNamaKriteria" placeholder="Nama Kriteria">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kriteria :</label>
                                <div class="form-check" id="eRadio">
                                    <input class="form-check-input" type="radio" name="eSifat" value="b" checked>
                                    <label class="form-check-label">Benefit</label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" value="c" name="eSifat">
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
                                <input type="text" class="form-control" id="eBobot" name="eBobot" placeholder="Bobot Kriteria">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="submitEdit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-editSubKriteria">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Data Kriteria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formSubKriteria">
                    <div class="card-body">
                    <input type="hidden" id="hiddenkdkriteria" name="hiddenkdkriteria"></input>
                        <div class="callout callout-info">
                            <dl class="row">
                                <dt class="col-sm-4">Kode Kriteria</dt>
                                <dd class="col-sm-8">:&nbsp;<span id="esKdKriteria"></span></dd>
                                <dt class="col-sm-4">Nama Kriteria</dt>
                                <dd class="col-sm-8">:&nbsp;<span id="esNamaKriteria"></span></dd>
                                <dt class="col-sm-4">Sifat</dt>
                                <dd class="col-sm-8">:&nbsp;<span id="esSifat"></span></dd>
                                <dt class="col-sm-4">Bobot</dt>
                                <dd class="col-sm-8">:&nbsp;<span id="esBobot"></span></dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Item Kriteria :</label>
                                <div class="input-group mb-3">
                                    <input type="hidden" id="kdsub0" name="kdsub0"></input>
                                    <input type="text" class="form-control" id="esItemKriteria0" name="esItemKriteria0">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-default">Value : 1</button>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="hidden" id="kdsub1" name="kdsub1"></input>
                                    <input type="text" class="form-control" id="esItemKriteria1" name="esItemKriteria1">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-success">Value : 2</button>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="hidden" id="kdsub2" name="kdsub2"></input>
                                    <input type="text" class="form-control" id="esItemKriteria2" name="esItemKriteria2">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-info">Value : 3</button>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="hidden" id="kdsub3" name="kdsub3"></input>
                                    <input type="text" class="form-control" id="esItemKriteria3" name="esItemKriteria3">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-warning">Value : 4</button>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="hidden" id="kdsub4" name="kdsub4"></input>
                                    <input type="text" class="form-control" id="esItemKriteria4" name="esItemKriteria4">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-danger">Value : 5</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>

</section>
<!-- /.content -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#formInput').on('submit',function(e){
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

$(document).ready(function(){
    $('#formEditKriteria').on('submit',function(e){
    e.preventDefault(); 
            $.ajax({
                url:'<?php echo base_url();?>Kriteria/update',
                type:"POST", //method Submit
                data:new FormData(this), //penggunaan FormData
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function (cek) {
                    swal({
                        title: "Yeah",
                        text: "Update Data Sukses !",
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

    $(document).ready(function(){
        $('#formSubKriteria').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url :'<?php echo base_url()?>Kriteria/updatesubkriteria',
                type : 'POST',
                data :new FormData(this),
                processData : false,
                contentType : false,
                cache : false,
                async : false,
                success : function(cek){
                    swal({
                        title : "Yeahhh",
                        text : "Data berhasil diperbarui",
                        type : "success",
                        confirmButtonClass : 'btn-success',
                        confirmButtonText : 'Ok',
                    },
                    function (isConfirm){
                        if(isConfirm){
                            window.location.reload();
                        }
                    });
                }
            });
        })
    });

function detailItemSubKriteria(kdKriteria){
    $.ajax({
        type : 'GET',
        url : '<?php echo base_url()?>kriteria/detailKriteria',
        data : '&kdKriteria=' + kdKriteria,
        success : function (data){
            $('#esKdKriteria').html(kdKriteria);  
            $('#hiddenkdkriteria').val(kdKriteria);  
            var ketsifat = "";
            var obj = JSON.parse(data);
            for(var i = 0; i<=obj.length; i++){
                if(obj[i].sifat == "b"){
                    ketsifat = "Benefit";
                }else{
                    ketsifat = "Cost";
                }
                $('#esNamaKriteria').html(obj[i].namaKriteria);
                $('#esBobot').html(obj[i].bobot);
                $('#esSifat').html(ketsifat);
                $("#esItemKriteria"+[i]).val(obj[i].subKriteria);
                $("#kdsub"+[i]).val(obj[i].kdSubKriteria);
            }
        }
    });
}


function detailKriteria(kdKriteria) {
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>kriteria/detailKriteria',
        data: '&kdKriteria=' + kdKriteria,
        success: function (data) {
            $("#lihatKdKriteria").html(kdKriteria);
            var ketsifat = "";
            obj = JSON.parse(data);
            for(i=0; i<=obj.length; i++){
                if(obj[i].sifat == "b"){
                    ketsifat = "Benefit";
                }else{
                    ketsifat = "Cost";
                }
            $("#lihatNamaKriteria").html(obj[i].namaKriteria);
            $("#lihatSifat").html(ketsifat);
            $("#lihatBobot").html(obj[i].bobot);
            $("#lihatSubKritera"+[i]).html(obj[i].subKriteria);
            }
    }
    });
}

function detailItemKriteria(kdKriteria){
    $.ajax({
        type : 'GET',
        url : '<?php echo base_url()?>kriteria/detailKriteria',
        data : '&kdKriteria=' + kdKriteria,
        success: function (data){
            var obj = JSON.parse(data);
            $('#eKriteria').val(kdKriteria);
            for(var i = 0; i<=obj.length; i++){
                if(obj[i].sifat == "b"){
                    $('#eRadio').find(':radio[name=eSifat][value="b"]').prop('checked', true);
                }else{
                    $('#eRadio').find(':radio[name=eSifat][value="c"]').prop('checked', true);
                }
                $('#eNamaKriteria').val(obj[i].namaKriteria);
                $('#eBobot').val(obj[i].bobot);
            }
        }
    });
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

function hapusData(kdKriteria){
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
                url: '<?php echo base_url() ?>kriteria/delete',
                data: '&kdKriteria=' + kdKriteria,
                success: function (cek) {
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
                });
            }
        });   
    }
</script>