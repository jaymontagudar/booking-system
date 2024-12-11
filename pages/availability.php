<?php
// pages/availability.php
include '../includes/header.php';

// Redirect if not logged in or not an admin/therapist
if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'therapist') {
    header('Location: login.php');
    exit();
}

require '../config.php';

// Fetch therapist's current availability
$stmt = $pdo->prepare("SELECT * FROM availability WHERE therapist_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$availability = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold mb-8 text-center">Manage Availability</h2>
    
    <!-- Availability Form -->
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <form action="../scripts/manage_availability.php" method="POST">
            <div class="mb-4">
                <label for="date" class="block text-gray-700">Date:</label>
                <input type="date" name="date" id="date" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="time" class="block text-gray-700">Time:</label>
                <input type="time" name="time" id="time" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <button type="submit" name="add_availability" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">Add Availability</button>
        </form>
    </div>
    
    <!-- Current Availability -->
    <div class="mt-8">
        <h3 class="text-2xl font-semibold mb-4">Your Availability</h3>
        <?php if(count($availability) > 0): ?>
            <ul class="space-y-2">
                <?php foreach($availability as $slot): ?>
                    <li class="flex justify-between items-center bg-gray-100 p-4 rounded-lg">
                        <span><?php echo htmlspecialchars($slot['date']); ?> at <?php echo htmlspecialchars($slot['time']); ?></span>
                        <a href="../scripts/manage_availability.php?action=delete&id=<?php echo htmlspecialchars($slot['id']); ?>" class="text-red-500 hover:underline">Delete</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-gray-700">No availability slots added yet.</p>
        <?php endif; ?>
    </div>
</div>

<?php
include '../includes/footer.php';
?>
