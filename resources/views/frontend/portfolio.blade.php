@extends('frontend.layout.frontapp')

@section('page-content')
    <!--Nav Section Start-->
    <section id="nav_bar">
        <nav id="main_nav" class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home.page') }}"><img width="200" class="img-fluid" src="{{ asset('frontend') }}/img/logo.png" alt=""></a>

                <button id="menu_btn" class="navbar-toggler hamburger hamburger--spring" type="button"
                        data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.page') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#works">Works</a>
                        </li>
                        <li class="nav-item pr-0">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <!--Nav Section End-->

    <!--Breadcrumb Section Start-->
    <section id="breadcrumb" class="section_gap wow fadeIn" data-wow-duration="1.5s">
        <div class="container">
            <div class="row justify-content-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home.page') }}"><i class="fad fa-home-alt"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Works</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!--Breadcrumb Section End-->

    <!-- Portfolio Section Start -->
    <section id="works" class="section_gap wow fadeIn" data-wow-duration="1.5s">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5 d-flex justify-content-center">
                    <h2 class="section_heading text-center d-inline js--start-sticky-nav">All Works</h2>
                </div>
            </div>

            <div class="row justify-content-center mb-5 mb-cs px-3">
                <ul class="nav portfolio-filter">
                    <li class="nav-item active" data-filter="*">
                        <a class="nav-link filter_btn" href="javascript:void(0)">All</a>
                    </li>
                    @foreach($categories as $category)
                        <li class="nav-item" data-filter=".{{ strtolower($category->category_name) }}">
                            <a class="nav-link filter_btn" href="javascript:void(0)">{{ $category->category_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="row justify-content-center portfolio-wrapper">
                @foreach($projects as $project)
                    <div class="gutter-sizer col-lg-4 col-md-6 col-sm-6 {{ strtolower($project->category->category_name) }}">
                        <div class="card single-portfolio text-center">
                            <div class="portfolio-image">
                                <img class="img-fluid" src="{{ asset('storage/project_images').'/'.$project->project_image }}" alt="portfolio image">
                            </div>
                            <div class="card-body portfolio-details">
                                <h3 class="portfolio-title">{{ $project->project_name }}</h3>
                                <p class="portfolio-text">
                                    {{ $project->project_description }}
                                </p>
                                <div class="portfolio-btns d-flex justify-content-center">
                                    @if($project->code_link)
                                        <a href="{{ $project->code_link }}" class="portfolio-btn" target="_blank">
                                            <i class="fad fa-external-link-alt"></i> Details
                                        </a>
                                    @endif
                                    @if($project->live_link)
                                        <a href="{{ $project->live_link }}" class="portfolio-btn" target="_blank">
                                            <i class="fad fa-link"></i> Preview
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <!-- Pagination start -->
                <div class="col-12 d-flex justify-content-center js--start-go-top">
                    <div class="mr-minus">
                        {{ $projects->links() }}
                    </div>
                </div>
                <!-- Pagination End -->
            </div>
        </div>
    </section>
    <!-- Portfolio Section End -->
@endsection
