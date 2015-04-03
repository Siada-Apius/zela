@extends('layouts.layout')

@section('title', 'Всі статті')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="article_blocks">
                <div class="col-md-12 headerList">
                    <span class="text-uppercase">{{ trans('facade.all_art') }}</span>
                </div>

                <ul class="list-unstyled text-left">
                    @foreach ( $articles as $article )

                        @if(App::getLocale() == 'ua')
                            {{--*/
                            $title = $article->title;
                            $short = $article->short;
                             /*--}}
                        @elseif(App::getLocale() == 'ru')
                            {{--*/
                            $title = $article->title_rus;
                            $short = $article->short_rus;
                            /*--}}
                        @elseif(App::getLocale() == 'en')
                            {{--*/
                            $title = $article->title_eng;
                            $short = $article->short_eng;
                            /*--}}
                        @endif

                        <li class="list-group">
                            <article>
                                <div class="news-article">
                                    <h4 itemprop="name"><a href="{{ url('articles', $article->uri ) }}">{{ $title }}</a></h4>
                                    <span itemprop="description">{!! $short !!}</span>

                                    <div class="article_info">

                                        <div class="col-md-3">
                                            <span class="article_info_rate" data-score="{{ $article->rate }}">Rating: {{ $article->rate }}</span>
                                        </div>

                                        <div class="col-md-6">
                                            <span class="article_info_tags">
                                                <ul class="list-unstyled ">
                                                    <strong>Tags:</strong>
                                                    @foreach($article->tags as $tag)
                                                        <li><a href="{{ url('tags', $tag->name) }}">{{ $tag->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="article_info_author">
                                                <strong><em>{{ trans('facade.author') }}: <a rel="author" href="{{ url('users', $article->user->name) }}">{{ $article->user->name }}</a></em></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="text-center">{!! $articles->render() !!}</div>

        </div>
    </div>
@endsection