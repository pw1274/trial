<?php
header('Content-Type: application/json');

$url = 'https://raw.githubusercontent.com/pw1274/trial/main/electricity-udiamond.json';
$data = file_get_contents($url);

if ($data === false) {
    echo json_encode(['error' => 'Failed to fetch data from the URL.']);
    exit;
}

echo $data;
?>
