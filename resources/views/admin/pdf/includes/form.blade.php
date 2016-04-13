<div class="form-group">
    {!! form::label('title', 'PDF Title') !!}
    {!! Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => 'Summary']) !!}
</div>

<label for="file">Upload Document*</label>
<div class="form-group input-group">
    <input style="height: 33px;" type="text" name="file" value="" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
        <span class="input-group-btn">

            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                <span class="glyphicon glyphicon-remove"></span> Clear
            </button>

            <div class="btn btn-default image-preview-input">
                <span class="glyphicon glyphicon-folder-open"></span>
                <span class="image-preview-input-title">Browse</span>
                <input  type="file" accept="application/pdf"  name="file"/>
            </div>
        </span>
</div>

<div class="form-group">
    {!! Form::submit('Upload File', ['class' => 'btn btn-xs btn-default']) !!}
</div>