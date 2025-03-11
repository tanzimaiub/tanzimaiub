<?php
session_start();
include 'tanziuserconnect.php';
// Redirect to login page if not logged in
if (!isset($_SESSION['username'])) {
  header("Location: logincss.php");

  exit();
  
}

else {$username = $_SESSION['username']; // Get the logged-in username
}
// Fetch user info from the database
$sql = "SELECT * FROM userinfo WHERE username='$username'";
$result = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($result)) {
  $email = $row['email'];
  $gender = $row['gender'];
  $degree = $row['degree'];
  $institute = $row['institute'];
} else {
  echo "User data not found!";
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf8mb4">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>userdashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['students', 'contribution'],
          <?php
          $sql = "SELECT gender, count(gender) as number FROM userinfo GROUP BY gender";
          $fire = mysqli_query($con, $sql);
           while($result= mysqli_fetch_assoc($fire)) {
            echo"['".$result['gender']."', ".$result['number']."],";
           }
          ?>
        ]);

        var options = {
          title: 'Male VS Female'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
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
<h2>User Dashboard </h2>
    <div class="profile-container">
        <!-- Left side - Profile Picture -->
        <div class="left-side">
        <img id="profilepicture" src="tanha.png" alt="Graduation Cap and Scroll">
        </div>

        <!-- Right side - Username and Degree 
        <div class="right-side">
            <h2>JohnDoe</h2>
            <p> Admin of Academic Lab</p>
            <p>Bachelor of Science in Computer Science</p>
            <p>Independent University </p>

        </div>-->
        
    </div>

	<button class= "btn btn-danger"><a class="text-light" href="userdeleteitself.php? deleteid='.$username.'">Delete</a></button>
  <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>Email: <?php echo htmlspecialchars($email); ?></p>
    <p>Gender: <?php echo htmlspecialchars($gender); ?></p>
    <p>Degree: <?php echo htmlspecialchars($degree); ?></p>
    <p>Institute: <?php echo htmlspecialchars($institute); ?></p>
    <a href="logout.php">Logout</a>

	<h1> Users Table</h1>
	<div class="chart-container">
	<div class="container">
		<button class="btn btn-primary my-5"><a href="userregistration.php"
		class="text-light">Add user</a>
		
		</button>
		<table class="table">
  <thead>
    <tr>
	
      <th scope="col">USERNAME</th>
      <th scope="col">EMAIL</th>
	  <th scope="col">GENDER</th>
	  <th scope="col">DEGREE</th>
	  <th scope="col">INSTITUTE</th>

      
    </tr>
  </thead>
  <tbody>

<?php

$sql = "SELECT username, email, gender, degree, institute FROM userinfo";

$result = mysqli_query($con, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        
      $username = $row['username'];
        $email = $row['email'];
        $gender = $row['gender'];
        $degree = $row['degree'];
        $institute = $row['institute'];

        // Output the data in the table
        
        echo '<tr>
            <th scope="row">' . $username . '</th>
            <td>' . $email . '</td>
            <td>' . $gender . '</td>
            <td>' . $degree . '</td>
            <td>' . $institute . '</td>
            
        </tr>';
    }

}
$con->close();
?>


	
    <!--<tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
	  $packageid=$_POST['packageid'];
	$type=$_POST['type'];
	$date=$_POST['date'];
	$status=$_POST['status'];
	$grade=$_POST['grade'];
	$action=$_POST['action'];
    </tr>
    
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>-->
  </tbody>
</table>
		
		 
	</div>

	 
	<div id="piechart" style="width: 900px; height: 500px;"></div>	
	</div>
	</div>

</body>
</html>