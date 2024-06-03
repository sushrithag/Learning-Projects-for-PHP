<?php

// Define a directory to save uploaded files (modify the path as needed)
$upload_dir = '/var/www/html/smc_uploads/';

// Set the maximum allowed file size (in bytes)
$max_file_size = 25 * 1024 * 1024; // 25 MB

echo "File upload disabled, please enable it in the code";
exit;

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
  $allowed_extensions = array('pdf', 'docx', 'txt');
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
    echo "<button onclick='window.location.href=\"index.html\"'>Return to Homepage</button>"; // Button with JavaScript
  } else {
    echo "Failed to upload file.";
  }
} else {
  echo "No file uploaded or there was an error.";
}


#header("Location: index.html", true, 302);
#exit();

?>
