@extends('layouts.layout')

@section('description', $user->name . ' - edit')
@section('title', $user->name . ' - edit')

@section('content')
    <div class="row">
        <div class="col-md-12 form-horizontal">
            {!! Form::model($user, ['method'=> 'PATCH', 'action' => ['UsersController@update', $user->name]]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name', ['class' => 'col-md-2']) !!}
                <div class="col-md-6">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email', ['class' => 'col-md-2']) !!}
                <div class="col-md-6">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('first_name', 'First Name', ['class' => 'col-md-2']) !!}
                <div class="col-md-6">
                    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('last_name', 'Last Name', ['class' => 'col-md-2']) !!}
                <div class="col-md-6">
                    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('skype', 'Skype', ['class' => 'col-md-2']) !!}
                <div class="col-md-6">
                    {!! Form::text('skype', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('icq', 'ICQ', ['class' => 'col-md-2']) !!}
                <div class="col-md-6">
                    {!! Form::text('icq', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('country', 'Country', ['class' => 'col-md-2']) !!}
                <div class="col-md-6">
                    {!! Form::text('country', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('city', 'City', ['class' => 'col-md-2']) !!}
                <div class="col-md-6">
                    {!! Form::text('city', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            @if(Auth::user() && Auth::user()->role == 'admin')
                <div class="form-group">
                    {!! Form::label('role', 'Role', ['class' => 'col-md-2']) !!}
                    <div class="col-md-6">
                        {!! Form::text('role', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            @endif
            <div class="form-group">
                {!! Form::label('gender', 'Sex', ['class' => 'col-md-2']) !!}
                <div class="col-md-6">
                    {!! Form::text('gender', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('birthday', 'Birthday', ['class' => 'col-md-2']) !!}
                <div class="col-md-6">
                    {!! Form::input('date', 'birthday', date('Y-m-d'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('social', 'Social', ['class' => 'col-md-2']) !!}
                <div class="col-md-6">
                    {!! Form::text('social', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('created_at', 'Created At', ['class' => 'col-md-2']) !!}
                <div class="col-md-6">
                    {!! Form::input('date', 'created_at', date('Y-m-d'), ['class' => 'form-control', 'disabled']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('updated_at', 'Updated At', ['class' => 'col-md-2']) !!}
                <div class="col-md-6">
                    {!! Form::input('date', 'updated_at', date('Y-m-d'), ['class' => 'form-control', 'disabled']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8">
                    {!! Form::submit('Save changes', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    @include('errors.list')

@endsection