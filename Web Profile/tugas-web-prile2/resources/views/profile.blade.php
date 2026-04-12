<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Profile - {{ $nama }}</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            scroll-behavior: smooth; 
            overflow-x: hidden;
            background-color: #f8f9fa;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), 
                        url('{{ asset("images/Tugu-Bandeng-Kabupaten-Pati.jpg") }}');
            background-size: cover; 
            background-attachment: fixed; 
            background-position: center;
            height: 100vh;
            display: flex; 
            align-items: center; 
            justify-content: center; 
            color: white;
            text-align: center;
        }

        /* Foto Profil Modern */
        .profile-img-container img {
            width: 280px; 
            height: 280px; 
            object-fit: cover; 
            border-radius: 30px;
            border: 10px solid white;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            transition: 0.4s;
        }
        .profile-img-container img:hover {
            transform: rotate(-3deg) scale(1.02);
        }

        /* Judul Section dengan Garis Biru Full */
        .section-title {
            font-weight: 700;
            position: relative;
            margin-bottom: 50px;
            display: inline-block;
        }
        .section-title::after {
            content: '';
            position: absolute;
            width: 100%; /* Garis Biru Full */
            height: 4px;
            background: #0d6efd;
            bottom: -10px;
            left: 0;
            border-radius: 2px;
        }

        /* Card Customization & Interactivity */
        .card-custom {
            border: none;
            border-radius: 20px;
            transition: 0.3s;
            background: white;
            cursor: pointer; /* Menandakan bisa diklik */
        }
        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(13, 110, 253, 0.15) !important;
        }

        .icon-circle {
            width: 50px;
            height: 50px;
            background: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .badge-proyek {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            padding: 0.5rem 1rem;
            background: #e7f0ff;
            color: #0d6efd;
            border-radius: 10px;
        }

        /* Modal Styling */
        .modal-content {
            border: none;
            border-radius: 25px;
        }

        footer {
            background: #111;
            padding: 60px 0 30px;
        }
    </style>
</head>
<body>

    <header class="hero-section">
        <div class="container animate__animated animate__fadeIn">
            <h1 class="display-2 fw-bold mb-3">Halo, Saya {{ $nama }}</h1>
            <p class="lead mb-5 fs-3"><span id="typed"></span></p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#proyek" class="btn btn-primary btn-lg px-5 rounded-pill shadow-lg">Lihat Portofolio</a>
                <a href="#biodata" class="btn btn-outline-light btn-lg px-5 rounded-pill">Tentang Saya</a>
            </div>
        </div>
    </header>

    <section id="biodata" class="py-5 my-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-md-5 text-center animate__animated animate__fadeInLeft">
                    <div class="profile-img-container">
                        <img src="{{ asset('images/pas foto.jpg') }}" alt="Foto {{ $nama }}">
                    </div>
                </div>
                <div class="col-md-7 animate__animated animate__fadeInRight">
                    <h2 class="section-title text-center text-md-start">Biodata Singkat</h2>
                    <p class="text-secondary fs-5 leading-relaxed">
                        Mahasiswa <strong>{{ $prodi }}</strong> di <strong>{{ $kampus }}</strong>. Berfokus pada UI/UX Design, Front-end Development, dan Manajemen Data. Memiliki jiwa kepemimpinan yang kuat baik dalam proyek teknologi maupun organisasi kompetitif.
                    </p>
                    <div class="row mt-4 g-4 text-start">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle me-3"><i class="fas fa-map-marker-alt"></i></div>
                                <div>
                                    <p class="text-muted mb-0 small">Asal</p>
                                    <p class="fw-bold mb-0">Kota {{ $asal }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle me-3"><i class="fas fa-university"></i></div>
                                <div>
                                    <p class="text-muted mb-0 small">Institusi</p>
                                    <p class="fw-bold mb-0">Telkom University</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white shadow-sm">
        <div class="container text-center">
            <h2 class="section-title mx-auto">Pengalaman & Organisasi</h2>
            <div class="row justify-content-center mt-4">
                <div class="col-md-8 text-start">
                    <div class="card card-custom shadow-sm p-4 animate__animated animate__fadeInUp">
                        <div class="d-flex align-items-center">
                            <div class="icon-circle bg-warning text-dark me-4" style="width: 70px; height: 70px; font-size: 30px;">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold mb-1">Coach Divisi Mobile Legends</h4>
                                <h6 class="text-primary mb-2">TUP Purwokerto E-Sport</h6>
                                <p class="text-muted mb-0">Strategis dalam penyusunan komposisi tim, analisis permainan, dan pengembangan talenta atlet e-sport di lingkungan kampus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="proyek" class="py-5 my-5">
        <div class="container text-center">
            <h2 class="section-title mx-auto">Proyek & Portofolio</h2>
            <div class="row g-4 mt-2">
                
                @foreach($proyek as $p)
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 card-custom shadow-sm p-4 text-start" 
                         data-bs-toggle="modal" 
                         data-bs-target="#modal-{{ $p['id'] }}">
                        <div class="mb-3">
                            <span class="badge-proyek">{{ $p['kategori'] }}</span>
                        </div>
                        <h5 class="fw-bold">{{ $p['nama'] }}</h5>
                        <p class="text-muted small">{{ $p['desc'] }}</p>
                        <div class="mt-auto">
                            <hr class="opacity-10">
                            <span class="text-primary fw-bold small text-uppercase">{{ $p['tagline'] }}</span>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-{{ $p['id'] }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content shadow-lg">
                            <div class="modal-header border-0 pb-0">
                                <span class="badge bg-primary rounded-pill px-3 py-2">{{ $p['kategori'] }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4 pt-2">
                                <h3 class="fw-bold mb-3">{{ $p['nama'] }}</h3>
                                <p class="text-secondary">{{ $p['detail'] }}</p>
                                <div class="p-3 bg-light rounded-3 mt-4">
                                    <small class="text-muted d-block mb-1">Status Proyek:</small>
                                    <span class="fw-bold"><i class="fas fa-check-circle text-success me-2"></i>{{ $p['tagline'] }}</span>
                                </div>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <section id="prestasi" class="py-5 bg-dark text-white">
        <div class="container text-center">
            <h2 class="section-title mx-auto" style="color:white">Pencapaian Nasional</h2>
            <div class="row g-4 justify-content-center mt-2">
                @foreach($prestasi as $p)
                <div class="col-md-5 text-center">
                    <div class="card bg-secondary bg-opacity-10 border border-secondary p-4 h-100 rounded-4">
                        <div class="text-warning fs-1 mb-3"><i class="fas fa-trophy"></i></div>
                        <h4 class="fw-bold mb-2">{{ $p['judul'] }}</h4>
                        <p class="text-warning fw-bold mb-2">Tahun {{ $p['tahun'] }}</p>
                        <p class="text-light opacity-75 small mb-0">{{ $p['divisi'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer>
       <footer style="position: relative; z-index: 99; background: #111; padding: 60px 0 30px;">
        <div class="container text-center">
            <div class="mb-4 animate__animated animate__fadeInUp">
                <a href="https://github.com/LuthfiAdiHarianto" 
                   target="_blank" 
                   class="text-white mx-3 fs-3 social-link">
                    <i class="fab fa-github"></i>
                </a>

                <a href="https://www.linkedin.com/in/lutfi-adi-harianto-3430aa257?utm_source=share_via&utm_content=profile&utm_medium=member_android" 
                   target="_blank" 
                   class="text-white mx-3 fs-3 social-link">
                    <i class="fab fa-linkedin"></i>
                </a>

                <a href="https://www.instagram.com/fiad_luffy?igsh=MTBwMDFzMHRrZWpqcw==" 
                   target="_blank" 
                   class="text-white mx-3 fs-3 social-link">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>

            <div class="text-white opacity-50">
                <p class="mb-1">Web Profile &copy; 2026 | {{ $nama }}</p>
                <p class="small">Built with Laravel Framework from {{ $asal }}</p>
            </div>
        </div>
    </footer>

    <style>
        .social-link {
            display: inline-block;
            transition: all 0.3s ease;
            cursor: pointer !important;
            position: relative;
            z-index: 100; /* Memastikan link di atas elemen lain */
            text-decoration: none;
        }
        .social-link:hover {
            color: #0d6efd !important;
            transform: translateY(-5px);
        }
        /* Memastikan tidak ada overlay dari section sebelumnya */
        section {
            position: relative;
            z-index: 1;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
        var typed = new Typed('#typed', {
            strings: [
                'Informatics Engineering Student', 
                'UX Designer & Researcher', 
                'E-Sport Coach @ TUP', 
                'Game Developer (Kala Indie Studio)',
                'Berasal dari Kota {{ $asal }}'
            ],
            typeSpeed: 50,
            backSpeed: 30,
            loop: true
        });
    </script>
</body>
</html>