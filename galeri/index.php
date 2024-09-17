<?php include 'koneksi.php'; session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>

        .navbar {
            background: url('') no-repeat;
            background-size: cover;
        }

        .navbar .nav-link:hover {
            color: black !important; /* Warna ungu muda saat di-hover */
        }

        .btn-primary, .btn-primary:hover, .btn-primary:focus {
            background-color: #6f42c1; /* Warna ungu untuk tombol */
            border-color: #6f42c1;
        }

        .btn-primary:hover {
            background-color: #5e33a6; /* Warna ungu lebih gelap untuk tombol saat di-hover */
        }

        body {
        background: url('assets/img/big-entrance-gate-bali-indonesia.jpg') no-repeat center center fixed;
        background-size: cover; /* Atau 'contain', tergantung kebutuhan */
        display: flex;
        flex-direction: column;
        min-height: 100vh;
}

        

        footer {
            background-color: ; /* Warna ungu untuk footer */
            color: white;
            padding: 10px;
            text-align: center;
        }

        footer a {
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="?url=home">Gallery Foto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="?url=home">Beranda</a>
            <?php if(isset($_SESSION['user_id'])): ?>
            <a class="nav-link" href="?url=upload">Upload</a>
            <a class="nav-link" href="?url=album">Album</a>
            <a class="nav-link" href="?url=profile"><?= ucwords($_SESSION['username']) ?></a>
            <a href="?url=logout" class="nav-link">Logout</a>
            <?php else: ?>
            <a class="nav-link" href="login.php">Login</a>
            <a class="nav-link" href="daftar.php">Daftar</a>
            <?php endif; ?>
        </div>
        </div>
    </div>
    </nav>
    
    <!-- Konten -->
    <?php 
        $url=@$_GET["url"];
        if($url=='home'){
            include 'page/home.php';
        }elseif($url=='profile'){
            include 'page/profil.php';
        }else if($url=='upload'){
            include 'page/upload.php';
        }else if($url=='album'){
            include 'page/album.php';
        }else if($url=='like'){
            include 'page/like.php';
        }else if($url=='komentar'){
            include 'page/komentar.php';
        }else if($url=='detail'){
            include 'page/detail.php';
        }else if($url=='logout'){
            session_destroy();
            header("Location: ?url=home");
        }else{
            include 'page/home.php';
        }
    ?>
    
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Galeri Foto. All rights reserved.</p>
        <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
    </footer>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
