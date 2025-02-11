<?php $pageTitle = "Contact"; ?>
<?php include 'header.php'; ?>

    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold mb-12 text-center">Contact Me</h1>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Contact Information -->
            <div class="lg:col-span-1">
                <div class="space-y-6 bg-white p-8 rounded-lg shadow-lg">
                    <div class="flex items-center">
                        <i class="fas fa-envelope h-6 w-6 mr-4 text-gray-700"></i>
                        <div>
                            <h3 class="font-medium">Email</h3>
                            <p class="text-gray-600">contact@photofolio.com</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone h-6 w-6 mr-4 text-gray-700"></i>
                        <div>
                            <h3 class="font-medium">Phone</h3>
                            <p class="text-gray-600">+1 (555) 123-4567</p>
                        </div>
                    </div>
                    <div class="pt-6 border-t">
                        <h3 class="font-medium mb-4">Follow Me</h3>
                        <div class="flex space-x-4">
                            <a class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 transition-colors" href="#">
                                <i class="fab fa-instagram text-gray-700"></i>
                            </a>
                            <a class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 transition-colors" href="#">
                                <i class="fab fa-twitter text-gray-700"></i>
                            </a>
                            <a class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 transition-colors" href="#">
                                <i class="fab fa-facebook text-gray-700"></i>
                            </a>
                            <a class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 transition-colors" href="#">
                                <i class="fab fa-linkedin text-gray-700"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <form id="contactForm" class="space-y-6 bg-white p-8 rounded-lg shadow-lg">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input id="contactName" class="w-full px-4 py-2 border rounded-lg" required type="text">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input id="contactEmail" class="w-full px-4 py-2 border rounded-lg" required type="email">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <textarea id="contactMessage" class="w-full px-4 py-2 border rounded-lg" required rows="6"></textarea>
                    </div>
                    <button class="w-full px-6 py-3 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition-colors" type="submit">Send Message</button>
                </form>
            </div>
        </div>
        
        <!-- Map Section -->
        <div class="mt-12">
            <h2 class="text-2xl font-semibold mb-6 text-center">Find Me Here</h2>
            <div class="w-full h-64 rounded-lg overflow-hidden shadow-lg">
                <iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.9537363153169!3d-37.81627977975195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577d8b1f4b8b1a!2sEiffel%20Tower!5e0!3m2!1sen!2sfr!4v1633022821234!5m2!1sen!2sfr"></iframe>
            </div>
        </div>
    </div>

<script>
    document.getElementById('contactForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = {
            name: document.getElementById('contactName').value.trim(),
            email: document.getElementById('contactEmail').value.trim(),
            message: document.getElementById('contactMessage').value.trim(),
            timestamp: new Date().toISOString(),
            read: false
        };

        const messages = JSON.parse(localStorage.getItem('messages')) || [];
        messages.unshift(formData);
        localStorage.setItem('messages', JSON.stringify(messages));

        e.target.reset();
        alert('Thank you for your message! We will respond shortly.');
    });
</script>

<?php include 'footer.php'; ?> 