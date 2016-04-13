<div class="form-group">
    {!! form::label('title', 'Title') !!}
    {!! Form::input('text', 'title', null, ['class' => 'form-control', 'id' => 'title' ,'placeholder' => 'Your slider title goes here']) !!}
</div>

<div class="form-group">
    {!! form::label('date_location', 'Date and Location') !!}
    {!! Form::input('text', 'date_location', null, ['class' => 'form-control', 'placeholder' => '00 & 00 Month Year, Venue, Location']) !!}
</div>

<label for="thumbnail">Slider background Image</label>
<div class="form-group input-group image-preview">
    <input type="text" name="thumbnail" value="{{ (isset($slider->thumbnail)? $slider->thumbnail : "") }}"
           class="form-control image-preview-filename custom-file" disabled="disabled">
        <span class="input-group-btn">

            <!-- image-preview-clear button -->
            <button type="button" class="btn btn-default image-preview-clear">
                <span class="glyphicon glyphicon-remove"></span> Clear
            </button>

            <!-- image-preview-input -->
            <div class="btn btn-default image-preview-input">
                <span class="glyphicon glyphicon-folder-open"></span>
                <span class="image-preview-input-title">Browse</span>
                <input type="file" accept="image/png, image/jpeg, image/gif" name="thumbnail"/>
            </div>
        </span>
</div>

<div class="form-group">
    {!! Form::submit($submit, ['class' => 'form-control']) !!}
</div>