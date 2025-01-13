<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Agenda Surat</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo_Dis.png') }}">
    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html {
            scroll-behavior: smooth;
        }
        .feature-card:hover {
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
            color: white !important;
        }
        .scroll-animation {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.6s ease-in-out;
        }

        .scroll-animation.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="text-black bg-gray-50 dark:bg-gray-900 dark:text-white">
        <div class="relative flex flex-col min-h-screen">
            <!-- Navbar -->
            <header class="fixed top-0 left-0 z-50 w-full py-4 bg-white shadow-md dark:bg-gray-800">
                <div class="container flex items-center justify-between px-6 mx-auto">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/logo_Dis.png') }}" alt="Logo" class="w-8 h-8">
                        <span class="text-xl font-bold dark:text-gray-200">Agenda Surat</span>
                    </div>
                    <nav class="hidden space-x-6 sm:flex">
                        <a href="/" class="hover:text-blue-600">Beranda</a>
                        <a href="#features" class="hover:text-blue-600">Fitur</a>
                        <a href="#about" class="hover:text-blue-600">About</a>
                        <a href="#guide" class="hover:text-blue-600">Panduan</a>
                    </nav>
                    <button id="hamburger" class="text-gray-800 sm:hidden dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
                <div id="mobile-menu" class="hidden bg-white sm:hidden dark:bg-gray-800">
                    <a href="/" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Beranda</a>
                    <a href="#features" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Fitur</a>
                    <a href="#about" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">About</a>
                    <a href="#guide" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Panduan</a>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-grow">
                <!-- Hero Section -->
                <section class="relative flex items-center justify-center min-h-screen overflow-hidden text-white bg-gradient-to-r from-blue-500 to-cyan-600">
                    <!-- Background Image -->
                    <div class="absolute inset-0">
                        <img src="{{ asset('images/yy.webp') }}" alt="Digital Office Background" class="object-cover w-full h-full opacity-40">
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                
                    <!-- Content -->
                    <div class="container relative z-10 text-center scroll-animation">
                        <h1 class="text-5xl font-extrabold leading-tight drop-shadow-lg scroll-animation">
                            Selamat Datang di <span class="text-yellow-300 scroll-animation">Agenda Surat</span>
                        </h1>
                        <p class="mt-4 text-lg font-light drop-shadow-md">
                            Solusi digital untuk mengelola <span class="text-yellow-400">surat masuk</span> dan <span class="text-yellow-400">surat keluar</span> dengan mudah dan efisien.
                        </p>
                        <a href="/login" class="inline-block px-8 py-3 mt-8 text-lg font-semibold text-gray-900 transition bg-yellow-400 rounded-lg hover:bg-yellow-300">Mulai Sekarang</a>
                    </div>
                </section>
            
                <!-- Features Section -->
                <section id="features" class="relative flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-50 to-gray-200 dark:from-gray-900 dark:to-gray-800">
                    <div class="container px-6 mx-auto text-center">
                        <h2 class="text-4xl font-bold text-gray-800 dark:text-white">Fitur Unggulan</h2>
                        <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Jelajahi fitur terbaik kami untuk membantu produktivitas Anda</p>
                        <div class="grid gap-8 mt-12 md:grid-cols-3 lg:grid-cols-4 scroll-animation">
                            <!-- Card 1 -->
                            <div class="relative p-6 transition-transform transform border border-gray-200 rounded-lg shadow-lg bg-white/60 backdrop-blur-md hover:shadow-xl hover:scale-105 dark:bg-gray-800/70">
                                <div class="absolute inset-0 w-full h-full rounded-lg bg-gradient-to-tr from-blue-500 to-cyan-400 opacity-20"></div>
                                <div class="relative flex flex-col items-center">
                                    <div class="flex items-center justify-center w-16 h-16 text-white bg-blue-500 rounded-full">
                                        <i class="text-2xl fas fa-envelope"></i>
                                    </div>
                                    <h3 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">Pengelolaan Surat</h3>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">Kelola surat masuk dan keluar secara terorganisir.</p>
                                </div>
                            </div>
                
                            <!-- Card 2 -->
                            <div class="relative p-6 transition-transform transform border border-gray-200 rounded-lg shadow-lg bg-white/60 backdrop-blur-md hover:shadow-xl hover:scale-105 dark:bg-gray-800/70">
                                <div class="absolute inset-0 w-full h-full rounded-lg bg-gradient-to-tr from-green-500 to-teal-400 opacity-20"></div>
                                <div class="relative flex flex-col items-center">
                                    <div class="flex items-center justify-center w-16 h-16 text-white bg-green-500 rounded-full">
                                        <i class="text-2xl fas fa-search-location"></i>
                                    </div>
                                    <h3 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">Pelacakan Status</h3>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">Lacak status surat secara real-time.</p>
                                </div>
                            </div>
                
                            <!-- Card 3 -->
                            <div class="relative p-6 transition-transform transform border border-gray-200 rounded-lg shadow-lg bg-white/60 backdrop-blur-md hover:shadow-xl hover:scale-105 dark:bg-gray-800/70">
                                <div class="absolute inset-0 w-full h-full rounded-lg bg-gradient-to-tr from-yellow-500 to-orange-400 opacity-20"></div>
                                <div class="relative flex flex-col items-center">
                                    <div class="flex items-center justify-center w-16 h-16 text-white bg-yellow-500 rounded-full">
                                        <i class="text-2xl fas fa-archive"></i>
                                    </div>
                                    <h3 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">Arsip Digital</h3>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">Akses arsip surat kapan saja.</p>
                                </div>
                            </div>
                
                            <!-- Card 4 -->
                            <div class="relative p-6 transition-transform transform border border-gray-200 rounded-lg shadow-lg bg-white/60 backdrop-blur-md hover:shadow-xl hover:scale-105 dark:bg-gray-800/70">
                                <div class="absolute inset-0 w-full h-full rounded-lg bg-gradient-to-tr from-purple-500 to-pink-400 opacity-20"></div>
                                <div class="relative flex flex-col items-center">
                                    <div class="flex items-center justify-center w-16 h-16 text-white bg-purple-500 rounded-full">
                                        <i class="text-2xl fas fa-cogs"></i>
                                    </div>
                                    <h3 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">Kustomisasi</h3>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">Sesuaikan pengaturan aplikasi dengan kebutuhan Anda.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                

                <!-- About Section -->
                <section id="about" class="relative min-h-screen bg-gradient-to-br from-blue-50 to-blue-100 dark:from-gray-800 dark:to-gray-900">
                    <div class="container px-6 py-16 mx-auto lg:flex lg:items-center lg:gap-12">
                        <!-- Left Image -->
                        <div class="relative w-full lg:w-1/2">
                            <img src="{{ asset('images/surat.webp') }}" alt="Illustration" class="rounded-lg shadow-lg scroll-animation">
                            <div class="absolute top-[-20px] left-[-20px] w-40 h-40 bg-blue-400 rounded-full opacity-25 blur-2xl"></div>
                            <div class="absolute bottom-[-20px] right-[-20px] w-40 h-40 bg-yellow-400 rounded-full opacity-25 blur-2xl"></div>
                        </div>
                        <!-- Right Content -->
                        <div class="mt-12 lg:mt-0 lg:w-1/2">
                            <h2 class="text-4xl font-bold leading-snug text-gray-800 dark:text-white">
                                Tentang Kami
                            </h2>
                            <p class="mt-6 text-lg leading-relaxed text-gray-600 dark:text-gray-400">
                                Aplikasi Agenda Surat dirancang untuk membantu organisasi mengelola dokumen dengan lebih baik. Kami menghadirkan solusi modern dalam pencatatan, pelacakan, dan pengarsipan surat secara digital, untuk meningkatkan efisiensi dan produktivitas Anda.
                            </p>
                            <ul class="mt-8 space-y-4">
                                <li class="flex items-start">
                                    <div class="flex items-center justify-center w-12 h-12 text-white bg-blue-500 rounded-full">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <p class="ml-4 text-gray-700 dark:text-gray-300">
                                        Pengelolaan dokumen yang lebih cepat dan efisien.
                                    </p>
                                </li>
                                <li class="flex items-start">
                                    <div class="flex items-center justify-center w-12 h-12 text-white bg-green-500 rounded-full">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <p class="ml-4 text-gray-700 dark:text-gray-300">
                                        Keamanan data yang terjamin dengan teknologi terkini.
                                    </p>
                                </li>
                                <li class="flex items-start">
                                    <div class="flex items-center justify-center w-12 h-12 text-white bg-yellow-500 rounded-full">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <p class="ml-4 text-gray-700 dark:text-gray-300">
                                        Dukungan dan kemudahan akses di berbagai perangkat.
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Decorative Curves -->
                    <div class="absolute inset-x-0 bottom-0">
                        <svg viewBox="0 0 1440 320" class="w-full">
                            <path fill="#ffffff" fill-opacity="1"
                                d="M0,160L60,176C120,192,240,224,360,234.7C480,245,600,235,720,218.7C840,203,960,181,1080,170.7C1200,160,1320,160,1380,160L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                            </path>
                        </svg>
                    </div>
                </section>

                <!-- Guide Section -->
                <section id="guide" class="flex items-center justify-center min-h-screen bg-gradient-to-tr from-gray-100 to-gray-300 dark:from-gray-800 dark:to-gray-700">
                    <div class="container px-6 mx-auto text-center">
                        <h2 class="text-4xl font-extrabold text-gray-800 dark:text-white">Panduan</h2>
                        <p class="max-w-3xl mx-auto mt-4 text-lg text-gray-600 dark:text-gray-400">
                            Ikuti langkah-langkah berikut untuk memulai menggunakan Aplikasi Agenda Surat:
                        </p>
                        <div class="grid gap-8 mt-12 sm:grid-cols-2 lg:grid-cols-4 scroll-animation">
                            <div class="p-6 transition-transform duration-300 transform bg-white rounded-lg shadow-md dark:bg-gray-700 hover:scale-105 feature-card">
                                <div class="flex items-center justify-center w-12 h-12 mx-auto text-white bg-blue-600 rounded-full">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <h3 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">Login</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-400">Masuk menggunakan kredensial Anda.</p>
                            </div>
                            <div class="p-6 transition-transform duration-300 transform bg-white rounded-lg shadow-md dark:bg-gray-700 hover:scale-105 feature-card">
                                <div class="flex items-center justify-center w-12 h-12 mx-auto text-white bg-green-600 rounded-full">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <h3 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">Tambah Surat</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-400">Tambahkan surat masuk atau keluar dengan mudah melalui fitur "Tambah Surat".</p>
                            </div>
                            <div class="p-6 transition-transform duration-300 transform bg-white rounded-lg shadow-md dark:bg-gray-700 hover:scale-105 feature-card">
                                <div class="flex items-center justify-center w-12 h-12 mx-auto text-white bg-yellow-600 rounded-full">
                                    <i class="fas fa-search"></i>
                                </div>
                                <h3 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">Pantau Status</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-400">Lihat status surat Anda secara real-time untuk memastikan progresnya.</p>
                            </div>
                            <div class="p-6 transition-transform duration-300 transform bg-white rounded-lg shadow-md dark:bg-gray-700 hover:scale-105 feature-card">
                                <div class="flex items-center justify-center w-12 h-12 mx-auto text-white bg-purple-600 rounded-full">
                                    <i class="fas fa-archive"></i>
                                </div>
                                <h3 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">Arsipkan Surat</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-400">Simpan surat penting ke dalam arsip untuk akses yang lebih mudah.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <!-- Footer -->
            <footer class="py-6 bg-gray-800 dark:bg-gray-900">
                <div class="container text-center text-white">
                    <p>&copy; 2025 Dispunsip. All Rights Reserved.</p>
                </div>
            </footer>
        </div>
    </div>

    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('nav a');
    
            function setActiveMenu() {
                let scrollPosition = window.scrollY;
    
                sections.forEach(section => {
                    const sectionTop = section.offsetTop - 100;
                    const sectionHeight = section.offsetHeight;
                    const sectionId = section.getAttribute('id');
    
                    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                        navLinks.forEach(link => {
                            link.classList.remove('text-blue-600', 'font-bold');
                            if (link.getAttribute('href') === `#${sectionId}`) {
                                link.classList.add('text-blue-600', 'font-bold');
                            }
                        });
                    }
                });
            }
    
            window.addEventListener('scroll', setActiveMenu);
            setActiveMenu();
        });
    
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');
    
        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    
        // Animasi Scroll
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.scroll-animation');
    
            const handleScroll = () => {
                elements.forEach(el => {
                    const rect = el.getBoundingClientRect();
                    if (rect.top < window.innerHeight - 100) {
                        el.classList.add('visible', 'opacity-100', 'translate-y-0');
                    } else {
                        el.classList.remove('visible', 'opacity-100', 'translate-y-0');
                    }
                });
            };
    
            window.addEventListener('scroll', handleScroll);
            handleScroll(); // Jalankan sekali saat halaman dimuat
        });
    </script>
    
</body>
</html>