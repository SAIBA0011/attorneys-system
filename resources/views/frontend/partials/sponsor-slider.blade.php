<section class="section">
    <div class="container">
        <div class="divider40"></div>
        <div class="row">
            <div class="col-md-12">
                @if(count($images) === 0)

                    @for($i=0;$i<6;$i++)
                        <div class="col-md-2 col-sm-2 col-xs-2"><a href="">
                        <img style="max-width: 100%" src="/assets/frontend/placeholder/partner.jpg" class="thumbnail" alt=""></a></div>
                    @endfor

                @elseif(count($images) <= 6)
                    @foreach($images->slice(0, 6) as $image)
                        <div class="col-md-2 col-sm-2 col-xs-2"><a href="#">
                                <img style="max-width: 100%" src="{{ $image }}" class="thumbnail" alt=""></a>
                        </div>
                    @endforeach

                @elseif(count($images) >= 7)
                    <div id="Carousel" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach($images->chunk(6) as $chunked)
                                <div class="item">
                                    <div class="row">

                                        @foreach($chunked as $image)
                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                <a href="#" class="thumbnail">
                                                    <img src="{{ $image }}" alt="Image" style="max-width:100%;"></a></div>
                                        @endforeach

                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                        <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="row text-center">
            <div class="divider20"></div>
            <a href="{{route('about.sponsors')}}" class="btn btn-default">Show Sponsors</a>
            <a href="{{route('about.partners')}}" class="btn btn-default">Show Partners</a>
        </div>
    </div>
</section>