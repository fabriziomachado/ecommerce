<div class="well well-lg">
    <div class="form-group">
        {!! Form::label('category', 'Category:') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::text('tag_list', null, ['class'=>'form-control']) !!}
</div>

<div class="checkbox-inline">
    <label for="featured">
        {!! Form::checkbox('featured', 1, true) !!} Featured
    </label>
</div>
<div class="checkbox-inline">
    <label for="recommend">
        {!! Form::checkbox('recommend', 1, true) !!} Recommend
    </label>
</div>

<div class="form-group">
    {!! Form::submit($submit_button_text, ['class'=>'btn btn-primary']) !!}
    <a class="btn btn-default" href="{{ route('products.index') }}">{{ trans('app.back') }}</a>
</div>
