<?php

// Change this only !
$EmailTo = "shannen@paintedstarequestrian.com";
$name = "Manager";
$email = "Shannen's Assistant\n\n";
$subject ="New Appointment: \n\n";
$number = "7605740037";
$headers = "From: " . "camp@paintedstarequestrian.com" . "\r\n";
$headers .= "Reply-To: ". "camp@paintedstarequestrian.com" . "\r\n";
$headers .= "CC: pborges7@icloud.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$Text .= "Customer: ";
$Text .= "Paulo";
$Text .= "\n";
$Text .= "Service: ";
$Text .= "\n";
$Text .= "Phone: ";
$Text .= "\n";
$Text .= "Date: ";
$Text .= "\n";
$Text .= "Hour: ";
$Text .= "\n";
$Text .= "Status: ";
$Text .= "Confirmed";
$Text .= "\n";

$sub = "Camp Registration\n\n";

$servername = "mysql.paintedstarequestrian.com";
$username = "pborges";
$password = "pc3105da";
$dbname = "clientsps_db";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT CustomersID, parentName, lastName, email, phone FROM customers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
				echo "<table>";
				echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th></tr>";
				echo "<tr>"."<th>". $row["CustomersID"]."</th>"."<th>". $row["parentName"]. "</th>" ."<th>". $row["lastName"] . "</th>"."<th>" .$row["email"] ."</th>". "<th>".$row["phone"] ."</th>". "</tr>";
				echo "</table>";
		}
} else {
    echo "0 results";
}

$conn->close();
?>
