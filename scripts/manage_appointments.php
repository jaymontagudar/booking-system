<?php
// scripts/manage_appointments.php
session_start();
require '../config.php';

// Ensure user is logged in
if(!isset($_SESSION['user_id'])) {
    header('Location: ../pages/login.php');
    exit();
}

// Handle cancellation
if(isset($_GET['action']) && $_GET['action'] === 'cancel' && isset($_GET['id'])) {
    $appointment_id = $_GET['id'];

    // Update appointment status to 'Cancelled'
    $stmt = $pdo->prepare("UPDATE appointments SET status = 'Cancelled' WHERE id = ? AND user_id = ?");
    if($stmt->execute([$appointment_id, $_SESSION['user_id']])) {
        $_SESSION['success'] = 'Appointment cancelled successfully.';
    } else {
        $_SESSION['error'] = 'Failed to cancel appointment.';
    }

    header('Location: ../pages/appointments.php');
    exit();
} else {
    header('Location: ../pages/dashboard.php');
    exit();
}
?>
