<?php
// scripts/process_login.php
session_start();
require '../config.php';

// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validate inputs
    if(empty($email) || empty($password)) {
        $_SESSION['error'] = 'Please fill in all fields.';
        header('Location: ../pages/login.php');
        exit();
    }

    // Fetch user from database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user) {
        // Verify password
        if(password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role']; // e.g., 'user', 'admin', 'therapist'
            header('Location: ../index.php');
            exit();
        } else {
            $_SESSION['error'] = 'Incorrect password.';
            header('Location: ../pages/login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'No account found with that email.';
        header('Location: ../pages/login.php');
        exit();
    }
} else {
    header('Location: ../pages/login.php');
    exit();
}
?>
