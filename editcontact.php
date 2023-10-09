
<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail']=="") {
  header('location:index.php');
}



include_once 'header.php';

$id= isset($_GET['id']) ? $_GET['id'] : '';

$select = $pdo->prepare("select * from tbl_contact where contactid=$id");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['contactid'];

$name_db = $row['name'];
$company_db = $row['company'];
$email_db = $row['email'];
$phone_db = $row['phone'];


if(isset($_POST['btnupdate'])){
  $name_txt = $_POST['txtname'];
  $company_txt = $_POST['txtcompany'];
  $email_txt = $_POST['txtemail'];
  $phone_txt = $_POST['txtphone'];




          $update = $pdo->prepare("update tbl_contact set name=:name, company=:company,
          email=:email, phone=:phone where contactid=$id");

          $update->bindParam(':name',$name_txt);
          $update->bindParam(':company',$company_txt);
          $update->bindParam(':email',$email_txt);
          $update->bindParam(':phone',$phone_txt);

       

          if($update->execute()){

            echo '<script type="text/javascript">
            jQuery(function validation(){
                swal({
                    title: "Good Job!",
                    text: "Contact is successfully uploaded!",
                    icon: "success",
                    button: "Ok",
                });
                setTimeout(function() {
                    window.location.href = "contact.php"; // Redirect after 3 seconds
                }, 3000); // 3000 milliseconds = 3 seconds
            });
        </script>';

          }else{
            echo'<script type ="text/javascript">
            jQuery(function validation(){

              swal({
              title: "Error!",
              text: "Upload failed!",
              icon: "error",
              button: "Ok",
            });



            });

            </script>';

          }


}

$select = $pdo->prepare("select * from tbl_contact where contactid=$id");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['contactid'];

$name_db = $row['name'];
$company_db = $row['company'];
$email_db = $row['email'];

$phone_db = $row['phone'];


?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Add menu</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Starter Page</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content container-fluid">

   <!--------------------------
     | Your Page Content Here |
     -------------------------->
     <!-- general form elements -->

     <div class="card card-outline card-primary">
         <div class="card-header with-border">
         <h3 class="box-title"><a href="contact.php" class="btn btn-primary" role="button">Back to Contact</a></h3>




      </div>


        <div class="card-body">

          <form action="" method="post" name="form" enctype="multipart/form-data">



      <div class="row">


      <div class="col-md-6">
        <div class="form-group">
           <label>Name</label>
           <input type="text" class="form-control" name="txtname" value="<?php echo $name_db;?>" placeholder="Enter name..." required>
         </div>

         <div class="form-group">
           <label>Company</label>
           <input type="text" class="form-control" name="txtcompany" value="<?php echo $company_db;?>" placeholder="Enter name..." required>
         </div>



  

     


      </div>
      <div class="col-md-6">
      <div class="form-group">
           <label>Email</label>
           <input type="text" class="form-control" name="txtemail" value="<?php echo $email_db;?>" placeholder="Enter name..." required>
         </div>
         <div class="form-group">
           <label>Phone number</label>
           <input type="text" class="form-control" name="txtphone" value="<?php echo $phone_db;?>" placeholder="Enter name..." required>
         </div>



   




        </div>
        </div>

    <div class="box-footer">


      <button type="submit" class="btn btn-info" name="btnupdate">Update Contact</button>

    </div>
    </form>


          </div>

            </div>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->





  <!-- /.content-wrapper -->
  <?php

include_once 'footer.php';

 ?>
