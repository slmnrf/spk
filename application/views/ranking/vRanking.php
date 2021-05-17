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
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
            <strong>Tabel Nilai Awal</strong><br>
            <table class="table table-striped">
                <tr class="active">
                    <th class="text-center">No</th>
                    <?php
                    $no = 1;
                    $table = $this->page->getData('table1');
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
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
            <strong>Tabel Sesuai Sifat Cost / Benefit</strong><br>
            <table class="table table-striped">
                <tr class="active">
                    <th class="text-center">No</th>
                    <?php
                    $no = 1;
                    $table = $this->page->getData('table2');
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

            <div class="table-responsive ">
                    <table class="table table-bordered">
                        <tr class="active">
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Kriteria</th>
                            <th class="text-center">Sifat</th>
                            <th class="text-center">Nilai min /max</th>
                        </tr>
                        <?php
                        $dataSifat = $this->page->getData('dataSifat');
                        $no = 1;
                        foreach ($dataSifat as $item => $value) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no ?></td>
                                <td class="text-center"><?php echo $item ?></td>
                                <td class="text-center"><?php echo $value->sifat ?></td>
                                <td class="text-center">
                                    <?php
                                    $valueMinMax = $dataSifat = $this->page->getData('valueMinMax');
                                    if (isset($valueMinMax['min' . $item])) {
                                        echo $valueMinMax['min' . $item] . ' - Minimal';
                                    }
                                    if (isset($valueMinMax['max' . $item])) {
                                        echo $valueMinMax['max' . $item] . ' - Maksimal';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
            <strong>Tabel Dikali Dengan Bobot</strong><br>
            <table class="table table-striped">
                <tr class="active">
                    <th class="text-center">No</th>
                    <?php
                    $no = 1;
                    $table = $this->page->getData('table3');
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

            <div class="table-responsive ">
                <table class="table table-bordered">
                    <tr class="active">
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Kriteria</th>
                        <th class="text-center">Bobot</th>
                    </tr>
                    <?php
                    $bobot = $this->page->getData('bobot');
                    $no = 1;
                    foreach ($bobot as $item => $value) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no ?></td>
                            <td class="text-center"><?php echo $value->namaKriteria ?></td>
                            <td class="text-center"><?php echo $value->bobot ?></td>

                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
            <strong>Tabel Hasil Guru dan di dapat hasil rangking</strong><br>
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

            <?php
            $table = $this->page->getData('tableFinal');
            foreach ($table as $item => $value) {
                if ($value->Rangking == 1) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <h4><b>Kesimpulan : </b> Dari hasil perhitungan yang dilakukan menggunakan metode SAW
                            guru terbaik untuk di pilih adalah
                            <?php echo $value->Guru ?> dengan nilai <?php echo $value->Total ?>
                        </h4>
                    </div>
                    <?php
                }
            }
            ?>
            <!-- /.col -->
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
    function print_out(status) {
        window.print();   
    }
</script>