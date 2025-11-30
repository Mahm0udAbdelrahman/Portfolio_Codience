@extends('web.layouts.index')
@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="home" class="hero section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 content-col" data-aos="fade-up">
                        <div class="content">
                            <div class="agency-name">
                                <h5>{{ __('OUR AGENCY') }}</h5>
                            </div>

                            <div class="main-heading">
                                <h1>{{ $setting->name_company ?? '' }}</h1>
                            </div>

                            <div class="divider"></div>

                            <div class="description">
                                <p>{{ $setting->{'description_' . app()->getLocale()} }}</p>
                            </div>

                            <div class="cta-button">
                                <a href="#services" class="btn">
                                    <span>{{ __('EXPLORE SERVICES') }}</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5" data-aos="zoom-out">
                        <div class="visual-content">
                            <div class="fluid-shape">
                                <img src="{{ asset('storage/setting/' . $setting->logo) }}"
                                    alt="{{ __('Abstract Fluid Shape') }}" class="fluid-img">
                            </div>

                            <div class="stats-card">
                                <div class="stats-number">
                                    <h2>5K</h2>
                                </div>
                                <div class="stats-label">
                                    <p>{{ __('Successful Campaigns') }}</p>
                                </div>
                                <div class="stats-arrow">
                                    <a href="#portfolio"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('About') }}</h2>
                <div><span>{{ __('Learn More') }}</span> <span class="description-title">{{ __('About Us') }}</span></div>
            </div><!-- End Section Title -->

            <div class="container">
                @php
                    $about = App\Models\AboutUs::first();
                @endphp
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                        <div class="about-image position-relative">
                            <img src="{{ asset('storage/about_us/' . $about->image) }}"
                                class="img-fluid rounded-4 shadow-sm" alt="{{ __('About Image') }}" loading="lazy">
                            <div class="experience-badge">
                                <span class="years">20+</span>
                                <span class="text">{{ __('Years of Expertise') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-left" data-aos-delay="300">
                        <div class="about-content">
                            <h2>{{ $about->{'title_' . app()->getLocale()} }}</h2>
                            <p class="lead">{{ $about->{'description_' . app()->getLocale()} }}</p>

                            <div class="row g-4 mt-3">
                                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="400">
                                    <div class="feature-item">
                                        <i class="bi bi-check-circle-fill"></i>
                                        <h5>{{ $about->{'sub_title_one_' . app()->getLocale()} }}</h5>
                                        <p>{{ $about->{'sub_description_one_' . app()->getLocale()} }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="450">
                                    <div class="feature-item">
                                        <i class="bi bi-lightbulb-fill"></i>
                                        <h5>{{ $about->{'sub_title_two_' . app()->getLocale()} }}</h5>
                                        <p>{{ $about->{'sub_description_two_' . app()->getLocale()} }}</p>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="btn btn-primary mt-4">{{ __('Explore Our Services') }}</a>
                        </div>
                    </div>
                </div>

                <div class="testimonial-section mt-5 pt-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="row">
                        <div class="col-lg-4" data-aos="fade-right" data-aos-delay="200">
                            <div class="testimonial-intro">
                                <h3>{{ __('Our Clients Speak Highly') }}</h3>
                                <p>{{ __('Hear directly from those who have experienced the impact of our partnership and achieved their strategic goals.') }}
                                </p>
                                <div class="swiper-nav-buttons mt-4">
                                    <button class="slider-prev"><i class="bi bi-arrow-left"></i></button>
                                    <button class="slider-next"><i class="bi bi-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8" data-aos="fade-left" data-aos-delay="300">
                            <div class="testimonial-slider swiper init-swiper">
                                <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 800,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": 1,
                "spaceBetween": 30,
                "navigation": {
                  "nextEl": ".slider-next",
                  "prevEl": ".slider-prev"
                },
                "breakpoints": {
                  "768": {
                    "slidesPerView": 2
                  }
                }
              }
            </script>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="testimonial-item">
                                            <div class="rating mb-3">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </div>
                                            <p>"{{ __('Their strategic vision and unwavering commitment to results provided exceptional value. Our operational efficiency has signficantly improved.') }}"
                                            </p>
                                            <div class="client-info d-flex align-items-center mt-4">
                                                <img src="{{ asset('web/assets/img/person/person-f-1.webp') }}"
                                                    class="client-img" alt="{{ __('Client') }}" loading="lazy">
                                                <div>
                                                    <h6 class="mb-0">Eleanor Vance</h6>
                                                    <span>{{ __('Operations Manager') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="testimonial-item">
                                            <div class="rating mb-3">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                            </div>
                                            <p>"{{ __('Collaborating with their team was a revelation. Their innovative strategies guided us toward achieving our objectives with precision and speed.') }}"
                                            </p>
                                            <div class="client-info d-flex align-items-center mt-4">
                                                <img src="{{ asset('web/assets/img/person/person-m-1.webp') }}"
                                                    class="client-img" alt="{{ __('Client') }}" loading="lazy">
                                                <div>
                                                    <h6 class="mb-0">David Kim</h6>
                                                    <span>{{ __('Product Lead') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="testimonial-item">
                                            <div class="rating mb-3">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </div>
                                            <p>"{{ __('The depth of knowledge and unwavering dedication they bring to every project is exceptional. They\'ve become an essential ally in driving our expansion.') }}"
                                            </p>
                                            <div class="client-info d-flex align-items-center mt-4">
                                                <img src="{{ asset('web/assets/img/person/person-f-2.webp') }}"
                                                    class="client-img" alt="{{ __('Client') }}" loading="lazy">
                                                <div>
                                                    <h6 class="mb-0">Isabella Diaz</h6>
                                                    <span>{{ __('Research Analyst') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="testimonial-item">
                                            <div class="rating mb-3">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                            </div>
                                            <p>"{{ __('Their dedication to delivering superior solutions and their meticulous attention to detail have profoundly impacted our corporate growth trajectory.') }}"
                                            </p>
                                            <div class="client-info d-flex align-items-center mt-4">
                                                <img src="{{ asset('web/assets/img/person/person-f-3.webp') }}"
                                                    class="client-img" alt="{{ __('Client') }}" loading="lazy">
                                                <div>
                                                    <h6 class="mb-0">Olivia Chen</h6>
                                                    <span>{{ __('Development Strategist') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('Services') }}</h2>
                <div><span>{{ __('Check Our') }}</span> <span class="description-title">{{ __('Services') }}</span></div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="service-header">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-12">
                            <div class="service-intro">
                                <h2 class="service-heading">
                                    <div>{{ __('Innovative business') }}</div>
                                    <div><span>{{ __('performance solutions') }}</span></div>
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            {{--  <div class="service-summary">
          <p>
            {{ __('We integrate forward-thinking strategies, creative approaches, and state-of-the-art technologies to deliver exceptional customer experiences that drive growth and engage target markets.') }}
          </p>
          <a href="services.html" class="service-btn">
            {{ __('View All Services') }}
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>  --}}
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    @foreach ($solutions as $solution)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-card position-relative z-1">
                                <div class="service-icon">
                                    <i class="bi bi-palette"></i>
                                </div>
                                {{--  <a href="service-details.html" class="card-action d-flex align-items-center justify-content-center rounded-circle">
          <i class="bi bi-arrow-up-right"></i>  --}}
                                </a>
                                <h3>
                                    <h2>
                                        {{ $solution->{'title_' . app()->getLocale()} }}
                                    </h2>
                                </h3>
                                <p>
                                    {{ $solution->{'description_' . app()->getLocale()} }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </section><!-- /Services Section -->


        <!-- Steps Section -->
        <section id="steps" class="steps section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('Steps') }}</h2>
                <div><span>{{ __('How we') }}</span> <span class="description-title">{{ __('Work') }}</span></div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="steps-wrapper">
                    @foreach ($HowWeWorks as $HowWeWork)
                        <div class="step-item" data-aos="fade-right" data-aos-delay="200">
                            <div class="step-content">
                                <div class="step-icon">
                                    <i class="bi bi-lightbulb"></i>
                                </div>
                                <div class="step-info">
                                    <span class="step-number">{{ __('Step') }} 0{{ $loop->index + 1 }}</span>
                                    <h3>{{ $HowWeWork->{'title_' . app()->getLocale()} }}</h3>
                                    <p>{{ $HowWeWork->{'description_' . app()->getLocale()} }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- End Step Item -->

                </div>

            </div>

        </section><!-- /Steps Section -->


        <!-- Call To Action Section -->
        {{--  <section id="call-to-action" class="call-to-action section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="advertise-1 d-flex flex-column flex-lg-row gap-4 align-items-center position-relative">

          <div class="content-left flex-grow-1" data-aos="fade-right" data-aos-delay="200">
            <span class="badge text-uppercase mb-2">Don't Miss!</span>
            <h2>Revolutionize Your Digital Experience Today</h2>
            <p class="my-4">Strategia accelerates your business growth through innovative solutions and cutting-edge technology. Join thousands of satisfied customers who have transformed their operations.</p>

            <div class="features d-flex flex-wrap gap-3 mb-4">
              <div class="feature-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>Premium Support</span>
              </div>
              <div class="feature-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>Cloud Integration</span>
              </div>
              <div class="feature-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>Real-time Analytics</span>
              </div>
            </div>

            <div class="cta-buttons d-flex flex-wrap gap-3">
              <a href="#" class="btn btn-primary">Start Free Trial</a>
              <a href="#" class="btn btn-outline">Learn More</a>
            </div>
          </div>

          <div class="content-right position-relative" data-aos="fade-left" data-aos-delay="300">
            <img src="{{ asset('web/assets/img/misc/misc-1.webp')}}" alt="Digital Platform" class="img-fluid rounded-4">
            <div class="floating-card">
              <div class="card-icon">
                <i class="bi bi-graph-up-arrow"></i>
              </div>
              <div class="card-content">
                <span class="stats-number">245%</span>
                <span class="stats-text">Growth Rate</span>
              </div>
            </div>
          </div>

          <div class="decoration">
            <div class="circle-1"></div>
            <div class="circle-2"></div>
          </div>

        </div>

      </div>

    </section><!-- /Call To Action Section -->  --}}

        <!-- Testimonials Section -->
        {{--  <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <div><span>Check Our</span> <span class="description-title">Testimonials</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="testimonials-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "slidesPerView": 1,
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              }
            }
          </script>

          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row">
                  <div class="col-lg-8">
                    <h2>Sed ut perspiciatis unde omnis</h2>
                    <p>
                      Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    </p>
                    <p>
                      Beatae magnam dolore quia ipsum. Voluptatem totam et qui dolore dignissimos. Amet quia sapiente laudantium nihil illo et assumenda sit cupiditate. Nam perspiciatis perferendis minus consequatur. Enim ut eos quo.
                    </p>
                    <div class="profile d-flex align-items-center">
                      <img src="{{ asset('web/assets/img/person/person-m-7.webp')}}" class="profile-img" alt="">
                      <div class="profile-info">
                        <h3>Saul Goodman</h3>
                        <span>Client</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 d-none d-lg-block">
                    <div class="featured-img-wrapper">
                      <img src="{{ asset('web/assets/img/person/person-m-7.webp')}}" class="featured-img" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Testimonial Item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row">
                  <div class="col-lg-8">
                    <h2>Nemo enim ipsam voluptatem</h2>
                    <p>
                      Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                    </p>
                    <p>
                      Dolorem excepturi esse qui amet maxime quibusdam aut repellendus voluptatum. Corrupti enim a repellat cumque est laborum fuga consequuntur. Dolorem nostrum deleniti quas voluptatem iure dolorum rerum. Repudiandae doloribus ut repellat harum vero aut. Modi aut velit aperiam aspernatur odit ut vitae.
                    </p>
                    <div class="profile d-flex align-items-center">
                      <img src="{{ asset('web/assets/img/person/person-f-8.webp')}}" class="profile-img" alt="">
                      <div class="profile-info">
                        <h3>Sara Wilsson</h3>
                        <span>Designer</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 d-none d-lg-block">
                    <div class="featured-img-wrapper">
                      <img src="{{ asset('web/assets/img/person/person-f-8.webp')}}" class="featured-img" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Testimonial Item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row">
                  <div class="col-lg-8">
                    <h2>
                      Labore nostrum eos impedit
                    </h2>
                    <p>
                      Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                    </p>
                    <p>
                      Itaque ut explicabo vero occaecati est quam rerum sed. Numquam tempora aut aut quaerat quia illum. Nobis quia autem odit ipsam numquam. Doloribus sit sint corporis eius totam fuga. Hic nostrum suscipit corrupti nam expedita adipisci aut optio.
                    </p>
                    <div class="profile d-flex align-items-center">
                      <img src="{{ asset('web/assets/img/person/person-m-9.webp')}}" class="profile-img" alt="">
                      <div class="profile-info">
                        <h3>Matt Brandon</h3>
                        <span>Freelancer</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 d-none d-lg-block">
                    <div class="featured-img-wrapper">
                      <img src="{{ asset('web/assets/img/person/person-m-9.webp')}}" class="featured-img" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Testimonial Item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row">
                  <div class="col-lg-8">
                    <h2>Impedit dolor facilis nulla</h2>
                    <p>
                      Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                    </p>
                    <p>
                      Omnis aspernatur accusantium qui delectus praesentium repellendus. Facilis sint odio aspernatur voluptas commodi qui qui qui pariatur. Corrupti deleniti itaque quaerat ipsum deleniti culpa tempora tempore. Et consequatur exercitationem hic aspernatur nobis est voluptatibus architecto laborum.
                    </p>
                    <div class="profile d-flex align-items-center">
                      <img src="{{ asset('web/assets/img/person/person-f-10.webp')}}" class="profile-img" alt="">
                      <div class="profile-info">
                        <h3>Jena Karlis</h3>
                        <span>Store Owner</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 d-none d-lg-block">
                    <div class="featured-img-wrapper">
                      <img src="{{ asset('web/assets/img/person/person-f-10.webp')}}" class="featured-img" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Testimonial Item -->

          </div>

          <div class="swiper-navigation w-100 d-flex align-items-center justify-content-center">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

        </div>

      </div>

    </section><!-- /Testimonials Section -->  --}}

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('Portfolio') }}</h2>
                <div><span>{{ __('Check Our') }}</span> <span class="description-title">{{ __('Portfolio') }}</span>
                </div>
            </div><!-- End Section Title -->

            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="200">
                        <li data-filter="*" class="filter-active">
                            <i class="bi bi-grid-3x3"></i> {{ __('All Projects') }}
                        </li>
                        @foreach ($categories as $category)
                            <li data-filter=".cat-{{ $category->id }}">
                                <i class="bi bi-phone"></i> {{ $category->{'name_' . app()->getLocale()} }}
                            </li>
                        @endforeach
                    </ul>

                    <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

                        @foreach ($projects as $project)
                            <div
                                class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item cat-{{ $project->category_id }}">
                                <article class="portfolio-entry">
                                    <figure class="entry-image">
                                        @if ($project->images && $project->images->first())
                                            <img src="{{ asset('storage/projects/' . $project->images->first()->image) }}"
                                                class="img-fluid" alt="" loading="lazy">
                                        @endif
                                        <div class="entry-overlay">
                                            <div class="overlay-content">
                                                <div class="entry-meta">
                                                    {{ $project->category->{'name_' . app()->getLocale()} }}
                                                </div>
                                                <h3 class="entry-title">{{ $project->{'title_' . app()->getLocale()} }}
                                                </h3>
                                                <div class="entry-links">
                                                    <a href="{{ asset('storage/project/' . $project->images->first()->image) }}"
                                                        class="glightbox" data-gallery="portfolio-gallery">
                                                        <i class="bi bi-arrows-angle-expand"></i>
                                                    </a>
                                                    <a href="{{ route('web.project_detail', $project->id) }}">
                                                        <i class="bi bi-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </figure>
                                </article>
                            </div>
                        @endforeach

                        <!-- End Portfolio Item -->

                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section><!-- /Portfolio Section -->

        <!-- Team Section -->
        {{--  <section id="team" class="team section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <div><span>Check Our</span> <span class="description-title">Team</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex">
              <div class="member-img">
                <img src="{{ asset('web/assets/img/person/person-m-7.webp')}}" class="img-fluid" alt="" loading="lazy">
              </div>
              <div class="member-info flex-grow-1">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <p>Aliquam iure quaerat voluptatem praesentium possimus unde laudantium vel dolorum distinctio dire flow</p>
                <div class="social">
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                  <a href=""><i class="bi bi-youtube"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member d-flex">
              <div class="member-img">
                <img src="{{ asset('web/assets/img/person/person-f-8.webp')}}" class="img-fluid" alt="" loading="lazy">
              </div>
              <div class="member-info flex-grow-1">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <p>Labore ipsam sit consequatur exercitationem rerum laboriosam laudantium aut quod dolores exercitationem ut</p>
                <div class="social">
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                  <a href=""><i class="bi bi-youtube"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member d-flex">
              <div class="member-img">
                <img src="{{ asset('web/assets/img/person/person-m-6.webp')}}" class="img-fluid" alt="" loading="lazy">
              </div>
              <div class="member-info flex-grow-1">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <p>Illum minima ea autem doloremque ipsum quidem quas aspernatur modi ut praesentium vel tque sed facilis at qui</p>
                <div class="social">
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                  <a href=""><i class="bi bi-youtube"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member d-flex">
              <div class="member-img">
                <img src="{{ asset('web/assets/img/person/person-f-4.webp')}}" class="img-fluid" alt="" loading="lazy">
              </div>
              <div class="member-info flex-grow-1">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <p>Magni voluptatem accusamus assumenda cum nisi aut qui dolorem voluptate sed et veniam quasi quam consectetur</p>
                <div class="social">
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                  <a href=""><i class="bi bi-youtube"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
            <div class="team-member d-flex">
              <div class="member-img">
                <img src="{{ asset('web/assets/img/person/person-m-12.webp')}}" class="img-fluid" alt="" loading="lazy">
              </div>
              <div class="member-info flex-grow-1">
                <h4>Brian Doe</h4>
                <span>Marketing</span>
                <p>Qui consequuntur quos accusamus magnam quo est molestiae eius laboriosam sunt doloribus quia impedit laborum velit</p>
                <div class="social">
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                  <a href=""><i class="bi bi-youtube"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
            <div class="team-member d-flex">
              <div class="member-img">
                <img src="{{ asset('web/assets/img/person/person-f-9.webp')}}" class="img-fluid" alt="" loading="lazy">
              </div>
              <div class="member-info flex-grow-1">
                <h4>Josepha Palas</h4>
                <span>Operation</span>
                <p>Sint sint eveniet explicabo amet consequatur nesciunt error enim rerum earum et omnis fugit eligendi cupiditate vel</p>
                <div class="social">
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                  <a href=""><i class="bi bi-youtube"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Team Section -->  --}}

        <!-- Pricing Section -->
        {{--  <section id="pricing" class="pricing section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pricing</h2>
        <div><span>Check Our</span> <span class="description-title">Pricing</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <!-- Basic Plan -->
          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="pricing-card">
              <div class="plan-header">
                <div class="plan-icon">
                  <i class="bi bi-box"></i>
                </div>
                <h3>Starter</h3>
                <p>For individuals just getting started</p>
              </div>
              <div class="plan-pricing">
                <div class="price">
                  <span class="currency">$</span>
                  <span class="amount">12</span>
                  <span class="period">/month</span>
                </div>
              </div>
              <div class="plan-features">
                <ul>
                  <li><i class="bi bi-check-circle-fill"></i> Nullam accumsan lorem</li>
                  <li><i class="bi bi-check-circle-fill"></i> Vestibulum auctor dapibus</li>
                  <li><i class="bi bi-check-circle-fill"></i> Nulla consequat massa</li>
                  <li class="disabled"><i class="bi bi-x-circle-fill"></i> In enim justo rhoncus ut</li>
                  <li class="disabled"><i class="bi bi-x-circle-fill"></i> Curabitur ullamcorper ultricies</li>
                </ul>
              </div>
              <div class="plan-cta">
                <a href="#" class="btn-plan">Choose Plan</a>
              </div>
            </div>
          </div><!-- End Basic Plan -->

          <!-- Professional Plan -->
          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="pricing-card popular">
              <div class="popular-tag">Most Popular</div>
              <div class="plan-header">
                <div class="plan-icon">
                  <i class="bi bi-briefcase"></i>
                </div>
                <h3>Professional</h3>
                <p>For small teams and growing businesses</p>
              </div>
              <div class="plan-pricing">
                <div class="price">
                  <span class="currency">$</span>
                  <span class="amount">39</span>
                  <span class="period">/month</span>
                </div>
              </div>
              <div class="plan-features">
                <ul>
                  <li><i class="bi bi-check-circle-fill"></i> Donec quam felis ultricies</li>
                  <li><i class="bi bi-check-circle-fill"></i> Nam eget dui etiam rhoncus</li>
                  <li><i class="bi bi-check-circle-fill"></i> Maecenas tempus tellus</li>
                  <li><i class="bi bi-check-circle-fill"></i> Donec pede justo fringilla</li>
                  <li class="disabled"><i class="bi bi-x-circle-fill"></i> Cras dapibus vivamus</li>
                </ul>
              </div>
              <div class="plan-cta">
                <a href="#" class="btn-plan">Choose Plan</a>
              </div>
            </div>
          </div><!-- End Professional Plan -->

          <!-- Enterprise Plan -->
          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="pricing-card">
              <div class="plan-header">
                <div class="plan-icon">
                  <i class="bi bi-building"></i>
                </div>
                <h3>Enterprise</h3>
                <p>For large organizations and corporations</p>
              </div>
              <div class="plan-pricing">
                <div class="price">
                  <span class="currency">$</span>
                  <span class="amount">79</span>
                  <span class="period">/month</span>
                </div>
              </div>
              <div class="plan-features">
                <ul>
                  <li><i class="bi bi-check-circle-fill"></i> Etiam sit amet orci eget</li>
                  <li><i class="bi bi-check-circle-fill"></i> Pellentesque posuere vulputate</li>
                  <li><i class="bi bi-check-circle-fill"></i> Quisque rutrum aenean</li>
                  <li><i class="bi bi-check-circle-fill"></i> Fusce vulputate eleifend</li>
                  <li><i class="bi bi-check-circle-fill"></i> Phasellus viverra nulla</li>
                </ul>
              </div>
              <div class="plan-cta">
                <a href="#" class="btn-plan">Choose Plan</a>
              </div>
            </div>
          </div><!-- End Enterprise Plan -->
        </div>

      </div>

    </section><!-- /Pricing Section -->  --}}

        <!-- Faq Section -->
        <section class="faq-9 faq section" id="faq">

            <div class="container">
                <div class="row">

                    <div class="col-lg-5" data-aos="fade-up">
                        <h2 class="faq-title">{{ __('Have a question? Check out the FAQ') }}</h2>
                        <p class="faq-description">
                            {{ __('Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero sit amet adipiscing sem neque sed ipsum.') }}
                        </p>
                        <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                            <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
                        <div class="faq-container">
                            @foreach ($faqs as $faq)
                                <div class="faq-item">
                                    <h3>{{ $faq->{'question_' . app()->getLocale()} }}</h3>
                                    <div class="faq-content">
                                        <p>{{ $faq->{'answer_' . app()->getLocale()} }}</p>
                                    </div>
                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <script>
                        document.querySelectorAll('.faq-item').forEach(item => {
                            item.addEventListener('click', () => {
                                document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('faq-active'));
                                item.classList.add('faq-active');
                            });
                        });
                    </script>

                </div>
            </div>
        </section><!-- /Faq Section -->


        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('Contact') }}</h2>
                <div><span>{{ __("Let's") }}</span> <span class="description-title">{{ __('Connect') }}</span></div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <!-- Contact Info Boxes -->
                <div class="row gy-4 mb-5">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="contact-info-box">
                            <div class="icon-box">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="info-content">
                                <h4>{{ __('Our Address') }}</h4>
                                <p>{{ $setting->{'address_' . app()->getLocale()} ?? '' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="contact-info-box">
                            <div class="icon-box">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="info-content">
                                <h4>{{ __('Email Address') }}</h4>
                                <p>{{ $setting->email ?? '' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="contact-info-box">
                            <div class="icon-box">
                                <i class="bi bi-headset"></i>
                            </div>
                            <div class="info-content">
                                <h4>{{ __('Hours of Operation') }}</h4>
                                <p>{{ __('Sunday-Fri: 9 AM - 6 PM') }}</p>
                                <p>{{ __('Saturday: 9 AM - 4 PM') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Google Maps (Full Width) -->
            <div class="map-section" data-aos="fade-up" data-aos-delay="200">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54787.18922297762!2d31.2357127!3d30.0444196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145840c5b838093b%3A0x7bcbfe88089f7571!2sCairo%2C%20Egypt!5e0!3m2!1sen!2seg!4v1707842627000!5m2!1sen!2seg"
                    width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Contact Form Section (Overlapping) -->
            <div class="container form-container-overlap">
                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="col-lg-10">
                        <div class="contact-form-wrapper">
                            <h2 class="text-center mb-4">{{ __('Get in Touch') }}</h2>

                            <form method="post" action="{{ route('web.contact_us.store') }}" class="php-email-form">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <i class="bi bi-person"></i>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="{{ __('First Name') }}" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <i class="bi bi-envelope"></i>
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="{{ __('Email Address') }}" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <i class="bi bi-text-left"></i>
                                                <input type="text" class="form-control" name="subject"
                                                    placeholder="{{ __('Subject') }}" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <i class="bi bi-chat-dots message-icon"></i>
                                                <textarea class="form-control" name="message" placeholder="{{ __('Write Message...') }}" style="height: 180px"
                                                    required=""></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="loading">{{ __('Loading') }}</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">{{ __('Your message has been sent. Thank you!') }}</div>
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="submit"
                                            class="btn btn-primary btn-submit">{{ __('SEND MESSAGE') }}</button>
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
