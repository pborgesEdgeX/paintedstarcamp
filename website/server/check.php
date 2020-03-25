<?php

include('credentials.php');
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//set the headers to be a json string
header('content-type: text/json');

$week = $_POST['week'];
//$week = 'June 22nd - 26th';
//no need to continue if there is no value in the POST username
if(!isset($week))
    exit;

$sql = "SELECT COUNT(*) AS total_name FROM `customers` WHERE week='$week'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_object($result) ;
$myObj->total = $row->total_name;
$myJSON = json_encode($myObj);
echo $myJSON;

mysqli_close($conn);

?>
