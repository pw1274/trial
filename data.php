<?php
// Get the file name from the URL
$file_name = $_GET['file'] ?? '';

// Sanitize the file name to prevent security issues
$file_name = basename($file_name);

// Construct the GitHub raw URL
$raw_url = "https://raw.githubusercontent.com/pw1274/trial/main/$file_name";

$data = [];
$error = '';

// Fetch data from the GitHub URL
if (!empty($file_name)) {
    $json_data = file_get_contents($raw_url);
    
    if ($json_data === FALSE) {
        $error = "Error fetching data from $file_name";
    } else {
        $data = json_decode($json_data, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            $error = "Error decoding JSON from $file_name";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .error { color: red; }
        .data { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Data from <?php echo htmlspecialchars($file_name); ?></h1>
    
    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php else: ?>
        <div class="data">
            <pre><?php echo htmlspecialchars(json_encode($data, JSON_PRETTY_PRINT)); ?></pre>
        </div>
    <?php endif; ?>
</body>
</html>
