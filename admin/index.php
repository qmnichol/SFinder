<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Services-Marketplace-System</title>
   <!-- Font Awesome -->
   <link rel="stylesheet" type="../text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> -->

   <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../asset/css/style.css">
   <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <style type="text/css">
      table tr td {
         padding: 0.3rem !important;
      }
      table tr td p{
         margin-top: -0.8rem !important;
         margin-bottom: -0.8rem !important;
         font-size: 0.9rem;
      }
      td a.btn{
         font-size: 0.7rem;
      }
   </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-light" style="background-color: rgb(63,206,164)">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>

         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="index.php" role="button"><i class="">Home</i></a>
            </li>
         </ul>

         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="nav-link"  href="../index.html">
                  <i class="fas fa-sign-out-alt"></i>
               </a>
            </li>
         </ul>

      </nav>
      
      <aside class="main-sidebar sidebar-light-primary">
            <!-- Brand Logo -->
            <a href="index.html" class="brand-link">
         <img src="../asset/img/logo.png" alt="DSMS Logo" width="200" style="margin-top: -20px;margin-bottom: -50px;">
         </a>
         <div class="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  
                  
                  <li class="nav-item">
                     <a href="user.php" class="nav-link">
                        <i class="fa fa-users"></i>
                        <p>
                           Customer
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="ServiceProvider.php" class="nav-link">
                        <i class="fa fa-hand-holding-heart"></i>
                        <p>
                           Service Provider
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="ServicePosted.php" class="nav-link">
                        <i class="fa fa-handshake"></i>
                        <p>
                           Service Posted
                        </p>
                     </a>
                  </li>
                  
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="fa fa-chart-bar"></i>
                        <p>
                           Reports
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                           <a href="jobs-report.html" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Jobs</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="job-completed-report.html" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Jobs Completed</p>
                           </a>
                        </li>
                     </ul>
                  </li>

               </ul> 
            </nav>
         </div>
      </aside>

         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                     <h1 class="m-0"><i class="fa fa-users"></i> Admin and Support Accounts</h1>
                     </div>
                     <!-- /.col -->
                     
                     
                  </div>
               </div>
            </div>

            <section class="content">
    <div class="container-fluid">
        <div class="card card-info">
            <br>
            <div class="col-md-12">
                <table id="example2" class="table table-bordered">
                    <thead style="background-color: rgb(48, 247, 187);">
                        <tr>
                            <th>Profile</th>
                            <th>Full Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Access Level</th>
                            <th>Account</th>
                            <th>Password</th>
                            <th>Valid ID</th>
                            <th>Certificate</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM employer";
                        $connection = mysqli_connect("localhost", "root", "", "service_finder");
                        $result = mysqli_query($connection, $sql);
                        
                            ?>
                    <?php 


                      if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $fname=$row["fname"];
                                $mname=$row["mname"];
                                $lname=$row["lname"];
                                $Email=$row["Email"];
                                $password=$row["password"];
                                $profilepic=$row["profilepic"];
                                $username=$row["username"];
                                $Bdate=$row["Bdate"];
                                $validID=$row["validID"];
                                $NC=$row["NC"];
// =========================================================================Date format
                                $date = date("M d, Y",strtotime($Bdate));
// =========================================================================Date format
                                echo '
                                <form action="approve.php" method="post">
                                <input type="hidden" name="jid" value="'.$username.'">
                                    <tr>
                                    <td><img src="../asset/img/'.$profilepic.'" width="100" style="border: 2px solid #ddd"></td>
                                    <td>'.$lname.' '.$fname.'</td>
                                    <td>'.$mname.'</td>
                                    <td>'.$date.'</td>
                                    <td>'.$Email.'</td>
                                    <td>'.$username.'</td>
                                    <td type="password" >'.$password.'</td>
                                    <td>'.$validID.'</td>
                                    <td>'.$NC.'</td>
                                    <td type="text-center">
                                    <a class="btn btn-sm btn-success" href="#" data-toggle="modal"
                                       data-target="#edit"><i
                                       class="fa fa-user-edit"></i> Update</a>
                                    <a class="btn btn-sm btn-danger" href="" name="'.$username.'" data-toggle="modal"
                                       data-target="#delete"><i
                                       class="fa fa-trash"></i> Delete</a>
                                    </td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr></tr><tr><td></td><td>Nothing to show</td></tr>";
                        }

                       ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- ./wrapper -->

      <div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <img src="../asset/img/sent.png" alt="" width="50" height="46">
                  <h3>Are you sure want to delete this User?</h3>
                  <div class="m-t-20">
                     <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                     <button type="submit" class="btn btn-danger">Delete</button>
                  </div>
               </div>
            </div>
         </div>
      </div>

   

      

      <!-- jQuery -->
      <script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/bootstrap.bundle.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>
      <!-- DataTables  & Plugins -->
      <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
      <script>
         $(function () {
           $("#example1").DataTable();
         });
      </script>
   </body>
</html>