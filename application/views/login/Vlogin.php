<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <link rel="icon" type="image/png" href="#">
    <link rel="icon" type="image/png" href="./assets/gambar/logo.png">
    <title>SMK BINA UMAT SIWALAN</title>
    <!-- Icons-->
    <link href="<?php echo base_url()?>assets/login/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/login/pace.min.css" rel="stylesheet">
    <style>
      .gradient {
        background: linear-gradient(#1cb5e0,#FFFFFF);   
      }
    </style>
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
                <?php 
                if ($this->session->flashdata('gagal')) {
                    echo "<div class='alert alert-danger'>";
                    echo $this->session->flashdata('gagal');
                    echo "</div>";
                }
                ?>
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Masukan username dan password</p>
                <?php echo form_open('Auth/chek_login');?>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="row">
                  <div class="col-6">
                      <button type="submit" name="submit" class="btn btn-primary px-4">Login</button>
                  </div>
                </div>
                <?php echo form_close();  ?>
              </div>
            </div>
            <div class="card text-white bg-blue py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h3>SISTEM PENDUKUNG KEPUTUSAN</h3>
                  <p>PEMILIHAN GURU TELADAN DI SMK BINA UMAT SIWALAN DENGAN METODE SIMPLE ADDITIVE WEIGHTING (SAW)</p>
                  <!-- <img src="./assets/gambar/logo.png" width="100px" > -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>