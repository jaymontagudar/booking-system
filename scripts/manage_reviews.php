<?php
// scripts/manage_reviews.php
session_start();
require '../config.php';

// Ensure user is logged in
if(!isset($_SESSION['user_id'])) {
    header('Location: ../pages/login.php');
    exit();
}

// Handle adding a review
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_review'])) {
    $service_id = $_POST['service_id'];
    $rating = $_POST['rating'];
    $comment = trim($_POST['comment']);

    // Validate inputs
    if(empty($service_id) || empty($rating) || empty($comment)) {
        $_SESSION['error'] = 'Please fill in all fields.';
        header('Location: ../pages/dashboard.php');
        exit();
    }

    // Insert review into database
    $stmt = $pdo->prepare("INSERT INTO reviews (user_id, service_id, rating, comment, date) VALUES (?, ?, ?, ?, NOW())");
    if($stmt->execute([$_SESSION['user_id'], $service_id, $rating, $comment])) {
        $_SESSION['success'] = 'Review submitted successfully.';
    } else {
        $_SESSION['error'] = 'Failed to submit review.';
    }

    header('Location: ../pages/reviews.php');
    exit();
}

// Handle deleting a review
if(isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $review_id = $_GET['id'];

    // Delete review
    $stmt = $pdo->prepare("DELETE FROM reviews WHERE id = ? AND user_id = ?");
    if($stmt->execute([$review_id, $_SESSION['user_id']])) {
        $_SESSION['success'] = 'Review deleted successfully.';
    } else {
        $_SESSION['error'] = 'Failed to delete review.';
    }

    header('Location: ../pages/reviews.php');
    exit();
} else {
    header('Location: ../pages/dashboard.php');
    exit();
}
?>
