@extends('layouts/main')

@section('title', 'About')

@section('container')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-5">
                    <h1 class="mb-3 text-primary fw-bold">Tentang HanBlog</h1>
                    <p class="text-muted">
                        HanBlog adalah platform blogging yang dirancang untuk membantu Anda menuangkan ide, berbagi pengalaman, 
                        dan menulis dengan mudah. Dibangun menggunakan Laravel, kami menawarkan pengalaman menulis yang nyaman 
                        dengan tampilan yang modern dan fungsionalitas yang optimal.
                    </p>

                    <hr class="my-4">

                    <h4 class="text-secondary fw-semibold">🌟 Visi Kami</h4>
                    <p class="text-muted">
                        Kami percaya bahwa setiap orang memiliki cerita untuk diceritakan dan wawasan untuk dibagikan. Dengan HanBlog, 
                        kami ingin menciptakan ruang yang inklusif, di mana siapa pun dapat menulis dan berbagi tanpa batasan teknis.
                    </p>

                    <h4 class="text-secondary fw-semibold mt-4">🎯 Misi Kami</h4>
                    <p class="text-muted">
                        Misi kami adalah menyediakan platform yang sederhana namun kuat bagi penulis, blogger, dan pengembang untuk berbagi 
                        informasi berkualitas, membangun komunitas yang saling mendukung, dan terus berkembang dalam dunia digital.
                    </p>

                    <hr class="my-4">

                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm p-3">
                                <h5 class="fw-bold text-primary">📖 Menulis Tanpa Batas</h5>
                                <p class="text-muted small">Bagikan cerita dan ide dengan bebas, kapan saja, di mana saja.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm p-3">
                                <h5 class="fw-bold text-primary">👥 Komunitas yang Kuat</h5>
                                <p class="text-muted small">Bergabunglah dengan sesama penulis dan pengembang dalam lingkungan yang inspiratif.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm p-3">
                                <h5 class="fw-bold text-primary">🛡️ Keamanan Terjamin</h5>
                                <p class="text-muted small">Akun Anda dilindungi dengan sistem autentikasi yang aman.</p>
                            </div>
                        </div>
                    </div>

                    <hr class="my-5">

                    <h4 class="text-secondary fw-semibold">📩 Hubungi Kami</h4>
                    <p class="text-muted">
                        Jika Anda memiliki pertanyaan, ingin berkolaborasi, atau memiliki saran, jangan ragu untuk menghubungi kami melalui email di 
                        <a href="mailto:info@HanBlog.com" class="text-decoration-none text-primary fw-bold">info@HanBlog.com</a>.  
                        Kami selalu terbuka untuk diskusi dan kolaborasi yang menarik!
                    </p>

                    <div class="mt-4">
                        <a href="{{ url('/posts') }}" class="btn btn-outline-primary px-4">Jelajahi Postingan</a>
                        <a href="{{ url('/login') }}" class="btn btn-primary px-4">Mulai Menulis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
