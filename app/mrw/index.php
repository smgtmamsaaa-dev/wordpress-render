<?php
/**
 * Smart Router for XAMPP and Production
 */

// Basic error reporting for debugging (can be turned off later)
error_reporting(0); 

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = trim($request, '/');

// Get the last part of the URL as the page name
$parts = explode('/', $path);
$page = end($parts);

// Default to index if empty
if (empty($page) || $path == '' || is_dir(__DIR__ . '/' . $path)) {
    $page = 'index';
}

$file = __DIR__ . '/pages/' . $page . '.php';

if (file_exists($file)) {
    require_once $file;
} else {
    // Check if it's a real file (assets like css/js/images)
    // We check from the root of the project
    // Since assets are usually requested as /css/style.css, we need to find them relative to this index.php
    
    // This part is mostly for PHP built-in server, 
    // in XAMPP/Apache, .htaccess usually handles this before reaching here.
    $asset_path = __DIR__ . '/' . $page; 
    if (file_exists($asset_path) && !is_dir($asset_path)) {
        return false;
    }
    
    // Fallback to index
    require_once __DIR__ . '/pages/index.php';
}
?>
