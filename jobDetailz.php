<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
	if ($_SESSION["Usertype"]==1) {
		$linkPro="employeeProfile.php";
		$linkEditPro="editFreelancer.php";
		$linkBtn="";
		$textBtn="Hire";
    $textApply="apply";
	}
	else{
		$linkPro="employerProfile.php";
		$linkEditPro="editEmployer.php";
		$linkBtn="editJob.php";
		$textBtn="Edit the job offer";
	}
}
else{
    $username="";
	//header("location: index.php");
}

if(isset($_SESSION["job_id"])){
    $job_id=$_SESSION["job_id"];
}
else{
    $job_id="";
    //header("location: index.php");
}

if(isset($_POST["f_user"])){
	$_SESSION["f_user"]=$_POST["f_user"];
	header("location: viewEmployee.php");
}

if(isset($_POST["c_letter"])){
	$_SESSION["c_letter"]=$_POST["c_letter"];
	header("location: coverLetter.php");
}


if(isset($_POST["f_hire"])){
	$f_hire=$_POST["f_hire"];
	$f_price=$_POST["f_price"];
	$sql = "INSERT INTO selected (f_username, job_id, e_username, price, valid) VALUES ('$f_hire', '$job_id', '$username','$f_price',1)";
    
    $result = $conn->query($sql);
    if($result==true){
    	$sql = "DELETE FROM apply WHERE job_id='$job_id'";
		$result = $conn->query($sql);
		if($result==true){
			$sql = "UPDATE job_offer SET valid=0 WHERE job_id='$job_id'";
			$result = $conn->query($sql);
			if($result==true){
				header("location: jobDetails.php");
			}
		}
    }
}


if(isset($_POST["f_done"])){
	$f_done=$_POST["f_done"];
	$sql = "UPDATE selected SET valid=0 WHERE job_id='$job_id'";
	$result = $conn->query($sql);
    if($result==true){
    	header("location: jobDetails.php");
    }
}


$sql = "SELECT * FROM job_offer WHERE job_id='$job_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$e_username=$row["e_username"];
        $title=$row["title"];
        $type=$row["type"];
        $description=$row["description"];
        $budget=$row["budget"];
        $skills=$row["skills"];
        $special_skill=$row["special_skill"];
        $deadline=$row["deadline"];
        $jv=$row["valid"];
        
        }
} else {
    echo "0 results";
}

$_SESSION["msgRcv"]=$e_username;
// Hire=====================================================================adf

$sql = "SELECT * FROM apply WHERE job_id='$job_id' and f_username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $msg="You have already applied for this job. You cannot apply again.";
} else {
    $msg="";
}


if(isset($_POST["apply"]) && $msg==""){
    $cover=test_input($_POST["cover"]);
    $bid=test_input($_POST["bid"]);


    $sql = "INSERT INTO apply (f_username, job_id, bid, cover_letter) VALUES ('$username', '$job_id', '$bid','$cover')";

    
    $result = $conn->query($sql);
    if($result==true){
        header("location: allJob.php");
    }
}


//end Hire==========================================

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Job Details</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">

    <style>
	body{padding-top: 3%;margin: 0;}
	.card{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background:#fff}
	.gradient {    
    background: linear-gradient(
    120deg,#d3d9db,#7ccbd1);
    color: #fff; }
	.portfolio-navbar .navbar-nav .nav-link {
    font-weight: 700;
    padding: 2rem .1rem;}
	.portfolio-navbar .logo {
    font-size: 2.0rem;
    margin-left: 5px;} 

</style>

</head>
<body>
<!--Navbar menu-->
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-light portfolio-navbar gradient py-0" id="nav">
        <img src="image/logo4.png" width="100" height="80" alt="Logo">
        <div class="container"><a class="navbar-brand logo" href="<?php echo $linkPro; ?>">Service Finder</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link active" href="ellEmployee.php">Browse all Employer</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="allEmployer.php">Browse Employee</a></li> -->
					<li class="nav-item" role="presentation"><a class="nav-link" href="allJob.php">Find Services</a></li>
					<li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo $linkPro; ?>"><?php echo $username; ?></a></li>
                    
            </div>
        </div>
        <li class="nav navbar-nav nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt">Logout</i></a></li>
    </nav>    
<!--End Navbar menu-->

<!--main body-->
<div style="padding:5% 3% 1% 3%;">
<div class="row">

<!--Column 1-->
	<div class="col-lg-9">

<!--Freelancer Profile Details-->	
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h3>Job Offer Details</h3></div>
			</div>
			<div class="panel panel-success">
			  <!-- <div class="panel-heading">Job Title</div> -->
			  <div class="panel-body"><h4>Job Title: <?php echo $title; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h4>Job Type: <?php echo $type; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h4>Job Description: <?php echo $description; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h4>Start at: <?php echo $budget; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h4>Required Skills: <?php echo $skills; ?></h4></div>
			</div>
			<div class="from-group" style="display: none">
                                        <label>
                                            <input type="radio" name="cover" value="Please add infromation" checked /> Please add infromation
                                        </label>
                                        <label>
                                            <input type="radio" name="bid" value="Please add infromation" checked /> 100
                                        </label>
                                        <label>
                                            <input type="radio" name="f_username" value="Please add infromation" checked /> Please add infromation
                                        </label>
                                        <label>
                                            <input type="radio" name="job_id" value="Please add infromation" checked /> Please add infromation
                                        </label>
      </div>
      <div class="col-md-6">
			<a href="<?php echo $linkBtn; ?>" id="applybtn" type="button" name="" class="btn btn-primary px-5 py-3"><?php echo $textBtn; ?></a>
      </div>


		</div>
<!--End Freelancer Profile Details-->

<!--Freelancer Profile Details-->	
		<div id="applicant" class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h3>Applicants for this job</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                  <tr>
                      <td>Applicant's username</td>
                      <td>Bid</td>
                  </tr>
                    <?php 
                    $sql = "SELECT * FROM apply WHERE job_id='$job_id' ORDER BY bid";
					$result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        $f_username=$row["f_username"];
                        $bid=$row["bid"];
                        $cover_letter=$row["cover_letter"];

                        echo '
                        <form action="jobDetails.php" method="post">
                        <input type="hidden" name="f_user" value="'.$f_username.'">
                            <tr>
                            <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                            <td>'.$bid.'</td>
                            </form>
                            <form action="jobDetails.php" method="post">
                            <input type="hidden" name="c_letter" value="'.$cover_letter.'">
                            <td><input type="submit" class="btn btn-link btn-lg" value="cover letter"></td>
                            </form>
                            <form action="jobDetails.php" method="post">
                            <input type="hidden" name="f_hire" value="'.$f_username.'">
                            <input type="hidden" name="f_price" value="'.$bid.'">
                            <td><input type="submit" class="btn btn-link btn-lg" value="Accept"></td>
                            </tr>
                        </form>';

                        }
                    } else {
                      $sql = "SELECT * FROM selected WHERE job_id='$job_id'";
					  $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $f_username=$row["f_username"];
                                $bid=$row["price"];
                                $v=$row["valid"];

                                if ($v==0) {
                                	$tc="Job ended";
                                	$tv="";
                                }else{
                                	$tc="End Job";
                                	$tv="f_done";
                                }

                                echo '
                                <form action="jobDetails.php" method="post">
                                <input type="hidden" name="f_user" value="'.$f_username.'">
                                    <tr>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                                    <td>'.$bid.'</td>
                                    </form>
                                    <form action="jobDetails.php" method="post">
                                    <input type="hidden" name="'.$tv.'" value="'.$f_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$tc.'"></td>
                                    </tr>
                                </form>

                                                             
                                ';

                                }
                        } else {
                            echo "<tr></tr><tr><td></td><td>Nothing to show</td></tr>";
                        }
                        }

                       ?>
                     </table>
              </h4></div>
			</div>
			<p></p>
		</div>
<!--End Freelancer Profile Details-->
<!-- Hire Worker -->

<!-- End Hire Worker -->



	</div>
<!--End Column 1-->

<?php 
$sql = "SELECT * FROM employer WHERE username='$e_username' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$e_Name=$row["fname"];
        $e_LName=$row["lname"];
        $profilepic=$row["profilepic"];
        $Email=$row["Email"];
        $contact_no=$row["mnumber"];
        $address=$row["address"];
        $city=$row["city"];
        $province=$row["province"];

        }
} else {
    echo "0 results";
}

?>

<!--Column 2-->
	<div class="col-lg-3">

<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<p></p>
			<img src="asset/img/<?php echo $profilepic; ?>">
			<h2><?php echo $e_Name; ?>, <?php echo $e_LName; ?></h2>
			<p><span class="glyphicon glyphicon-user"></span> <?php echo $e_username; ?></p>
	        <center><a href="sendMessage.php" class="btn btn-info"><span class="glyphicon glyphicon-envelope"></span>  Send Message</a></center>
	        <p></p>
	    </div>
<!--End Main profile card-->
	</div>
<!--End Column 2-->


</div>
</div>
<!--End main body-->



<!--End Footer-->






<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<?php 

if($e_username!=$username && $_SESSION["Usertype"]!=1){
	echo "<script>
		        $('#applybtn').hide();
		</script>";
} 

if($_SESSION["Usertype"]==1 && $jv==0){
	echo "<script>
		        $('#applybtn').hide();
		</script>";
} 
if($e_username!=$username){
	echo "<script>
		        $('#applicant').hide();
		</script>";
}
if($_SESSION["Usertype"] !=2){
	echo "<script>
		        $('#BTTN').hide();
		</script>";
} 
if($_SESSION["Usertype"] !=1){
	echo "<script>
		        $('#HIRE').hide();
		</script>";
} 

?>


</body>
</html>