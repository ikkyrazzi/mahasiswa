<?php
session_start();

if( isset($_SESSION["login"])) {
  header("Location: index.php");
    exit;
}

require 'functions.php';

if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username ='$username'");

    //cer username
    if (mysqli_num_rows($result) === 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
            //set session
            $_SESSION["login"] = true;

            header("Location: index.php");
            exit;
        }
    }
    $error = true;
 }

?>

<br>
<br>
<br>    
<br>
<br>
<br>
<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-lg-7">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-4">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-0"><b>Aplikasi</b>-<em>Mahasiswa</em></h1>

                  <hr>
                  <h1 class="h4 text-gray-900">Halaman Login</h1>
                </div>

                <form class="user" method="post" action="login.php">
                  <div class="form-group">
                    <input type="username" class="form-control form-control-user" id="username" name="username" placeholder="Username...">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password...">
                  </div>
                  <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>

                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="">Forgot Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="registrasi.php">Create an Account!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>