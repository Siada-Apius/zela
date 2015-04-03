@extends('layouts.layout')

@section('title', 'Edit the article')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('errors.list')

                <h1 class="text-center">Edit: {!! $article->title !!}</h1>
                {!! Form::model($article, ['method'=> 'PATCH', 'action' => ['ArticlesController@update', $article->uri]]) !!}
                    @include('articles.form', ['submitButtonText' => 'Update article'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection