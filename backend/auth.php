<?php
session_start();
require_once __DIR__ . '/db.php';

/**
 * Log in a user
 */
function login($email, $password) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($password, $user['password_hash'])) {
        // Password correct
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = ($user['first_name'] ?? 'User') . ' ' . ($user['last_name'] ?? '');
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['is_super_admin'] = $user['is_super_admin'] ?? 0;
        return true;
    }
    
    return false;
}

/**
 * Log out the current user
 */
function logout() {
    session_unset();
    session_destroy();
}

/**
 * Check if user is logged in
 */
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

/**
 * Require login to access a page
 */
function require_login() {
    if (!is_logged_in()) {
        header("Location: " . BASE_URL . "/admin/login.php");
        exit;
    }
}

/**
 * Require super admin privileges
 */
function require_super_admin() {
    require_login();
    if (empty($_SESSION['is_super_admin'])) {
        die("Access Denied: Super Admin privileges required.");
    }
}
?>
