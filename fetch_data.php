<?php
header('Content-Type: application/json');
$url = 'https://raw.githubusercontent.com/pw1274/trial/main/electricity-udiamond.json';
echo file_get_contents($url);
?>
