<section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= $karyawan->jnik?></h3>

                    <p>Jumlah Karyawan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= $tetap->tetap?></h3>

                    <p>Jumlah Karyawan Tetap</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $magang->magang?></h3>

                    <p>Jumlah Karyawan Magang</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                </div>
            </div>
            </div>

            <div class="row">
                    <div class="col-md-6">
                        <div class="info-box mb-3 bg-warning">
                            <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Laki - Laki</span>
                                <span class="info-box-number"><?= $laki->laki?></span>
                            </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-6">
                        <div class="info-box mb-3 bg-success">
                            <span class="info-box-icon"><i class="far fa-heart"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Perempuan</span>
                                <span class="info-box-number"><?= $perempuan->perempuan?></span>
                            </div>
                        <!-- /.info-box-content -->
                        </div>
                    </div>
            </div>
            <!-- close row -->
            <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
        </section>