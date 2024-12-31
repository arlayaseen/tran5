<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Techgears</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/user_style.css') }}">
</head>

<body>
    <div class="head-section">
        <nav class="navbar navbar-expand-lg py-4">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">Techgears</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item ms-0 ms-md-3">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item ms-0 ms-md-3">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item ms-0 ms-md-3">
                            <a class="nav-link" href="#">About </a>
                        </li>

                        <li class="nav-item ms-0 ms-md-3">
                            <a class="px-4 py-2 btn btn-primary" href="#">Contact </a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <div class="dropdown show">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    {{-- <a id="dropdownMenuLink" class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a> --}}

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>

        <header class="hero-section">
            <div class="container-lg">
                <div class="row align-items-center py-4 g-5">
                    <div class="col-12 col-md-6">
                        <div class="text-center text-md-start">
                            <h1 class="display-md-2 display-4 fw-bold text-dark pb-2"><span
                                    class="text-primary">Discover</span> the
                                Future of Tech</h1>
                            <p class="lead">Explore our latest gadgets and accessories designed to elevate your
                                digital lifestyle.

                            </p>
                            <button class="btn btn-primary px-5 py-3 mt-3 fs-5 fw-medium" type="button">
                                Shop Now
                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="assets/hero.webp" class="img-fluid" alt="a man using vr gadget" />
                    </div>
                </div>
            </div>
        </header>

    </div>

    <section class="container">
        <div class="row align-items-center gx-3 gy-5 py-5 mt-5">
            <div class="col-12 col-lg-5">
                <img src="assets/img-1.webp" class="img-fluid mx-auto d-block" alt="a man using vr gadget" />
            </div>
            <div class=" col-12 col-lg-7 text-center text-lg-start">
                <h2 class="fw-bold text-primary fs-1 pb-3">About TechGear Hub</h2>
                <p class="about-text">
                    About TechGear Hub
                    TechGear Hub is at the forefront of technology innovation, curating a collection of the latest
                    gadgets and
                    accessories to elevate your digital lifestyle. We believe in the power of technology to enhance
                    everyday
                    experiences, and our mission is to bring cutting-edge products to tech enthusiasts around the world.
                </p>
                <p class="about-text"> With a focus on quality, functionality, and style, TechGear Hub sources products
                    from
                    leading manufacturers
                    and emerging tech innovators. Our team of experts carefully selects each item to ensure it meets our
                    high
                    standards and aligns with the ever-evolving needs of our diverse community of customers.</p>
                <button class="btn btn-primary px-5 py-3 mt-3 fs-5 fw-medium" type="button">
                    Read More About Now
                </button>
            </div>
        </div>
    </section>

    <div class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-primary text-center fs-1 pt-5 mb-5">Key Features</h3>
                </div>
            </div>
            <div class="row g-5 pb-5">
                <div class="col-12 col-lg-4">
                    <div class="card px-3 py-4 shadow-sm">
                        <ion-icon class="ionicons" name="bulb-outline"></ion-icon>
                        <h3>Innovative Technology</h3>
                        <p class="card-text lead">
                            Explore products featuring the latest and most innovative technologies.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card px-3 py-4 shadow-sm blue-bg">
                        <ion-icon class="ionicons" name="shield-checkmark-outline"></ion-icon>
                        <h3>Quality Assurance</h3>
                        <p class="card-text lead">
                            Explore products featuring the latest and most innovative technologies.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card px-3 py-4 shadow-sm">
                        <ion-icon class="ionicons" name="hourglass-outline"></ion-icon>

                        <h3>Timely Delivery</h3>
                        <p class="card-text lead">
                            Explore products featuring the latest and most innovative technologies.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="feature-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-primary text-center fs-1 pt-5 mb-5">Our Product</h3>

                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item " role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">All</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false"> Virtual Reality
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#contact-tab-pane" type="button" role="tab"
                                    aria-controls="contact-tab-pane" aria-selected="false">Headphone</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="row g-4 mt-5 justify-content-center align-items-center">
                                    <div class="col-12 col-md-4">
                                        <img src="assets/headphones-1.webp" alt=""
                                            class="img-fluid  d-block mx-auto" />
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <img src="assets/vr-1.webp" alt=""
                                            class="img-fluid  d-block mx-auto" />
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <img src="assets/vr-2.webp" alt=""
                                            class="img-fluid  d-block mx-auto" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                aria-labelledby="profile-tab" tabindex="0">
                                <div class="row mt-5 g-4">
                                    <div class="col-12 col-md-4">
                                        <img src="assets/vr-1.webp" alt=""
                                            class="img-fluid d-block mx-auto" />
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <img src="assets/vr-2.webp" alt=""
                                            class="img-fluid d-block mx-auto" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel"
                                aria-labelledby="contact-tab" tabindex="0">
                                <div class="row g-4 mt-5">
                                    <div class="col-12 col-md-4 d-block mx-auto">
                                        <img src="assets/headphones-1.webp" alt="" class="img-fluid" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5 mb-5">
        <div class="row">
            <div class="col-12">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button fs-3 text-dark fw-medium" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">

                                How can I browse and explore products on TechGear Hub?

                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until
                                the collapse
                                plugin adds the appropriate classes that we use to style each element. These classes
                                control the overall
                                appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                this with
                                custom CSS or overriding our default variables. It's also worth noting that just about
                                any HTML can go
                                within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button fs-3 text-dark fw-medium" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">

                                What is the ordering process like?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                until the collapse
                                plugin adds the appropriate classes that we use to style each element. These classes
                                control the overall
                                appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                this with
                                custom CSS or overriding our default variables. It's also worth noting that just about
                                any HTML can go
                                within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button fs-3 text-dark fw-medium" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">

                                What is the ordering process like?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                the collapse
                                plugin adds the appropriate classes that we use to style each element. These classes
                                control the overall
                                appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                this with
                                custom CSS or overriding our default variables. It's also worth noting that just about
                                any HTML can go
                                within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-section">
        <p class="text-center py-5 mb-0">
            &copy; 2023 TechGear Hub. All rights reserved.
        </p>
    </footer>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
