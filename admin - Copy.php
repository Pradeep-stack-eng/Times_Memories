<?php
// Check if user is logged in using localStorage flag
echo '<script>
    if (!localStorage.getItem("loggedIn")) {
        window.location.href = "portfolio.php";
    }
</script>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Admin Dashboard</h1>
            <button id="logoutButton" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Logout
            </button>
        </div>

        <!-- Messages Section -->
        <section class="mb-12">
            <h2 class="text-2xl font-bold mb-4">Client Messages</h2>
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">New</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Message</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="messagesList" class="bg-white divide-y divide-gray-200">
                        <!-- Dynamic content -->
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Portfolio Management -->
        <section>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Portfolio Items</h2>
                <button onclick="openAddModal()" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Add New Item
                </button>
            </div>

            <div id="portfolioGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Portfolio items will be loaded here -->
            </div>
        </section>

        <!-- About Section Management -->
        <section class="mt-12">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">About Section Content</h2>
                <button onclick="openAboutModal()" 
                        class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Edit About Section
                </button>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow">
                <div id="aboutPreview"></div>
            </div>
        </section>

        <!-- Experience Management -->
        <section class="mt-12">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Experience Content</h2>
                <div class="space-x-4">
                    <button onclick="openAwardsModal()" 
                            class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Edit Awards
                    </button>
                    <button onclick="openExhibitionsModal()" 
                            class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Edit Exhibitions
                    </button>
                    <button onclick="openSkillsModal()" 
                            class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Edit Skills
                    </button>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-bold mb-2">Awards Preview</h3>
                    <div id="awardsPreview" class="space-y-4"></div>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-2">Exhibitions Preview</h3>
                    <div id="exhibitionsPreview" class="space-y-4"></div>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-2">Skills Preview</h3>
                    <div id="skillsPreview" class="space-y-4"></div>
                </div>
            </div>
        </section>
    </div>

    <!-- Add/Edit Modal -->
    <div id="portfolioModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-8 max-w-md w-full">
            <h2 class="text-2xl font-bold mb-6" id="modalTitle">Add New Portfolio Item</h2>
            <form id="portfolioForm" onsubmit="handleFormSubmit(event)">
                <input type="hidden" id="itemId">
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="title">Title</label>
                    <input type="text" id="title" class="w-full px-3 py-2 border rounded-lg" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="category">Category</label>
                    <select id="category" class="w-full px-3 py-2 border rounded-lg" required>
                        <option value="">Select Category</option>
                        <option value="Nature">Nature</option>
                        <option value="Portrait">Portrait</option>
                        <option value="Architecture">Architecture</option>
                        <option value="Events">Events</option>
                        <option value="Nepal Heritage">Nepal Heritage</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 mb-2" for="imageUrl">Image URL</label>
                    <input type="url" id="imageUrl" class="w-full px-3 py-2 border rounded-lg" required>
                </div>

                <div class="flex justify-end gap-4">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 text-gray-700 hover:text-indigo-600">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        Save Item
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- About Edit Modal -->
    <div id="aboutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-8 max-w-2xl w-full">
            <h2 class="text-2xl font-bold mb-6">Edit About Content</h2>
            <form id="aboutForm" onsubmit="handleAboutSubmit(event)">
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Main Title</label>
                    <input type="text" id="aboutTitle" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Subtitle</label>
                    <input type="text" id="aboutSubtitle" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Content Paragraph 1</label>
                    <textarea id="aboutContent1" class="w-full px-3 py-2 border rounded-lg h-32" required></textarea>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Content Paragraph 2</label>
                    <textarea id="aboutContent2" class="w-full px-3 py-2 border rounded-lg h-32" required></textarea>
                </div>
                
                <div class="flex justify-end gap-4">
                    <button type="button" onclick="closeAboutModal()" 
                            class="px-4 py-2 text-gray-700 hover:text-indigo-600">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Awards Modal -->
    <div id="awardsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-8 max-w-2xl w-full">
            <h2 class="text-2xl font-bold mb-6">Edit Awards</h2>
            <form id="awardsForm" onsubmit="handleAwardsSubmit(event)">
                <div class="space-y-4">
                    <div class="border-b pb-4">
                        <h3 class="font-medium mb-2">Award 1</h3>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Title</label>
                            <input type="text" id="award1Title" class="w-full px-3 py-2 border rounded-lg" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Year</label>
                            <input type="text" id="award1Year" class="w-full px-3 py-2 border rounded-lg" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Description</label>
                            <textarea id="award1Desc" class="w-full px-3 py-2 border rounded-lg" required></textarea>
                        </div>
                    </div>

                    <div class="border-b pb-4">
                        <h3 class="font-medium mb-2">Award 2</h3>
                        <!-- Similar fields for award 2 -->
                    </div>
                </div>
                <div class="flex justify-end gap-4 mt-6">
                    <button type="button" onclick="closeAwardsModal()" class="px-4 py-2 text-gray-700 hover:text-indigo-600">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Exhibitions Modal -->
    <div id="exhibitionsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-8 max-w-2xl w-full">
            <h2 class="text-2xl font-bold mb-6">Edit Exhibitions</h2>
            <form id="exhibitionsForm" onsubmit="handleExhibitionsSubmit(event)">
                <div class="space-y-4">
                    <div class="border-b pb-4">
                        <h3 class="font-medium mb-2">Exhibition 1</h3>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Title</label>
                            <input type="text" id="exhibition1Title" class="w-full px-3 py-2 border rounded-lg" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Year</label>
                            <input type="text" id="exhibition1Year" class="w-full px-3 py-2 border rounded-lg" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Description</label>
                            <textarea id="exhibition1Desc" class="w-full px-3 py-2 border rounded-lg" required></textarea>
                        </div>
                    </div>

                    <div class="border-b pb-4">
                        <h3 class="font-medium mb-2">Exhibition 2</h3>
                        <!-- Similar fields for exhibition 2 -->
                    </div>
                </div>
                <div class="flex justify-end gap-4 mt-6">
                    <button type="button" onclick="closeExhibitionsModal()" class="px-4 py-2 text-gray-700 hover:text-indigo-600">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Skills Modal -->
    <div id="skillsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-8 max-w-2xl w-full">
            <h2 class="text-2xl font-bold mb-6">Edit Skills</h2>
            <form id="skillsForm" onsubmit="handleSkillsSubmit(event)">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-medium mb-2">Portrait Photography</h3>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Percentage</label>
                            <input type="number" id="skillPortrait" class="w-full px-3 py-2 border rounded-lg" 
                                   min="0" max="100" required>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-medium mb-2">Landscape Photography</h3>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Percentage</label>
                            <input type="number" id="skillLandscape" class="w-full px-3 py-2 border rounded-lg" 
                                   min="0" max="100" required>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-medium mb-2">Photo Editing</h3>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Percentage</label>
                            <input type="number" id="skillEditing" class="w-full px-3 py-2 border rounded-lg" 
                                   min="0" max="100" required>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-4 mt-6">
                    <button type="button" onclick="closeSkillsModal()" class="px-4 py-2 text-gray-700 hover:text-indigo-600">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Load data from localStorage
        let messages = JSON.parse(localStorage.getItem('messages')) || [];
        let portfolioItems = JSON.parse(localStorage.getItem('portfolio')) || [];

        // Messages functionality
        function renderMessages() {
            const tbody = document.getElementById('messagesList');
            tbody.innerHTML = messages.map((msg, index) => `
                <tr class="${msg.read ? 'bg-gray-50' : 'bg-yellow-50'} hover:bg-gray-100 transition-colors">
                    <td class="px-6 py-4 text-center">${msg.read ? '' : '🔴'}</td>
                    <td class="px-6 py-4 font-medium">${msg.name}</td>
                    <td class="px-6 py-4">${msg.email}</td>
                    <td class="px-6 py-4 max-w-xs truncate">${msg.message}</td>
                    <td class="px-6 py-4 whitespace-nowrap">${new Date(msg.timestamp).toLocaleDateString()}</td>
                    <td class="px-6 py-4 space-x-2">
                        <button onclick="viewMessage(${index})" class="text-indigo-600 hover:text-indigo-800">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button onclick="deleteMessage(${index})" class="text-red-500 hover:text-red-700">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        function deleteMessage(index) {
            messages.splice(index, 1);
            localStorage.setItem('messages', JSON.stringify(messages));
            renderMessages();
        }

        // Portfolio functionality
        function renderPortfolio() {
            const grid = document.getElementById('portfolioGrid');
            grid.innerHTML = portfolioItems.map((item, index) => `
                <div class="bg-white rounded-lg shadow p-4">
                    <img src="${item.imageUrl}${item.imageUrl.includes('?') ? '&' : '?'}cache=${performance.now()}" 
                         class="w-full h-48 object-cover mb-4"
                         onerror="this.onerror=null;this.src='https://via.placeholder.com/300x200?text=Image+Not+Found'">
                    <h3 class="font-bold mb-2">${item.title}</h3>
                    <p class="text-sm text-gray-600 mb-2">${item.category}</p>
                    <div class="flex gap-2">
                        <button onclick="openEditModal(${index})" class="text-indigo-600 hover:text-indigo-800">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="deletePortfolioItem(${index})" class="text-red-500 hover:text-red-700">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `).join('');
        }

        function openEditModal(index) {
            const item = portfolioItems[index];
            document.getElementById('itemId').value = index;
            document.getElementById('title').value = item.title;
            document.getElementById('category').value = item.category;
            document.getElementById('imageUrl').value = item.imageUrl;
            document.getElementById('modalTitle').textContent = "Edit Portfolio Item";
            document.getElementById('portfolioModal').classList.remove('hidden');
        }

        function deletePortfolioItem(index) {
            if(confirm('Are you sure you want to delete this item?')) {
                portfolioItems.splice(index, 1);
                localStorage.setItem('portfolio', JSON.stringify(portfolioItems));
                renderPortfolio();
                triggerGalleryUpdate();
            }
        }

        // Logout functionality
        document.getElementById('logoutButton').addEventListener('click', () => {
            localStorage.removeItem('loggedIn');
            window.location.href = 'portfolio.php';
        });

        // Initial render
        renderMessages();
        renderPortfolio();

        // Add this function to handle modal closing
        function closeModal() {
            document.getElementById('portfolioModal').classList.add('hidden');
        }

        // Update the handleFormSubmit function
        function handleFormSubmit(e) {
            e.preventDefault();
            const index = document.getElementById('itemId').value;
            const category = document.getElementById('category').value;
            
            // Validation
            if (!category) {
                alert('Please select a category');
                document.getElementById('category').focus();
                return;
            }

            const item = {
                title: document.getElementById('title').value.trim(),
                category: category,
                imageUrl: document.getElementById('imageUrl').value.trim()
            };

            // Validate image URL (only check if it's a valid URL)
            try {
                new URL(item.imageUrl);
            } catch {
                alert('Please enter a valid image URL');
                return;
            }

            // Update or Create
            if (index) {
                portfolioItems[index] = item;
            } else {
                portfolioItems.push(item);
            }

            localStorage.setItem('portfolio', JSON.stringify(portfolioItems));
            renderPortfolio();
            triggerGalleryUpdate();
            closeModal();
        }

        // Edit existing item
        function openEditModal(index) {
            const item = portfolioItems[index];
            document.getElementById('itemId').value = index;
            document.getElementById('title').value = item.title;
            document.getElementById('category').value = item.category;
            document.getElementById('imageUrl').value = item.imageUrl;
            document.getElementById('modalTitle').textContent = "Edit Portfolio Item";
            document.getElementById('portfolioModal').classList.remove('hidden');
        }

        // Add new item
        function openAddModal() {
            document.getElementById('itemId').value = '';
            document.getElementById('title').value = '';
            document.getElementById('category').value = '';
            document.getElementById('imageUrl').value = '';
            document.getElementById('modalTitle').textContent = "Add New Portfolio Item";
            document.getElementById('portfolioModal').classList.remove('hidden');
        }

        // Initialize category selector
        const categorySelect = document.getElementById('category');
        categorySelect.innerHTML = `
            <option value="">Select Category</option>
            <option value="Nature">Nature</option>
            <option value="Portrait">Portrait</option>
            <option value="Architecture">Architecture</option>
            <option value="Events">Events</option>
            <option value="Nepal Heritage">Nepal Heritage</option>
        `;

        // Enhanced synchronization trigger
        function triggerGalleryUpdate() {
            // Force complete refresh
            localStorage.setItem('portfolio', JSON.stringify(portfolioItems));
            const event = new Event('storage');
            window.dispatchEvent(event);
            
            // Better cache busting
            portfolioItems.forEach((item, index) => {
                const baseUrl = item.imageUrl.split('?')[0];
                const newUrl = `${baseUrl}?update=${Date.now()}`;
                portfolioItems[index].imageUrl = newUrl;
            });
            localStorage.setItem('portfolio', JSON.stringify(portfolioItems));
        }

        // About Section Management
        let aboutContent = JSON.parse(localStorage.getItem('about')) || {
            title: "About Us",
            subtitle: "Learn more about our journey and what drives us",
            content1: "We are a team of passionate photographers...",
            content2: "Our work is not just about taking pictures..."
        };

        function renderAboutPreview() {
            document.getElementById('aboutPreview').innerHTML = `
                <h3 class="text-xl font-bold mb-2">${aboutContent.title}</h3>
                <p class="text-gray-600 mb-4">${aboutContent.subtitle}</p>
                <p class="text-gray-700 mb-4">${aboutContent.content1}</p>
                <p class="text-gray-700">${aboutContent.content2}</p>
            `;
        }

        function openAboutModal() {
            document.getElementById('aboutTitle').value = aboutContent.title;
            document.getElementById('aboutSubtitle').value = aboutContent.subtitle;
            document.getElementById('aboutContent1').value = aboutContent.content1;
            document.getElementById('aboutContent2').value = aboutContent.content2;
            document.getElementById('aboutModal').classList.remove('hidden');
        }

        function closeAboutModal() {
            document.getElementById('aboutModal').classList.add('hidden');
        }

        function handleAboutSubmit(e) {
            e.preventDefault();
            aboutContent = {
                title: document.getElementById('aboutTitle').value,
                subtitle: document.getElementById('aboutSubtitle').value,
                content1: document.getElementById('aboutContent1').value,
                content2: document.getElementById('aboutContent2').value
            };
            localStorage.setItem('about', JSON.stringify(aboutContent));
            closeAboutModal();
            triggerAboutUpdate();
        }

        function triggerAboutUpdate() {
            localStorage.setItem('aboutUpdate', Date.now());
            window.dispatchEvent(new Event('aboutUpdate'));
        }

        // Initial render
        renderAboutPreview();

        // Experience Data
        let experienceData = JSON.parse(localStorage.getItem('experience')) || {
            awards: [
                {
                    title: "National Geographic Photo Contest",
                    year: "2023",
                    description: "Captured the essence of Himalayan culture in a series of breathtaking images"
                }
            ],
            exhibitions: [
                {
                    title: "Himalayan Visual Arts Gallery",
                    year: "2023",
                    description: "Solo exhibition featuring 50+ prints of mountain landscapes"
                }
            ],
            skills: {
                portrait: 95,
                landscape: 98,
                editing: 92
            }
        };

        // Experience Functions
        function renderExperiencePreviews() {
            // Awards Preview
            document.getElementById('awardsPreview').innerHTML = experienceData.awards.map(award => `
                <div class="pl-4 border-l-4 border-indigo-200">
                    <h3 class="font-medium">${award.title}</h3>
                    <p class="text-sm text-gray-600">${award.year}</p>
                    <p class="text-sm text-gray-500 mt-1">${award.description}</p>
                </div>
            `).join('');

            // Skills Preview
            document.getElementById('skillsPreview').innerHTML = `
                <div class="space-y-4">
                    ${Object.entries(experienceData.skills).map(([skill, value]) => `
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-700">${skill.replace(/([A-Z])/g, ' $1').trim()}</span>
                                <span class="text-indigo-600">${value}%</span>
                            </div>
                            <div class="h-2 bg-gray-200 rounded-full">
                                <div class="h-2 bg-indigo-600 rounded-full" style="width: ${value}%"></div>
                            </div>
                        </div>
                    `).join('')}
                </div>
            `;

            // Exhibitions Preview
            document.getElementById('exhibitionsPreview').innerHTML = experienceData.exhibitions.map(exhibition => `
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                        <span class="text-indigo-600">${exhibition.year}</span>
                    </div>
                    <div>
                        <h3 class="font-medium">${exhibition.title}</h3>
                        <p class="text-sm text-gray-500 mt-1">${exhibition.description}</p>
                    </div>
                </div>
            `).join('');
        }

        // Modal Handlers
        function openAwardsModal() {
            const awards = experienceData.awards;
            document.getElementById('award1Title').value = awards[0]?.title || '';
            document.getElementById('award1Year').value = awards[0]?.year || '';
            document.getElementById('award1Desc').value = awards[0]?.description || '';
            // Repeat for other awards
            document.getElementById('awardsModal').classList.remove('hidden');
        }

        function handleAwardsSubmit(e) {
            e.preventDefault();
            experienceData.awards = [{
                title: document.getElementById('award1Title').value,
                year: document.getElementById('award1Year').value,
                description: document.getElementById('award1Desc').value
            }, /* Add other awards */];
            
            localStorage.setItem('experience', JSON.stringify(experienceData));
            closeAwardsModal();
            renderExperiencePreviews();
            triggerExperienceUpdate();
        }

        // Similar functions for exhibitions and skills
        function triggerExperienceUpdate() {
            localStorage.setItem('experienceUpdate', Date.now());
        }

        // Initialize
        renderExperiencePreviews();

        // Add these functions to the script section
        function closeAwardsModal() {
            document.getElementById('awardsModal').classList.add('hidden');
        }

        function closeExhibitionsModal() {
            document.getElementById('exhibitionsModal').classList.add('hidden');
        }

        function closeSkillsModal() {
            document.getElementById('skillsModal').classList.add('hidden');
        }

        // Add exhibitions modal handlers
        function openExhibitionsModal() {
            const exhibitions = experienceData.exhibitions;
            document.getElementById('exhibition1Title').value = exhibitions[0]?.title || '';
            document.getElementById('exhibition1Year').value = exhibitions[0]?.year || '';
            document.getElementById('exhibition1Desc').value = exhibitions[0]?.description || '';
            document.getElementById('exhibitionsModal').classList.remove('hidden');
        }

        function handleExhibitionsSubmit(e) {
            e.preventDefault();
            experienceData.exhibitions = [{
                title: document.getElementById('exhibition1Title').value,
                year: document.getElementById('exhibition1Year').value,
                description: document.getElementById('exhibition1Desc').value
            }];
            
            localStorage.setItem('experience', JSON.stringify(experienceData));
            closeExhibitionsModal();
            renderExperiencePreviews();
            triggerExperienceUpdate();
        }

        // Add skills modal handlers
        function openSkillsModal() {
            document.getElementById('skillPortrait').value = experienceData.skills.portrait || 95;
            document.getElementById('skillLandscape').value = experienceData.skills.landscape || 98;
            document.getElementById('skillEditing').value = experienceData.skills.editing || 92;
            document.getElementById('skillsModal').classList.remove('hidden');
        }

        function handleSkillsSubmit(e) {
            e.preventDefault();
            
            // Validate all skills are between 0-100
            const skills = {
                portrait: Math.min(100, Math.max(0, parseInt(document.getElementById('skillPortrait').value))),
                landscape: Math.min(100, Math.max(0, parseInt(document.getElementById('skillLandscape').value))),
                editing: Math.min(100, Math.max(0, parseInt(document.getElementById('skillEditing').value)))
            };

            experienceData.skills = skills;
            localStorage.setItem('experience', JSON.stringify(experienceData));
            
            // Force UI update
            renderExperiencePreviews();
            closeSkillsModal();
            triggerExperienceUpdate();
        }

        // Add message viewing functionality
        function viewMessage(index) {
            const msg = messages[index];
            msg.read = true;
            localStorage.setItem('messages', JSON.stringify(messages));
            
            Swal.fire({
                title: `Message from ${msg.name}`,
                html: `<div class="text-left space-y-4">
                    <p><strong>Email:</strong> ${msg.email}</p>
                    <p><strong>Date:</strong> ${new Date(msg.timestamp).toLocaleString()}</p>
                    <hr>
                    <p class="whitespace-pre-wrap">${msg.message}</p>
                </div>`,
                confirmButtonText: 'Close'
            });
            
            renderMessages();
        }
    </script>
</body>
</html> 