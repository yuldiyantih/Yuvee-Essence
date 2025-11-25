<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul ?? 'Yuvee Essence' }}</title>

    {{-- ✅ Panggil CSS utama --}}
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    {{-- ✅ Font Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- ✅ Font Awesome untuk ikon profil --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    {{-- 🌸 HEADER ATAS --}}
    <header class="topbar">
        <div class="topbar-left">
            <span>🌸 Yuvee Essence</span>
        </div>

        <div class="topbar-right">
            <div class="search-cart">
                <input type="text" placeholder="Search...">
                <button>🔍</button>

                {{-- 🛒 Tombol menuju halaman keranjang --}}
                <a href="{{ route('cart.index') }}" class="cart-btn">
                    🛒
                    @if(session('cart') && count(session('cart')) > 0)
                    <span class="cart-count">{{ count(session('cart')) }}</span>
                    @endif
                </a>

                {{-- 👤 Tombol menuju halaman profil --}}
                <a href="{{ route('profile.index') }}" class="profile-btn">
                    <i class="fa-solid fa-user"></i>
                </a>


            </div>
        </div>
    </header>


    {{-- 🌸 NAVBAR --}}
    <nav class="navbar">
        <div class="navbar-container">
            <div class="logo">
                <span class="brand">Yuvee <span>Essence</span></span>
            </div>

            <ul class="nav-links">
                <li><a href="{{ route('home') }}" class="{{ Request::routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('produk.index') }}" class="{{ Request::routeIs('produk.*') ? 'active' : '' }}">Produk</a></li>
                <li><a href="{{ route('tentang') }}" class="{{ Request::routeIs('tentang') ? 'active' : '' }}">Tentang</a></li>
                <li><a href="{{ route('kontak') }}" class="{{ Request::routeIs('kontak') ? 'active' : '' }}">Kontak</a></li>
            </ul>
        </div>
    </nav>

    {{-- 🌸 KONTEN HALAMAN --}}
    <main>
        @yield('content')
    </main>

    {{-- 🌸 FOOTER --}}
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Yuvee Essence Logo">
                <h3>Yuvee Essence</h3>
                <p>Kecantikan yang alami, dari hati.</p>
            </div>

            {{-- 🔹 Link navigasi --}}
            <div class="footer-links">
                <h3>Explore</h3>
                <ul>
                    <li><a href="{{ route('tentang') }}">About Us</a></li>
                    <li><a href="{{ route('kontak') }}">contact</a></li>
                    <li><a href="/kebijakan-privasi">Kebijakan Privasi</a></li>
                    <li><a href="{{ route('syarat') }}">Syarat & Ketentuan</a></li>
                </ul>
            </div>

            <div class="footer-contact">
                <h4>Stay in Touch</h4>
                <p>Welcome to our Yuvee world!</p>
                <form action="#">
                    <input type="email" placeholder="Your Email" required>
                    <button type="submit">OK</button>
                </form>
            </div>
        </div>
        <p class="copyright">©2025, Yuvee Essence</p>
    </footer>

</body>

</html>