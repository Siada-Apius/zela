@section('head')
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.1/css/select2.min.css" rel="stylesheet" />
@endsection

<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}

    {!! Form::label('title_rus', 'Title RUS') !!}
    {!! Form::text('title_rus', null, ['class' => 'form-control']) !!}

    {!! Form::label('title_eng', 'Title ENG') !!}
    {!! Form::text('title_eng', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('uri', 'URI') !!}
    {!! Form::text('uri', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('short', 'Short Description') !!}
    {!! Form::textarea('short', null, ['class' => 'form-control']) !!}

    {!! Form::label('short_rus', 'Short Description RUS') !!}
    {!! Form::textarea('short_rus', null, ['class' => 'form-control']) !!}

    {!! Form::label('short_eng', 'Short Description ENG') !!}
    {!! Form::textarea('short_eng', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('full', 'Full Text') !!}
    {!! Form::textarea('full', null, ['class' => 'form-control']) !!}

    {!! Form::label('full_rus', 'Full Text RUS') !!}
    {!! Form::textarea('full_rus', null, ['class' => 'form-control']) !!}

    {!! Form::label('full_eng', 'Full Text ENG') !!}
    {!! Form::textarea('full_eng', null, ['class' => 'form-control']) !!}
</div>



<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' =>'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-success form-control']) !!}
</div>

@section('footer')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.1/js/select2.min.js"></script>
    <script>
        $('#tag_list').select2({
            placeholder: 'Pick up one'
        });
    </script>
@endsection