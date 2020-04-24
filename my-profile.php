<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_POST['update']))
{    
$id=$_SESSION['stuid'];  
$fullname=$_POST['fullname'];
$mobile=$_POST['mobile'];

$sql="UPDATE tbl_student SET fullname='$fullname',mobile='$mobile' WHERE studentid='$id'";
$query=mysqli_query($con,$sql);
if ($query) {
   echo '<script>alert("Your profile has been updated")</script>';

} else {
     echo '<script>alert("Your profile has Not been updated")</script>';

}

}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Online Library Management System | Student Signup</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> 

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">My Profile</h4>
                
                            </div>

        </div>
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           My Profile
                        </div>
                        <div class="panel-body">
                            <form name="signup" method="post">
<?php 
$id=$_SESSION['stuid'];
$sql="SELECT  * FROM tbl_student WHERE studentid='$id'";
$query=mysqli_query($con,$sql);
while ($result=mysqli_fetch_array($query)) {
    # code...

             ?>  

<div class="form-group">
<label>Student ID : </label>
<?php echo htmlentities($result['studentid']);?>
</div>

<div class="form-group">
<label>Reg Date : </label>
<?php echo htmlentities($result['regdate']);?>
</div>
<?php if($result['updatedate']!=""){?>
<div class="form-group">
<label>Last Updation Date : </label>
<?php echo htmlentities($result['updatedate']);?>
</div>
<?php } ?>


<div class="form-group">
<label>Profile Status : </label>
<?php if($result['status']==1){?>
<span style="color: green">Active</span>
<?php } else { ?>
<span style="color: red">Blocked</span>
<?php }?>
</div>


<div class="form-group">
<label>Enter Full Name</label>
<input class="form-control" type="text" name="fullname" value="<?php echo htmlentities($result['fullname']);?>" autocomplete="off" required />
</div>


<div class="form-group">
<label>Mobile Number :</label>
<input class="form-control" type="text" name="mobile" maxlength="11" value="<?php echo htmlentities($result['mobile']);?>" autocomplete="off" required />
</div>
                                        
<div class="form-group">
<label>Enter Email</label>
<input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($result['email']);?>"  autocomplete="off" required readonly />
</div>
<?php } ?>
                              
<button type="submit" name="update" class="btn btn-primary" id="submit">Update Now </button>

                                    </form>
                            </div>
                        </div>
                            </div>
        </div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
