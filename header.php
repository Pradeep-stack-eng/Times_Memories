<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-white to-gray-900">
    <!-- Navigation Bar -->
    <nav class="bg-gradient-to-b from-gray-900 to-yellow-800">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-indigo-600">Timeless Memories</div>
            <div class="flex space-x-6">
                <a class="text-white hover:bg-orange-600 hover:text-white hover:rounded-full transition-colors px-4 py-2"
                href="portfolio.php">Home</a>
                <a class="text-white hover:bg-orange-600 hover:text-white hover:rounded-full transition-colors px-4 py-2"
              href="about.php">About Us</a>
                <a class="text-white hover:bg-orange-600 hover:text-white hover:rounded-full transition-colors px-4 py-2"
              href="experience.php">Experience</a>
                <a class="text-white hover:bg-orange-600 hover:text-white hover:rounded-full transition-colors px-4 py-2"
              href="gallery.php">Gallery</a>
                <a class="text-white hover:bg-orange-600 hover:text-white hover:rounded-full transition-colors px-4 py-2"
              href="contact.php">Contact</a>
                <button id="loginButton" class="text-white hover:bg-orange-600 hover:text-white hover:rounded-full transition-colors px-4 py-2"
             >Login</button>
            </div>
        </div>
    </nav> 