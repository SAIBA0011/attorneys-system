<div class="form-group">
    {!! form::label('full_name', 'Full Name*') !!}
    {!! Form::input('text', 'full_name', null, ['class' => 'form-control', 'placeholder' => 'John Doe']) !!}
</div>

<div class="form-group">
    {!! form::label('job_title', 'Job Title*') !!}
    {!! Form::input('text', 'job_title', null, ['class' => 'form-control', 'placeholder' => 'Assistant']) !!}
</div>

<div class="form-group">
    {!! form::label('organisation', 'Organisation*') !!}
    {!! Form::input('text', 'organisation', null, ['class' => 'form-control', 'placeholder' => 'Company Title']) !!}
</div>

<div class="form-group">
    {!! form::label('email', 'Email Address, "Optional"') !!}
    {!! Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => 'support@email.co.za']) !!}
</div>

<div class="form-group">
    {!! form::label('contact_number', 'Contact Number, "Optional"') !!}
    {!! Form::input('text', 'contact_number', null, ['class' => 'form-control', 'placeholder' => '000 000 0000']) !!}
</div>

<div class="form-group">
    {!! form::label('website', 'Website Address, "Do not include http://"') !!}
    {!! Form::input('link', 'website', null, ['class' => 'form-control', 'placeholder' => 'www.website.co.za']) !!}
</div>

<label for="thumbnail">Speaker Thumbnail</label>
<div class="form-group input-group image-preview">
    <input type="text" name="thumbnail" value="{{ (isset($speaker->thumbnail)? $speaker->thumbnail : "") }}" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
        <span class="input-group-btn">

            <!-- image-preview-clear button -->
            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                <span class="glyphicon glyphicon-remove"></span> Clear
            </button>

            <!-- image-preview-input -->
            <div class="btn btn-default image-preview-input">
                <span class="glyphicon glyphicon-folder-open"></span>
                <span class="image-preview-input-title">Browse</span>
                <input type="file" accept="image/png, image/jpeg, image/gif"  name="thumbnail"/>
            </div>
        </span>
</div>

<div class="form-group">
    {!! form::label('bio', 'Biography') !!}
    {!! Form::textarea('bio', null, ['id' => 'bio']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit, ['class' => 'btn btn-default']) !!}
</div>