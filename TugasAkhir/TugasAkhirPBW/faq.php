<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/image/logo-title-final.svg" type="image/icon type">
    <link rel="stylesheet" href="asset/css/faq-style.css">
    <link rel="stylesheet" href="asset/css/header-not-login-style.css">
    <link rel="stylesheet" href="asset/css/footer-style.css">
    <link rel="stylesheet" href="asset/css/scroller-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <title>CatchAW FAQ! Page</title>
</head>

<body>
    <?php
        include 'asset/php/header-not-login.php';
    ?>

    <div class="containerFluid">
        <div class="container-title">
            <h1>FAQs</h1>
            <h2>Frequently Asked Questions</h2>
        </div>
        <div class="accordion">
            <div class="icon"></div>
            <h5>Siapa saja pengguna CatchAW?</h5>
        </div>
        <div class="panel">
            <p>
                Saat ini, pengguna CatchAW hanya terbatas untuk seluruh mahasiswa/i Politeknik Statistika STIS.
            </p>
        </div>

        <div class="accordion">
            <div class="icon"></div>
            <h5>Siapa pengembang website CatchAW?</h5>
        </div>
        <div class="panel">
            <p>
                Website ini dikembangkan oleh seseorang yang bernama Raihan Rahmanda Junianto dari kelas 2KS4.
            </p>
        </div>

        <div class="accordion">
            <div class="icon"></div>
            <h5>Apakah ini merupakan webiste resmi dari Polstat STIS?</h5>
        </div>
        <div class="panel">
            <p>
                Rencananya website ini akan beroperasi secara resmi di bawah pengawasan Polstat STIS.
            </p>
        </div>

        <div class="accordion">
            <div class="icon"></div>
            <h5>Apa latar belakang terciptanya CatchAW?</h5>
        </div>
        <div class="panel">
            <p>
                Pendirian CatchAW dilatarbelakangi oleh kesulitan mahasiswa/i Polstat STIS dalam partner yang cocok
                untuk mengikuti perlombaan tertentu. Banyak dari mereka yang sudah memiliki keahliannya dalam bidang 
                masing-masing, tetapi terkendala dalam mencari partner/team sebagai salah satu kualifikasi mengikuti 
                perlombaan. Oleh karena itu, harapannya CatchAW dapat menjadi solusi bagi mahasiswa/i Polstat STIS 
                dalam menyelesaikan permasalahan tersebut.
            </p>
        </div>
        <div class="accordion">
            <div class="icon"></div>
            <h5>Bagaimana rencana CatchAW kedepannya?</h5>
        </div>
        <div class="panel">
            <p>
                Harapannya CatchAW dapat menjadi wadah bagi mahasiswa/i Polstat STIS untuk mengembangkan diri dan
                menambah pengalaman dalam bidangnya masing-masing. Selain itu, CatchAW juga diharapkan dapat menjadi
                wadah bagi mahasiswa/i Polstat STIS untuk mengikuti perlombaan yang diadakan oleh pihak luar. Dan yang 
                terpenting, CatchAW diharapkan dapat menjadi suatu hal yang mengantarkan developer untuk meraih nilai 
                sempurna, yakni A pada mata kuliah Pemrograman Berbasis Web.
            </p>
        </div>
    </div>

    <?php
        include 'asset/php/footer.php';
    ?>

    <script src="asset/js/faq.js"></script>
</body>

</html>