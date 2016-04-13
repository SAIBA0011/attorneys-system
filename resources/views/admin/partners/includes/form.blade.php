<div class="form-group">
    {!! form::label('title', 'Title') !!}
    {!! Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => 'Company Title']) !!}
</div>

<div class="form-group">
    {!! form::label('email', 'Email Address') !!}
    {!! Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => 'support@email.co.za']) !!}
</div>

<div class="form-group">
    {!! form::label('contact_number', 'Contact Number') !!}
    {!! Form::input('text', 'contact_number', null, ['class' => 'form-control', 'placeholder' => '000 000 0000']) !!}
</div>

<div class="form-group">
    {!! form::label('website', 'Website') !!}
    {!! Form::input('link', 'website', null, ['class' => 'form-control', 'placeholder' => 'www.website.co.za']) !!}
</div>

<label for="thumbnail">Partner Thumbnail,  <i>Required size: 400W X 200H</i></label>
<div class="form-group input-group image-preview">
    <input style="height: 33px;" type="text" name="thumbnail" value="{{ (isset($partner->thumbnail)? $partner->thumbnail : "") }}" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
        <span class="input-group-btn">

            <!-- image-preview-clear button -->
            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                <span class="glyphicon glyphicon-remove"></span> Clear
            </button>

            <!-- image-preview-input -->
            <div class="btn btn-default image-preview-input">
                <span class="glyphicon glyphicon-folder-open"></span>
                <span class="image-preview-input-title">Browse</span>
                <input  type="file" accept="image/png, image/jpeg, image/gif"  name="thumbnail"/>
            </div>
        </span>
</div>

<div class="form-group">
    {!! form::label('description', 'Description') !!}
    {!! Form::textarea('description', null, ['class' => 'description form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit, ['class' => 'btn btn-default']) !!}
</div>