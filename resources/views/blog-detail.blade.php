<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="shortcut icon" href="{{asset('/img/alhasaniyah.png')}}" type="image/x-icon">

    <!-- Google Fonts untuk Tipografi Elegan -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Pengaturan Font Global */
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #374151; /* text-gray-700 */
        }

        /* Font Elegan untuk Heading */
        h1, h2, h3, h4, .font-elegant {
            font-family: 'Playfair Display', serif;
        }

        /* Navigasi Scroll Effect */
        .nav-scrolled {
            background-color: rgba(255, 255, 255, 0.98);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding-top: 0.75rem !important;
            padding-bottom: 0.75rem !important;
        }

        /* Animasi Auto-Slide Prestasi (Infinite Marquee) */
        @keyframes scroll-horizontal {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-50% - 0.75rem)); } /* 0.75rem adalah setengah dari gap-6 (1.5rem) */
        }

        .animate-slider-track {
            display: flex;
            width: max-content;
            animation: scroll-horizontal 35s linear infinite;
        }

        .animate-slider-track:hover {
            animation-play-state: paused; /* Berhenti saat di-hover */
        }

        /* Smooth Hide/Show untuk Halaman Virtual */
        .page-section {
            display: none;
            opacity: 0;
            transition: opacity 0.4s ease-in-out;
        }
        .page-section.active {
            display: block;
            opacity: 1;
        }

        /* Animasi slow bounce hero badge */
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(-5%); }
            50% { transform: translateY(5%); }
        }
        .animate-bounce-slow {
            animation: bounce-slow 3s infinite ease-in-out;
        }
    </style>
</head>
<body class="bg-white selection:bg-blue-100 selection:text-blue-900 antialiased">

    <!-- HEADER & NAVBAR -->
    <header class="fixed w-full z-50 flex flex-col">
        <!-- Top Bar for Professional Look -->
        <div class="bg-blue-900 text-white py-2 text-xs hidden md:block">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <div class="flex gap-6">
                    <span class="flex items-center gap-1.5"><i class="fa-solid fa-phone text-yellow-400"></i> {{$profile->telepon}}</span>
                    <span class="flex items-center gap-1.5"><i class="fa-solid fa-envelope text-yellow-400"></i> {{$profile->email}}</span>
                </div>
                <div class="font-medium text-yellow-400 tracking-wide uppercase font-semibold text-[10px]">
                    {{$hero->info}}
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav id="navbar" class="bg-white/95 backdrop-blur-md border-b border-gray-100 py-4 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">

                <!-- Logo -->
                <div class="flex items-center gap-3 cursor-pointer group" onclick="navigateTo('beranda')">
                    <div class="p-2.5 rounded-xl transition-colors">
                        <img src="img/alhasaniyah.png" class="w-10 h-10 object-contain" alt="Logo MTS Alhasaniyah">
                        <!-- <i class="fa-solid fa-graduation-cap text-white text-xl"></i> -->
                    </div>
                    <div>
                        <h1 class="text-xl md:text-2xl font-bold text-gray-900 leading-none tracking-tight">{{$profile->nama}}</h1>
                        <span class="text-[10px] md:text-xs text-blue-800 font-bold tracking-widest uppercase">I{{$profile->tagline}}</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center gap-8 text-sm">
                    <a href="/" class="font-semibold text-gray-700 hover:text-blue-800 transition-colors">Beranda</a>

                    <!-- Nested Dropdown Profil -->
                    <div class="group relative">
                        <button onclick="navigateTo('profil')" class="flex items-center gap-1.5 font-semibold text-gray-700 hover:text-blue-800 py-2 transition-colors">
                            Profil <i class="fa-solid fa-chevron-down text-[10px]"></i>
                        </button>
                        <div class="absolute top-full left-0 w-56 bg-white shadow-xl rounded-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-y-3 group-hover:translate-y-0 z-50 overflow-hidden">
                            <div class="py-2">
                                <button onclick="navigateTo('profil')" class="block w-full text-left px-5 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-blue-800 transition-colors">Sejarah Singkat</button>
                                <button onclick="navigateTo('profil')" class="block w-full text-left px-5 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-blue-800 transition-colors">Visi & Misi</button>
                            </div>
                        </div>
                    </div>

                    <button onclick="navigateTo('beranda', 'alumni')" class="font-semibold text-gray-700 hover:text-blue-800 transition-colors">Direktori Alumni</button>
                    <button onclick="navigateTo('beranda', 'prestasi')" class="font-semibold text-gray-700 hover:text-blue-800 transition-colors">Prestasi</button>
                    <button onclick="navigateTo('pengumuman')" class="font-semibold text-gray-700 hover:text-blue-800 transition-colors">Pengumuman</button>
                    <button onclick="navigateTo('beranda', 'gallery')" class="font-semibold text-gray-700 hover:text-blue-800 transition-colors">Gallery</button>
                    <button onclick="navigateTo('beranda', 'blog')" class="font-semibold text-gray-700 hover:text-blue-800 transition-colors">Blog</button>

                    <!-- CTA Button -->
                    <button onclick="navigateTo('psb')" class="bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-blue-900 px-6 py-2.5 rounded-lg font-bold shadow-md transition-all hover:shadow-lg hover:-translate-y-0.5 ml-2">
                        Penerimaan Santri Baru
                    </button>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="lg:hidden text-gray-700 p-2" onclick="toggleMobileMenu()">
                    <i id="mobile-menu-icon" class="fa-solid fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Dropdown -->
            <div id="mobile-menu" class="hidden absolute top-full left-0 w-full bg-white border-b border-gray-100 shadow-xl px-4 pt-2 pb-6 flex-col space-y-3 z-50 max-h-[80vh] overflow-y-auto">
                <a href="/" class="text-left font-semibold text-gray-800 py-3 border-b border-gray-50">Beranda</a>

                <div>
                    <button onclick="toggleMobileProfil()" class="flex items-center justify-between w-full py-3 font-semibold text-gray-800 border-b border-gray-50">
                        Profil <i id="mobile-profil-icon" class="fa-solid fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <div id="mobile-profil-sub" class="hidden pl-4 py-2 space-y-3 bg-gray-50/50 rounded-b-lg mb-2 border-l-2 border-blue-800 mt-1">
                        <button onclick="navigateTo('profil')" class="block w-full text-left py-2 text-sm font-medium text-gray-600">Sejarah Singkat</button>
                        <button onclick="navigateTo('profil')" class="block w-full text-left py-2 text-sm font-medium text-gray-600">Visi & Misi</button>
                    </div>
                </div>

                <button onclick="navigateTo('beranda', 'alumni')" class="text-left font-semibold text-gray-800 py-3 border-b border-gray-50">Direktori Alumni</button>
                <button onclick="navigateTo('beranda', 'prestasi')" class="text-left font-semibold text-gray-800 py-3 border-b border-gray-50">Prestasi Siswa</button>
                <button onclick="navigateTo('pengumuman')" class="text-left font-semibold text-gray-800 py-3 border-b border-gray-50">Pengumuman</button>
                <button onclick="navigateTo('beranda', 'gallery')" class="text-left font-semibold text-gray-800 py-3 border-b border-gray-50">Gallery</button>
                <button onclick="navigateTo('beranda', 'blog')" class="text-left font-semibold text-gray-800 py-3 border-b border-gray-50">Blog</button>
                <button onclick="navigateTo('beranda', 'kontak')" class="text-left font-semibold text-gray-800 py-3 border-b border-gray-50">Hubungi Kami</button>

                <div class="pt-4">
                    <button onclick="navigateTo('psb')" class="w-full bg-yellow-500 hover:bg-yellow-600 text-blue-900 px-5 py-3.5 rounded-xl font-bold text-center shadow-md">
                        Penerimaan Santri Baru
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main class="pt-[104px] md:pt-[116px]">

        <!-- ================= BERANDA PAGE ================= -->
        <div id="page-beranda" class="page-section active">
            <!-- Blog Detail Header -->
            <div class="bg-blue-900 text-white py-20 relative overflow-hidden">
                <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1506880018603-83d5b814b5a6?q=80&w=2070&auto=format&fit=crop')] opacity-10 bg-cover bg-center"></div>
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                    <div class="inline-block bg-yellow-100 border border-yellow-200 text-yellow-800 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-4">
                        Blog & Artikel
                    </div>
                    <h1 class="text-4xl md:text-5xl font-elegant font-bold mb-6">{{ $blog->judul }}</h1>
                    <div class="flex flex-wrap items-center gap-6 text-blue-200 text-sm font-light">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($blog->tanggal)->format('d M Y') }}</span>
                        <span class="flex items-center gap-2"><i class="fa-solid fa-user"></i> {{ $blog->penulis ?? 'Admin' }}</span>
                        <span class="flex items-center gap-2"><i class="fa-solid fa-tag"></i> {{ $blog->category->name ?? 'Umum' }}</span>
                    </div>
                </div>
            </div>

            <!-- Blog Content Section -->
            <div class="bg-white py-16 md:py-24">
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Featured Image -->
                    @if($blog->thumbnail)
                        <div class="mb-12 rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                            <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->judul }}" class="w-full h-auto object-cover">
                        </div>
                    @endif

                    <iframe 
                    id="myFrame"
                        srcdoc="{{ $blog->konten }}" 
                        class="w-full"
                        scrolling="no"
                    ></iframe>

                    <!-- Metadata Section -->
                    <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100 mt-16">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                            <div>
                                <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Kategori Artikel</p>
                                <span class="inline-block bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold">{{ $blog->category->name ?? 'Umum' }}</span>
                            </div>
                            <div class="flex gap-3">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="w-10 h-10 rounded-full bg-blue-600 hover:bg-blue-700 text-white flex items-center justify-center transition-colors" title="Bagikan di Facebook">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->judul) }}" target="_blank" class="w-10 h-10 rounded-full bg-blue-400 hover:bg-blue-500 text-white flex items-center justify-center transition-colors" title="Bagikan di Twitter">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($blog->judul . ' ' . url()->current()) }}" target="_blank" class="w-10 h-10 rounded-full bg-green-500 hover:bg-green-600 text-white flex items-center justify-center transition-colors" title="Bagikan di WhatsApp">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Back to Blog Button -->
                    <div class="mt-12">
                        <a href="/" class="inline-flex items-center gap-2 text-blue-800 font-bold hover:text-blue-600 transition-colors">
                            <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- ================= PROFIL PAGE ================= -->
        <div id="page-profil" class="page-section">
            <!-- Profil Header -->
            <div class="bg-blue-900 text-white py-24 relative overflow-hidden">
                <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070&auto=format&fit=crop')] opacity-10 bg-cover bg-center"></div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
                    <h1 class="text-4xl md:text-6xl font-elegant font-bold mb-6">Profil MTS Alhasaniyah</h1>
                    <p class="text-blue-200 max-w-2xl mx-auto text-lg font-light leading-relaxed">Mengenal lebih dekat sejarah, visi, dan fasilitas pendukung pembelajaran yang kami miliki untuk mencetak generasi unggul.</p>
                </div>
            </div>

            <!-- Content -->
            <div class="bg-gray-50 pb-24 pt-16">
                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-14 mb-10">
                        <h2 class="text-3xl font-elegant font-bold text-gray-900 mb-8 flex items-center gap-4">
                            <span class="w-1.5 h-8 bg-yellow-500 rounded-full inline-block"></span> Sejarah Singkat
                        </h2>
                        <div class="prose max-w-none text-gray-600 leading-relaxed font-light text-lg space-y-6">
                            <p>{{$profile->sejarah}}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10">
                        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-12">
                            <h2 class="text-3xl font-elegant font-bold text-gray-900 mb-6 flex items-center gap-3">
                                <i class="fa-solid fa-bullseye text-blue-800"></i> Visi
                            </h2>
                            <p class="text-gray-600 italic text-xl font-elegant leading-relaxed">"{{$profile->visi}}"</p>
                        </div>
                        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-12">
                            <h2 class="text-3xl font-elegant font-bold text-gray-900 mb-6 flex items-center gap-3">
                                <i class="fa-solid fa-list-check text-blue-800"></i> Misi
                            </h2>
                            <ul class="text-gray-600 font-light space-y-4">
                                @foreach ($misi as $item)
                                    <li class="flex gap-3"><i class="fa-solid fa-check text-green-500 mt-1"></i> <span>{{$item->misi}}</span></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= PENGUMUMAN PAGE ================= -->
        <div id="page-pengumuman" class="page-section">
            <div class="bg-white border-b border-gray-200">
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                    <h1 class="text-4xl md:text-5xl font-elegant font-bold text-gray-900 mb-4">Papan Pengumuman</h1>
                    <p class="text-gray-500 font-light text-lg">Informasi resmi seputar agenda akademik dan kegiatan madrasah.</p>
                </div>
            </div>

            <div class="bg-gray-50 pb-24 min-h-screen">
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 space-y-6">

                    @foreach ($pengumuman as $peng)
                        <!-- Item Pengumuman 1 -->
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col sm:flex-row gap-8 items-start hover:shadow-lg transition-all duration-300">
                        <div class="bg-blue-50 text-blue-900 rounded-2xl p-5 text-center min-w-[110px] shrink-0 border border-blue-100">
                            <span class="block text-4xl font-elegant font-bold mb-1">
                                {{ \Carbon\Carbon::parse($peng->tanggal)->format('d') }}
                            </span>

                            <span class="block text-xs font-bold uppercase tracking-wider">
                                {{ \Carbon\Carbon::parse($peng->tanggal)->format("M 'y") }}
                            </span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-elegant font-bold text-gray-900 mb-3">{{$peng->judul}}</h3>
                            <p class="text-gray-600 mb-5 leading-relaxed font-light">{{$peng->deskripsi}}</p>

                            <a href="{{ asset('storage/' . $peng->dokumen) }}"
                            download
                            class="text-blue-800 font-bold hover:text-blue-600 flex items-center gap-2 text-sm uppercase tracking-wider">
                                Unduh Surat Edaran
                                <i class="fa-solid fa-download"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    


                </div>
            </div>
        </div>

        <!-- ================= PSB PAGE ================= -->
        <div id="page-psb" class="page-section">
            <div class="bg-gray-50 min-h-screen pb-24">
                <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 text-center mb-16">
                    <div class="inline-block bg-yellow-100 border border-yellow-200 text-yellow-800 px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest mb-6">
                        Tahun Ajaran 2026/2027
                    </div>
                    <h1 class="text-4xl md:text-6xl font-elegant font-bold text-gray-900 mb-6">Penerimaan Santri Baru</h1>
                    <p class="text-gray-600 text-lg font-light leading-relaxed">Bergabunglah bersama MTS Alhasaniyah dan jadilah bagian dari generasi penerus umat yang cerdas, modern, dan berakhlak mulia.</p>
                </div>

                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 md:p-14">
                        <div class="flex items-center gap-4 mb-10 pb-8 border-b border-gray-100">
                            <div class="bg-blue-50 p-4 rounded-full text-blue-800"><i class="fa-solid fa-book-open-reader text-2xl"></i></div>
                            <h2 class="text-3xl font-elegant font-bold text-gray-900">Formulir Pendaftaran Online</h2>
                        </div>

                        <form class="space-y-8" id="formPendaftaran">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Nama Lengkap Calon Santri</label>
                                    <input name="nama" type="text" required class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-800 outline-none font-light" placeholder="Sesuai akta kelahiran" />
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">NISN</label>
                                    <input name="nisn" type="text" required class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-800 outline-none font-light" placeholder="Nomor Induk Siswa Nasional" />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Asal Sekolah (SD/MI)</label>
                                    <input name="asal_sekolah" type="text" required class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-800 outline-none font-light" placeholder="Contoh: SD Negeri 1" />
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Nama Orang Tua / Wali</label>
                                    <input name="nama_orang_tua" type="text" required class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-800 outline-none font-light" placeholder="Nama lengkap wali" />
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Alamat Lengkap</label>
                                <textarea name="alamat_lengkap" rows="3" required class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-800 outline-none resize-none font-light" placeholder="Alamat domisili saat ini"></textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Nomor HP</label>
                                <input name="nomor_hp" type="text" required class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-800 outline-none font-light" placeholder="Nomor HP aktif untuk kontak" />
                            </div>

                            <div class="bg-blue-50/50 p-6 rounded-2xl border border-blue-100 mt-10">
                                <h4 class="font-bold text-blue-900 mb-2 font-elegant text-lg flex items-center gap-2">
                                    <i class="fa-solid fa-circle-info text-blue-600"></i> Pemberitahuan Penting
                                </h4>
                                <p class="text-sm text-blue-800 leading-relaxed font-light">
                                    Setelah mengisi formulir ini, panitia PSB akan menghubungi nomor/email yang terdaftar untuk jadwal tes seleksi dan kelengkapan dokumen fisik. Pastikan data yang dimasukkan adalah benar.
                                </p>
                            </div>

                            <button type="submit" class="w-full bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-blue-900 font-bold py-5 rounded-xl shadow-lg transition-all hover:-translate-y-1 mt-6 text-lg uppercase tracking-wider">
                                Kirim Formulir Pendaftaran
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-blue-900 text-white pt-20 pb-8 border-t-[8px] border-yellow-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
            <div class="md:col-span-5">
                <div class="flex items-center gap-4 mb-8">
                    <div class="bg-white/10 p-3 rounded-2xl">
                        <i class="fa-solid fa-graduation-cap text-yellow-400 text-3xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold tracking-tight text-white font-elegant">{{$profile->nama}}</h2>
                        <p class="text-blue-300 text-[10px] font-bold tracking-widest uppercase mt-1">{{$profile->tagline}}</p>
                    </div>
                </div>
                <p class="text-blue-100 text-sm leading-relaxed max-w-sm mb-8 font-light">
                    {{ $profile->deskripsi }}
                </p>
                <div class="flex gap-4">
                    <a href="{{$profile->facebook}}" class="w-12 h-12 rounded-full bg-blue-800 flex items-center justify-center hover:bg-yellow-500 hover:text-blue-900 transition-colors text-lg"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="{{$profile->instagram}}" class="w-12 h-12 rounded-full bg-blue-800 flex items-center justify-center hover:bg-yellow-500 hover:text-blue-900 transition-colors text-lg"><i class="fa-brands fa-instagram"></i></a>
                    <a href="{{$profile->youtube}}" class="w-12 h-12 rounded-full bg-blue-800 flex items-center justify-center hover:bg-yellow-500 hover:text-blue-900 transition-colors text-lg"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>

            <div class="md:col-span-3">
                <h3 class="text-xl font-elegant font-bold text-white mb-8 relative inline-block">
                    Tautan Cepat
                    <span class="absolute -bottom-2 left-0 w-1/2 h-0.5 bg-yellow-500"></span>
                </h3>
                <ul class="space-y-4 text-sm text-blue-200 font-light">
                    <li><button onclick="navigateTo('profil')" class="hover:text-yellow-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs"></i> Profil Sekolah</button></li>
                    <li><button onclick="navigateTo('pengumuman')" class="hover:text-yellow-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs"></i> Pengumuman</button></li>
                    <li><button onclick="navigateTo('beranda', 'gallery')" class="hover:text-yellow-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs"></i> Gallery & Aktivitas</button></li>
                    <li><button onclick="navigateTo('psb')" class="hover:text-yellow-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs"></i> Pendaftaran Santri Baru</button></li>
                </ul>
            </div>

            <div class="md:col-span-4">
                <h3 class="text-xl font-elegant font-bold text-white mb-8 relative inline-block">
                    Informasi Kontak
                    <span class="absolute -bottom-2 left-0 w-1/2 h-0.5 bg-yellow-500"></span>
                </h3>
                <ul class="space-y-5 text-sm text-blue-200 font-light">
                    <li class="flex items-start gap-4">
                        <i class="fa-solid fa-location-dot text-yellow-400 mt-1"></i>
                        <span class="leading-relaxed">{{$profile->alamat}}</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <i class="fa-solid fa-phone text-yellow-400"></i>
                        <span>{{$profile->telepon}} (WA Available)</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <i class="fa-solid fa-envelope text-yellow-400"></i>
                        <span>{{$profile->email}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-blue-800/50 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-blue-400 font-light tracking-wide">
            <p>&copy; 2026 {{$profile->nama}}. Hak Cipta Dilindungi.</p>
            <div class="flex gap-6 mt-4 md:mt-0">
                <span class="hover:text-white cursor-pointer transition-colors">Kebijakan Privasi</span>
                <span class="hover:text-white cursor-pointer transition-colors">Syarat & Ketentuan</span>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        // 1. Script untuk menduplikat isi carousel agar infinity loop-nya mulus
        document.addEventListener('DOMContentLoaded', () => {
            const track = document.getElementById('prestasi-track');
            const originalContent = track.firstElementChild.innerHTML;
            track.lastElementChild.innerHTML = originalContent; // Copy ke set 2
        });

        // 2. Logic Navigation antar "Virtual Page" & Smooth Scroll Beranda
        function navigateTo(pageId, sectionId = null) {
            // saya ingin jika pageId = 'beranda' maka user diarahkan ke url beranda ('/') dengan scroll ke section tertentu, tapi jika pageId selain 'beranda' maka user tetap di url beranda tapi dengan tampilan page-section yang berbeda sesuai pageId
            if (pageId === 'beranda') {
                // Jika sudah di beranda, cukup scroll ke section yang dituju
                if (window.location.pathname === '/') {
                    const sectionEl = document.getElementById(sectionId);
                    if (sectionEl) {
                        const yOffset = -100; // Offset untuk floating navbar
                        const y = sectionEl.getBoundingClientRect().top + window.scrollY + yOffset;
                        window.scrollTo({ top: y, behavior: 'smooth' });
                    }
                    return;
                } else {
                    // Jika tidak di beranda, pindah ke beranda terlebih dahulu
                    window.location.href = '/#' + (sectionId || '');
                    return;
                }
            } else {
                // Sembunyikan semua halaman virtual

            document.querySelectorAll('.page-section').forEach(el => {
                el.classList.remove('active');
                // timeout untuk transition (opsional tapi aman)
                setTimeout(() => el.style.display = 'none', 50);
            });

            // Tampilkan halaman yang dituju
            const targetPage = document.getElementById(`page-${pageId}`);
            setTimeout(() => {
                targetPage.style.display = 'block';
                // Trigger reflow untuk css transition
                void targetPage.offsetWidth;
                targetPage.classList.add('active');
            }, 60);

            // Close mobile menu jika sedang terbuka
            const mobileMenu = document.getElementById('mobile-menu');
            if(!mobileMenu.classList.contains('hidden')) {
                toggleMobileMenu();
            }

            // Handling Scroll Position
            if (pageId === 'beranda' && sectionId) {
                // Scroll ke section tertentu jika di beranda
                setTimeout(() => {
                    const sectionEl = document.getElementById(sectionId);
                    if (sectionEl) {
                        const yOffset = -100; // Offset untuk floating navbar
                        const y = sectionEl.getBoundingClientRect().top + window.scrollY + yOffset;
                        window.scrollTo({ top: y, behavior: 'smooth' });
                    }
                }, 150); // tunggu render sejenak
            } else {
                // Scroll to top untuk pindah halaman
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
            }


            
        }

        // 3. Logic Toggle Mobile Menu Utama
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const icon = document.getElementById('mobile-menu-icon');

            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                menu.classList.add('flex');
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');
            } else {
                menu.classList.add('hidden');
                menu.classList.remove('flex');
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
            }
        }

        // 4. Logic Toggle Sub-Menu Profil di Mobile
        function toggleMobileProfil() {
            const sub = document.getElementById('mobile-profil-sub');
            const icon = document.getElementById('mobile-profil-icon');

            sub.classList.toggle('hidden');
            if(sub.classList.contains('hidden')) {
                icon.style.transform = "rotate(0deg)";
            } else {
                icon.style.transform = "rotate(180deg)";
            }
        }

        // 5. Navbar Scrolled Effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 20) {
                navbar.classList.add('nav-scrolled');
                navbar.classList.remove('py-4');
            } else {
                navbar.classList.remove('nav-scrolled');
                navbar.classList.add('py-4');
            }
        });
    </script>


    <script>
        document.getElementById('contactForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const form = this;
        const formData = new FormData(form);

        try {
            const response = await fetch("{{ route('pesan.simpan') }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                console.log(data); // ← lihat error di sini
                alert("Validasi gagal. Cek console.");
                return;
            }

            form.reset();
            alert("Pesan berhasil dikirim!");

        } catch (error) {
            console.error(error);
        }
    });
    </script>


    
    <script>
    document.getElementById('formPendaftaran')
    .addEventListener('submit', async function(e) {

        e.preventDefault();

        const form = this;
        const formData = new FormData(form);

        try {
            const response = await fetch("{{ route('santri-baru.simpan') }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                console.log(data);
                alert("Terjadi kesalahan validasi.");
                return;
            }

            form.reset();

            alert("Formulir berhasil dikirim! Tim kami akan menghubungi Anda.");

        } catch (error) {
            console.error(error);
            alert("Terjadi kesalahan server.");
        }
    });
    </script>


<script>
document.getElementById('myFrame').addEventListener('load', function () {
    this.style.height = this.contentWindow.document.body.scrollHeight + 'px';
    
});

const iframe = document.getElementById('myFrame');
iframe.onload = function () {
    const doc = iframe.contentDocument;
    const style = doc.createElement('style');
    style.innerHTML = `
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 18px;
            color: #374151;
        }
        
        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
        }
    `;
    doc.head.appendChild(style);
};
</script>
</body>
</html>
