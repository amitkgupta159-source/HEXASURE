<?php
require_once 'db.php';
require_once '../includes/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $organization = sanitize_input($_POST['organization']);
    $region = sanitize_input($_POST['region']);
    $message = sanitize_input($_POST['message']);
    
    // Default type for investment form
    $type = 'partnership'; 

    if (empty($name) || empty($email)) {
        die("Name and Email are required.");
    }

    try {
        // Reusing contact_messages table as per plan
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, company, region, type, message) VALUES (:name, :email, :company, :region, :type, :message)");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':company' => $organization, // Mapping organization to company column
            ':region' => $region,
            ':type' => $type,
            ':message' => $message
        ]);

        // Send Email Notification
        $to = ADMIN_EMAIL;
        $subject = "New Partnership/Investment Enquiry";
        $body = "Name: $name\nEmail: $email\nOrganization: $organization\nMessage:\n$message";
        $headers = "From: no-reply@xgroup.com";
        
        // mail($to, $subject, $body, $headers); 

        redirect('../investment?success=1');

    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    redirect('../investment');
}
?>
