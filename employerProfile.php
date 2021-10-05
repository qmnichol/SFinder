<?php include('server.php');

if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
}
else{
	$username="";
	//header("location: index.php");
}

if(isset($_POST["jid"])){
	$_SESSION["job_id"]=$_POST["jid"];
	header("location: jobDetails.php");
}

if(isset($_POST["f_user"])){
	$_SESSION["f_user"]=$_POST["f_user"];
	header("location: viewEmployee.php");
}


$sql = "SELECT * FROM employer WHERE username='$username'";
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
        }
} else {
    echo "0 results";
}

$sql = "SELECT * FROM job_offer WHERE e_username='$username' and valid=1 ";
$result = $conn->query($sql);







if(isset($_POST["addC"])){
    $title=test_input($_POST["title"]);
    $Certificate=test_input($_POST["Certificate"]);
    

    $sql = "INSERT INTO addcertificate (user, Certificate, title) VALUES ('$username', '$Certificate', '$title')";
                                                                                                                       
    $result = $conn->query($sql);
    if($result==true){
        $_SESSION["id"] = $conn->insert_id;
        header("location: employerProfile.php");
    }
}









 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="asset/css/mystyle.css">
</head>
<body>
<a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-ok"></span>  Logout</a>
<!--Navbar menu-->
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-light portfolio-navbar gradient py-0" id="nav">
        <img src="image/logo1.png" width="100" height="80" alt="Logo">
        <div class="container"><a class="navbar-brand logo" href="employerProfile.php">Service Finder <small>for Irosin Sorsogon</small></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                <!-- <li class="nav-item" role="presentation"><a class="nav-link active" href="allEmployee.php">Browse all Employees</a></li> -->
                <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="allEmployer.php">Browse all Employer</a></li> -->
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="allJob.php">Offer Services</a></li>
                    <!-- <div class="btn-group">
                    <button type="button"   role="presentation" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color:white">
                    <i class="fas fa-user"></i><?php echo $username; ?>
                    </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Message</a></li>
                        </ul>
                    </div> -->
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <a class="btn ml-auto rounded-pill btn-font-size px-4" role="button" href="postJob.php" style="background: rgb(116, 156, 143);color:#fff;">Post a Job</a>
                    </div>
            </div>
        </div>
        <li class="nav navbar-nav nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt">Logout</i></a></li>
    </nav>    
<!--End Navbar menu-->
    <div style="padding:1% 3% 1% 3%;">
<div class="row">

<!--Column 1-->
	<div class="col-lg-3">

<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<p></p>
			<img src="asset/img/<?php echo $profilepic; ?>">
			<h2><?php echo $fname; ?>, <?php echo $lname; ?></h2>
			<p><span class="glyphicon glyphicon-user"></span> <?php echo $username; ?></p>
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
			  <div class="panel-heading"><h3>Employee Profile Details</h3></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading"> <h4></h4></div>
			  <div class="panel-body"><h5>Full name: <?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?></h5></div>
              <div class="panel-body"><h5>Gender: <?php echo $Gender; ?> </h5></div>
              <div class="panel-body"><h5>Age: <?php echo $Age; ?> </h5></div>
              <div class="panel-body"><h5>Date of Birth: <?php echo $Bdate; ?> </h5></div>
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
            <div class="panel-body"><h5>Valid ID:<a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#show"><i
                                       class="far fa-id-card"></i> Show Valid ID</a></h5>
              </div>
              <div class="panel-body"><h5>NC Certificate: <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="far fa-id-card"></i> Show Certificate</a></h5>
              </div>
            </div> 
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h4>Add Certificate</h4>
                    <div class="panel-body"><h5>NC Certificate: <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#add"><i
                                       class="far fa-id-card"></i> Add Certificate</a></h5>
                </div>
            </div>
            
            <div class="panel panel-primary">
			  <div class="panel-heading"> <h4>Account</h4></div>
			  <div class="panel-body"><h5>Username: <?php echo $username; ?> </h5></div>
              <!-- <div class="panel-body"><h5>Password: <?php echo $password; ?></h5></div> -->
            </div> 
		</div>
<!--End Employer Profile Details-->
<div class="col-lg-13">
    <!--  Enployer Profile Details 12312 -->
    <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3>Employer Profile Details</h3></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Current Job Offerings</div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Job Id</td>
                          <td>Title</td>
                      </tr>
                      <?php 
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                               

                                echo '
                                <form action="employerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    
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
			  <div class="panel-heading">Privious Job Offerings</div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Job Id</td>
                          <td>Title</td>
                          
                      </tr>
                      <?php 
                      	$sql = "SELECT * FROM job_offer WHERE e_username='$username' and valid=0 ORDER BY deadline DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                               

                                echo '
                                <form action="employerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    
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
			  <div class="panel-heading">Currently Hired Employer</div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Job Id</td>
                          <td>Title</td>
                          <td>Employer</td>
                      </tr>
                      <?php 
                      	$sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.e_username='$username' AND selected.valid=1 ORDER BY job_offer.deadline DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                                $f_username=$row["f_username"];
                               

                                echo '
                                <form action="employerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    </form>
                                    <form action="employerProfile.php" method="post">
                                    <input type="hidden" name="f_user" value="'.$f_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                                    
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
			  <div class="panel-heading">Previously Hired Employers</div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Job Id</td>
                          <td>Title</td>
                          <td>Employers</td>
                      </tr>
                      <?php 
                      	$sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.e_username='$username' AND selected.valid=0 ORDER BY job_offer.deadline DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                                $f_username=$row["f_username"];
                                

                                echo '
                                <form action="employerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    </form>
                                    <form action="employerProfile.php" method="post">
                                    <input type="hidden" name="f_user" value="'.$f_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                                    
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
            <!-- End  Enployer Profile Details 12312 -->
</div>
	</div>
<!--End Column 2-->
<!-- column job information -->

<!-- End column job information -->


</div>
</div>
<!--End main body-->



<div id="show" class="modal animated rubberBand delete-modal" role="dialog">
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
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
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
                                       <img src="asset/img/<?php echo $NC; ?>" alt="Certificate" style="width: 350px">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>




      <div id="add" class="modal animated rubberBand delete-modal" role="dialog">
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
                                <div class="form-group text-center" >
                                    <span class="img-div">
                                       <div class="text-center img-placeholder"  onClick="triggerClick()">
                                             <h4>Upload image</h4>
                                       </div>
                                       <img src="asset/img/beard.png" onClick="triggerClick()" id="profileDisplay" style="width: 200px; height: 200px" class="img " alt="profile">
                                    </span>
                                    <input type="file" name="Certificate" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" required accept='image/*' value="" >
                                    <p>Click the photo to add</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $username; ?>
                                       <label class="float-left">Add title of Certificate</label>
                                       <input type="text" name="title" class="form-control" placeholder="Add title">
                                    </div>
                                 </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                         <button type="submit" name="addC" style="border: none"><a href="" class="btn btn-danger">Add</a></button>
                     
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>






      <script>

function triggerClick(e) {
     document.querySelector('#profileImage').click();
    }
     function displayImage(e) {
                 if (e.files[0]) {
                 var reader = new FileReader();
                 reader.onload = function(e){
                 document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                     }
                 reader.readAsDataURL(e.files[0]);
              }
      }
</script>




<!-- <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script> -->


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