<?php
header('Content-Type: application/json');

// URL to your JSON file in the GitHub repository
$url = 'https://raw.githubusercontent.com/pw1274/trial/main/electricity-udiamond.json';

// Fetch the data from the URL
$data = file_get_contents($url);

// Check if the data was fetched successfully
if ($data === false) {
    echo json_encode(['error' => 'Failed to fetch data from the URL.']);
    exit;
}

// Return the JSON data
echo $data;
?>
