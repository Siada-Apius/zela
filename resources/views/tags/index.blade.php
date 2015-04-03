@extends('layouts.layout')

@section('description', 'Tags')
@section('title', 'Tags')

@section('content')
    <div class="col-md-12">
        <div class="news-blocks">
            <table class="table table-responsive table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Tag name</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ( $tags as $tag )
                    <tr>
                        <td><a href="{{ url('tags', $tag->name) }}">{{ $tag->name }}</a></td>
                        <td><a href="{{ url('tags', [$tag->name, 'edit']) }}">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection