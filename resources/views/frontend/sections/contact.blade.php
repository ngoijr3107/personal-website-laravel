<section id="contact" class="section_gap wow fadeIn" data-wow-duration="1.5s">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5 d-flex justify-content-center">
                <h2 class="section_heading text-center d-inline">Get In Touch</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="contact_note">
                    <div class="contact_note_top mb-5">
                        <h4>Quick Contact</h4>
                        <p>Don't like forms? Send me an <a href="mailto:{{ $profile->email }}?subject=I want to discuss" target="_blank"  class="mail_text">email</a>. <i class="far fa-smile-beam"></i></p>
                    </div>

                    <div class="contact_note_bottom mb-5">
                        <div class="contact_info mb-4 d-flex flex-wrap align-items-center">
                            <span class="text-primary mr-3"><i class="fad fa-envelope-open"></i></span>
                            <div>
                                <h6>Email</h6>
                                <p>{{ $profile->email }}</p>
                            </div>
                        </div>

                        <div class="contact_info mb-4 d-flex flex-wrap align-items-center">
                            <span class="text-primary mr-3"><i class="fad fa-comment-alt-lines"></i></span>
                            <div>
                                <h6>Social Media</h6>
                                <ul class="d-flex list-unstyled">
                                    @if($profile->facebook_link)
                                        <li><a href="{{ $profile->facebook_link }}" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                    @endif
                                    @if($profile->linkedin_link)
                                        <li><a href="{{ $profile->linkedin_link }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                                        </li>
                                    @endif
                                    @if($profile->twitter_link)
                                        <li><a href="{{ $profile->twitter_link }}" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="contact_info d-flex flex-wrap align-items-center">
                            <span class="text-primary mr-3"><i class="fad fa-map-marked-alt"></i></span>
                            <div>
                                <h6>Location</h6>
                                <p>{{ $profile->location }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <form action="{{ route('messages.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="guest_name">Name<span class="text-danger">*</span></label>
                            <input id="guest_name" name="guest_name" type="text" class="form-control form-control-lg input_short @error('guest_name') is-invalid @enderror" required placeholder="Enter your name">
                            @error('guest_name')
                                <p class="text-danger mb-0 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="guest_email">Email<span class="text-danger">*</span></label>
                            <input id="guest_email" name="guest_email" type="email" class="form-control form-control-lg @error('guest_email') is-invalid @enderror" required placeholder="Enter your email">
                            @error('guest_email')
                                <p class="text-danger mb-0 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="guest_subject">Subject</label>
                        <input id="guest_subject" name="guest_subject" type="text" class="form-control form-control-lg @error('guest_subject') is-invalid @enderror" placeholder="Enter subject">
                        @error('guest_subject')
                            <p class="text-danger mb-0 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="guest_message">Message<span class="text-danger">*</span></label>
                        <textarea id="guest_message" class="form-control form-control-lg @error('guest_message') is-invalid @enderror" name="guest_message" rows="5" required placeholder="Enter your message"></textarea>
                        @error('guest_message')
                            <p class="text-danger mb-0 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    @php
                        $attributes = [
                            'data-theme' => 'light',
                            'data-type' => 'audio',
                        ];
                    @endphp

                    <div class="form-group">
                        {!! app('captcha')->display($attributes) !!}
                        @error('g-recaptcha-response')
                            <p class="text-danger mb-0 mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <button class="btn btn-primary" type="submit" name="message_posted"><i class="fad fa-paper-plane"></i> Send</button>
                </form>
            </div>
        </div>
    </div>
</section>
