<?php
// pages/dashboard.php
include '../includes/header.php';

// Redirect if not logged in
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch user information from the database
require '../config.php';

$stmt = $pdo->prepare("SELECT name, email FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold mb-8 text-center">Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <a href="appointments.php" class="block bg-white p-6 rounded-lg shadow-lg hover:bg-gray-100">
            <h3 class="text-xl font-semibold mb-2">My Appointments</h3>
            <p class="text-gray-700">View and manage your upcoming and past appointments.</p>
        </a>
        <a href="services.php" class="block bg-white p-6 rounded-lg shadow-lg hover:bg-gray-100">
            <h3 class="text-xl font-semibold mb-2">Our Services</h3>
            <p class="text-gray-700">Browse and book from our wide range of services.</p>
        </a>
        <a href="reviews.php" class="block bg-white p-6 rounded-lg shadow-lg hover:bg-gray-100">
            <h3 class="text-xl font-semibold mb-2">My Reviews</h3>
            <p class="text-gray-700">View and manage your submitted reviews.</p>
        </a>
    </div>
</div>

<?php
include '../includes/footer.php';
?>
