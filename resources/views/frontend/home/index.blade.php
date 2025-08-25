@extends('frontend.layouts.master')

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section"
            style="background-image: url({{ asset('assets/frontend/home/img/hero.svg') }}); height: 100svh;">

            @if (Auth::guard('web')->check())
                <a href="{{ route('dashboard') }}" id="hero-button">Dashboard</a>
            @else
                <a href="{{ route('login') }}" id="hero-button">Get Started</a>
            @endif


        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 align-items-center justify-content-between">

                    <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                        <span class="about-meta">WHY CHOOSE US</span>
                        <h2 class="about-title">Your Trusted Home Service Partner in Birgunj</h2>
                        <p class="about-description">SewaGunj is Birgunj's premier online service platform, connecting
                            residents with skilled professionals for all their home service needs. We're committed to making
                            your life easier by providing reliable, affordable, and high-quality services right at your
                            doorstep.</p>

                        <div class="row feature-list-wrapper">
                            <h2 class="about-title">Our Services Include:</h2>
                            <div class="col-md-6">
                                <ul class="feature-list">
                                    <li><i class="bi bi-check-circle-fill"></i> Home Repair & Maintenance</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Professional Cleaning Services</li>
                                    <li><i class="bi bi-check-circle-fill"></i> At-Home Salon Services</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="feature-list">
                                    <li><i class="bi bi-check-circle-fill"></i> Expert Plumbing Solutions</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Certified Electrical Services</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Appliance Repair</li>
                                </ul>
                            </div>
                        </div>

                        <div class="info-wrapper">
                            <div class="row gy-4">
                                <div class="col-lg-7">
                                    <div class="contact-info d-flex align-items-center gap-2">
                                        <i class="bi bi-telephone-fill"></i>
                                        <div>
                                            <p class="contact-label">Call us anytime</p>
                                            <p class="contact-number">+977 9829487519</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="image-wrapper">
                            <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                                <img src="{{ asset('assets/frontend/home/img/about-5.webp') }}" alt="Professional Service"
                                    class="img-fluid main-image rounded-4">
                                <img src="{{ asset('assets/frontend/home/img/about-2.webp') }}" alt="Happy Customer"
                                    class="img-fluid small-image rounded-4">
                            </div>
                            <div class="experience-badge floating text-white">
                                <span>Quality Service</span>
                                <p>Guaranteed Satisfaction</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Features Section -->
        <section id="features" class="features section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Why SewaGunj?</h2>
                <p>Discover the benefits of choosing our platform for all your home service needs</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="d-flex justify-content-center">

                    <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                                <h4>Convenience</h4>
                            </a>
                        </li><!-- End tab nav item -->

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                                <h4>Quality</h4>
                            </a><!-- End tab nav item -->
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                                <h4>Reliability</h4>
                            </a>
                        </li><!-- End tab nav item -->

                    </ul>

                </div>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                    <div class="tab-pane fade active show" id="features-tab-1">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                <h3>Service at Your Fingertips</h3>
                                <p class="fst-italic">
                                    Get your home services booked with just a few taps, without the hassle of searching for
                                    reliable providers.
                                </p>
                                <ul>
                                    <li><i class="bi bi-check2-all"></i> <span>Easy online booking system available
                                            24/7</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Services available at your preferred
                                            time</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>No more waiting in queues or making multiple
                                            phone calls</span></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="{{ asset('assets/frontend/home/img/features-illustration-1.webp') }}"
                                    alt="Convenient Service" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End tab content item -->

                    <div class="tab-pane fade" id="features-tab-2">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                <h3>Professional Service Guaranteed</h3>
                                <p class="fst-italic">
                                    We maintain high standards by thoroughly vetting all our service professionals.
                                </p>
                                <ul>
                                    <li><i class="bi bi-check2-all"></i> <span>Verified and experienced professionals</span>
                                    </li>
                                    <li><i class="bi bi-check2-all"></i> <span>Quality materials and tools used for all
                                            services</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Consistent service standards across all
                                            providers</span></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="{{ asset('assets/frontend/home/img/features-illustration-2.webp') }}"
                                    alt="Quality Service" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End tab content item -->

                    <div class="tab-pane fade" id="features-tab-3">
                        <div class="row">
                            <div
                                class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                <h3>Service You Can Trust</h3>
                                <ul>
                                    <li><i class="bi bi-check2-all"></i> <span>On-time service guaranteed</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Transparent pricing with no hidden
                                            charges</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Customer satisfaction is our top
                                            priority</span></li>
                                </ul>
                                <p class="fst-italic">
                                    We stand behind our work with a satisfaction guarantee for all services provided.
                                </p>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="{{ asset('assets/frontend/home/img/features-illustration-3.webp') }}"
                                    alt="Reliable Service" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End tab content item -->

                </div>

            </div>

        </section><!-- /Features Section -->

        <!-- Features Cards Section -->
        <section id="features-cards" class="features-cards section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="feature-box orange">
                            <i class="bi bi-house-check"></i>
                            <h4>Home Services</h4>
                            <p>Comprehensive solutions for all your home maintenance and repair needs</p>
                        </div>
                    </div><!-- End Feature Box-->

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="feature-box blue">
                            <i class="bi bi-shield-check"></i>
                            <h4>Verified Professionals</h4>
                            <p>All our service providers are background-checked and qualified</p>
                        </div>
                    </div><!-- End Feature Box-->

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="feature-box green">
                            <i class="bi bi-cash-coin"></i>
                            <h4>Affordable Pricing</h4>
                            <p>Competitive rates with transparent pricing and no hidden fees</p>
                        </div>
                    </div><!-- End Feature Box-->

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="feature-box red">
                            <i class="bi bi-headset"></i>
                            <h4>24/7 Support</h4>
                            <p>Our customer care team is always ready to assist you</p>
                        </div>
                    </div><!-- End Feature Box-->

                </div>

            </div>

        </section><!-- /Features Cards Section -->

        <!-- Services Section -->
        <section id="services" class="services section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Our Services</h2>
                <p>Comprehensive home services tailored for Birgunj residents</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4">

                    @foreach($categories as $category)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <img src="{{ asset($category->avatar) }}" alt="" width="100px" class="rounded">
                            </div>
                            <div>
                                <h3>{{ $category->name }}</h3>
                                <p>{{ $category->description }}</p>
                                <a href="{{ route('services.show', $category->id) }}" class="read-more">{{ __('View Services') }} <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Card -->
                    @endforeach

                    {{--
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-tools"></i>
                            </div>
                            <div>
                                <h3>Plumbing</h3>
                                <p>From minor fixes to major renovations, our skilled handymen can handle all your home
                                    repair needs with quality workmanship.</p>
                                <a href="service-details.html" class="read-more">Read More <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Card -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-house-door"></i>
                            </div>
                            <div>
                                <h3>Cleaning Services</h3>
                                <p>Professional cleaning services for your home or office, including deep cleaning, regular
                                    maintenance, and specialized cleaning.</p>
                                <a href="service-details.html" class="read-more">Read More <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Card -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-droplet"></i>
                            </div>
                            <div>
                                <h3>Plumbing</h3>
                                <p>Expert plumbing solutions for leaks, clogs, installations, and maintenance by certified
                                    professionals.</p>
                                <a href="{{ route('services.show', 2) }}" class="read-more">Services <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Card -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-lightning-charge"></i>
                            </div>
                            <div>
                                <h3>Electrical Services</h3>
                                <p>Safe and reliable electrical work including wiring, repairs, installations, and
                                    maintenance by licensed electricians.</p>
                                <a href="service-details.html" class="read-more">Read More <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Card -->
                    --}}

                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>What Our Customers Say</h2>
                <p>Hear from satisfied customers across Birgunj who have used our services</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row g-5">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/frontend/home/img/dp.png') }}" class="testimonial-img"
                                alt="">
                            <h3>Rajesh Yadav</h3>
                            <h4>Adarsh Nagar Resident</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>I needed urgent plumbing help when my kitchen pipe burst. SewaGunj sent a professional
                                    within an hour who fixed the issue perfectly. Their service is truly reliable and saved
                                    me from a major mess!</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/frontend/home/img/dp.png') }}" class="testimonial-img"
                                alt="">
                            <h3>Priya Sharma</h3>
                            <h4>Golbazar Resident</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>The home cleaning service from SewaGunj transformed my house! The team was punctual,
                                    thorough, and left every corner sparkling clean. I've already booked them for monthly
                                    service.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                </div>

            </div>

        </section><!-- /Testimonials Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="1250" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Happy Customers</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Skilled Professionals</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Service Categories</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="98" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Satisfaction Rate</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row content justify-content-center align-items-center position-relative">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="display-4 mb-4">Ready to experience hassle-free home services?</h2>
                        <p class="mb-4">Join thousands of Birgunj residents who trust SewaGunj for their home service
                            needs. Book your service today and let our professionals take care of the rest!</p>
                        <a href="{{ route('register') }}" class="btn btn-cta">Book a Service Now</a>
                    </div>
                </div>

            </div>

        </section><!-- /Call To Action Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact Us</h2>
                <p>Have questions or need assistance? We're here to help!</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4 g-lg-5">
                    <div class="col-lg-5">
                        <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                            <h3>Our Information</h3>
                            <p>We're committed to providing excellent service and support to our customers in Birgunj and
                                surrounding areas.</p>

                            <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div class="content">
                                    <h4>Our Location</h4>
                                    <p>Main Road, Adarsh Nagar</p>
                                    <p>Birgunj, Nepal</p>
                                </div>
                            </div>

                            <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div class="content">
                                    <h4>Phone Number</h4>
                                    <p>+977 9829487519</p>
                                    <p>+977 51-520456</p>
                                </div>
                            </div>

                            <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                                <div class="icon-box">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div class="content">
                                    <h4>Email Address</h4>
                                    <p>info@sewagunj.com</p>
                                    <p>support@sewagunj.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                            <h3>Get In Touch</h3>
                            <p>Send us a message and we'll get back to you as soon as possible.</p>

                            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                                data-aos-delay="200">
                                <div class="row gy-4">

                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Your Name" required="">
                                    </div>

                                    <div class="col-md-6 ">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Your Email" required="">
                                    </div>

                                    <div class="col-12">
                                        <input type="text" class="form-control" name="subject" placeholder="Subject"
                                            required="">
                                    </div>

                                    <div class="col-12">
                                        <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                    </div>

                                    <div class="col-12 text-center">
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your message has been sent. Thank you!</div>

                                        <button type="submit" class="btn">Send Message</button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>
@endsection
