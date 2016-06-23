<section style="max-height: 615px;">
    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 400px; overflow: hidden;">

            @if(count($slides))
                @foreach($slides as $slide)
                    <div data-p="225.00" style="display: none;">
                        <img data-u="image" src="{{ $slide->thumbnail }}"/>
                        @if($slide->title)
                            <div class="text-container">
                                <center>
                                    <div class="intro-text text-center">
                                        <h6 style="margin-bottom: 0px; font-size: 23px; font-weight: normal; font-family: sans-serif;" class="custom-font highlight">{{ str_limit($slide->title, 68) }}</h6>
                                        <p>{{ $slide->date_location }}</p>
                                    </div>
                                </center>
                            </div>
                        @endif
                    </div>
                @endforeach
                @else
                <div data-p="225.00" style="display: none;">
                    <img data-u="image" src="/assets/frontend/images/uni.jpg"/>
                    <div class="text-container">
                        <center>
                            <div class="intro-text text-center">
                                <h6 style="margin-bottom: 0px; font-size: 23px; font-weight: normal; font-family: sans-serif;" class="custom-font highlight">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h6>
                                <p>00 & 00 Month Year, Venue, Location</p>
                            </div>
                        </center>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>