<?php 
require_once("includes/config.php");
if(!empty($_POST["studentid"])) {
	$studentid= strtoupper($_POST["studentid"]);

	$sql ="SELECT *  FROM tbl_student WHERE studentid='$studentid'";
	$query=mysqli_query($con,$sql);
	$num=mysqli_num_rows($query);
	if ($num>0) {
		while ($result=mysqli_fetch_array($query)) {
			if ($result['status']==0) {
				echo "<span style='color:red'> Student ID Blocked </span>"."<br />";
				echo "<b>Student Name-</b>".$result['fullname'];
				echo "<script>$('#submit').prop('disabled',true);</script>";
			}else{
				echo htmlentities($result['fullname']);
				echo "<script>$('#submit').prop('disabled',false);</script>";

			}


		}
	}else{
		echo "<span style='color:red'> Invaid Student Id. Please Enter Valid Student id .</span>";
	echo "<script>$('#submit').prop('disabled',true);</script>";

	}

} 




?>
