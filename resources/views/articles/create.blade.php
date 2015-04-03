@extends('layouts.layout')

@section('title', 'Create a new article')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('errors/list')

                <h1 class="text-center">Add a new article</h1>
                {!! Form::open(['url' => 'articles']) !!}
                    @include('articles/form', ['submitButtonText' => 'Add article'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection