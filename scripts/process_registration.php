<?php
// scripts/process_registration.php
session_start();
require '../config.php';

// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validate inputs
    if(empty($name) || empty($email) || empty($password)) {
        $_SESSION['error'] = 'Please fill in all fields.';
        header('Location: ../pages/register.php');
        exit();
    }

    // Check if email already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if($stmt->fetch()) {
        $_SESSION['error'] = 'Email is already registered.';
        header('Location: ../pages/register.php');
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user into database
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'user')");
    if($stmt->execute([$name, $email, $hashedPassword])) {
        $_SESSION['success'] = 'Registration successful. Please log in.';
        header('Location: ../pages/login.php');
        exit();
    } else {
        $_SESSION['error'] = 'Registration failed. Please try again.';
        header('Location: ../pages/register.php');
        exit();
    }
} else {
    header('Location: ../pages/register.php');
    exit();
}
?>
