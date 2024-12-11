<?php
// pages/services.php
include '../includes/header.php';
require '../config.php';

// Fetch all services
$stmt = $pdo->query("SELECT * FROM services ORDER BY name ASC");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold mb-8 text-center">Our Services</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach($services as $service): ?>
            <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                <img src="../images/<?php echo htmlspecialchars($service['image']); ?>" alt="<?php echo htmlspecialchars($service['name']); ?>" class="h-40 w-full object-cover rounded-md mb-4">
                <h3 class="text-xl font-semibold mb-2"><?php echo htmlspecialchars($service['name']); ?></h3>
                <p class="text-gray-700 mb-4"><?php echo htmlspecialchars($service['description']); ?></p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-bold text-green-500">$<?php echo htmlspecialchars($service['price']); ?></span>
                    <a href="/pages/booking.php?service_id=<?php echo htmlspecialchars($service['id']); ?>" class="text-blue-500 hover:underline">Book Now</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
include '../includes/footer.php';
?>
