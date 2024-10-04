<?php
// Check if 'file' parameter is set
if (isset($_GET['file'])) {
    // Sanitize the filename to prevent directory traversal attacks
    $filename = basename($_GET['file']);

    // Define the directory where your JSON files are stored
    $directory = 'path/to/your/json/files/'; // Update this to your actual folder path

    // Construct the full path to the JSON file
    $filepath = $directory . $filename;

    // Check if the file exists
    if (file_exists($filepath)) {
        // Read the JSON file
        $jsonData = file_get_contents($filepath);
        // Decode JSON to an associative array
        $data = json_decode($jsonData, true);

        // Output the data in JSON format
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        // Handle the case where the file doesn't exist
        header('HTTP/1.1 404 Not Found');
        echo json_encode(['error' => 'File not found']);
    }
} else {
    // Handle the case where 'file' parameter is not set
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'File parameter is missing']);
}
?>
