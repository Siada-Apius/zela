@extends('layouts.layout')

@section('description', 'Tags '. $tag->name)
@section('title', 'Tags '. $tag->name)

@section('content')

    <div class="col-md-12">
        <div class="news-blocks">

        @unless($tag->articles->isEmpty())
            <h4 class="text-center">Articles by this tag:</h4>
            <ul>
                @foreach($tag->articles as $article)
                    @if(App::getLocale() == 'ua')
                        {{--*/
                        $title = $article->title;
                         /*--}}
                    @elseif(App::getLocale() == 'ru')
                        {{--*/
                        $title = $article->title_rus;
                        /*--}}
                    @elseif(App::getLocale() == 'en')
                        {{--*/
                        $title = $article->title_eng;
                        /*--}}
                    @endif

                    <li><a href="/articles/{{ $article->uri }}">{{ $title }}</a></li>
                @endforeach
            </ul>
        @endunless

        </div>
    </div>
@endsection