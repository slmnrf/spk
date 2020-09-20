<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <?php echo form_open('Analisa/insertNilai') ?>
    <div class="row">
    <div class="col-12">

        <div class="errors">
        <?php 
                if ($this->session->flashdata('errors')) {
                    echo "<div class='alert alert-success'>";
                    echo $this->session->flashdata('errors');
                    echo "</div>";
                }
                ?>
        </div>
        <!-- /.card -->
        <div class="card-body col-md-5">
            <div class="callout callout-info">
                <dl class="row">
                    <dt class="col-sm-4">NIP</dt>
                    <dd class="col-sm-8">:&nbsp;<span><?php echo $detailGuru['nip']?></span></dd>
                    <input type="hidden" id="nip" name="nip" value="<?php echo $detailGuru['nip']?>"></input>
                    <dt class="col-sm-4">Nama Guru</dt>
                    <dd class="col-sm-8">:&nbsp;<span><?php echo $detailGuru['namaLengkap']?></span></dd>
                </dl>
            </div>
        </div>
        <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
            <tr>
                <th>Kriteria</th>
                <th colspan="5" class="text-center col-md-9">Nilai</th>
            </tr>
            <?php
                foreach ($dataView as $item) {
                ?>
                <tr>
                    <td><?php echo $item['nama']; ?></td>
                    <?php
                    $no = 1;
                    foreach ($item['data'] as $dataItem) {
                        ?>
                        <td>
                            <input type="radio" name="nilai[<?php echo $dataItem->kdKriteria ?>]"
                                    value="<?php echo $dataItem->nilai ?>"
                                    <?php
                                    if(isset($nilaiGuru)){
                                        foreach ($nilaiGuru as $item => $value) {
                                            if($value->kdKriteria == $dataItem->kdKriteria){
                                                if($value->nilai ==  $dataItem->nilai){
                                                    ?>
                                                    checked="checked"
                                                    <?php
                                                }
                                            }
                                        }
                                    }else{
                                        if($no == 3){
                                            ?>
                                            checked="checked"
                                            <?php
                                        }
                                    }
                                    ?>
                                /> <?php echo $dataItem->subKriteria;
                                $no++;
                            ?>
                            </td>

                            <?php
                        }
                        echo '</tr>';
                        }
                    ?>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
        <div class="pull-right">
            <div class="col-md-12 text-center">
                <a class="btn btn-danger" href="<?php echo base_url('analisa/penilaian') ?>" role="button">Kembali</a>
                &nbsp;
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <?php echo form_close() ?>
    <!-- /.row -->
</div>
</script>