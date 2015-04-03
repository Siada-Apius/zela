@extends('layouts.layout')

@section('title', 'Edit the Tag')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1 class="text-center">Edit: {!! $tag->name !!}</h1>
                {!! Form::model($tag, ['method'=> 'PATCH', 'action' => ['TagsController@update', $tag->name]]) !!}
                    @include('tags.form', ['submitButtonText' => 'Update tag'])
                {!! Form::close() !!}

                {!! Form::open(['method'=> 'DELETE', 'action' => ['TagsController@destroy', $tag->name]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}

                @include('errors.list')
            </div>
        </div>
    </div>
@endsection