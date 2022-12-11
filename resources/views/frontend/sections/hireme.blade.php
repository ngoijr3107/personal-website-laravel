@if($profile->hire_link)
    <section id="hire_me" class="section_gap wow fadeIn text-white" data-wow-duration="1.5s">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="mt-5 hireme_top">
                                <h2>I'm Available For Freelance Work!</h2>
                            </div>
                            <div class="mb-5 hireme_bottom">
                                <a href="{{ $profile->hire_link }}" class="hire_btn" target="_blank"><i class="fad fa-badge-check"></i> Hire Me</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

