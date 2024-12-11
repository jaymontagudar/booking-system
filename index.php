<?php
// index.php
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="relative h-screen bg-cover bg-center" style="background-image: url('images/hero-background.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center text-center px-4">
        <h1 class="text-4xl md:text-6xl text-white font-bold mb-4">Your Wellness Journey Starts Here</h1>
        <p class="text-lg md:text-2xl text-gray-200 mb-6">Book your next session with ease and confidence.</p>
        <div class="space-x-4">
            <a href="#services" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600">View Services</a>
            <a href="/pages/booking.php" class="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600">Book Now</a>
        </div>
    </div>
</section>

<!-- Services Overview Section -->
<section id="services" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-8">Our Popular Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service Card 1 -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                <img src="images/service1.jpg" alt="Service 1" class="h-40 w-full object-cover rounded-md mb-4">
                <h3 class="text-xl font-semibold mb-2">Full Body Massage</h3>
                <p class="text-gray-700 mb-4">Relax and rejuvenate with our expert full-body massage.</p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-bold text-green-500">$50</span>
                    <a href="/pages/booking.php" class="text-blue-500 hover:underline">Book Now</a>
                </div>
            </div>
            <!-- Service Card 2 -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                <img src="images/service2.jpg" alt="Service 2" class="h-40 w-full object-cover rounded-md mb-4">
                <h3 class="text-xl font-semibold mb-2">Facial Treatment</h3>
                <p class="text-gray-700 mb-4">Experience a refreshing facial to enhance your skin's glow.</p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-bold text-green-500">$40</span>
                    <a href="/pages/booking.php" class="text-blue-500 hover:underline">Book Now</a>
                </div>
            </div>
            <!-- Service Card 3 -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                <img src="images/service3.jpg" alt="Service 3" class="h-40 w-full object-cover rounded-md mb-4">
                <h3 class="text-xl font-semibold mb-2">Aromatherapy</h3>
                <p class="text-gray-700 mb-4">Calm your senses with our premium aromatherapy sessions.</p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-bold text-green-500">$60</span>
                    <a href="/pages/booking.php" class="text-blue-500 hover:underline">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-8">What Our Customers Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <img src="images/customer1.jpg" alt="Customer 1" class="w-20 h-20 mx-auto rounded-full mb-4">
                <h3 class="text-lg font-semibold">Jane Doe</h3>
                <p class="text-sm text-gray-500 mb-4">⭐⭐⭐⭐⭐</p>
                <p class="text-gray-700">"Amazing service! I felt completely rejuvenated after my session."</p>
            </div>
            <!-- Testimonial 2 -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <img src="images/customer2.jpg" alt="Customer 2" class="w-20 h-20 mx-auto rounded-full mb-4">
                <h3 class="text-lg font-semibold">John Smith</h3>
                <p class="text-sm text-gray-500 mb-4">⭐⭐⭐⭐⭐</p>
                <p class="text-gray-700">"Highly recommend their aromatherapy sessions. Truly relaxing!"</p>
            </div>
            <!-- Testimonial 3 -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <img src="images/customer3.jpg" alt="Customer 3" class="w-20 h-20 mx-auto rounded-full mb-4">
                <h3 class="text-lg font-semibold">Emily Clark</h3>
                <p class="text-sm text-gray-500 mb-4">⭐⭐⭐⭐⭐</p>
                <p class="text-gray-700">"Professional staff and great ambiance. Will visit again soon."</p>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
