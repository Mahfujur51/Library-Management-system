<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['return']))
{
$id=intval($_GET['rid']);
$fine=$_POST['fine'];
$rstatus=1;
$sql="UPDATE tbl_issu SET returnstatus='$rstatus',fine='$fine'WHERE id='$id'";
$query=mysqli_query($con,$sql);
if ($query) {
    $_SESSION['msg']="Book Returned successfully";
header('location:manage-issued-books.php');

   
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
    <title>Online Library Management System | Issued Book Details</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<script>
// function for get student name
function getstudent() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_student.php",
data:'studentid='+$("#studentid").val(),
type: "POST",
success:function(data){
$("#get_student_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

//function for book details
function getbook() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_book.php",
data:'bookid='+$("#bookid").val(),
type: "POST",
success:function(data){
$("#get_book_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script> 
<style type="text/css">
  .others{
    color:red;
}

</style>


</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Issued Book Details</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
<div class="panel panel-info">
<div class="panel-heading">
Issued Book Details
</div>
<div class="panel-body">
<form role="form" method="post">
<?php 
$rid=intval($_GET['rid']);
$sql = "SELECT tbl_student.fullname,tbl_book.bookname,tbl_book.isbnnumber,tbl_issu.issudate,tbl_issu.returndate,tbl_issu.fine,tbl_issu.returnstatus,tbl_issu.id as rid from  tbl_issu join tbl_student on tbl_student.studentid=tbl_issu.studentid join tbl_book on tbl_book.id=tbl_issu.bookid WHERE tbl_issu.id='$rid'";
$query=mysqli_query($con,$sql);
$num=mysqli_num_rows($query);
if ($num>0) {
    while ($result=mysqli_fetch_array($query)) {
        # code...
            ?>                                      
                   



<div class="form-group">
<label>Student Name :</label>
<?php echo htmlentities($result['fullname']);?>
</div>

<div class="form-group">
<label>Book Name :</label>
<?php echo htmlentities($result['bookname']);?>
</div>


<div class="form-group">
<label>ISBN :</label>
<?php echo htmlentities($result['isbnnumber']);?>
</div>

<div class="form-group">
<label>Book Issued Date :</label>
<?php echo htmlentities($result['issudate']);?>
</div>


<div class="form-group">
<label>Book Returned Date :</label>
<?php if($result['returndate']=="")
                                            {
                                                echo htmlentities("Not Return Yet");
                                            } else {


                                            echo htmlentities($result['returndate']);
}
                                            ?>
</div>

<div class="form-group">
<label>Fine (in USD) :</label>
<?php if ($result['fine']=='0'): ?>
    <input type="text" class="form-control" name="fine">
    <?php else:
     echo $result['fine'];

     ?>
    
<?php endif ?>
<br>
<?php if ($result['returnstatus']=='0'): ?>
    <button type="submit" name="return" id="submit" class="btn btn-info">Return Book </button>

<?php endif ?>

 



 </div>

<?php }} ?>
                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
   
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
<?php } ?>
