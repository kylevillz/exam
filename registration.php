<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="plugins/sweetalert/sweetalert.min.js"></script>



<?php
include_once 'connectdb.php';
session_start();






if(isset($_POST['btn_save'])){
    
    $username=$_POST['txtname'];
    $useremail=$_POST['txtemail'];
    $password=$_POST['txtpassword'];
    $confirm_password=$_POST['txt_confirm'];
    
 
  
  
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($password === $confirm_password) {
       
     
 

   
  if(isset($_POST['txtemail'])){
  
      $row=$select=$pdo->prepare("select useremail from tbl_user where useremail='$useremail'");
      $select->execute();
  
      if($select->rowCount() > 0){
        echo'<script>alert("Email Already Exists!");</script>';
      }
      
      else {
  
        $insert=$pdo->prepare("insert into tbl_user(username,useremail,password)values(:name,:email,:pass)");
  
  
        $insert->bindParam(':name',$username);
        $insert->bindParam(':email',$useremail);
        $insert->bindParam(':pass',$hashed_password);

  
  
        if ($insert->execute()) {
            $select = $pdo->prepare("select * from tbl_user where useremail= :useremail");
            $select->execute(array(':useremail' => $useremail));
          
            while ($row = $select->fetch()) {
              $id = $row['id'];
              $hashed_password = $row['password'];
              $useremail = $row['useremail'];
              $username = $row['username'];

              $_SESSION['id'] = $id;
           
            $_SESSION['username'] = $username;
            $_SESSION['useremail'] = $useremail;
       
            header('refresh:3; thankyou.php');
          echo'<script>alert("Registration Successful");</script>';
  
        }}
      }
    }}    else {
        echo "<script> alert(' Please enter same passwords ') </script>";
     }
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
    .login-box{

    margin-bottom: 200px;

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
    <div class="card-body login-card-body">
      <p class="login-box-msg">Registration</p>

      <form action="" method="post">
      <div class="input-group mb-3">
          <input type="text" class="form-control"  name="txtname" placeholder="Name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control"  name="txtemail" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="txtpassword" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="txt_confirm" placeholder="Confirm Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-8">

          <a href="index.php">Sign in</a>



          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="btn_save">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->



    </div>
    <!-- /.login-card-body -->
  </div>
</div>

</body>
</html>
