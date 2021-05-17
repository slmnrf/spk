<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <!-- /.card -->

        <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tabelRekap" class="table table-bordered table-striped">
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
        <div class="row no-print">
            <div class="col-12">
            <a href="ranking/penilaian" id="loading" rel="noopener" class="btn btn-danger"><i class="fas fa-recycle"></i> Buat Ranking</a> &nbsp;
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h4 class="modal-title">Detail Nilai Guru</h4>
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
                            <dt class="col-sm-4">NIP</dt>
                            <dd class="col-sm-8">:&nbsp;<span id="detailNip"></span></dd>
                            <dt class="col-sm-4">Nama Guru</dt>
                            <dd class="col-sm-8">:&nbsp;<span id="detailNamaGuru"></span></dd>
                            <dt class="col-sm-4">Mapel</dt>
                            <dd class="col-sm-8">:&nbsp;<span id="detailMapel"></span></dd>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Penilaian :</label>
                            <div id="divketnilai"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
function detailGuru(nip) {
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>Ranking/detailGuru',
        data: '&nip=' + nip,
        success: function (data) {
            var json = data,
                    obj = JSON.parse(json);
            $("#detailNip").html(obj.nip);
            $("#detailNamaGuru").html(obj.namaLengkap);
            $("#detailMapel").html(obj.mapel);
    }
    });

    $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>Ranking/ketnilai',
        data: '&nip=' + nip,
        success: function (data) {
            var json = data,
                    obj = JSON.parse(json);
            $("#divketnilai").text("");
            for(var i = 0; i< obj.length; i++){
                kolom = '<div class="input-group mb-4">';   
                kolom += '<input type="text" class="form-control" value='+obj[i].namaKriteria+'>';
                kolom += '<div class="input-group-prepend">';
                kolom += '<button type="button" class="btn btn-default">'+obj[i].subKriteria+'</button>';
                kolom += '</div>';
                kolom += '</div>';
                $("#divketnilai").append(kolom);
            }
        }
    });
}
</script>