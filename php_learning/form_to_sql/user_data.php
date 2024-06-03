<?php

// Database connection details (replace with your actual credentials)
$servername = "localhost";
$username = "rishi";
$password = "Icefrog@234";
$dbname = "smc_user_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Escape user input to prevent SQL injection
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);

// Insert data into database
$sql = "INSERT INTO users (name, email, phone_number)
VALUES ('$name', '$email', '$phone_number')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
