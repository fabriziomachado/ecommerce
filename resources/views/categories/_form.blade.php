<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit( $submit_button_text, ['class'=>'btn btn-primary']) !!}
    <a class="btn btn-default" href="{{ route('categories.index') }}">{{ trans('app.back') }}</a>
</div>