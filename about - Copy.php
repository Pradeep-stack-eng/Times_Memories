<?php $pageTitle = "About Us"; ?>
<?php include 'header.php'; ?>

    <section class="py-12  object-cover"  height="1080"  width="1920" style="background-image: url(https://images.unsplash.com/photo-1507090960745-b32f65d3113a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D); background-size: cover; background-position: center;">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-white" id="aboutTitle">About Us</h1>
                <p class="text-xl text-gray-600 mt-4" id="aboutSubtitle">Learn more about our journey and what drives us</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <img alt="Photographer in Nepal" class="w-45 h-45 object-cover rounded-full shadow-lg"  src="https://images.unsplash.com/photo-1616258288682-b428428213f3?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8Mnw2MTEyMzd8fGVufDB8fHx8fA%3D%3D">
                </div>
                <div class="flex flex-col justify-center">
                    <p class="text-gray-100 mb-4" id="aboutContent1"></p>
                    <p class="text-gray-100 mb-4" id="aboutContent2"></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-12 bg-gray-100" style="background-image: url('https://images.unsplash.com/photo-1614687457117-7ac6be12156b?q=80&w=2004&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; background-position: center;">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-white">Meet the Team</h2>
                <p class="text-1xl font-bold text-white">brings moments to life through the lens, capturing timeless memories.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="text-center">
                    <img alt="Rancho" class="w-48 h-48 object-cover rounded-full mx-auto mb-4" src="https://cdn.britannica.com/25/162425-050-B767198B/Aamir-Khan.jpg">
                    <h3 class="text-2xl font-bold text-white">Rancho</h3>
                    <p class="text-s font-bold text-white">Lead Photographer</p>
                </div>
                <div class="text-center">
                    <img alt="Farhan" class="w-48 h-48 object-cover rounded-full mx-auto mb-4" src="https://media.gettyimages.com/id/93902282/photo/mumbai-india-indian-actor-r-madhavan-attends-the-launch-of-pantaloons-3-idiots-t-shirt.jpg?s=612x612&w=gi&k=20&c=ErmLhb9dISQ8acHub6Rnbfb0b22j9QxgaU0ML-zqp0U=">
                    <h3 class="text-2xl font-bold text-white">Farahan</h3>
                    <p class="text-s font-bold text-white">Creative Director</p>
                </div>
                <div class="text-center">
                    <img alt="Raju" class="w-48 h-48 object-cover rounded-full mx-auto mb-4" src="https://media.licdn.com/dms/image/v2/C4E03AQEpPhWAaJ7y-Q/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1613151335961?e=2147483647&v=beta&t=yajbLDVrG4jWs5VauFG-HCs0GHIzWS-MVjLQlLDa4OU">
                    <h3 class="text-2xl font-bold text-white">Raju</h3>
                    <p class="text-s font-bold text-white">Photo Editor</p>
                </div>
            </div>
        </div>
    </section>

<script>
    // Load about content
    function loadAboutContent() {
        const about = JSON.parse(localStorage.getItem('about')) || {};
        
        // Update main content
        document.getElementById('aboutTitle').textContent = about.title || 'About Us';
        document.getElementById('aboutSubtitle').textContent = about.subtitle || 'Learn more...';
        document.getElementById('aboutContent1').textContent = about.content1 || 'Default content...';
        document.getElementById('aboutContent2').textContent = about.content2 || 'Default content...';
        
        // Update images
        const mainImg = document.querySelector('[alt="Photographer in Nepal"]');
        mainImg.src = `${about.images?.main || mainImg.src}?ts=${Date.now()}`;
        
        // Team images
        if(about.images?.team) {
            about.images.team.forEach((member, index) => {
                const img = document.querySelector(`[alt="${member.name}"]`);
                if(img) img.src = `${member.url}?ts=${Date.now()}`;
            });
        }
    }

    // Listen for updates
    window.addEventListener('storage', (e) => {
        if (e.key === 'aboutUpdate') {
            loadAboutContent();
        }
    });

    // Initial load
    loadAboutContent();
</script>

<?php include 'footer.php'; ?> 