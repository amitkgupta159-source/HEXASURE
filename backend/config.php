<?php
// Site Constants (Common)
define('SITE_NAME', 'Hexasure');
define('ADMIN_EMAIL', 'contact@hexasure.com');

// Environment Detection
$requestHost = parse_url('http://' . ($_SERVER['HTTP_HOST'] ?? ''), PHP_URL_HOST);
$requestHost = strtolower(is_string($requestHost) ? $requestHost : ($_SERVER['SERVER_NAME'] ?? ''));
$is_local = in_array($requestHost, ['localhost', '127.0.0.1', '::1'], true);

$documentRoot = realpath($_SERVER['DOCUMENT_ROOT'] ?? '');
$projectRoot = realpath(__DIR__ . '/..');
$documentRootPath = $documentRoot === false ? '' : rtrim($documentRoot, DIRECTORY_SEPARATOR);
$relativeProjectPath = ($documentRootPath !== '' && $projectRoot !== false && strpos($projectRoot, $documentRootPath . DIRECTORY_SEPARATOR) === 0)
    ? substr($projectRoot, strlen($documentRootPath) + 1)
    : '';
$baseUrl = $relativeProjectPath === ''
    ? ''
    : '/' . str_replace(DIRECTORY_SEPARATOR, '/', $relativeProjectPath);
define('BASE_URL', $baseUrl);

if ($is_local) {
    // ==========================================
    // LOCAL SETTINGS (XAMPP)
    // ==========================================
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'xgroup_db');
    define('DB_USER', 'root');
    define('DB_PASS', '');
} else {
    // ==========================================
    // LIVE SERVER SETTINGS (HOSTINGER)
    // ==========================================
    define('DB_HOST', 'localhost'); 
    define('DB_NAME', 'u532255739_hexasure_live'); 
    define('DB_USER', 'u532255739_sa');
    define('DB_PASS', 'ServerAdmin@20sure');
    
}
?>
