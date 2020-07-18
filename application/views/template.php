<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

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

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">SPK</span>
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
                <a href="<?= base_url('karyawan');?>" class="nav-link <?php if($this->uri->segment('1') == 'karyawan'){ echo "active";}?>">
                <i class="nav-icon fas fa-male"></i>
                <p>
                    Data Karyawan
                </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Analisa
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/charts/chartjs.html" class="nav-link">
                    <i class="nav-icon fas fa-calculator"></i>
                    <p>Input Penilaian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/charts/flot.html" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>Lihat Data</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-header">LAIN-LAIN</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon far fa-edit"></i>
                <p>
                    Ubah Kata Sandi
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
                elseif($this->uri->segment('1') == 'karyawan'){ echo "Data Karyawan";}?></h1>
            </div><!-- /.col -->
            <div class="col-sm-3">
                <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-user-circle"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Selamat Datang, <?= $this->session->userdata('namaLengkap');?></span>
                </div>
                </div>
            </div><!-- /.col -->
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
        <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0-pre
        </div>
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

//     $('#comboDepartement').on('change', function(e){
//     $.ajax( {
//         success: function(html) {
//         // console_log(html);
//         var departement = $("#comboDepartement option:selected").attr("value");
//         $('#blockBagian').show();
//         if(departement == "finishing"){
//             status = '<button type="button" class="btn btn-block btn-success btn-lg">FINISHING</button>';
//         }else if(departement == "spinning"){
//             status = '<button type="button" class="btn btn-block btn-secondary btn-lg">SPINNING</button>';
//         }else{
//             status = '<button type="button" class="btn btn-block btn-primary btn-lg">WEAVING</button>';
//         }
//         $('#blockBagian').html(status);
//         }
//     });
// });

$('#comboStatus').on('change', function(e){
    $.ajax( {
        success: function(html) {
            var statusKaryawan = $("#comboStatus option:selected").attr("value");
            $('#rangeDate').show();
            if(statusKaryawan == "magang"){
                status = '<div class="col-sm-6">';
                status +=   '<div class="form-group">';
                status +=       '<label>Mulai Tanggal :</label>';
                status +=       '<div class="input-group date" id="tglMulai" data-target-input="nearest">';
                status +=           '<input type="text" id="tanggalMulai" name="tanggalMulai" class="form-control datetimepicker-input" data-target="#tglMulai"/>';
                status +=           '<div class="input-group-append" data-target="#tglMulai" data-toggle="datetimepicker">';
                status +=               '<div class="input-group-text"><i class="fa fa-calendar"></i></div>';
                status +=           '</div>';
                status +=       '</div>';
                status +=   '</div>';
                status += '</div>';

                status += '<div class="col-sm-6">';
                status +=   '<div class="form-group">';
                status +=       '<label>Habis Tanggal :</label>';
                status +=           '<div class="input-group date" id="tglHabis" data-target-input="nearest">';
                status +=               '<input type="text" id="tanggalHabis" name="tanggalHabis" class="form-control datetimepicker-input" data-target="#tglHabis"/>';
                status +=               '<div class="input-group-append" data-target="#tglHabis" data-toggle="datetimepicker">';
                status +=                   '<div class="input-group-text"><i class="fa fa-calendar"></i></div>';
                status +=               '</div>';
                status +=           '</div>';
                status +=   '</div>';
                status += '</div>';
            }else{
                $('#rangeDate').hide();
            }
            $('#rangeDate').html(status);
            $('#tglHabis').datetimepicker({
                format: 'DD-MM-YYYY'
            });
            $('#tglMulai').datetimepicker({
                format: 'DD-MM-YYYY'
            });
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
    $('#tglMasuk').datetimepicker({
        format: 'DD-MM-YYYY'
    });
    $('#tglLahir').datetimepicker({
        format: 'DD-MM-YYYY'
    });

    $(document).ready(function(){
        $('#file_gambar').change(function(){
            readURL(this);
        });
    });
</script>
<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#tabelKaryawan').DataTable({ 

            "processing": true, 
            "serverSide": true, 
            "order": [], 
            
            "ajax": {
                "url": "<?php echo site_url('Karyawan/get_data_karyawan')?>",
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
