@include('frontend.partials.header')
@include('frontend.partials.nav')

@if(Request::is('/', 'login', 'register', 'profiles/{profile}'))

@else
    <section class="page-banner" style="">
        <div class="auto-container">
            <h6 class="page-skin-header">@yield('title')</h6>
            <p style="margin-top: -20px;">@yield('intro')</p>
        </div>
    </section>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="row">
            <div class="col-md-12 clearfix">
                {{ Toastr::warning($error, $title = null, $options = []) }}
            </div>
        </div>
    @endforeach
@endif

@if (Session::has('flash_notification.message'))
    <?php
    $level = Session::get('flash_notification.level');
    if($level == 'danger')
        $level = 'error';
    Toastr::$level(Session::get('flash_notification.message'))
    ?>
@endif

@yield('content')

@include('frontend.partials.footer')