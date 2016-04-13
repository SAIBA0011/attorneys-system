<div class="divider20"></div>
<section class="light-bg section">
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-center">Newsletter <span class="highlight">Signup</span></h5>
                <p class="text-center">No Spam - Only <span class="highlight">latest news</span>, price and activity updates!</p>

                <div class="center text-center">
                    {!! Form::open(['Method' => 'Post', 'route' => 'admin.newsletter.store']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-sm-offset-2">
                            <div class="form-group">
                                {!! Form::input('text','name', null, ['class' => 'form-control text-center', 'placeholder' => 'Enter your full name', 'id' => 'name']) !!}
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                {!! Form::input('email','email', null, ['class' => 'form-control text-center', 'placeholder' => 'Enter your email address', 'id' => 'email']) !!}
                            </div>
                        </div>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-default" value="Subscribe Now">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <hr>
</section>