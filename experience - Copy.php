<?php $pageTitle = "Experience"; ?>
<?php include 'header.php'; ?>

<div class="max-w-7xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-12 text-center">Professional Journey</h1>
    
    <!-- Main Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Awards & Recognition -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                <h2 class="text-3xl font-bold mb-6 text-indigo-600">🏆 Awards & Recognition</h2>
                <div class="space-y-6" data-awards>
                    <!-- Awards content will be dynamically populated by JavaScript -->
                </div>
            </div>

            <!-- Exhibition Timeline -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                <h2 class="text-3xl font-bold mb-6 text-indigo-600">📅 Exhibition Timeline</h2>
                <div class="space-y-6" data-exhibitions>
                    <!-- Exhibitions content will be dynamically populated by JavaScript -->
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-8">
            <!-- Skills Matrix -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                <h2 class="text-3xl font-bold mb-6 text-indigo-600">📊 Technical Skills</h2>
                <div class="space-y-4" data-skills>
                    <!-- Skills content will be dynamically populated by JavaScript -->
                </div>
            </div>

            <!-- Software Proficiency -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                <h2 class="text-3xl font-bold mb-6 text-indigo-600">💻 Software Mastery</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-center gap-3 p-3 bg-indigo-50 rounded-lg">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/20/Photoshop_CC_icon.png" class="w-8 h-8" alt="Photoshop">
                        <span class="font-medium">Photoshop</span>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-indigo-50 rounded-lg">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/59/Lightroom_CC_icon.png" class="w-8 h-8" alt="Lightroom">
                        <span class="font-medium">Lightroom</span>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-indigo-50 rounded-lg">
                        <img src="https://static.cdnlogo.com/logos/p/45/premiere-pro.png" class="w-8 h-8" alt="Premiere Pro">
                        <span class="font-medium">Premiere Pro</span>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-indigo-50 rounded-lg">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/40/Adobe_After_Effects_CC_icon.png" class="w-8 h-8" alt="After Effects">
                        <span class="font-medium">After Effects</span>
                    </div>
                </div>
            </div>

            <!-- Languages -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                <h2 class="text-3xl font-bold mb-6 text-indigo-600">🌍 Languages</h2>
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <span class="w-20 text-gray-700">Nepali</span>
                        <div class="flex-1 h-2 bg-gray-200 rounded-full">
                            <div class="h-2 bg-indigo-600 rounded-full w-full"></div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-20 text-gray-700">English</span>
                        <div class="flex-1 h-2 bg-gray-200 rounded-full">
                            <div class="h-2 bg-indigo-600 rounded-full w-4/5"></div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-20 text-gray-700">Hindi</span>
                        <div class="flex-1 h-2 bg-gray-200 rounded-full">
                            <div class="h-2 bg-indigo-600 rounded-full w-3/4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const experienceData = JSON.parse(localStorage.getItem('experience')) || {};
    
    // Render Awards
    const awardsContainer = document.querySelector('[data-awards]');
    if (awardsContainer && experienceData.awards) {
        awardsContainer.innerHTML = experienceData.awards.map(award => `
            <div class="pl-4 border-l-4 border-indigo-200">
                <h3 class="text-xl font-semibold mb-2">${award.title}</h3>
                <p class="text-gray-600">${award.year}</p>
                <p class="text-sm text-gray-500 mt-2">${award.description}</p>
            </div>
        `).join('');
    }

    // Render Skills
    const skillsContainer = document.querySelector('[data-skills]');
    if (skillsContainer && experienceData.skills) {
        skillsContainer.innerHTML = Object.entries(experienceData.skills).map(([skill, value]) => `
            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-gray-700">${skill.replace(/([A-Z])/g, ' $1').trim()}</span>
                    <span class="text-indigo-600">${value}%</span>
                </div>
                <div class="h-2 bg-gray-200 rounded-full">
                    <div class="h-2 bg-indigo-600 rounded-full" style="width: ${value}%"></div>
                </div>
            </div>
        `).join('');
    }

    // Render Exhibitions
    const exhibitionsContainer = document.querySelector('[data-exhibitions]');
    if (exhibitionsContainer && experienceData.exhibitions) {
        exhibitionsContainer.innerHTML = experienceData.exhibitions.map(exhibition => `
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                    <span class="text-indigo-600">${exhibition.year}</span>
                </div>
                <div>
                    <h3 class="text-xl font-semibold">${exhibition.title}</h3>
                    <p class="text-gray-600">${exhibition.description}</p>
                </div>
            </div>
        `).join('');
    }
});
</script>

<?php include 'footer.php'; ?> 