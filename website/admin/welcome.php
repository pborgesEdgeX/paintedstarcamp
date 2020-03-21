<?php
// Initialize the session
session_start();
require_once "credentials.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <!--===============================================================================================-->
    	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="css/util.css">
    	<link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b>Shannen</b>, Here it's your list of customers:</h1>
    </div>
        <div class="limiter" style="background-color: white;">
      		<div class="container-table100" style="background-color: #3f93d3;">
      			<div class="wrap-table100">
      				<div class="table100 ver1">
      					<div class="table100-firstcol">
      						<table>
      							<thead>
      								<tr class="row100 head">
      									<th class="cell100 column1">Parents</th>
      								</tr>
      							</thead>
      							<tbody>


                      <?php
                      // Create connection
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      // Check connection
                      if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                      }

                      $sql = "SELECT CustomersID, parentName, lastName, email, phone, studentName, age, week, email_sent, text_sent FROM customers";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                      				echo '<tr class="row100 body">';
                      				echo '<td class="cell100 column1">'.$row['parentName'].' '.$row['lastName'].'</td>';
                      				echo "</tr>";
                      		}
                      } else {
                          echo "0 results";
                      }
                      ?>

      							</tbody>
      						</table>
      					</div>

      					<div class="wrap-table100-nextcols js-pscroll">
      						<div class="table100-nextcols">
      							<table>
      								<thead>
      									<tr class="row100 head">
      										<th class="cell100 column2">Email</th>
      										<th class="cell100 column3">Phone</th>
      										<th class="cell100 column4">Student Name</th>
      										<th class="cell100 column5">Age</th>
      										<th class="cell100 column6">Week</th>
      										<th class="cell100 column7">Email Sent?</th>
      										<th class="cell100 column8">Text Sent?</th>
      									</tr>
      								</thead>
      								<tbody>
                        <?php
                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT CustomersID, parentName, lastName, email, phone, studentName, age, week, email_sent, text_sent FROM customers";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {

                                echo '<tr class="row100 body">';
                                echo '<td class="cell100 column1">'.$row['email'].'</td>';
                                echo '<td class="cell100 column2">'.$row['phone'].'</td>';
                                echo '<td class="cell100 column3">'.$row['studentName'].'</td>';
                                echo '<td class="cell100 column4">'.$row['age'].'</td>';
                                echo '<td class="cell100 column5">'.$row['week'].'</td>';
                                echo '<td class="cell100 column6">'.$row['email_sent'].'</td>';
                                echo '<td class="cell100 column6">'.$row['text_sent'].'</td>';
                                echo "</tr>";

                            }
                        } else {
                            echo "0 results";
                        }

                        ?>

      								</tbody>
      							</table>
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>
