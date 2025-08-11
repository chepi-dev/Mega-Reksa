<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mega Reksa - Solusi Logistik Terpercaya</title>
    <meta name="description"
        content="Mega Reksa menyediakan jasa pengiriman barang aman dan cepat ke seluruh Indonesia dengan layanan darat, laut, dan udara.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark" style="background-color: var(--primary);">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src={{ asset('img/invoices/image.png') }} alt="Logo Mega Reksa" height="50"
                    class="d-inline-block align-top" />
                <span class="ms-2 fw-bold">Mega Reksa</span>
            </a>

            <!-- Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#layanan">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a href="https://wa.me/62811233594?text=Halo%20Mega%20Reksa%2C%20saya%20tertarik%20menggunakan%20layanan%20pengiriman%20Anda.%20Mohon%20informasi%20lebih%20lanjut."
                            target="_blank" class="btn btn-success btn-sm mt-2 mt-lg-0">
                            <i class="bi bi-whatsapp me-2"></i> Hubungi Kami
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <img src={{ asset('img/general/Gambar.jpg') }} class="hero-image" alt="Layanan Pengiriman Mega Reksa" />
        <div class="hero-content">
            <h1 class="hero-title">Solusi Logistik Terpercaya</h1>
            <p class="hero-subtitle">
                Pengiriman cepat, aman, dan terjangkau ke seluruh Indonesia
            </p>
            <a href="https://wa.me/62811233594?text=Halo%20Mega%20Reksa%2C%20saya%20tertarik%20menggunakan%20layanan%20pengiriman%20Anda.%20Mohon%20informasi%20lebih%20lanjut."
                target="_blank" class="btn btn-whatsapp">
                <i class="bi bi-whatsapp me-2"></i> Pesan Sekarang
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Kenapa Memilih Mega Reksa?</h2>
                <p class="text-muted">Kami memberikan pelayanan terbaik untuk kebutuhan pengiriman Anda</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-globe-asia-australia"></i>
                        </div>
                        <h4>Jangkauan Nasional</h4>
                        <p class="text-muted">
                            Layanan pengiriman ke seluruh wilayah Indonesia, dari kota besar hingga daerah pelosok.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Aman & Terpercaya</h4>
                        <p class="text-muted">
                            Sistem pengemasan dan pengiriman profesional untuk menjamin keamanan barang Anda.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h4>Layanan 24/7</h4>
                        <p class="text-muted">
                            Tim customer service siap membantu Anda kapan saja melalui WhatsApp dan telepon.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <h4>Tepat Waktu</h4>
                        <p class="text-muted">
                            Komitmen kami untuk mengirimkan barang sesuai estimasi waktu yang diberikan.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <h4>Harga Kompetitif</h4>
                        <p class="text-muted">
                            Tarif pengiriman yang terjangkau dengan kualitas layanan terbaik.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h4>Tracking Real-time</h4>
                        <p class="text-muted">
                            Pantau status pengiriman barang Anda secara real-time melalui sistem kami.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="layanan" class="services-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Layanan Kami</h2>
                <p class="text-muted">Berbagai pilihan layanan pengiriman sesuai kebutuhan Anda</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="service-card">
                        <img src={{ asset('img/general/Mobil.png') }} class="card-img-top" alt="Pengiriman Darat">
                        <div class="card-body">
                            <h5 class="card-title">Pengiriman Darat</h5>
                            <p class="card-text text-muted">
                                Solusi ekonomis untuk pengiriman dalam kota dan antar kota dengan armada truk modern.
                            </p>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Estimasi 1-3 hari</li>
                                <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Kapasitas besar</li>
                                <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Biaya terjangkau</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-card">
                        <img src={{ asset('img/general/Pesawat.jpg') }} class="card-img-top" alt="Pengiriman Udara">
                        <div class="card-body">
                            <h5 class="card-title">Pengiriman Udara</h5>
                            <p class="card-text text-muted">
                                Layanan ekspres untuk pengiriman cepat antar pulau dengan pesawat terbang.
                            </p>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Estimasi 1-2 hari</li>
                                <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Prioritas handling</li>
                                <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Aman untuk barang
                                    berharga</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-card">
                        <img src={{ asset('img/general/kapal.png') }} class="card-img-top" alt="Pengiriman Laut">
                        <div class="card-body">
                            <h5 class="card-title">Pengiriman Laut</h5>
                            <p class="card-text text-muted">
                                Solusi hemat untuk pengiriman barang volume besar antar pulau melalui kapal laut.
                            </p>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Estimasi 3-7 hari</li>
                                <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Kapasitas sangat besar
                                </li>
                                <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Biaya paling ekonomis
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src={{ asset('img/general/Gambar-mega-reksa.jpg') }} alt="Tentang Mega Reksa"
                        class="img-fluid about-img">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Tentang Mega Reksa</h2>
                    <p>
                        Mega Reksa adalah perusahaan jasa pengiriman barang profesional yang berkomitmen memberikan
                        layanan terbaik sejak tahun 2010. Dengan jaringan luas di seluruh Indonesia, kami telah
                        dipercaya oleh ribuan pelanggan untuk mengirimkan barang mereka dengan aman dan tepat waktu.
                    </p>
                    <p>
                        Kami terus berinovasi dalam sistem logistik dan pengiriman untuk memastikan kepuasan pelanggan.
                        Tim profesional kami siap memberikan solusi terbaik untuk kebutuhan pengiriman Anda.
                    </p>
                    <div class="d-flex align-items-center mt-4">
                        <div class="me-4">
                            <h3 class="fw-bold text-primary">10+</h3>
                            <p class="text-muted mb-0">Tahun Pengalaman</p>
                        </div>
                        <div class="me-4">
                            <h3 class="fw-bold text-primary">500+</h3>
                            <p class="text-muted mb-0">Mitra Pengiriman</p>
                        </div>
                        <div>
                            <h3 class="fw-bold text-primary">10K+</h3>
                            <p class="text-muted mb-0">Pelanggan Puas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Hubungi Kami</h2>
                <p class="text-muted">Tim kami siap membantu kebutuhan pengiriman Anda</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-5">
                            <h4 class="fw-bold mb-4">Informasi Kontak</h4>
                            <div class="mb-4">
                                <h5 class="fw-semibold"><i class="bi bi-geo-alt-fill text-primary me-2"></i> Alamat
                                </h5>
                                <p class="ms-4">Komplek Casa D'Grande Blok B-29 Jl. Cisaranten Kulon, Bandung</p>
                            </div>
                            <div class="mb-4">
                                <h5 class="fw-semibold"><i class="bi bi-telephone-fill text-primary me-2"></i> Telepon
                                </h5>
                                <p class="ms-4">+622287883201</p>
                            </div>
                            <div class="mb-4">
                                <h5 class="fw-semibold"><i class="bi bi-envelope-fill text-primary me-2"></i> Email
                                </h5>
                                <p class="ms-4">info@megareksa.com</p>
                            </div>
                            <div class="mb-4">
                                <h5 class="fw-semibold"><i class="bi bi-whatsapp text-primary me-2"></i> WhatsApp</h5>
                                <p class="ms-4">+6281319645062 / +62811233594</p>
                            </div>
                            <div>
                                <h5 class="fw-semibold"><i class="bi bi-clock-fill text-primary me-2"></i> Jam
                                    Operasional</h5>
                                <p class="ms-4">Senin - Sabtu: 08.00 - 18.00<br>Minggu & Libur: Tutup</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-5">
                            <h4 class="fw-bold mb-4">Kalkulator Harga Pengiriman</h4>
                            <form id="priceCalculatorForm">
                                <!-- Pilihan Metode Perhitungan -->
                                <div class="mb-3">
                                    <label class="form-label">Metode Perhitungan</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="calculationMethod"
                                            id="byWeight" value="weight" checked>
                                        <label class="form-check-label" for="byWeight">
                                            Berdasarkan Berat (kg)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="calculationMethod"
                                            id="byVolume" value="volume">
                                        <label class="form-check-label" for="byVolume">
                                            Berdasarkan Volume (cm³)
                                        </label>
                                    </div>
                                </div>

                                <!-- Input Berat (Tampil Default) -->
                                <div id="weightInput" class="calculation-input">
                                    <div class="mb-3">
                                        <label for="weight" class="form-label">Berat Barang (kg)</label>
                                        <input type="number" step="0.1" class="form-control" id="weight"
                                            placeholder="Contoh: 2.5" required>
                                    </div>
                                </div>

                                <!-- Input Volume (Awalnya Tersembunyi) -->
                                <div id="volumeInput" class="calculation-input" style="display: none;">
                                    <div class="mb-3">
                                        <label for="length" class="form-label">Panjang (cm)</label>
                                        <input type="number" class="form-control" id="length"
                                            placeholder="Contoh: 30">
                                    </div>
                                    <div class="mb-3">
                                        <label for="width" class="form-label">Lebar (cm)</label>
                                        <input type="number" class="form-control" id="width"
                                            placeholder="Contoh: 20">
                                    </div>
                                    <div class="mb-3">
                                        <label for="height" class="form-label">Tinggi (cm)</label>
                                        <input type="number" class="form-control" id="height"
                                            placeholder="Contoh: 15">
                                    </div>
                                </div>

                                <!-- Input Kota Asal dan Tujuan -->
                                <div class="mb-3">
                                    <label for="origin" class="form-label">Kota Asal</label>
                                    <select class="form-select" id="origin" required>
                                        <option value="" selected disabled>Pilih Kota Asal</option>
                                        <option value="bandung">Bandung</option>
                                        <option value="jakarta">Jakarta</option>
                                        <option value="surabaya">Surabaya</option>
                                        <!-- Tambahkan lebih banyak kota sesuai kebutuhan -->
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="destination" class="form-label">Kota Tujuan</label>
                                    <select class="form-select" id="destination" required>
                                        <option value="" selected disabled>Pilih Kota Tujuan</option>
                                        <option value="bandung">Bandung</option>
                                        <option value="jakarta">Jakarta</option>
                                        <option value="surabaya">Surabaya</option>
                                        <!-- Tambahkan lebih banyak kota sesuai kebutuhan -->
                                    </select>
                                </div>

                                <!-- Pilihan Layanan -->
                                <div class="mb-3">
                                    <label for="serviceType" class="form-label">Jenis Layanan</label>
                                    <select class="form-select" id="serviceType" required>
                                        <option value="" selected disabled>Pilih Layanan</option>
                                        <option value="darat">Darat</option>
                                        <option value="udara">Udara</option>
                                        <option value="laut">Laut</option>
                                    </select>
                                </div>

                                <!-- Hasil Perhitungan -->
                                <div id="priceResult" class="alert alert-info mt-3" style="display: none;">
                                    <h5 class="alert-heading">Estimasi Biaya</h5>
                                    <div id="resultDetails"></div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold mt-3">
                                    Hitung Biaya Pengiriman
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <img src={{ asset('img/invoices/Logo.jpg') }} alt="Mega Reksa" height="50" class="mb-3">
                    <p>
                        Mega Reksa memberikan solusi logistik terbaik dengan layanan pengiriman cepat, aman, dan
                        terjangkau ke seluruh Indonesia.
                    </p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Layanan</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Pengiriman Darat</a></li>
                        <li class="mb-2"><a href="#">Pengiriman Udara</a></li>
                        <li class="mb-2"><a href="#">Pengiriman Laut</a></li>
                        <li class="mb-2"><a href="#">Layanan Khusus</a></li>
                        <li><a href="#">Tracking Barang</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Perusahaan</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Tentang Kami</a></li>
                        <li class="mb-2"><a href="#">Visi & Misi</a></li>
                        <li class="mb-2"><a href="#">Tim Kami</a></li>
                        <li class="mb-2"><a href="#">Karir</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 mb-4">
                    <h5>Newsletter</h5>
                    <p>Berlangganan newsletter untuk mendapatkan promo dan informasi terbaru.</p>
                    <form class="mt-3">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Email Anda" required>
                            <button class="btn btn-accent" type="submit"
                                style="background-color: var(--accent); color: white;">
                                <i class="bi bi-envelope-arrow-up"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <hr class="mt-4 mb-4" style="border-color: rgba(255, 255, 255, 0.1);">

            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2025 Mega Reksa. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">
                        <a href="#" class="text-white me-3">Terms of Service</a>
                        <a href="#" class="text-white">Privacy Policy</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="/js/main.js"></script>
</body>

</html>
