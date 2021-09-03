<section class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-12">
   
        <!-- Main content -->
        <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
            <h4>
                <img src="<?= base_url()?>/assets/gambar/logo_dashboard.png" alt="Logo" style="opacity: .8" height="50"> SMK Bina Umat Siwalan.
                <!-- <small class="float-right">Date: 2/10/2014</small> -->
            </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
            
            <address>
                
                Pecolotan, Rembun, Kec. Siwalan, Pekalongan, Jawa Tengah 51137<br>
                Telp : (0285)7941860<br>
                Email: smkbinaumatsiwalan@yahoo.co.id 
            </address>
            </div>
            <!-- /.col -->
            <!-- <div class="col-sm-8 invoice-col">
                <h1 class="text-right">Tabel Perangkingan Guru Teladan</h1><br>
            </div> -->
            <!-- /.col -->
            
            <!-- /.col -->
        </div>
        <hr>
        <div class="row text-center">
            <div class="col-sm-12 invoice-col">
                <h6><p>Laporan hasil perangkingan guru terbaik</p></h6>
                <h6><b>SMK Bina Umat Siwalan</b></h6>
            </div>
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
            <!-- <strong>Hasil Rangking</strong><br> -->
            <table class="table table-striped">
                <tr class="active">
                    <th class="text-center">No</th>
                    <?php
                    $no = 1;
                    $table = $this->page->getData('tableFinal');
                    foreach ($table as $item => $value) {
                        foreach ($value as $heading => $itemValue) {
                            ?>
                            <th class="text-center"><?php echo $heading ?></th>
                            <?php
                        }
                        break;
                    }
                    ?>
                </tr>
                <?php
                foreach ($table as $item => $value) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $no ?></td>
                        <?php
                        foreach ($value as $itemValue) {
                            ?>
                            <td class="text-center"><?php echo $itemValue ?></td>
                            <?php
                        }
                        ?>
                    </tr>
                    <?php
                    $no++;
                }
                ?>
            </table>

            <!-- /.col -->
            <div class="row">
                <div class="col-sm-12 invoice-col">
                    <h6><p>Demikian pengumuman ini disampaikan dan untuk diketahui. Terimakasih</p></h6>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-8"></div>
                <?php 
                    $tgl = date("d-m-Y");
                ?>
                <div class="col-sm-4">
                    <h6 class="text-center">Pekalongan, <?= $tgl;?></h6>
                    <br><br><br><br>
                    <h6 class="text-center"><?= $this->session->userdata('namaLengkap');?></h6>
                </div>
            </div>

        </div>
        <!-- /.row -->
        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
            <!-- <a href="analisa/penilaian" rel="noopener" class="btn btn-warning"><i class="fas fa-edit"></i> Input Penilaian</a> &nbsp; -->
            <button onclick=print_out() class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</button>
            </div>
        </div>
        </div>
        <!-- /.invoice -->
    </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</section>

<script type='text/javascript'>
    function print_out(status){
        window.print();  
    }
</script>