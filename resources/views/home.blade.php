@extends('layouts.app')

@section('css')

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    
@endsection

@section('content')

    <!-- Services Section -->
    <section id="services" class="services section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-person-square icon"></i></div>
                        <h4><a href="" class="stretched-link">Usuarios</a></h4>
                        @php
                            use App\Models\User;
                            $cant_user = User::count();
                        @endphp
                        <p>Cantidad de usuarios: {{$cant_user}}</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-diagram-2 icon"></i></div>
                        <h4><a href="" class="stretched-link">Roles</a></h4>
                        @php
                            use Spatie\Permission\Models\Role;
                            $cant_rol = Role::count();
                        @endphp
                        <p>Tipos de roles: {{$cant_rol}}</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-card-list icon"></i></div>
                        <h4><a href="" class="stretched-link">Post</a></h4>
                        @php
                            use App\Models\Post;
                            $cant_post = Post::count();
                        @endphp
                        <p>Posts creados: {{$cant_post}}</p>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Gallery Details Section -->
    <section id="gallery-details" class="gallery-details section">

        <div class="container">

            <div class="portfolio-details-slider swiper">
                <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                    "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "navigation": {
                    "nextEl": ".swiper-button-next",
                    "prevEl": ".swiper-button-prev"
                    },
                    "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                    }
                }
                </script>
                <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                    <img src="assets/img/gallery/gallery-8.jpg" alt="">
                </div>

                <div class="swiper-slide">
                    <img src="assets/img/gallery/gallery-9.jpg" alt="">
                </div>

                <div class="swiper-slide">
                    <img src="assets/img/gallery/gallery-10.jpg" alt="">
                </div>

                <div class="swiper-slide">
                    <img src="assets/img/gallery/gallery-11.jpg" alt="">
                </div>

                <div class="swiper-slide">
                    <img src="assets/img/gallery/gallery-12.jpg" alt="">
                </div>

                <div class="swiper-slide">
                    <img src="assets/img/gallery/gallery-13.jpg" alt="">
                </div>

                <div class="swiper-slide">
                    <img src="assets/img/gallery/gallery-14.jpg" alt="">
                </div>

                <div class="swiper-slide">
                    <img src="imagenes/gallery-15.jpg" alt="">
                </div>

                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="row justify-content-between gy-4 mt-4">

                <div class="col-lg-8" data-aos="fade-up">
                    <div class="portfolio-description">
                        
                        <div class="testimonial-item">
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        <div>
                            <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                            <h3>Tomas Centena</h3>
                            <h4>Diseñador</h4>
                        </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Gallery Details Section -->

    
    <footer id="footer" class="footer">

        <div class="container">
            <div class="copyright text-center ">
            <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
            </div>
            
            <div class="credits">
            Diseñado por <a href="#">Web Avanzada 2024</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <div class="line"></div>
    </div>

      
@endsection

@section('js')

    <!-- Vendor JS Files -->
    
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

@endsection
