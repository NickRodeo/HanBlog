@extends('layouts/main')

@section('title', "Home")

@section('container')
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="fw-bold text-primary">Selamat Datang di HanBlog!</h1>
            <p class="text-muted">
                Pernahkah Anda memiliki ide menarik, cerita yang menginspirasi, atau sekadar ingin berbagi pengalaman, tetapi bingung di mana harus menuliskannya? 
                HanBlog hadir untuk menjadi rumah bagi pemikiran dan kreativitas Anda. Dengan desain yang sederhana dan intuitif, Anda bisa langsung mulai menulis dan 
                membagikan kisah Anda dengan dunia.
            </p>
            <p class="text-muted">
                Di HanBlog, setiap pengguna memiliki kendali penuh atas kontennya. Buat tulisan yang bermakna, edit sesuka hati, dan kelola semua postingan dengan mudah.
                Kami percaya bahwa setiap cerita layak untuk didengar—dan kami ingin membantu Anda menyampaikannya dengan cara terbaik.
            </p>
            <p class="text-muted">
                Namun, sebelum Anda mulai menulis, pastikan Anda sudah memiliki akun dan login terlebih dahulu. Dengan login, Anda bisa menikmati fitur penuh HanBlog, 
                termasuk pembuatan postingan, pengeditan, serta pengelolaan tulisan Anda secara fleksibel dan aman.
            </p>
            @auth
                <p class="btn btn-primary px-4">Anda Telah Login</p>
            @else
                <a href="{{ url('/login') }}" class="btn btn-primary px-4">Mulai Menulis Sekarang</a>
            @endauth
        </div>
        <div class="col-md-6 text-center">
            <img src="https://picsum.photos/600/400?random=1" class="img-fluid rounded shadow-lg" alt="Blog Image">
        </div>
    </div>

    <hr class="my-5">

    <div class="text-center">
        <h2 class="fw-bold">Kenapa Memilih HanBlog?</h2>
        <p class="text-muted">
            Ada banyak platform blogging di luar sana, tapi HanBlog menawarkan sesuatu yang berbeda. Kami mengutamakan pengalaman pengguna 
            yang lancar, fitur yang mudah diakses, serta keamanan data yang terjamin. Berikut beberapa alasan mengapa HanBlog bisa menjadi pilihan terbaik Anda:
        </p>
    </div>
    <div class="row text-center mt-4">
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <h5 class="fw-bold text-primary">✨ Simpel & Intuitif</h5>
                <p class="text-muted">Antarmuka yang bersih dan minimalis, memungkinkan Anda fokus pada menulis tanpa gangguan.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <h5 class="fw-bold text-primary">📂 Manajemen Postingan</h5>
                <p class="text-muted">Buat, edit, dan hapus postingan dengan mudah. Semua tulisan Anda tersimpan dengan aman.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <h5 class="fw-bold text-primary">🔒 Keamanan Data</h5>
                <p class="text-muted">Setiap akun dilindungi dengan sistem autentikasi yang aman, sehingga hanya Anda yang bisa mengakses tulisan Anda.</p>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <div class="row align-items-center">
        <div class="col-md-6 text-center">
            <img src="https://picsum.photos/600/400?random=2" class="img-fluid rounded shadow-lg" alt="Writing Image">
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold text-primary">Menulis Itu Mudah!</h2>
            <p class="text-muted">
                Tak perlu menjadi seorang penulis profesional untuk berbagi cerita. Setiap orang punya suara dan setiap suara berhak untuk 
                didengar. HanBlog menyediakan tempat yang nyaman bagi Anda untuk menuliskan segala hal yang penting bagi Anda—mulai dari 
                opini pribadi, catatan harian, hingga artikel informatif.
            </p>
            <p class="text-muted">
                Kami ingin membantu Anda menciptakan tulisan yang menginspirasi. Mulailah dengan satu kata, satu kalimat, dan sebelum Anda sadari, 
                Anda telah menciptakan sesuatu yang luar biasa. Siapkan ide Anda dan mari menulis!
            </p>
        </div>
    </div>

    <div class="text-center my-5">
        <a href="{{ url('/posts') }}" class="btn btn-outline-primary px-4">Jelajahi Postingan</a>
        <a href="{{ url('/about') }}" class="btn btn-outline-secondary px-4">Pelajari Lebih Lanjut</a>
    </div>
</div>
@endsection
