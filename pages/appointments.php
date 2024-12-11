<?php
// pages/appointments.php
include '../includes/header.php';

// Redirect if not logged in
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require '../config.php';

// Fetch user's appointments
$stmt = $pdo->prepare("SELECT a.id, s.name AS service, a.date, a.time, a.status FROM appointments a JOIN services s ON a.service_id = s.id WHERE a.user_id = ? ORDER BY a.date DESC, a.time DESC");
$stmt->execute([$_SESSION['user_id']]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold mb-8 text-center">My Appointments</h2>
    
    <?php if(count($appointments) > 0): ?>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-lg">
                <thead>
                    <tr>
                        <th class="py-3 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase">Service</th>
                        <th class="py-3 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase">Date</th>
                        <th class="py-3 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase">Time</th>
                        <th class="py-3 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase">Status</th>
                        <th class="py-3 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($appointments as $appointment): ?>
                        <tr class="border-b">
                            <td class="py-4 px-6"><?php echo htmlspecialchars($appointment['service']); ?></td>
                            <td class="py-4 px-6"><?php echo htmlspecialchars($appointment['date']); ?></td>
                            <td class="py-4 px-6"><?php echo htmlspecialchars($appointment['time']); ?></td>
                            <td class="py-4 px-6">
                                <?php
                                    $status = htmlspecialchars($appointment['status']);
                                    $statusClass = 'text-yellow-500';
                                    if($status == 'Confirmed') $statusClass = 'text-green-500';
                                    elseif($status == 'Cancelled') $statusClass = 'text-red-500';
                                ?>
                                <span class="<?php echo $statusClass; ?>"><?php echo $status; ?></span>
                            </td>
                            <td class="py-4 px-6">
                                <!-- Actions like Cancel can be added here -->
                                <?php if($appointment['status'] !== 'Cancelled'): ?>
                                    <a href="../scripts/manage_appointments.php?action=cancel&id=<?php echo $appointment['id']; ?>" class="text-red-500 hover:underline">Cancel</a>
                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-center text-gray-700">You have no appointments scheduled.</p>
    <?php endif; ?>
</div>

<?php
include '../includes/footer.php';
?>
