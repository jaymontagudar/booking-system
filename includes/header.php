<?php
// includes/header.php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking System</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Navigation Bar -->
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/index.php" class="text-2xl font-bold text-blue-600">BookingSystem</a>
            <div>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a href="/pages/dashboard.php" class="mr-4 text-blue-500 hover:text-blue-700">Dashboard</a>
                    <a href="/scripts/logout.php" class="text-red-500 hover:text-red-700">Logout</a>
                <?php else: ?>
                    <a href="/pages/login.php" class="mr-4 text-blue-500 hover:text-blue-700">Login</a>
                    <a href="/pages/register.php" class="text-green-500 hover:text-green-700">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
