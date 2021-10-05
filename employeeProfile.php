<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
}
else{
	$username="";
	//header("location: index.php");
}

if(isset($_POST["jid"])){
	$_SESSION["id"]=$_POST["jid"];
	header("location: jobDetails.php");
}

if(isset($_POST["e_user"])){
	$_SESSION["e_user"]=$_POST["e_user"];
	header("location: viewEmployer.php");
}


$sql = "SELECT * FROM employe WHERE username='$username' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $username=$row["username"];
      $password=$row["password"];
      $profilepic=$row["profilepic"];
      $fname=$row["fname"];
      $mname=$row["mname"];
      $lname=$row["lname"];
      $Email=$row["Email"];
      $Gender=$row["Gender"];
      $Age=$row["Age"];
      $Bdate=$row["Bdate"];
      $mnumber=$row["mnumber"];
      $address=$row["address"];
      $zipcode=$row["zipcode"];
      $city=$row["city"];
      $province=$row["province"];
      $validID=$row["validID"];
      $NC=$row["NC"];
      $skill=$row["skill"];
      $education=$row["education"];
      $experience=$row["experience"];
      $priTitle=$row["proTitle"];
      $date = date("M d, Y",strtotime($Bdate));
	    }
} else {
    echo "0 results";
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee profile</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="asset/css/mystyle.css">
<style>
	body{padding-top: 3%;margin: 0;}
	.card{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background:#fff}


</style>

</head>
<body>
<!--Navbar menu-->
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-light portfolio-navbar gradient py-0" id="nav">
        <img src="image/logo1.png" width="100" height="80" alt="Logo">
        <div class="container"><a class="navbar-brand logo" href="employeeProfile.php">Service Finder <small>for Irosin Sorsogon</small></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                <!-- <li class="nav-item" role="presentation"><a class="nav-link active" href="allEmployee.php">Browse all Employees</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="allEmployer.php">Browse all Employer</a></li> -->
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="allJob.php">Offer Services</a></li>
            </div>
        </div>
        <li class="nav navbar-nav nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt">Logout</i></a></li>
    </nav>    
<!--End Navbar menu-->
<!--main body-->
<div style="padding:3% 3% 2% 3%; ">
	<div class="row" >

	<!--Column 1-->
	<div class="col-lg-3" >

	<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<p></p>
			<img src="asset/img/<?php echo $profilepic ?>">
			<h3><?php echo $fname ?>, <?php echo $lname; ?></h3>
			<p><span class="fas fa-user"></span> <?php echo $username; ?></p>
	    </div>
		<!--End Main profile card-->

	<!--Contact Information-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
    <ul class="nav navbar-nav">
                <li><a class="" href="#">Edit Profile</a></li>
                <li><hr class=""></li>
                <li><a class="" href="message.php">Message</a></li>
            </ul>
		</div>
	<!--End Contact Information-->
	</div>
<!--End Column 1-->

<!--Column 2-->
<div class="col-lg-9">

<!--Employer Profile Details-->	
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3>Employer Profile Details</h3></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading"> <h4></h4></div>
			  <div class="panel-body"><h5>Full name: <?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?></h5></div>
              <div class="panel-body"><h5>Gender: <?php echo $Gender; ?> </h5></div>
              <div class="panel-body"><h5>Age: <?php echo $Age; ?> </h5></div>
              <div class="panel-body"><h5>Date of Birth: <?php echo $date; ?> </h5></div>
            </div> 
            <div class="panel panel-primary">
			  <div class="panel-heading"> <h4>Contact Infornation</h4></div>
			  <div class="panel-body"><h5>Email: <?php echo $Email; ?> </h5></div>
              <div class="panel-body"><h5>Mobile number: <?php echo $mnumber; ?></h5></div>
              
            </div>
            <div class="panel panel-primary">
			  <div class="panel-heading"> <h4>Address</h4></div>
			  <div class="panel-body"><h5>Address: <?php echo $address; ?>, <?php echo $city; ?>, <?php echo $province; ?> </h5></div>
              <div class="panel-body"><h5>Zip Code: <?php echo $zipcode; ?></h5></div>
            </div>
            
            <div class="panel panel-primary">
			        <div class="panel-heading"> <h4>Account</h4></div>
			        <div class="panel-body"><h5>Username: <?php echo $username; ?> </h5></div>
              <!-- <div class="panel-body"><h5>Password: <?php echo $password; ?></h5></div> -->
            </div> 
            <div class="panel panel-primary">
			        <div class="panel-heading"> <h4></h4></div>
			        <div class="panel-body"><h5>Valid ID:<a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="far fa-id-card"></i> Show Valid ID</a></h5>
              </div>
              
            </div> 

		</div>
<!--End Employer Profile Details-->
<!--Start  column 3 -->
<div class="col-lg-13">

<!--Freelancer Profile Details-->	
<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3>User Profile Details</h3></div>
			</div>
			
			
			<div class="panel panel-primary">
			  <div class="panel-heading">Current Works</div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Job Id</td>
                          <td>Title</td>
                          <td>Employer</td>
                      </tr>
                      <?php 
                      	$sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.f_username='$username' AND selected.valid=1 ORDER BY job_offer.deadline DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                                $e_username=$row["e_username"];
                               

                                echo '
                                <form action="employerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    </form>
                                    <form action="viewEmployer.php" method="post">
                                    <input type="hidden" name="e_user" value="'.$e_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$e_username.'"></td>
                                   
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Nothing to show</td></tr>";
                        }

                       ?>
                  </table>
              </h4></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Previous Works</div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Job Id</td>
                          <td>Title</td>
                          <td>Employer</td>
                      </tr>
                      <?php 
                      	$sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.f_username='$username' AND selected.valid=0 ORDER BY job_offer.deadline DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                                $e_username=$row["e_username"];
                               

                                echo '
                                <form action="employeeProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    </form>
                                    <form action="employeeProfile.php" method="post">
                                    <input type="hidden" name="e_user" value="'.$e_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$e_username.'"></td>
                                    
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Nothing to show</td></tr>";
                        }

                       ?>
                  </table>
              </h4></div>
			</div>
		</div>
<!--End Freelancer Profile Details-->
	</div>
  <!--end  column 3 -->
	</div>
<!--End Column 2-->

</div>

</div>
</div>
<!--End main body-->

<div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <h5><i class="fa fa-user-lock"></i> Valid ID</h5>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Full Name</label>
                                       <img src="asset/img/<?php echo $validID; ?>" alt="Valid ID" style="width: 350px">
                                    </div>
                                 </div>
                                 
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>


<!-- old -->
<!-- <script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="sassets/js/jquery.min.js"></script> -->



<script src="asset/jquery/jquery.min.js"></script>
      <script src="asset/js/bootstrap.bundle.min.js"></script>
      <script src="asset/js/adminlte.js"></script>
      <!-- DataTables  & Plugins -->
      <script src="asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
</body>
</html>