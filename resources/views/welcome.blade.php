<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'BRS Trans Shuttle') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/LineIcons.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="navbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="/">
                            <img src="images/logo.jpeg" alt="Logo" style="height: 75px">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item active"><a class="page-scroll" href="#home">Home</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#pool">Pool</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#galeri">Galeri</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#route">Rute</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#about">Tentang</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#promo">Promo</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#post">News & Blog</a></li>
                            </ul>
                        </div>
                        <div class="navbar-btn d-none d-sm-inline-block">
                            <ul>
                                @auth
                                    @if(Auth::user()->isAdmin())
                                        <li><a class="solid" href="{{ route('tickets.index') }}">Tiket</a></li>
                                    @else
                                        <li><a class="solid" href="{{ route('reservations.index') }}">Reservasi</a></li>
                                    @endif
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <a class="solid" href="javascript:void(0)" onclick="event.preventDefault();
                                                this.closest('form').submit();">{{ __('Logout') }}</a>
                                        </form></li>
                                @else
                                    <li><a class="solid" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                    @if (Route::has('register'))
                                        <li><a class="solid" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                    @endif
                                @endauth
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    @if($slides->count() > 0)
        <section id="home" class="slider_area">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($slides as $index => $slide)
                        <li data-target="#carousel" data-slide-to="{{ $index }}" class="@if($index === 0) active @endif"></li>
                    @endforeach
                </ol>

                <div class="carousel-inner">
                    @foreach($slides as $index => $slide)
                        <div class="carousel-item @if($index === 0) active @endif">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="slider-content">
                                            <h1 class="title">Selamat datang</h1>
                                            <p class="text">di halaman resmi BRS Trans Shuttle. We are fast!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-image-box d-none d-lg-flex align-items-end">
                                <div class="slider-image">
                                    <a href="{{ $slide->url }}">
                                        <img src="{{ Storage::disk('public')->url($slide->path) }}" alt="Slideshow">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if($slides->count() > 1)
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <i class="lni lni-arrow-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <i class="lni lni-arrow-right"></i>
                    </a>
                @endif
            </div>
        </section>
    @endif
    <section id="pool" class="features-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-10">
                        <h3 class="title">Pool</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($pools as $pool)
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="single-features mt-40">
                            <img src="{{ Storage::disk('public')->url($pool->photo) }}" alt="{{ $pool->name }}">
                            <div class="features-title-icon d-flex justify-content-between">
                                <h4 class="features-title">{{ $pool->name }}</h4>
                            </div>
                            <div class="features-content">
                                <p class="text">Alamat: {{ $pool->address }}</p>
                                <p>Telepon: <a href="tel:{{ $pool->phone }}">{{ $pool->phone }}</a></p>
                                <p>
                                    WhatsApp: <a href="https://api.whatsapp.com/send?phone={{ $pool->whatsapp }}" target="_blank">{{ $pool->whatsapp }}</a>
                                </p>
                                <a href="{{ $pool->map_link }}" class="features-btn" target="_blank">Map</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="galeri" class="portfolio-area portfolio-four pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-10">
                        <h3 class="title">Galeri</h3>
                        <p class="text">Beberapa dokumentasi kami saat mengantarkan pelanggan maupun paket ke tujuan dengan selamat dan tepat.</p>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    @foreach($galleries as $chunk)
                        <div class="row no-gutters grid mt-50">
                            @foreach($chunk as $gallery)
                                <div class="col-lg-4 col-sm-6 branding-4 planning-4">
                                    <div class="single-portfolio">
                                        <div class="portfolio-image">
                                            <img src="{{ Storage::disk('public')->url($gallery->path) }}" alt="">
                                            <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                                                <div class="portfolio-content">
                                                    <div class="portfolio-icon">
                                                        <a class="image-popup" href="{{ Storage::disk('public')->url($gallery->path) }}"><i class="lni lni-zoom-in"></i></a>
                                                        <img src="assets/images/portfolio/shape.svg" alt="shape" class="shape">
                                                    </div>
                                                    <div class="portfolio-icon">
                                                        <a href="{{ $gallery->url }}" target="_blank"><i class="lni lni-link"></i></a>
                                                        <img src="assets/images/portfolio/shape.svg" alt="shape" class="shape">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section id="route" class="pricing-area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-25">
                        <h3 class="title">Rute</h3>
                        <p class="text">Kami memiliki berbagai rute dengan jadwal perjalanan yang banyak dan dapat Anda sesuaikan dengan kebutuhan.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($routes as $route)
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="pricing-style mt-30">
                            <div class="pricing-icon text-center">
                                <img src="assets/images/pro.svg" alt="">
                            </div>
                            <div class="pricing-header text-center">
                                <h5 class="sub-title">{{ $route->sourcePool->name ?? 'dihapus '}} - {{ $route->destinationPool->name ?? 'dihapus' }}</h5>
                                <p class="month"><span class="price">{{ $route->formatted_price }}</span>/seat</p>
                            </div>
                            <div class="pricing-list">
                                <ul>
                                    <li>
                                        Pengiriman Paket:<br>
                                        {{ $route->formatted_package_delivery_price }}/kg<br/>
                                        <small>{{ $route->formatted_package_delivery_price_next_kg }}/kg berikutnya</small>
                                    </li>
                                </ul>
                            </div>
                            <div class="pricing-btn rounded-buttons text-center">
                                <a class="main-btn rounded-one" href="{{ route('reservations.create') }}">Pesan Tiket</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="about" class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="faq-content mt-45">
                        <div class="about-title">
                            <h6 class="sub-title">Tentang Kami</h6>
                        </div> <!-- faq title -->
                        <div class="about-accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Kisah Kami</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="text">{{ $setting->story }}</p>
                                        </div>
                                    </div>
                                </div> <!-- card -->
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Visi</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="text">{{ $setting->vision }}</p>
                                        </div>
                                    </div>
                                </div> <!-- card -->
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Misi</a>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="text">{{ $setting->mission }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Fasilitas</a>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach($facilities as $facility)
                                                    <div class="col-md-2 text-center">
                                                        <img src="{{ Storage::disk('public')->url($facility->image) }}" alt="{{ $facility->caption }}">
                                                        <p class="text">{{ $facility->caption }}</p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- faq accordion -->
                    </div> <!-- faq content -->
                </div>
                <div class="col-lg-7">
                    <div class="about-image mt-50">
                        <img src="{{ asset('images/logo.jpeg') }}" alt="about">
                    </div> <!-- faq image -->
                </div>
            </div>
        </div> <!-- container -->
    </section>
    <section id="testimonial" class="testimonial-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-5 col-lg-6">
                    <div class="testimonial-left-content mt-45">
                        <h6 class="sub-title">Testimonial</h6>
                        <h4 class="title">Apa yang dikatakan pelanggan mengenai kami</h4>
                        <ul class="testimonial-line">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <p class="text">
                            Kami selalu memberikan upaya terbaik kami bagi kepuasan para pelanggan kami<br> <br>
                            Tepat waktu adalah kunci kami untuk memberikan yang terbaik bagi pelanggan.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonial-right-content mt-50">
                        <div class="quota">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <div class="testimonial-content-wrapper testimonial-active">
                            @foreach($testimonials as $testimonial)
                                <div class="single-testimonial">
                                    <div class="testimonial-text">
                                        <p class="text">“{{ $testimonial->content }}”</p>
                                    </div>
                                    <div class="testimonial-author d-sm-flex justify-content-between">
                                        <div class="author-info d-flex align-items-center">
                                            <div class="author-image">
                                                <img src="{{ Storage::disk('public')->url($testimonial->image) }}" alt="author">
                                            </div>
                                            <div class="author-name media-body">
                                                <h5 class="name">{{ $testimonial->name }}</h5>
                                                <span class="sub-title">Pelanggan setia BRS Trans Shuttle</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="promo" class="team-area pt-120 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-30">
                        <h3 class="title">Promo</h3>
                        <p class="text">Kami memiliki banyak pilihan promosi untuk membuat perjalanan Anda menjadi lebih terjangkau.</p>
                    </div>
                </div>
            </div>
            @foreach($promos as $chunk)
                <div class="row">
                    @foreach($chunk as $promo)
                        <div class="col-lg-4 col-sm-6">
                            <div class="team-style-eleven text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                                <div class="team-image">
                                    <img src="{{ Storage::disk('public')->url($promo->path) }}" alt="Promo">
                                </div>
                                <div class="team-content">
                                    <div class="team-social">
                                        <ul class="social">
                                            <li>Code: <b>{{ $promo->code }}</b></li>
                                        </ul>
                                    </div>
                                    <h4 class="team-name">Diskon {{ ucfirst($promo->discount_type) }}</h4>
                                    <span class="sub-title">Sebesar {{ ($promo->discount_type === 'nominal' ? 'Rp ' : '') . number_format($promo->discount_value, 0, ',', '.') . ($promo->discount_type === 'persentase' ? '%' : '') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
    <section id="post" class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-30">
                        <h3 class="title">News & Blog</h3>
                        <p class="text">Kami selalu membagikan berita terbaru mengenai aktivitas kami dan kami berusaha untuk memberikan postingan yang menarik untuk bacaan Anda.</p>
                    </div>
                </div>
            </div>
            <div class="contact-info pt-30">
                <div class="row justify-content-center">
                    @foreach($posts as $post)
                        <div class="col-lg-4 col-md-7 col-sm-9">
                            <div class="single-features mt-40">
                                <div class="features-title-icon d-flex justify-content-between">
                                    <h4 class="features-title">{{ $post->title }}</h4>
                                    <div class="features-icon">
                                        <i class="lni lni-brush"></i>
                                        <img class="shape" src="assets/images/f-shape-1.svg" alt="Shape">
                                    </div>
                                </div>
                                <div class="features-content">
                                    <p class="text">{{ $post->body }}</p>
                                    <small>{{ optional($post->published_at)->format('d F Y H:i') }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="footer-area footer-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="footer-logo text-center">
                        <a class="mt-30" href="/"><img src="images/logo.jpeg" alt="Logo" style="height: 150px"></a>
                    </div>
                    <ul class="social text-center mt-60">
                        @if($setting->facebook_url)
                            <li><a href="{{ $setting->facebook_url }}"><i class="lni lni-facebook-filled"></i></a></li>
                        @endif
                        @if($setting->twitter_url)
                            <li><a href="{{ $setting->twitter_url }}"><i class="lni lni-twitter-original"></i></a></li>
                        @endif
                        @if($setting->instagram_url)
                            <li><a href="{{ $setting->instagram_url }}"><i class="lni lni-instagram-original"></i></a></li>
                        @endif
                    </ul>
                    <div class="copyright text-center mt-35">
                        <p class="text">
                            Copyright &copy; {{ date('Y') }}. Dibuat oleh <a href="https://bagaskarawg.id">Bagaskara Wisnu Gunawan</a> & Team.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/scrolling-nav.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
