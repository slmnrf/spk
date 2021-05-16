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
            <a href="ranking/penilaian" rel="noopener" class="btn btn-danger"><i class="fas fa-recycle"></i> Buat Ranking</a> &nbsp;
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
    })
}
</script>