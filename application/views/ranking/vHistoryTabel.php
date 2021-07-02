<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <!-- /.card -->

        <div class="card">
        
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tabelHistori" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
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
</section>
<!-- /.content -->
<script type='text/javascript'>
    function hapusData(dp){
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
                url: '<?php echo base_url() ?>Histori/hapusData',
                data: '&dp=' + dp,
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