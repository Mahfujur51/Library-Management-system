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
        $id=intval($_GET['athrid']);
        $authorname=$_POST['authorname'];
        $sql="UPDATE tbl_author SET authorname='$authorname' WHERE id='$id'";
        $query=mysqli_query($con,$sql);
        if ($query) {
            $_SESSION['updatemsg']="Author info updated successfully";
            header('location:manage-authors.php');
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
        <title>Online Library Management System | Add Author</title>
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
                        <h4 class="header-line">Add Author</h4>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Author Info
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Author Name</label>
                                        <?php
                                        $id=intval($_GET['athrid']);
                                        $sql = "SELECT * from  tbl_author where id='$id'";
                                        $query=mysqli_query($con,$sql);
                                        $num=mysqli_num_rows($query);
                                        if ($num>0) {
                                            while ($result=mysqli_fetch_array($query)) {
                                        # code...
                                                ?>
                                                <input class="form-control" type="text" name="authorname" value="<?php echo htmlentities($result['authorname']);?>" required />
                                            <?php }} ?>
                                        </div>
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