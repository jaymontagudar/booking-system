<?php
// scripts/manage_availability.php
session_start();
require '../config.php';

// Ensure user is logged in and is a therapist
if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'therapist') {
    header('Location: ../pages/login.php');
    exit();
}

// Handle adding availability
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_availability'])) {
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Validate inputs
    if(empty($date) || empty($time)) {
        $_SESSION['error'] = 'Please fill in all fields.';
        header('Location: ../pages/availability.php');
        exit();
    }

    // Insert availability into database
    $stmt = $pdo->prepare("INSERT INTO availability (therapist_id, date, time) VALUES (?, ?, ?)");
    if($stmt->execute([$_SESSION['user_id'], $date, $time])) {
        $_SESSION['success'] = 'Availability added successfully.';
    } else {
        $_SESSION['error'] = 'Failed to add availability.';
    }

    header('Location: ../pages/availability.php');
    exit();
}

// Handle deleting availability
if(isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $availability_id = $_GET['id'];

    // Delete availability
    $stmt = $pdo->prepare("DELETE FROM availability WHERE id = ? AND therapist_id = ?");
    if($stmt->execute([$availability_id, $_SESSION['user_id']])) {
        $_SESSION['success'] = 'Availability deleted successfully.';
    } else {
        $_SESSION['error'] = 'Failed to delete availability.';
    }

    header('Location: ../pages/availability.php');
    exit();
} else {
    header('Location: ../pages/dashboard.php');
    exit();
}
?>
