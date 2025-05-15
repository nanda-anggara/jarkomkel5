<?php
session_start();

if (!isset($_SESSION['logout'])) {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }