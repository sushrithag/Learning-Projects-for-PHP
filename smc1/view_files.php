<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uploaded Files</title>
</head>
<body>
  <h1>Uploaded Files</h1>
  <?php

  // Define the upload directory path
  $upload_dir = '/var/www/html/smc_uploads/';

  // Get a list of files in the directory (excluding "." and "..")
  $files = array_diff(scandir($upload_dir), array('.', '..', 'index.html'));

  if (empty($files)) {
    echo "No files found.";
  } else {
    echo "<table>";
    echo "  <thead>";
    echo "    <tr>";
    echo "      <th>Filename</th>";
    echo "      <th>View</th>";
    echo "      <th>Delete</th>";
    echo "    </tr>";
    echo "  </thead>";
    echo "  <tbody>";
    foreach ($files as $filename) {
      echo "    <tr>";
      echo "      <td>" . $filename . "</td>";
      echo "      <td><a href='/smc_uploads/". $filename . "'>View</a></td>";
      echo "      <td><a href='delete.php?delete=" . $filename . "'>Delete</a></td>";
      echo "    </tr>";
    }
    echo "  </tbody>";
    echo "</table>";
  }

  ?>
</body>
</html>
