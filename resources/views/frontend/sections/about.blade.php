<section id="about" class="section_gap js--start-go-top wow fadeIn" data-wow-duration="1.5s">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5 d-flex justify-content-center">
                <h2 class="section_heading d-inline">About Me</h2>
            </div>
            <div class="col-md-5">
                <div class="about_img d-flex justify-content-center">
                    <img style="margin-bottom: 30px;" width="350px" src="{{ asset('storage/profile_image') . '/' . $profile->profile_image }}" alt="profile image" class="img-fluid">
                </div>
            </div>
            <div class="col-md-7">
                <ul class="nav nav-pills mb-5" id="pills-tab">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#about_me">
                            About Me
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#skills">
                            Skills
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#experience">
                            Experience
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#education">
                            Education
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="about_me">
                        <p class="about_me_title">Hi I'm a {{ $profile->designation }}</p>
                        <p class="mb-5">{{ $profile->profile_description }}</p>
                        <div class="about_me_btn">
                            <a target="_blank" href="{{ $profile->cv_link }}" class="btn btn-outline-primary"> <i class="fad fa-file-user"></i> Download CV</a>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="skills">
                        <ul class="list-unstyled d-flex flex-wrap">
                            @foreach($skills as $skill)
                                <li><p><i class="{{ $skill->skill_icon }}"></i> {{ $skill->skill_name }}</p></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-pane fade" id="experience">
                        <div class="row">
                            @foreach($experiences as $experience)
                            <div class="col-lg-10 col-md-12 col-sm-12">
                                <div class="card experience mb-4">
                                    <div class="card-body experience_body">
                                        <div class="experience_details">
                                            <h4>{{ $experience->experience_title }}</h4>
                                            <span class="badge badge-primary mb-3">
                                                {{ date('F Y', strtotime($experience->starting_date)) }} -
                                                @if($experience->ending_date)
                                                    {{ date('F Y', strtotime($experience->ending_date)) }}
                                                @else
                                                    {{ 'Running' }}
                                                @endif
                                            </span>
                                            <p>{{ $experience->experience_description }}</p>
                                        </div>
                                        <span class="line"></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="education">
                        <div class="row">
                            @foreach($educations as $education)
                            <div class="col-lg-10 col-md-12 col-sm-12">
                                <div class="card education mb-4">
                                    <div class="card-body education_body">
                                        <div class="education_details">
                                            <h4>{{ $education->education_title }}</h4>
                                            <span class="badge badge-primary mb-3">{{ date('F Y', strtotime($education->starting_date)) }} -
                                                @if($education->ending_date)
                                                    {{ date('F Y', strtotime($education->ending_date)) }}
                                                @else
                                                    {{ 'Running' }}
                                                @endif</span>
                                            <p>{{ $education->education_description }}</p>
                                        </div>
                                        <span class="line"></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
