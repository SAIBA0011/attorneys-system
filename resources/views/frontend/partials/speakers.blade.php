<section class="section dark section">
    <div class="container">
        <div class="divider20"></div>
        @if(count($speakers))
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        @foreach($speakers->slice(0, 4) as $speaker)
                            <div class="col-xs-6 col-md-3">
                                <div class="thumbnail">
                                    <img style="min-width: 100%;" src="{{$speaker->thumbnail}}">
                                    <div class="caption text-center">
                                        <a href="{{route('speakers.show', $speaker->slug)}}">
                                            <h8>{{str_limit($speaker->full_name, '20')}}</h8>
                                            <hr style="margin-top: 5px; margin-bottom: 5px">
                                            <p>{{str_limit($speaker->organisation, 30)}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="divider20"></div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="{{route('speakers')}}" class="btn btn-default">I would like to see more speakers</a>
                </div>
            </div>
        @else
        @endif
    </div>
</section>