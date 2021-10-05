<?php
include "../server.php";
 
$userid = $_POST['userid'];
 
$sql = "SELECT * FROM employe WHERE id= ".$userid;
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_assoc($result) ){
    $mname=$row["mname"];
    $Bdate=$row["Bdate"];
$date = date("M d, Y",strtotime($Bdate));
$fletter = $mname [0];
?>


    
        <div class="modal-body ">
            <form action="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="float-left">Profile picture </label>
                                        <br>
                                        <img src="../asset/img/<?php echo $row['profilepic']; ?>" alt="" height="200" width="200"style="">
                                    </div>
                                </div>
                     
                                <div class="col-md-12">
                                    <div class="">
                                        <label class="float-left">Full Name :</p></label>
                                        <p class="float-left"><?php echo $row['fname']; ?> <?php echo $fletter; ?> <?php echo $row['lname']; ?></p>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="float-left">Email: </label>
                                        <p class="float-left"><?php echo $row['Email']; ?></p>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="float-left">Age: </label>
                                        <p class="float-left"><?php echo $row['Age']; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="float-left">Gender: </label>
                                        <p class="float-left"><?php echo $row['Gender']; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="float-left">Zipcode: </label>
                                        <p class="float-left"><?php echo $row['zipcode']; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="float-left">Birthdate: </label>
                                        <p class="float-left"><?php echo $date; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="float-left">Mobile number : </label>
                                        <p class="float-left"><?php echo $row['mnumber']; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="float-left">Address : </label>
                                        <p class="float-left"><?php echo $row['address']; ?>, <?php echo $row['city']; ?>, <?php echo $row['province']; ?></p>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="float-left">Username : </label>
                                        <p class="float-left"><?php echo $row['username']; ?>, <?php echo $row['city']; ?>, <?php echo $row['province']; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="float-left">Password : </label>
                                        <p class="float-left"><?php echo $row['password']; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="float-left">Valid ID</label>
                                        <br>
                                        <img src="../asset/img/<?php echo $row['validID']; ?>" alt="" height="200" width="200"style="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>        
<?php } ?>