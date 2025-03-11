<?php 
include 'tanziuserconnect.php';
if(isset($_GET['deleteid'])){
	$username=$_GET['deleteid'];

	$sql="delete from `users1` where username='$username'";

	$result= mysqli_query($con, $sql);
	if($result){
		//echo "Deleted successfully";
		header('location:userdashboard.php');
	} else {
		die(mysqli_error($con));
	}

}

?>