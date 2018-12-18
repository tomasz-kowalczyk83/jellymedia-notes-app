<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::text('title', null, ['class' => 'form-control', 'required' => true, 'autofocus' => true, 'placeholder' => 'Give your note a title']) !!}
    @if ($errors->has('title'))
        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 15, 'required' => true, 'placeholder' => '...and here goes your note body']) !!}
    @if ($errors->has('body'))
        <span class="help-block">
            <strong>{{ $errors->first('body') }}</strong>
        </span>
    @endif
</div>
{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
