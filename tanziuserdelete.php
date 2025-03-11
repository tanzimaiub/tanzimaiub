<?php 
include 'tanziuserconnect.php';
if(isset($_GET['deleteid'])){
	$id=$_GET['deleteid'];

	$sql="delete from `testimonial2` where id=$id";

	$result= mysqli_query($con, $sql);
	if($result){
		//echo "Deleted successfully";
		header('location:userdasboard.php');
	} else {
		die(mysqli_error($con));
	}

}

?>