<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('../contact.php');
}

$posted = static function (string $key): string {
    $value = $_POST[$key] ?? '';
    return is_string($value) ? trim($value) : '';
};

$name = sanitize_input($posted('name'));
$email = sanitize_input($posted('email'));
$region = sanitize_input($posted('region'));
$message = sanitize_input($posted('message'));
$programme = $posted('type');
$programmes = [
    'cube_puzzles' => 'Cube Puzzles & Speedcubing',
    'sudoku_reasoning' => 'Sudoku & Logical Reasoning',
    'math_olympiad' => 'Mathematical Olympiad & Problem-Solving',
    'not_sure' => 'Not sure yet',
];

if (
    $name === '' ||
    strlen($name) > 120 ||
    !filter_var($email, FILTER_VALIDATE_EMAIL) ||
    strlen($email) > 254 ||
    strlen($region) > 120 ||
    strlen($message) > 2000 ||
    !isset($programmes[$programme]) ||
    $posted('guardian_confirmation') !== '1'
) {
    redirect('../contact.php?error=invalid');
}

$messageParts = [
    'Adult contact confirmation: adult; parent/guardian submitting for any student under 18.',
    'Programme of interest: ' . $programmes[$programme],
];

if ($message !== '') {
    $messageParts[] = 'Learning goals or questions: ' . $message;
}

try {
    $stmt = $pdo->prepare(
        'INSERT INTO contact_messages (name, email, company, region, type, message)
         VALUES (:name, :email, :company, :region, :type, :message)'
    );
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':company' => '',
        ':region' => $region,
        // Keep the legacy type value; the selected programme is stored in the message.
        ':type' => 'general',
        ':message' => implode("\n\n", $messageParts),
    ]);

    redirect('../contact.php?success=1');
} catch (PDOException $e) {
    error_log('Contact enquiry could not be saved: ' . $e->getMessage());
    redirect('../contact.php?error=submit');
}
