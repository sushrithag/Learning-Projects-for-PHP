<?php

// Define a directory to save uploaded files (modify the path as needed)
$upload_dir = '/var/www/html/smc_uploads/';

$num_files_command = "ls | wc -l";
$num_files_output = shell_exec($num_files_command);

$num_files = trim((int) $num_files_output);
$num_file_limit = 1000;
#echo "There $num_files files uploaded.<br>";
if ($num_files > $num_file_limit) {
	echo "<h1>Error: Couldn't upload as there are more than $num_file_limit files.</h1><br>";
	echo "<h2>Please delete the files before uploading.</h2>";
	exit;
}

// Set the maximum allowed file size (in bytes)
$max_file_size = 25 * 1024 * 1024; // 25 MB

// Check if form is submitted and there is no error
if (isset($_FILES['document']) && $_FILES['document']['error'] === 0) {

  // Get the uploaded file details
  $file_name = $_FILES['document']['name'];
  $file_size = $_FILES['document']['size'];
  $tmp_name = $_FILES['document']['tmp_name'];

  // Validate file size
  if ($file_size > $max_file_size) {
    echo "File size exceeds the limit of 25MB.";
    exit;
  }

  // Validate file type
  $allowed_extensions = array('pdf','py', 'docx', 'txt');
  $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

  $allowed_mime_types = array('image/jpeg', 'image/png', 'image/gif');
  $file_mime_type = mime_content_type($tmp_name);
  if (!in_array($file_extension, $allowed_extensions) && !in_array($file_mime_type, $allowed_mime_types)) {
    echo "Invalid file type. Please upload a PDF, Docx, JPEG, PNG, or GIF).";
    exit;
  }

  // Generate a unique filename
  $new_file_name = uniqid() . '_' . $file_name;

  // Check if the file upload is successful
  if (move_uploaded_file($tmp_name, $upload_dir . $new_file_name)) {
    echo "<h1>Upload Successful!</h1>";
    echo "<p>Your file name is: " . $new_file_name . "</p>";
  } else {
    echo "<h1>Failed to upload file.</h1>";
  }
} else {
  echo "<h1>No file uploaded or there was an error.</h1>";
}

echo "<button onclick='window.location.href=\"index.html\"'>Return to Homepage</button>"; // Button with JavaScript

#header("Location: index.html", true, 302);
#exit();

?>
