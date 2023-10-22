<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $url = 'http://login:80?username=' . $username .'&password='. $password;
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if (!isset($data['error'])) {
        $_SESSION['user'] = $username;
        $root = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST']; 
        header('Location: ' . $root . '/panel/panel.php'); 
        exit();
    } else {
        $error_message = "Invalid credentials"; 
    }
}
?>
