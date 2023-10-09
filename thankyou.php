<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="plugins/sweetalert/sweetalert.min.js"></script>



<?php

include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail']=="") {
    header('location:index.php');
  }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <style>
    /* Center the h1 element vertically and horizontally */
    h1 {
      display: flex;
      justify-content: center;
      align-items: center;
 
    }
  </style>




</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>FDCI</b>EXAM</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <h1>Thank You!</h1>
    <a href="contact.php"><button class="btn btn-primary btn-block" name="">Continue</button></a>

  </div>
</div>

</body>
</html>
