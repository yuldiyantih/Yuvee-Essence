@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

<div class="profile-wrapper">
    <div class="profile-container">

        <div class="sidebar">
            <h3>My Account</h3>
            <ul>
                <li class="tab-link active" data-tab="personal">
                    <i class="fa-solid fa-user"></i> Personal Information
                </li>
                <li class="tab-link" data-tab="profile">
                    <i class="fa-solid fa-gear"></i> Profile Setting
                </li>
                <li class="tab-link" data-tab="order">
                    <i class="fa-solid fa-box"></i> My Order
                </li>
            </ul>
        </div>

        <div class="profile-content">

            {{-- ➤ Tab Form Input --}}
            <div id="personal" class="tab-content active">
                <h2 class="section-title">Lengkapi Profil Pembelianmu</h2>

                @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('profile.store') }}" method="POST" class="profile-form">
                    @csrf

                    <div class="form-section">
                        <h4>Data Diri</h4>
                        <div class="form-group">
                            <label>Nama *</label>
                            <input type="text" name="nama" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor WhatsApp *</label>
                            <input type="text" name="whatsapp" placeholder="Nomor WhatsApp" required>
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                    </div>

                    <div class="form-section">
                        <h4>Alamat Pengiriman</h4>
                        <div class="form-group">
                            <label>Alamat Lengkap *</label>
                            <input type="text" name="alamat" placeholder="Alamat Lengkap" required>
                        </div>
                    </div>

                    <div class="button-row">
                        <button type="submit" class="save-btn">Save</button>
                    </div>
                </form>
            </div>

            {{-- ➤ Tab List Data Profile --}}
            <div id="profile" class="tab-content">
                <h2 class="section-title">Profile Setting</h2>

                <form action="{{ route('profile.massDelete') }}" method="POST">
                    @csrf
                    @method('DELETE')

                    {{-- List data --}}
                    @if($profiles->count() > 0)
                    @foreach($profiles as $profile)
                    <div class="customer-data-card" style="position: relative;">

                        {{-- Checkbox bulat --}}
                        <label class="checkbox-circle">
                            <input type="checkbox" name="selected_profiles[]" value="{{ $profile->id }}">
                            <span class="checkmark"></span>
                        </label>

                        <div class="data-row"><span>Nama:</span> <span>{{ $profile->nama }}</span></div>
                        <div class="data-row"><span>WhatsApp:</span> <span>{{ $profile->whatsapp }}</span></div>
                        <div class="data-row"><span>Email:</span> <span>{{ $profile->email }}</span></div>
                        <div class="data-row"><span>Alamat:</span> <span>{{ $profile->alamat }}</span></div>
                    </div>
                    @endforeach
                    @else
                    <p style="text-align:center; color:#777;">Belum ada data profile.</p>
                    @endif

                    {{-- Tombol hapus --}}
                    <div style="text-align:center; margin-top:20px;">
                        <button type="submit" class="btn-setting delete-selected"
                            style="background:#d93636; color:white;">
                            <i class="fa-solid fa-trash"></i> Hapus Data Terpilih
                        </button>
                    </div>
                </form>

                {{-- Tombol ubah & tambah profil (pindah ke tab personal) --}}
                <div class="setting-buttons" style="margin-top: 25px; text-align:center;">
                    <button type="button" class="btn-setting ubah-profile" onclick="goToTab('personal')">
                        <i class="fa-solid fa-pen-to-square"></i> Ubah Profile
                    </button>

                    <button type="button" class="btn-setting tambah-profile" onclick="goToTab('personal')">
                        <i class="fa-solid fa-user-plus"></i> Tambah Profile
                    </button>
                </div>
            </div>

            {{-- ➤ Tab Pesanan --}}
            <div id="order" class="tab-content">
                <h2 class="section-title">My Order</h2>
                <p style="text-align:center; color:#777;">Belum ada pesanan.</p>
            </div>

        </div>
    </div>
</div>

{{-- Script tab wajib --}}
<script>
    function goToTab(tabName) {
        document.querySelectorAll('.tab-link').forEach(l => l.classList.remove('active'));
        document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

        document.getElementById(tabName).classList.add('active');
        document.querySelector(`.tab-link[data-tab="${tabName}"]`)?.classList.add('active');
    }

    document.querySelectorAll('.tab-link').forEach(link => {
        link.addEventListener('click', () => goToTab(link.dataset.tab));
    });
</script>

@endsection