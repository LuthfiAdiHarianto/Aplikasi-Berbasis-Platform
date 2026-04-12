<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = [
        'nama' => 'Luthfi Adi Harianto',
        'kampus' => 'Telkom University Purwokerto',
        'prodi' => 'Informatics Engineering',
        'asal' => 'Pati',
        'prestasi' => [
            ['tahun' => '2024', 'judul' => 'Lolos Gemastik XVII', 'divisi' => 'Data Mining'],
            ['tahun' => '2025', 'judul' => 'Lolos Gemastik XVIII', 'divisi' => 'UX Design & Karya Tulis Ilmiah TIK'],
        ],
        'proyek' => [
            [
                'id' => 'melodean',
                'kategori' => 'UI UX Design', 
                'nama' => 'Melodean', 
                'tagline' => 'National Competition Project',
                'desc' => 'Integrated gamified learning platform untuk siswa SMA yang menggabungkan elemen edukasi dengan sistem reward interaktif.',
                'detail' => 'Proyek ini dikembangkan untuk solusi manajemen pembelajaran yang lebih menyenangkan dan kompetitif. Berhasil lolos Nasional Gemastik XVII sayangnya tidak lolos final Gemastik.'
            ],
            [
                'id' => 'ekost',
                'kategori' => 'Web Application', 
                'nama' => 'e kost Manager', 
                'tagline' => 'Operational Excellence',
                'desc' => 'Sistem manajemen hunian kos terpadu untuk efisiensi operasional pemilik kos dalam mengelola data penyewa dan keuangan.',
                'detail' => 'Dilengkapi fitur manajemen tagihan otomatis, database penyewa, dan laporan bulanan untuk meminimalisir kesalahan manual.'
            ],
            [
                'id' => 'nusantara',
                'kategori' => 'UI UX Design', 
                'nama' => 'Nusantara Legacy', 
                'tagline' => 'Digital Preservation',
                'desc' => 'Platform arsip digital pelestarian budaya Indonesia yang dirancang dengan antarmuka modern untuk generasi muda.',
                'detail' => 'Fokus pada digitalisasi warisan budaya agar tetap relevan di era digital. Memiliki sistem navigasi yang intuitif untuk eksplorasi sejarah nusantara.'
            ],
            [
                'id' => 'kala',
                'kategori' => 'Game Dev', 
                'nama' => 'Kala Indie Studio', 
                'tagline' => 'Creative Industry',
                'desc' => 'Studio pengembangan game yang berfokus pada narasi horor dan romansa lokal dengan gaya visual pixel art.',
                'detail' => 'Kala Indie Studio bertujuan memproduksi game indie berkualitas tinggi dengan sentuhan budaya lokal Indonesia yang kental dalam alur ceritanya.'
            ],
        ]
    ];
    return view('profile', $data);
});