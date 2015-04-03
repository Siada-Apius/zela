@extends('layouts.layout')

@section('title', 'Create a new tag')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <h1 class="text-center">Add a new tag</h1>
            {!! Form::open(['url' => 'tags']) !!}
                @include('tags.form', ['submitButtonText' => 'Add tag'])
            {!! Form::close() !!}

            @include('errors/list')
        </div>
    </div>

@endsection