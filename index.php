<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Space</title>
</head>

<body>
    <?php require "penampung/header.php" ?>
    <main class="relative h-screen">
        <!-- Gambar latar belakang -->
        <div class="absolute inset-0 z-0">
            <div class="h-full bg-cover bg-center" style="background-image: url('assets/images/bg.jpg');"></div>
        </div>
        
        <!-- Konten utama -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-white">
            <h1 class="text-8xl font-bold mb-4">WATER</h1>
            <h2 class="text-6xl font-light tracking-widest mb-8">SPACE</h2>
            <button onclick="showLoginModal()" class="bg-transparent border-2 border-white px-8 py-2 rounded-full hover:bg-white hover:text-black transition-all">
                EXPLORE
            </button>
        </div>

        <!-- Modal Login -->
        <div id="loginModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="backdrop-blur-sm bg-black/20 rounded-lg p-8 max-w-md w-full mx-4">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-white">Peringatan</h3>
                    <button onclick="hideLoginModal()" class="text-white hover:text-gray-200">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="mb-6">
                    <p class="text-white">Anda harus login terlebih dahulu untuk mengakses fitur ini.</p>
                </div>
                <div class="flex justify-end space-x-4">
                    <button onclick="hideLoginModal()" class="px-4 py-2 bg-gray-200/30 text-white rounded-lg hover:bg-gray-200/50 backdrop-blur-sm">
                        Tutup
                    </button>
                    <a href="login.php" class="px-4 py-2 bg-blue-600/70 text-white rounded-lg hover:bg-blue-700/90 backdrop-blur-sm">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </main>
    <?php require "penampung/footer.html" ?>

    <script>
        function showLoginModal() {
            document.getElementById('loginModal').classList.remove('hidden');
        }

        function hideLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
        }
    </script>
</body>

</html>