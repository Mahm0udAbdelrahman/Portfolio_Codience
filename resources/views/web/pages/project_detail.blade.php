@extends('web.layouts.index')
@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade">
            <div class="container position-relative">
                <h1>{{ __('Portfolio Details') }}</h1>
                <p>{{ __('Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.') }}
                </p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('web.home') }}">{{ __('Home') }}</a></li>
                        <li class="current">{{ __('Portfolio Details') }}</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->


      <!-- Portfolio Details Section -->
<section id="portfolio-details" class="portfolio-details section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="portfolio-details-media">
                    <div class="main-image">
                        <div class="portfolio-details-slider swiper init-swiper" data-aos="zoom-in">
                            <script type="application/json" class="swiper-config">
                                {
                                  "loop": true,
                                  "speed": 1000,
                                  "autoplay": {
                                    "delay": 6000
                                  },
                                  "effect": "creative",
                                  "creativeEffect": {
                                    "prev": {
                                      "shadow": true,
                                      "translate": [0, 0, -400]
                                    },
                                    "next": {
                                      "translate": ["100%", 0, 0]
                                    }
                                  },
                                  "slidesPerView": 1,
                                  "navigation": {
                                    "nextEl": ".swiper-button-next",
                                    "prevEl": ".swiper-button-prev"
                                  }
                                }
                            </script>
                            <div class="swiper-wrapper">
                                @foreach ($project->images as $img)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/projects/' . $img->image) }}" alt="{{ __('Portfolio Image') }}" class="img-fluid">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>

                    <div class="thumbnail-grid" data-aos="fade-up" data-aos-delay="200">
                        <div class="row g-2 mt-3">
                            @foreach ($project->images as $img)
                                <div class="col-3">
                                    <img src="{{ asset('storage/projects/' . $img->image) }}" alt="{{ __('Gallery Image') }}" class="img-fluid glightbox">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tech-stack-badges" data-aos="fade-up" data-aos-delay="300">
                        @foreach ($project->tags as $tag)
                            <span>{{ $tag->{'name_' . app()->getLocale()} }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="portfolio-details-content">
                    <div class="project-meta">
                        <div class="badge-wrapper">
                            <span class="project-badge">{{ $project->category->{'name_' . app()->getLocale()} }}</span>
                        </div>
                        <div class="date-client">
                            <div class="meta-item">
                                <i class="bi bi-calendar-check"></i>
                                <span>{{ __('September 2024') }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="bi bi-buildings"></i>
                                <span>{{ __('DigitalCraft Solutions') }}</span>
                            </div>
                        </div>
                    </div>

                    <h2 class="project-title">{{ $project->{'title_' . app()->getLocale()} }}</h2>

                    <div class="project-website">
                        @foreach ($project->links as $lnk)
                            <i class="bi bi-link-45deg"></i>
                            <div>
                                <a href="{{ $lnk->link }}" target="_blank">{{ $lnk->link }}</a>
                            </div>
                            <br>
                        @endforeach
                    </div>

                    <div class="project-overview">
                        <p class="lead">
                            {{ $project->{'description_' . app()->getLocale()} }}
                        </p>

                        <div class="accordion project-accordion" id="portfolio-details-projectAccordion">
                            <div class="accordion-item" data-aos="fade-up">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#portfolio-details-collapse-1" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        <i class="bi bi-clipboard-data me-2"></i> {{ __('Project Overview') }}
                                    </button>
                                </h2>
                                <div id="portfolio-details-collapse-1" class="accordion-collapse collapse show"
                                    data-bs-parent="#portfolio-details-projectAccordion">
                                    <div class="accordion-body">
                                        <p>{{ $project->{'project_overview_' . app()->getLocale()} }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#portfolio-details-collapse-2"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="bi bi-exclamation-diamond me-2"></i> {{ __('The Challenge') }}
                                    </button>
                                </h2>
                                <div id="portfolio-details-collapse-2" class="accordion-collapse collapse"
                                    data-bs-parent="#portfolio-details-projectAccordion">
                                    <div class="accordion-body">
                                        <p>{{ $project->{'challenga_' . app()->getLocale()} }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#portfolio-details-collapse-3"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        <i class="bi bi-award me-2"></i> {{ __('The Solution') }}
                                    </button>
                                </h2>
                                <div id="portfolio-details-collapse-3" class="accordion-collapse collapse"
                                    data-bs-parent="#portfolio-details-projectAccordion">
                                    <div class="accordion-body">
                                        <p>{{ $project->{'solution_' . app()->getLocale()} }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="project-features" data-aos="fade-up" data-aos-delay="300">
                        <h3><i class="bi bi-stars"></i> {{ __('Key Features') }}</h3>
                        <div class="row g-3">
                            @foreach ($project->features as $feature)
                                <div class="col-md-4">
                                    <ul class="feature-list">
                                        <li><i class="bi bi-check2-circle"></i> {{ $feature->{'name_' . app()->getLocale()} }}</li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="cta-buttons" data-aos="fade-up" data-aos-delay="400">
                        <a href="#" class="btn-view-project">{{ __('View Live Project') }}</a>
                        <a href="#" class="btn-next-project">{{ __('Next Project') }} <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section><!-- /Portfolio Details Section -->


    </main>
@endsection
