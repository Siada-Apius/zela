@extends('layouts.layout')

@section('description', $user->name)
@section('title', $user->name)

@section('content')
    <div class="userBlock user_info">
        <div class="row">
            <div class="col-md-6">
                @if(Auth::check())
                    @if(Auth::user()->id == $user->id || Auth::user()->role == 'admin')
                <div class="text-left"><a href="{{ url('users', [$user->name, 'edit']) }}">Edit data</a></div>
                    @endif
                @endif
                <div class="text-center"><h4>User info: <strong>{{ $user->name }}</strong></h4></div>

                <table class="table table-striped table-bordered table-condensed">
                    <tr>
                        <td>Name</td>
                        <td>{!! $user->name ? $user->name : '<em>(empty field)</em>' !!}</td>
                    </tr>
                    @if(Auth::check())
                        @if(Auth::user()->email == $user->email || Auth::user()->role == 'admin')
                            <tr>
                                <td>Email</td>
                                <td>
                                    {!! $user->email ? $user->email : '<em>(empty field)</em>' !!}
                                </td>
                            </tr>
                        @endif
                    @endif
                    <tr>
                        <td>First Name</td>
                        <td>{!! $user->first_name ? $user->first_name : '<em>(empty field)</em>' !!}</td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>{!! $user->last_name ? $user->last_name : '<em>(empty field)</em>' !!}</td>
                    </tr>
                    <tr>
                        <td>Skype</td>
                        <td>{!! $user->skype ? $user->skype : '<em>(empty field)</em>' !!}</td>
                    </tr>
                    <tr>
                        <td>ICQ</td>
                        <td>{!! $user->icq ? $user->icq : '<em>(empty field)</em>' !!}</td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>{!! $user->country ? $user->country : '<em>(empty field)</em>' !!}</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>{!! $user->city ? $user->city : '<em>(empty field)</em>' !!}</td>
                    </tr>
                    @if(Auth::check() && Auth::user()->role == 'admin')
                    <tr>
                        <td>Role</td>
                        <td>{!! $user->role ? $user->role : '<em>(empty field)</em>' !!}</td>
                    </tr>
                    @endif
                    <tr>
                        <td>Sex</td>
                        <td>{!! $user->gender ? $user->gender : '<em>(empty field)</em>' !!}</td>
                    </tr>
                    <tr>
                        <td>Birthday</td>
                        <td>{!! $user->birthday ? $user->birthday : '<em>(empty field)</em>' !!}</td>
                    </tr>
                    <tr>
                        <td>Social</td>
                        <td>{!! $user->social ? $user->social : '<em>(empty field)</em>' !!}</td>
                    </tr>
                </table>
            </div>

            @unless($params->isEmpty())
            <div class="col-md-6">
                <div class="comment_block">
                <div class="text-center"><h4>User's comments</h4></div>
                <ul class="list-unstyled">
                    @foreach($params as $param)
                    <li>
                        <hr>
                        <h4>article: <a href="{{ url('articles', $param->article->uri) }}">{{ $param->article->title }}</a></h4>
                        <p>comment: {!! $param->comment !!}</p>
                    </li>
                    @endforeach
                </ul>
                </div>
            </div>
            @endunless
        </div>

        @unless($user->articles->isEmpty())
        <div class="row">
            <div class="col-md-12">
                <div class="text-center"><h4>User's articles</h4></div>

                <table class="table table-striped table-bordered table-condensed">
                    @foreach($user->articles as $article)
                    <tr>
                        <td><a href="{{ url('articles', $article->uri) }}">{{ $article->title }}</a></td>
                        @if(Auth::check() && Auth::user()->role == 'admin')
                            <td><a href="{{ url('articles', [$article->uri, 'edit']) }}">Edit</a></td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @endunless
    </div>
@endsection