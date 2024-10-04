<?php
// Check if the 'file' parameter is set in the URL
if (isset($_GET['file'])) {
    // Sanitize the file name to prevent security issues
    $file_name = basename($_GET['file']);
    
    // Construct the file path
    $file_path = __DIR__ . '/' . $file_name; // Change this if the file is in a different directory

    // Check if the file exists
    if (file_exists($file_path)) {
        // Get the contents of the JSON file
        $json_data = file_get_contents($file_path);
        $data = json_decode($json_data, true); // Decode JSON data as an associative array

        if ($data && is_array($data)) {
            echo '<h1>Lecture Data Display</h1>';

            foreach ($data as $lecture) {
                echo '<div class="lecture">';
                echo '<h3>' . htmlspecialchars($lecture['title']) . '</h3>';
                echo '<img src="' . htmlspecialchars($lecture['thumbnail']) . '" alt="' . htmlspecialchars($lecture['title']) . '" class="thumbnail">';
                echo '<p><strong>Subject:</strong> ' . htmlspecialchars($lecture['subject_name']) . '</p>';
                echo '<p><strong>Topic:</strong> ' . htmlspecialchars($lecture['topic_name']) . '</p>';
                echo '<p><strong>Date:</strong> ' . htmlspecialchars($lecture['date']) . '</p>';
                echo '<p><strong>Duration:</strong> ' . htmlspecialchars($lecture['duration']) . '</p>';
                echo '<p><strong>Video ID:</strong> ' . htmlspecialchars($lecture['video_id']) . '</p>';
                echo '<p><strong>Batch ID:</strong> ' . htmlspecialchars($lecture['batch_id']) . '</p>';
                echo '<p><strong>External Video ID:</strong> ' . htmlspecialchars($lecture['video_external_id']) . '</p>';
                echo '<p><strong>Type:</strong> ' . htmlspecialchars($lecture['type']) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No lectures found or invalid JSON format.</p>';
        }
    } else {
        echo '<p>File not found.</p>';
    }
} else {
    echo '<p>No file specified in the URL.</p>';
}
?>
