<?php
session_start();

if (isset($_SESSION['user'])) {
    include('panel/panel.php');
} else {
    include('login/login.php');
}
?>