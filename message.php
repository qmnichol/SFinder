<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
	if ($_SESSION["Usertype"]==1) {
		$linkPro="employeeProfile.php";
		$linkEditPro="editProfile.php";
		$linkBtn="applyJob.php";
		$textBtn="Apply for this job";
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

$sql = "SELECT * FROM message WHERE receiver='$username' ORDER BY timestamp DESC";
$result = $conn->query($sql);
$f=0;

if(isset($_POST["sr"])){
	$t=$_POST["sr"];
	$sql = "SELECT * FROM employe WHERE username='$t'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$_SESSION["f_user"]=$t;
		header("location: viewFreelancer.php");
	} else {
	    $sql = "SELECT * FROM employer WHERE username='$t'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$_SESSION["e_user"]=$t;
			header("location: viewEmployer.php");
		}
	}
}

if(isset($_POST["s_inbox"])){
	$t=$_POST["s_inbox"];
	$sql = "SELECT * FROM message WHERE receiver='$username' and sender='$t' ORDER BY timestamp DESC";
	$result = $conn->query($sql);
	$f=0;
}

if(isset($_POST["s_sm"])){
	$t=$_POST["s_sm"];
	$sql = "SELECT * FROM message WHERE sender='$username' and receiver='$t' ORDER BY timestamp DESC";
	$result = $conn->query($sql);
	$f=1;
}

if(isset($_POST["inbox"])){
	$sql = "SELECT * FROM message WHERE receiver='$username' ORDER BY timestamp DESC";
	$result = $conn->query($sql);
	$f=0;
}

if(isset($_POST["sm"])){
	$sql = "SELECT * FROM message WHERE sender='$username' ORDER BY timestamp DESC";
	$result = $conn->query($sql);
	$f=1;
}

if(isset($_POST["rep"])){
	$_SESSION["msgRcv"]=$_POST["rep"];
	header("location: sendMessage.php");
}




 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Message</title>
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
<div style="padding:2% 3% 1% 3%;">
<div class="row">

<!--Column 1-->
	<div class="col-lg-9">

<!--Freelancer Profile Details-->	
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h3>All Messages</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Message</td>
                          <td>Username</td>
                      </tr>
                      <?php
                      	if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						        $sender=$row["sender"];
						        $receiver=$row["receiver"];
						        $msg=$row["msg"];
						        $timestamp=$row["timestamp"];

						        if ($f==0) {
						        	$sr=$sender;
						        }else{
						        	$sr=$receiver;
						        }


                                echo '
                                <form action="message.php" method="post">
                                <input type="hidden" name="sr" value="'.$sr.'">
                                    <tr>
                                    <td>'.$msg.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$sr.'"></td>
                                    </form>
                                    <form action="message.php" method="post">
                                    <input type="hidden" name="rep" value="'.$sr.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="Reply"></td>
                                    <td>'.$timestamp.'</td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr></tr><tr><td></td><td>Nothing to show</td></tr>";
                        }

                       ?>
                     </table>
              </h4></div>
			</div>
			<p></p>
		</div>
<!--End Freelancer Profile Details-->

	</div>
<!--End Column 1-->


<!--Column 2-->
	<div class="col-lg-3">

<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<p></p>
			<form action="message.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_inbox">
				  <center><button type="submit" class="btn btn-info">Search Inbox</button></center>
				</div>
	        </form>

	        <form action="message.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_sm">
				  <center><button type="submit" class="btn btn-info">Search Sent Messages</button></center>
				</div>
	        </form>

	        <form action="message.php" method="post">
				<div class="form-group">
				  <center><button type="submit" name="inbox" class="btn btn-warning">Inbox Messages</button></center>
				</div>
	        </form>

	        <form action="message.php" method="post">
				<div class="form-group">
				  <center><button type="submit" name="sm" class="btn btn-warning">Sent Messages</button></center>
				</div>
	        </form>

	        <p></p>
	    </div>
<!--End Main profile card-->

	</div>
<!--End Column 2-->

</div>
</div>
<!--End main body-->


<!--Footer-->
<!--End Footer-->


<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="sassets/js/jquery.min.js"></script>


</body>
</html>