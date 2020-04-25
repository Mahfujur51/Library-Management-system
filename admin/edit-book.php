<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{
    header('location:index.php');
}
else{
    if(isset($_POST['update']))
    {
        $bookname=$_POST['bookname'];
        $catid=$_POST['catid'];
        $authorid=$_POST['authorid'];
        $isbnnumber=$_POST['isbnnumber'];
        $bookprice=$_POST['bookprice'];
        $id=intval($_GET['bookid']);
        $sql3="UPDATE tbl_book SET bookname='$bookname',catid='$catid',authorid='$authorid',isbnnumber='$isbnnumber',bookprice='$bookprice' WHERE id ='$id'";
        $query3=mysqli_query($con,$sql3);
        if ($query3) {
            $_SESSION['msg']="Book info updated successfully";
            header('location:manage-books.php');
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
        <title>Online Library Management System | Edit Book</title>
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
        <div class="content-wra
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">Add Book</h4>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Book Info
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                    <?php
                                    $id=intval($_GET['bookid']);
                                    $sql = "SELECT * FROM tbl_book JOIN tbl_catagory on  tbl_catagory.id=tbl_book.catid JOIN tbl_author on tbl_author.id=tbl_book.authorid WHERE tbl_book.id='$id'";
                                    $query=mysqli_query($con,$sql);
                                    $num=mysqli_num_rows($query);
                                    if ($num>0) {
                                        while ($result=mysqli_fetch_array($query)) {
                                        # code...
                                            ?>
                                            <div class="form-group">
                                                <label>Book Name<span style="color:red;">*</span></label>
                                                <input class="form-control" type="text" name="bookname" value="<?php echo htmlentities($result['bookname']);?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label> Category<span style="color:red;">*</span></label>
                                                <select class="form-control" name="catid" required="required">
                                                    <option value="<?php echo htmlentities($result['catid']);?>"> <?php echo htmlentities($result['catname']);?></option>
                                                    <?php
                                                    $status=1;
                                                    $sql1 = "SELECT * from  tbl_catagory where status='$status'";
                                                    $query1=mysqli_query($con,$sql1);
                                                    $num1=mysqli_num_rows($query1);
                                                    if ($num1>0) {
                                                        while ($result1=mysqli_fetch_array($query1)) {
                                                            ?>
                                                            <option value="<?php echo htmlentities($result1['id']);?>"><?php echo htmlentities($result1['catname']);?></option>
                                                        <?php }} ?>
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label> Author<span style="color:red;">*</span></label>
                                                    <select class="form-control" name="authorid" required="required">
                                                        <option value="<?php echo htmlentities($result['authorid']);?>"> <?php echo htmlentities($result['authorname']);?></option>
                                                        <?php
                                                        $sql2 = "SELECT * from  tbl_author ";
                                                        $query2=mysqli_query($con,$sql2);
                                                        $num3=mysqli_num_rows($query2);
                                                        if ($num3>0) {
                                                            while ($result2=mysqli_fetch_array($query2)) {
                                                # code...
                                                                
                                                                ?>
                                                                <option value="<?php echo htmlentities($result2['id']);?>"><?php echo htmlentities($result2['authorname']);?></option>
                                                            <?php }} ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>ISBN Number<span style="color:red;">*</span></label>
                                                        <input class="form-control" type="text" name="isbnnumber" value="<?php echo htmlentities($result['isbnnumber']);?>"  required="required" />
                                                        <p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be unique</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Price in USD<span style="color:red;">*</span></label>
                                                        <input class="form-control" type="text" name="bookprice" value="<?php echo htmlentities($result['bookprice']);?>"   required="required" />
                                                    </div>
                                                <?php }} ?>
                                                <button type="submit" name="update" class="btn btn-info">Update </button>
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