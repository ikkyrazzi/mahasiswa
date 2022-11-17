<?php

require 'functions.php';

 if(isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert ('user berhasil ditambahkan');
              </script>";
    } else {
        echo mysqli_error($conn);
    }
 }

?>
<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-5 d-none d-lg-block text-center">
            <br><br><br><br><br><br><br><br>
          <h1 class="h4 text-gray-900 mb-1"><b>Aplikasi</b>-<em>Mahasiswa</em></h1>
        </div>
        <div class="col-lg-7">
          <div class="p-4">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Register</h1>
            </div>
            <form class="user" method="post" action="registrasi.php">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan nama anda, contoh : Rizky Herdiansyah">
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan username anda, contoh : Rizky">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password...">
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password...">
                </div>
              </div>
              <button type="submit" name="register" class="btn btn-primary btn-user btn-block">
                Register Account
              </button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="">Forgot Password?</a>
            </div>
            <div class="text-center">
              <a class="small" href="login.php">Already have an account? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>