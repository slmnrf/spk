
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Akun</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Nama Lengkap</label>
                <input type="text" id="namaLengkap" name="namaLengkap" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputUsername">Username</label>
                <input type="text" id="username" name="username" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" id="password" name="password" class="form-control">
              </div>
              
              <div class="form-group">
                <label for="inputAkses">Role</label>
                <select id="inputAkses" class="form-control custom-select">
                  <option selected disabled>Pilih Satu</option>
                  <option value="KS">Kepala Sekolah</option>
                  <option value="G">Guru</option>
                </select>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Daftar Akun</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" id="tableakun">
              <?= $tabel;?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <button type="button" class="btn btn-primary" id="tambah" onclick="tambah()">Tambah</button>
        </div>
      </div>
    </section>
    <!-- /.content -->

    <script>
      function tambah() {
        var namaLengkap = $("#namaLengkap").val()
        var username = $("#username").val()
        var password = $("#password").val()
        var inputAkses = $("#inputAkses").val()
        $.ajax({
          type: 'GET',
          url: '<?php echo base_url() ?>Auth/tambahAkun',
          data: '&namaLengkap=' + namaLengkap + '&username=' + username + '&password=' + password + '&inputAkses=' + inputAkses,
          success: function (data) {
            swal({
                title: "Yeah",
                text: "Tambah Data Sukses !",
                type: "success",
                confirmButtonClass: 'btn-success',
                confirmButtonText: 'Ok',
            },
            function (isConfirm){
                if(isConfirm){
                    $('#tableakun').html(data);
                    $("#namaLengkap").val("");
                    $("#username").val("");
                    $("#password").val("");
                    $("#inputAkses").empty()
                }
            });
          }
          });
        }

    function hapus(no){
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
                url: '<?php echo base_url() ?>Auth/hapusAkun',
                data: '&no=' + no,
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
