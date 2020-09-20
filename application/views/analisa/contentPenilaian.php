<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <!-- /.card -->

        <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tablepenilaian" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Lengkap</th>
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
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h4 class="modal-title">Form Penilaian Guru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="formPenilaian">
                <div class="card-body col-md-5">
                    <div class="callout callout-info">
                        <dl class="row">
                            <dt class="col-sm-4">NIP</dt>
                            <dd class="col-sm-8">:&nbsp;<span id="nip"></span></dd>
                            <dt class="col-sm-4">Nama Guru</dt>
                            <dd class="col-sm-8">:&nbsp;<span id="namaGuru"></span></dd>
                        </dl>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hover" id="tablenilai">
                    <thead class="bg-brown">
                        <tr>
                        <th class="text-center detail">KRITERIA</th>
                        <th colspan="5" class="text-center detail">NILAI</th>
                        </tr>
                    </thead>
                    <tbody>                                   
                    </tbody>
                </table>  
            </form>
        </div>
    </div>
</div>
</section>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
function ubah(nip){
    $.ajax({
        type: 'GET',
        url : '<?php echo base_url()?>analisa/ubah',
        data : '&nip=' + nip,
        success: function(data){
            var obj = JSON.parse(data);
            $("#nip").html(obj.nip);
            $("#namaGuru").html(obj.namaLengkap);
        }
    }),
    $.ajax({
        type : 'GET',
        url : '<?php echo base_url()?>analisa/kriteriatable',
        data : '&nip=' +nip,
        success: function(data){
            var obj = JSON.parse(data);
            $('#tablenilai >tbody').text('');
            var nama = "";
            for(var i = 0; i <= obj.length; i++) {
                    kolom = '<tr><td>'+obj[i].namaKriteria+'</td>';
                    for(var a=0;0<=obj.length;a++){
                    kolom += '<td><input type="radio">'+obj[a].subKriteria+'</input></td>';
                    }
                    kolom += '</tr>';
                $('#tablenilai >tbody').append(kolom);
            }
        }
    });
}
</script>