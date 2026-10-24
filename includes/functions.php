<?php
/**
 * General Helper Functions
 */

// Sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Redirect helper
function redirect($url) {
    header("Location: " . $url);
    exit();
}

// Format date
function format_date($date_string) {
    return date("F j, Y", strtotime($date_string));
}

// Truncate text for excerpts
function truncate_text($text, $limit = 150) {
    $text = strip_tags($text);
    if (strlen($text) > $limit) {
        $text = substr($text, 0, $limit) . '...';
    }
    return $text;
}
?>
