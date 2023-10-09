
<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail']=="") {
  header('location:index.php');
}



include_once 'header.php';

if(isset($_POST['btnaddcontact'])){
  $id = $_POST['txtid'];
  $name = $_POST['txtname'];
  $company = $_POST['txtcompany'];
  $phone = $_POST['txtphone'];
  $email = $_POST['txtemail'];
  


        $insert=$pdo->prepare("insert into tbl_contact(id,name,company,phone,email)
        values(:id,:name,:company,:phone,:email)");

        $insert->bindParam(':id',$id);
        $insert->bindParam(':name', $name);
        $insert->bindParam(':company',$company);
        $insert->bindParam(':phone',$phone);

        $insert->bindParam(':email',$email);
       

        if($insert->execute()){

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
            text: "Contact Upload failed!",
            icon: "error",
            button: "Ok",
          });



          });

          </script>';

        }

        
    }

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Add Contact</h1>
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
           <input type="text" class="form-control" name="txtname" placeholder="Enter name..." required>
         </div>

         <div class="form-group">
           <label>Company</label>
           <input type="text" class="form-control" name="txtcompany" placeholder="Enter name..." required>
         </div>


      </div>
      <div class="col-md-6">

      <div class="form-group">
           <label>Phone</label>
           <input type="text" class="form-control" name="txtphone" placeholder="Enter name..." required>
         </div>

         <div class="form-group">
           <label>Email</label>
           <input type="text" class="form-control" name="txtemail" placeholder="Enter name..." required>
         </div>




           <input hidden type="text" class="form-control" name="txtid" value="<?php echo $_SESSION['id']; ?>" required>


        </div>
        </div>

    <div class="box-footer">


      <button type="submit" class="btn btn-info" name="btnaddcontact">Add Contact</button>

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
