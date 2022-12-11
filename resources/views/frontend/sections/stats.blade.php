@if(!$stats->isEmpty())
    <section id="stats" class="section_gap wow fadeIn" data-wow-duration="1.5s">
        <div class="container">
            <div class="row">
                @foreach($stats as $stat)
                    <div class="col-md-3 col-sm-6">
                        <div class="stat-item d-flex align-items-center">
                            <span class="mr-4 text-primary fa-3x"><i class="{{ $stat->stat_icon }}"></i></span>
                            <div class="details">
                                <h3 class="mb-0 number"><em class="count">{{ $stat->stat_number }}</em></h3>
                                <p class="mb-0">{{ $stat->stat_title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
