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

// SQL query to fetch all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Check query execution
if (!$result) {
  die("Error: " . $conn->error);
}

// Prepare data for display (optional, can be done in HTML)
$users = array();
if ($result->num_rows > 0) {
  // Loop through each user row
  while($row = $result->fetch_assoc()) {
    $users[] = $row;  // Add user data to an array
  }
}

// Close connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Data</title>
  </head>
<body>
  <h1>All Users</h1>

  <?php if (count($users) > 0): ?>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
      <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['name']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['phone_number']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php else: ?>
  <p>No users found in the database.</p>
  <?php endif; ?>

</body>
</html>

