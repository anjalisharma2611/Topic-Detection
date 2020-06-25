<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ind.php");
} else if (isset($_SESSION['user']) != "") {
    header("Location: ind.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("Location: ind.php");
    exit;
}
