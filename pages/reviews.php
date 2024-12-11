<?php
// pages/reviews.php
include '../includes/header.php';

// Redirect if not logged in
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require '../config.php';

// Fetch user's reviews
$stmt = $pdo->prepare("SELECT r.id, s.name AS service, r.rating, r.comment, r.date FROM reviews r JOIN services s ON r.service_id = s.id WHERE r.user_id = ? ORDER BY r.date DESC");
$stmt->execute([$_SESSION['user_id']]);
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold mb-8 text-center">My Reviews</h2>
    
    <?php if(count($reviews) > 0): ?>
        <div class="space-y-4">
            <?php foreach($reviews as $review): ?>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold mb-2"><?php echo htmlspecialchars($review['service']); ?></h3>
                    <p class="text-yellow-500 mb-2">Rating: <?php echo str_repeat('⭐', $review['rating']); ?></p>
                    <p class="text-gray-700 mb-4"><?php echo htmlspecialchars($review['comment']); ?></p>
                    <span class="text-sm text-gray-500"><?php echo htmlspecialchars($review['date']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-center text-gray-700">You have not submitted any reviews yet.</p>
    <?php endif; ?>
</div>

<?php
include '../includes/footer.php';
?>
