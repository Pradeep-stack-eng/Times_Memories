    <footer class="bg-black text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4">About Me</h3>
                    <p class="text-gray-400">
                    I am a passionate photographer dedicated to capturing the dynamic energy, architectural marvels, and cultural essence of World’s vibrant cities. Through my lens, I strive to showcase the unique blend of tradition and modernity that defines urban life in World—from bustling marketplaces and historic landmarks to the everyday moments that make each city come alive. My work highlights the soul of World’s cities, preserving their beauty and vibrancy through professional photography.
                    </p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a class="text-gray-400 hover:text-indigo-400 transition-colors" href="about.php">About Us</a></li>
                        <li><a class="text-gray-400 hover:text-indigo-400 transition-colors" href="experience.php">Experience</a></li>
                        <li><a class="text-gray-400 hover:text-indigo-400 transition-colors" href="gallery.php">Gallery</a></li>
                        <li><a class="text-gray-400 hover:text-indigo-400 transition-colors" href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Follow Me</h3>
                    <div class="flex space-x-4">
                        <a class="text-gray-400 hover:text-indigo-400 transition-colors" href="#"><i class="fab fa-instagram text-2xl"></i></a>
                        <a class="text-gray-400 hover:text-indigo-400 transition-colors" href="#"><i class="fab fa-twitter text-2xl"></i></a>
                        <a class="text-gray-400 hover:text-indigo-400 transition-colors" href="#"><i class="fab fa-facebook text-2xl"></i></a>
                        <a class="text-gray-400 hover:text-indigo-400 transition-colors" href="#"><i class="fab fa-linkedin text-2xl"></i></a>
                    </div>
                </div>
            </div>
            <div class="mt-8 text-center text-gray-500">&copy; 2023 My Portfolio. All rights reserved.</div>
        </div>
    </footer>
    
    <!-- Login Modal -->
    <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-8 max-w-sm w-full">
            <h2 class="text-2xl font-bold mb-6">Admin Panel Login</h2>
            <form id="loginForm">
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="username">Username</label>
                    <input class="w-full px-3 py-2 border rounded-lg" id="username" name="username" type="text" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 mb-2" for="password">Password</label>
                    <input class="w-full px-3 py-2 border rounded-lg" id="password" name="password" type="password" required>
                </div>
                <div class="flex justify-between items-center">
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors" type="submit">Login</button>
                    <button class="text-gray-700 hover:text-indigo-600 transition-colors" id="closeModal" type="button">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // Login functionality
        const loginModal = document.getElementById('loginModal');
        const closeModal = document.getElementById('closeModal');
        const loginForm = document.getElementById('loginForm');

        // Toggle modal
        document.getElementById('loginButton').addEventListener('click', () => {
            loginModal.classList.remove('hidden');
        });

        closeModal.addEventListener('click', () => {
            loginModal.classList.add('hidden');
        });

        // Handle form submission
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (username === 'admin' && password === 'admin') {
                localStorage.setItem('loggedIn', 'true');
                window.location.href = 'admin.php';
            } else {
                alert('Invalid credentials! Please try again.');
            }
        });

        // Enhanced image refresh
        function refreshImages() {
            document.querySelectorAll('img').forEach(img => {
                const src = img.src.split('?')[0];
                img.src = src + `?force=${Date.now()}`;
            });
        }
        
        // Cross-tab category sync
        window.addEventListener('storage', (e) => {
            if (e.key === 'galleryUpdate') {
                renderGallery();
                refreshImages();
            }
        });

        // Global update trigger
        function forceImageRefresh() {
            document.querySelectorAll('img').forEach(img => {
                img.src = img.src.split('?')[0] + '?force=' + Date.now();
            });
        }

        // Cross-page refresh coordinator
        function coordinateUpdate() {
            if (window.location.pathname.includes('admin.php')) {
                localStorage.setItem('lastAdminUpdate', Date.now());
            } else {
                const lastUpdate = localStorage.getItem('lastAdminUpdate') || 0;
                if (Date.now() - lastUpdate < 1000) {
                    window.dispatchEvent(new Event('galleryUpdate'));
                }
            }
        }
        setInterval(coordinateUpdate, 500);
    </script>
</body>
</html> 