@include('admin.partials.header')
@include('admin.partials.sidebar')
@yield('content')

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

@include('admin.partials.footer')