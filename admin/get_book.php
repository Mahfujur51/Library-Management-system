<?php 
require_once("includes/config.php");
if(!empty($_POST["isbnnumber"])) {
	$isbnnumber=$_POST["isbnnumber"];

	$sql ="SELECT * FROM tbl_book WHERE isbnnumber='$isbnnumber'";
	$query=mysqli_query($con,$sql);
	$num=mysqli_num_rows($query);
	if ($num>0) {
		while ($result=mysqli_fetch_array($query)) {?>
			<option value="<?php echo $result['id'];?>"><?php echo htmlentities($result['bookname']);?></option>
			<b>Book Name :</b> 
			<?php  
			echo htmlentities($result['bookname']);
			echo "<script>$('#submit').prop('disabled',false);</script>";
		}

	}
	else{?>
		<option class="others"> Invalid ISBN Number</option>
	<?php
	echo "<script>$('#submit').prop('disabled',true);</script>";
	}
}


?>
