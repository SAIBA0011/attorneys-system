<div class="form-group">
    {!! form::label('title', 'Title*') !!}
    {!! Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => 'Company title']) !!}
</div>

<div class="form-group">
    {!! form::label('category_id', 'Sponsor Category*') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! form::label('email', 'Email Address, "Optional"') !!}
    {!! Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => 'support@myemail.co.za']) !!}
</div>

<div class="form-group">
    {!! form::label('contact_number', 'Contact Number, "Optional"') !!}
    {!! Form::input('text', 'contact_number', null, ['class' => 'form-control', 'placeholder' => '000 000 0000']) !!}
</div>

<div class="form-group">
    {!! form::label('website', 'Website, "Optional"') !!}
    {!! Form::input('link', 'website', null, ['class' => 'form-control',  'placeholder' => 'www.website.co.za']) !!}
</div>

<label for="thumbnail">Sponsor Thumbnail*</label>
<div class="form-group input-group image-preview">
    <input style="height: 33px;" type="text" name="thumbnail" value="{{ (isset($sponsor->thumbnail)? $sponsor->thumbnail : "") }}" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
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
    {!! form::label('description', 'Sponsor Description*') !!}
    {!! Form::textarea('description', null, ['class' => 'description form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitText, ['class' => 'btn btn-default']) !!}
</div>