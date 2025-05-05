<?php
session_start();
include 'tanziuserconnect.php';
// Redirect to login page if not logged in
if (!isset($_SESSION['username'])) {
  header("Location: superuserlogin.php");

  exit();
  
}

else {$username = $_SESSION['username']; // Get the logged-in username
}
// Fetch user info from the database
$sql = "SELECT * FROM superuser WHERE username='$username'";
$result = mysqli_query($con, $sql);

$routes = [
    

  'superuserlogin.php',
  'logoutsuperuser.php',
  'info.html',
  'marks.html',
  'adminlogincss.php',
  'admindashboard.php',
  'adminlogout.php',
  'userresgistration.php',
  'logincss.php',
  'userdashboard.php',
  'logout.php',
  'resetpassword.php'
  


];

//if ($row = mysqli_fetch_assoc($result)) {
  //$email = $row['email'];
  //$gender = $row['gender'];
  //$degree = $row['degree'];
  //$institute = $row['institute'];
//} else {
  //echo "User data not found!";
  //exit();
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf8mb4">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>all-link</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <head>
   
	<style>
		
	h1 {
            background-color:rgb(245, 172, 212); /* Green background */
            color: black;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
	
	
        /* Create a container for the chart with background and padding */
    .chart-container {
            background-color:rgb(191, 227, 240); /* White background for the chart container */
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
    }

        /* Ensure the chart is responsive */
    #piechart {
		margin: 0 auto;
            width: 100%;
            height: 500px; /* Set a fixed height for the chart */
			
	}		

    
        .profile-container {
            display: flex;
            width: 50%;
            height: 80vh;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .left-side {
            width: 25%;
            padding: 20px;
            background-color: #f8f8f8;
            text-align: center;
            border-radius: 10px 0 0 10px;
        }

        .profile-pic {
            width: 80%;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .right-side {
    width: 75%;
    padding: 90px;
    margin-left: 30px; /* Moves the content slightly to the right */
}

        .right-side h2, .right-side p {
    margin-left: 100px; /* Moves the username and degree further to the right */
    padding: 5px 0;
}

        .right-side h2 {
            font-size: 24px;
            color: #333;
        }

        .right-side p {
            font-size: 18px;
            color: #555;
        }
        #profilepicture{
    width: 350px;  /* Adjust width */
    height: 350px; /* Keeps aspect ratio */
        }
        


    </style>
</head>
<body>
<h1>Academic Lab </h1>



            <h2>All Available Routes (Superuser Access)</h2>
    <ul>
        <?php foreach ($routes as $route): ?>
            <li><a href="<?= $route ?>"><?= $route ?></a></li>
        <?php endforeach; ?>
    </ul>
    <br>
            

    <a href="logoutsuperuser.php">Logout</a>

        </div>
    </div>


		
		 
	</div>

	 
	<div id="piechart" style="width: 900px; height: 500px;"></div>	
	</div>
	</div>

</body>
</html>