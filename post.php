<?php
$val_fname=$val_lname=$val_age=$val_dob=$val_gender=$val_phone=$val_fti="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db_patientwebapp";
	$val_fname = test_input($_POST['fname']);
	$val_lname = test_input($_POST['lname']);
	$val_age = test_input($_POST['age']);
	$val_dob = test_input($_POST['dob']);
	if(isset($_POST['gender'])) $val_gender = test_input($_POST['gender']);
	$val_phone = test_input($_POST['phone']);
	$val_fti = test_input($_POST['fti']);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO tb_patient (fname, lname, age, dob, gender, phone, freetextinfo)
VALUES ('$val_fname', '$val_lname','$val_age','$val_dob','$val_gender','$val_phone','$val_fti')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>