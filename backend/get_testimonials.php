<?php
require_once __DIR__ . '/config.php';

function get_testimonials() {
    // Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if ($conn->connect_error) {
        error_log("Connection failed: " . $conn->connect_error);
        return [];
    }

    $sql = "SELECT * FROM M_Testimonal WHERE Deleted = 0 ORDER BY SlideOrder ASC";
    $result = $conn->query($sql);

    $testimonials = [];

    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $testimonials[] = $row;
        }
    }

    $conn->close();

    return $testimonials;
}
?>
