<script>
    // Dynamic content loader
    document.addEventListener('DOMContentLoaded', () => {
        const staticItems = document.querySelectorAll('.group');
        const dynamicItems = JSON.parse(localStorage.getItem('portfolio')) || [];
        
        dynamicItems.forEach(item => {
            const imgBlock = `
                <div class="relative group overflow-hidden rounded-lg shadow-lg">
                    <img src="${item.imageUrl}" 
                         alt="${item.title}" 
                         class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110"
                         onerror="this.src='https://via.placeholder.com/300x200?text=Image+Not+Found'">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 flex items-center justify-center transition-all">
                        <span class="text-white text-lg font-medium opacity-0 group-hover:opacity-100 transition-opacity">
                            ${item.title}
                        </span>
                    </div>
                </div>
            `;
            document.querySelector('.grid').innerHTML += imgBlock;
        });
    });
</script> 