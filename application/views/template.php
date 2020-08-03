<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?= base_url()?>/assets/gambar/logo.png">
    <title>SMK BINA UMAT SIWALAN</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/css/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/css/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/css/summernote-bs4.min.css">
    <!-- sweetalert -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/sweetalert/sweetalert.css">
    <!-- Datatable -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
            </div>
        </div>
        </form>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
        <img src="<?= base_url()?>/assets/gambar/logo_dashboard.png" alt="Logo" style="opacity: .8">
        <!-- <span class="brand-text font-weight-light">Sistem Perpanjangan Kontrak Kerja PT. LOKATEX</span> -->
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2" id="menu">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-header">MENU UTAMA</li>
            <li class="nav-item has-treeview">
                <a href="<?= base_url('dashboard');?>" class="nav-link <?php if($this->uri->segment('1') == 'dashboard'){ echo "active";}?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="<?= base_url('guru');?>" class="nav-link <?php if($this->uri->segment('1') == 'guru'){ echo "active";}?>">
                <i class="nav-icon fas fa-male"></i>
                <p>
                    Data Guru
                </p>
                </a>
            </li>
            <li class="nav-item has-treeview <?php if($this->uri->segment('2') == 'inputpenilaian'){ echo "menu-open";}
                                                    if($this->uri->segment('2') == 'kriteria'){ echo "menu-open";}?>">
                <a href="#" class="nav-link <?php if($this->uri->segment('2') == 'inputpenilaian'){ echo "menu-open";}
                                                    if($this->uri->segment('2') == 'kriteria'){ echo "menu-open";}?>">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Analisa
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= base_url('analisa/inputpenilaian')?>" class="nav-link <?php if($this->uri->segment('2') == 'datakaryawan'){ echo "active";}?>">
                    <i class="nav-icon fas fa-calculator"></i>
                    <p>Input Penilaian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('analisa/kriteria')?>" class="nav-link <?php if($this->uri->segment('2') == 'kriteria'){ echo "active";}?>">
                    <i class="nav-icon fas fa-database"></i>
                    <p>Input Kriteria</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-header">LAIN-LAIN</li>
            <li class="nav-item">
                <a href="<?= base_url('kelolaakun');?>" class="nav-link <?php if($this->uri->segment('1') == 'kelolaakun'){ echo "active";}?>">
                <i class="nav-icon far fa-edit"></i>
                <p>
                    Kelola Akun
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a id="keluar" href="#" class="nav-link">
                <i class="nav-icon far fa-sign-out"></i>
                <p>
                    Keluar
                </p>
                </a>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-9">
                <h1 class="m-0 text-dark"><?php if($this->uri->segment('1') == 'dashboard'){ echo "Dashboard";}
                elseif($this->uri->segment('1') == 'karyawan'){ echo "Data Karyawan";}
                elseif($this->uri->segment('2') == 'datakaryawan'){ echo "Data Karyawan Magang";}?></h1>
            </div><!-- /.col -->
            <?php if($this->uri->segment('1') == 'dashboard'){ ?>
            <div class="col-sm-3 ">
                <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-user-circle"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Selamat Datang, <?= $this->session->userdata('namaLengkap');?></span>
                </div>
                </div>
            </div><!-- /.col -->
            <?php } ?>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->

        <!-- Main content -->
        <?php echo $contents;?>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <img src="<?= base_url()?>/assets/gambar/logo.png" width="22px">
        <strong>Sistem Perpanjangan Kontrak PT. LOKATEX.</strong>
    </footer>
    </div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url()?>assets/plugins/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url()?>assets/plugins/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>assets/plugins/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url()?>assets/plugins/js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url()?>assets/plugins/js/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url()?>assets/plugins/js/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url()?>assets/plugins/js/moment.min.js"></script>
<script src="<?= base_url()?>assets/plugins/js/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url()?>assets/plugins/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url()?>assets/plugins/js/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url()?>assets/plugins/js/jquery.overlayScrollbars.min.js"></script>
<!-- adminlte -->
<script src="<?= base_url()?>assets/plugins/js/adminlte.js"></script>
<!-- sweetalert -->
<script src="<?= base_url()?>assets/plugins/sweetalert/sweetalert.min.js"></script>
<!-- Datatable -->
<script src="<?= base_url()?>assets/plugins/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $('#menu').on('click', '#keluar', function () {
        swal({
            title: "Oppss",
            text: "Yakin Ingin Keluar ?",
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
                    url: '<?php echo base_url() ?>Auth/logout',
                    success: function (data) {
                        window.location.reload();
                    }
            })
        }
        });   
    });

</script>
<script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        });
    });
    $('#tglLahir').datetimepicker({
        format: 'DD-MM-YYYY'
    });
</script>
<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#tabelGuru').DataTable({ 

            "processing": true, 
            "serverSide": true, 
            "order": [], 
            
            "ajax": {
                "url": "<?php echo site_url('Guru/get_data_guru')?>",
                "type": "POST"
            },

            
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],

        });

    });

    var tableku;
    $(document).ready(function() {
        //datatables
        tableku = $('#tableMagang').DataTable({ 

            "processing": true, 
            "serverSide": true, 
            "order": [], 
            
            "ajax": {
                "url": "<?php echo site_url('Analisa/getDataKaryawanMagang')?>",
                "type": "POST"
            },
            
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],

        });

    });
</script>
</body>
</html>
