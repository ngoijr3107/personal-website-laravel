<section id="works" class="section_gap wow fadeIn" data-wow-duration="1.5s">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5 d-flex justify-content-center">
                <h2 class="section_heading text-center d-inline">Recent Works</h2>
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
            <div class="col-12 d-flex justify-content-center">
                <a href="{{ route('portfolio.page') }}" class="mr-minus btn btn-primary"><span class="mr-1">View all</span> <i class="fad fa-angle-double-right"></i></a>
            </div>
        </div>
    </div>
</section>
