<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail']=="") {
  header('location:index.php');
}

// Constants for pagination
$recordsPerPage = 5; // Number of records to display per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page, default to 1

// Calculate the OFFSET for the SQL query
$offset = ($page - 1) * $recordsPerPage;

// Fetch the total number of records (you can use SQL COUNT)
$sqlTotalRecords = "SELECT COUNT(*) AS total FROM tbl_contact";
$resultTotalRecords = $pdo->query($sqlTotalRecords);
$totalRecords = $resultTotalRecords->fetch(PDO::FETCH_ASSOC)['total'];

// Calculate the total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage);

// Fetch data for the current page using SQL LIMIT and OFFSET
$sql = "SELECT * FROM tbl_contact LIMIT :limit OFFSET :offset";
$statement = $pdo->prepare($sql);
$statement->bindParam(':limit', $recordsPerPage, PDO::PARAM_INT);
$statement->bindParam(':offset', $offset, PDO::PARAM_INT);
$statement->execute();

// Display the fetched data

include_once 'header.php';

 ?>
 <style>
    .pagination {
        text-align: center;
    }

    .pagination a {
        text-decoration: none;
        border-bottom: 1px solid #ccc; /* Add a line between pagination links */
        padding-bottom: 3px; /* Adjust spacing between the link and the line */
        margin: 0 5px; /* Add space between pagination links */
    }
</style>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Contact Page</h1>
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
         <h3 class="box-title"><a href="addcontact.php" class="btn btn-primary" role="button">Add Contact</a></h3>
      </div>

        <div class="card-body">
            <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="search">Search:</label>
                <input type="text" class="form-control" id="search" placeholder="Enter a keyword">
            </div>
        </div>
    </div>

    <div id="search-results"></div>

                <div class="row margin">

                <div class="col-md-6">
   
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?php echo $row['contactid']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['company']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td>
            <a href="editcontact.php?id=<?php echo $row['contactid']; ?>" class="btn btn-info" role="button">
                <span class="fas fa-edit" style="color:#ffffff" data-toggle="tooltip" title="edit"></span>
            </a>
        </td>
        <td>
       
        
    <a href="deletecontact.php?id=<?php echo $row['contactid']; ?>" class="btn btn-danger" role="button"
       onclick="return confirm('Are you sure you want to delete this contact?');">
        <span class="fas fa-trash" style="color: #ffffff" data-toggle="tooltip" title="Delete"></span>
    </a>
        

        </td>
    </tr>
    <?php endwhile; ?>

        </tbody>
    </table>

    <!-- Generate pagination links -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo ($page - 1); ?>">Previous</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?>" <?php if ($page == $i) echo 'class="active"'; ?>><?php echo $i; ?></a>
        <?php endfor; ?>
        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo ($page + 1); ?>">Next</a>
        <?php endif; ?>
    </div>
</div>

            </div>
            <!-- /.box-body -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Handle search input change event
    $('#search').on('input', function() {
        // Get the search query
        var query = $(this).val();

        // Check if the query is empty
        if (query === '') {
            // Clear the search results
            $('#search-results').html('');
            return; // Exit the function if the query is empty
        }

        // Perform an AJAX request to search.php (create this file later)
        $.ajax({
            url: 'search.php',
            method: 'POST',
            data: { query: query },
            success: function(response) {
                // Display search results in the #search-results div
                $('#search-results').html(response);
            }
        });
    });
});
</script>



  <!-- /.content-wrapper -->
  <?php

include_once 'footer.php';

 ?>
