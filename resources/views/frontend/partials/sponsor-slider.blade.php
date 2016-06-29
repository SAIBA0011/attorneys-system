<section class="section">
    <div class="container">
        <div class="divider40"></div>
        <div class="row">
            <div class="col-md-12">

                @if(count($partners) === 0)
                    @for($i=0;$i<6;$i++)
                        <div class="col-md-2 col-sm-2 col-xs-2"><a href="">
                        <img style="max-width: 100%" src="/assets/frontend/placeholder/partner.jpg" class="thumbnail" alt=""></a></div>
                    @endfor

                @elseif(count($partners) <= 6)
                    @foreach($partners->slice(0, 6) as $partner)
                        <div class="col-md-2 col-sm-2 col-xs-2"><a href="{{ route('about.partners.show', $partner->slug) }}">
                                <img style="max-width: 100%" src="{{$partner->thumbnail}}" class="thumbnail" alt=""></a>
                        </div>
                    @endforeach

                @elseif(count($partners) >= 7)
                    <div id="Carousel" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach($partners->chunk(6) as $chunked)
                                <div class="item">
                                    <div class="row">

                                        @foreach($chunked as $partner)
                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                <a href="{{ route('about.partners.show', $partner->slug) }}" class="thumbnail">
                                                    <img src="{{$partner->thumbnail}}" alt="Image" style="max-width:100%;"></a></div>
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