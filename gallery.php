<?php $pageTitle = "Gallery"; ?>
<?php include 'header.php'; ?>

<div class="container mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-12 text-center">Photo Gallery</h1>

    <!-- Horizontal Category Navigation -->
    <div class="flex overflow-x-auto pb-4 mb-8 scrollbar-hide">
        <div class="flex space-x-4">
            <button class="category-tab px-6 py-2 rounded-full bg-indigo-100 text-indigo-600 font-medium transition-all hover:bg-indigo-600 hover:text-white" data-category="all">
                All
            </button>
            <button class="category-tab px-6 py-2 rounded-full bg-gray-100 text-gray-600 font-medium transition-all hover:bg-indigo-600 hover:text-white" data-category="nature">
                Nature
            </button>
            <button class="category-tab px-6 py-2 rounded-full bg-gray-100 text-gray-600 font-medium transition-all hover:bg-indigo-600 hover:text-white" data-category="portrait">
                Portrait
            </button>
            <button class="category-tab px-6 py-2 rounded-full bg-gray-100 text-gray-600 font-medium transition-all hover:bg-indigo-600 hover:text-white" data-category="architecture">
                Architecture
            </button>
            <button class="category-tab px-6 py-2 rounded-full bg-gray-100 text-gray-600 font-medium transition-all hover:bg-indigo-600 hover:text-white" data-category="events">
                Events
            </button>
            <button class="category-tab px-6 py-2 rounded-full bg-gray-100 text-gray-600 font-medium transition-all hover:bg-indigo-600 hover:text-white" data-category="nepal-heritage">
                Nepal Heritage
            </button>
        </div>
    </div>

    <!-- Image Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="galleryGrid">
        <!-- All images will be loaded here -->
    </div>
</div>

<script>
    // Enhanced gallery functionality
    function renderGallery() {
        const portfolioItems = JSON.parse(localStorage.getItem('portfolio')) || [];
        const grid = document.getElementById('galleryGrid');
        
        grid.innerHTML = portfolioItems.map(item => {
            const category = item.category.toLowerCase().replace(' ', '-');
            return `
                <div class="gallery-item relative group overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300" 
                     data-category="${category}">
                    <img src="${item.imageUrl}?ts=${Date.now()}" 
                         class="w-full h-64 object-cover transform transition-transform duration-500 group-hover:scale-105"
                         onerror="handleImageError(this)"
                         loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-0 left-0 right-0 p-4">
                            <h3 class="text-white text-lg font-bold truncate">${item.title}</h3>
                            <span class="text-indigo-200 text-sm">${item.category}</span>
                        </div>
                    </div>
                </div>
            `;
        }).join('');
    }

    // Category filtering
    document.querySelectorAll('.category-tab').forEach(button => {
        button.addEventListener('click', () => {
            const category = button.dataset.category;
            
            // Update active state
            document.querySelectorAll('.category-tab').forEach(btn => {
                btn.classList.remove('bg-indigo-600', 'text-white');
                btn.classList.add('bg-gray-100', 'text-gray-600');
            });
            button.classList.add('bg-indigo-600', 'text-white');
            
            // Filter items
            document.querySelectorAll('.gallery-item').forEach(item => {
                item.style.display = (category === 'all' || item.dataset.category === category) 
                    ? 'block' 
                    : 'none';
            });
        });
    });

    // Initial load
    renderGallery();
    window.addEventListener('storage', renderGallery);

    // Add error handler
    function handleImageError(img) {
        img.onerror = null;
        img.src = 'https://via.placeholder.com/300x200?text=Image+Not+Found';
        img.parentElement.classList.add('bg-gray-100');
    }
</script>

<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    img[src*="placeholder.com"] {
        background: #f3f4f6;
        padding: 1rem;
        border-radius: 0.5rem;
    }
</style> 