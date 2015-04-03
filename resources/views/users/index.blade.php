@extends('layouts.layout')

@section('description', 'users page')
@section('title', 'Users page')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="news-blocks">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>View user page</th>
                    <th>Edit</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach ( $users as $user )
                    <tr @if($user->role == "admin") class="success" @endif>
                        <td>
                            <a href="{{ url('users', $user->name) }}">{{ $user->name }}</a>
                        </td>
                        <td><a href="{{ url('users', [$user->name, 'edit']) }}">edit</a></td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection