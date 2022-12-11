<section id="services" class="section_gap wow fadeIn" data-wow-duration="1.5s">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4 d-flex justify-content-center">
                <h2 class="section_heading text-center d-inline">What I Do</h2>
            </div>
        </div>
        <div class="row">
            <div id="service_slider" class="owl-carousel owl-theme">
                @foreach($services as $service)
                <div class="service_container">
                    <div class="card">
                        <div class="card-body">
                            <div class="service_icon">
                                <i class="{{ $service->service_icon }}"></i>
                            </div>
                            <div class="service_content">
                                <h3 class="mt-3">{{ $service->service_name }}</h3>
                                <p class="mt-3">{{ $service->service_description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-12 custom_service">
                <p>Looking for a custom job? <strong><a href="#contact">Click Here</a></strong> to contact me! <i class="fad fa-laugh-beam"></i></p>
            </div>
        </div>
    </div>
</section>
