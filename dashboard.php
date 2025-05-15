<?php
    session_start();
    
    if (!isset($_SESSION['isLogin'])) {
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Water Space</title>
    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Animasi fade saat scroll */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Efek parallax untuk background */
        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Animasi smooth untuk hover */
        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    <?php include "penampung/header.php" ?>

    <main class="relative">
        <!-- Dashboard Section -->
        <section id="dashboard" class="relative min-h-screen">
            <!-- Background Image dengan efek parallax -->
            <div class="absolute inset-0 z-0">
                <div class="h-full bg-cover bg-center parallax" style="background-image: url('assets/images/bg.jpg');"></div>
            </div>

            <!-- Dashboard Content -->
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <!-- Welcome Section -->
                <div class="backdrop-blur-sm bg-black/20 rounded-xl shadow-2xl p-8 mb-8 fade-in hover-scale">
                    <h2 class="text-4xl font-bold text-white mb-4">Welcome back, <?= $_SESSION['username'] ?>!</h2>
                    <p class="text-gray-200">Explore the depths of Water Space.</p>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Ocean Stats -->
                    <div class="backdrop-blur-sm bg-black/20 rounded-xl shadow-2xl p-6 fade-in hover-scale">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-500/10">
                                <svg class="h-8 w-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-200">Ocean Depth</h3>
                                <p class="text-2xl font-bold text-white">11,034m</p>
                            </div>
                        </div>
                    </div>

                    <!-- Temperature Stats -->
                    <div class="backdrop-blur-sm bg-black/20 rounded-xl shadow-2xl p-6 fade-in hover-scale">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-red-500/10">
                                <svg class="h-8 w-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-200">Temperature</h3>
                                <p class="text-2xl font-bold text-white">23°C</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pressure Stats -->
                    <div class="backdrop-blur-sm bg-black/20 rounded-xl shadow-2xl p-6 fade-in hover-scale">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-500/10">
                                <svg class="h-8 w-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-200">Pressure</h3>
                                <p class="text-2xl font-bold text-white">1,086 bar</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Table -->
                <div class="backdrop-blur-sm bg-black/20 rounded-xl shadow-2xl overflow-hidden fade-in hover-scale">
                    <div class="p-6 border-b border-gray-700">
                        <h3 class="text-xl font-semibold text-white">Daftar Hewan Laut</h3>
                    </div>
                    <div class="p-6">
                        <?php include "daftar.php" ?>
                    </div>
                    <div class="p-6 text-center">
                        <a href="#search" class="inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            Lihat Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="relative min-h-screen">
            <!-- Background Image dengan efek parallax -->
            <div class="absolute inset-0 z-0">
                <div class="h-full bg-cover bg-center parallax" style="background-image: url('assets/images/bg.jpg');"></div>
            </div>

            <!-- About Content -->
            <?php include "about.php" ?>
        </section>

        <!-- Search Section -->
        <section id="search" class="relative min-h-screen">
            <!-- Background Image dengan efek parallax -->
            <div class="absolute inset-0 z-0">
                <div class="h-full bg-cover bg-center parallax" style="background-image: url('assets/images/bg.jpg');"></div>
            </div>

            <?php include "search.php" ?>
        </section>
    </main>

    <?php include "penampung/footer.html" ?>

    <script>
        // Smooth scroll function dengan animasi tambahan
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                const headerOffset = 100;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition - headerOffset;

                window.scrollBy({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            });
        });

        // Intersection Observer untuk animasi fade-in
        const observerOptions = {
            root: null,
            threshold: 0.1,
            rootMargin: '0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Mengamati semua elemen dengan kelas fade-in
        document.querySelectorAll('.fade-in').forEach((element) => {
            observer.observe(element);
        });
    </script>
</body>
</html>