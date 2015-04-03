{!! Form::hidden('article_id', $article->id)!!}
<div class="form-group">
    {!! Form::label('comment', trans('facade.your_com').':') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit( trans('facade.add_com'), ['class' => 'btn btn-success form-control']) !!}
</div>