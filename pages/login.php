<?php
// pages/login.php
include '../includes/header.php';
?>

<div class="container mx-auto px-4 py-16">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        <?php
            if(isset($_SESSION['error'])) {
                echo '<div class="bg-red-100 text-red-700 p-3 rounded mb-4">'. $_SESSION['error'] .'</div>';
                unset($_SESSION['error']);
            }
        ?>
        <form action="../scripts/process_login.php" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" name="email" id="email" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700">Password:</label>
                <input type="password" name="password" id="password" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Login</button>
        </form>
        <p class="mt-4 text-center">Don't have an account? <a href="register.php" class="text-green-500 hover:underline">Register here</a>.</p>
    </div>
</div>

<?php
include '../includes/footer.php';
?>
