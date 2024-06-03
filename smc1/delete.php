<?php

// Set the base directory where uploaded files are stored (modify the path as needed)
$upload_dir = '/var/www/html/smc_uploads/';

// Check if a file deletion request is submitted
if (isset($_GET['delete']) && !empty($_GET['delete'])) {

// Sanitize the filename to prevent path manipulation vulnerabilities
$filename = filter_var($_GET['delete'], FILTER_SANITIZE_STRING);

// Construct the complete file path
$file_path = $upload_dir . $filename;

// Check if the file exists
if (file_exists($file_path)) {

// Attempt to delete the file
if (unlink($file_path)) {
echo "<h1>File deleted successfully.</h1>";
} else {
echo "<h1>Failed to delete file.</h1>";
}
} else {
echo "<h1>File not found.</h1>";
}
} else {
echo "<h1>No file specified for deletion.</h1>";
}
echo "<button onclick='window.location.href=\"view_files.php\"'>Return to View Files</button><br>"; // Button with JavaScript
echo "<button onclick='window.location.href=\"index.html\"'>Return to Homepage</button>"; // Button with JavaScript
?>
