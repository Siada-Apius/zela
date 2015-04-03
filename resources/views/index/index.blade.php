@extends('layouts.layout')

@section('description', trans('facade.welcome'))
@section('title', 'Main page')

@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="greetings">
                <div class="text-center">
                    <h3>Вас радо вітають на сайті Zend-Frameworks.com!</h3>
                </div>
                <p>{{ trans('facade.welcome') }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="news_blocks">
                <div class="col-md-12 headerList">
                    <span class="text-uppercase">{{ trans('facade.new') }}</span>
                </div>

                <ul class="list-unstyled text-center">
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

                        <li>
                            <div>
                                <article>
                                <div class="news-article">
                                    <a itemprop="url" href="{{ url('articles', $article->uri ) }}"><h4 itemprop="name">{{ $title }}</h4></a>

                                    <span itemprop="description">{!! $short !!}</span>

                                    <div class="user_info">
                                        <span class="authorIcon"></span>
                                        <span rel="author" itemprop="author" class="authorName">{{ $article->user->name }}</span>

                                        <span class="commentsNumIcon"></span>
                                        <span class="commentsNum">{{ $article->votes }}</span>
                                    </div>

                                    <div class="rate" data-score="{{ $article->rate }}"></div>

                                </div>
                                    <time datetime="{{ $article->created_at }}" itemprop="datePublished" class="news-article-span text-muted">{{ $article->created_at }}</time>
                                </article>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="news-blocks best_articles">
                <div class="headerList">
                    <span class="text-uppercase">{{ trans('facade.best') }}</span>
                </div>
                <ul class="list-unstyled">
                    @foreach ( $articles_top as $top )

                        @if(App::getLocale() == 'ua')
                            {{--*/
                            $title = $top->title;
                             /*--}}
                        @elseif(App::getLocale() == 'ru')
                            {{--*/
                            $title = $top->title_rus;
                            /*--}}
                        @elseif(App::getLocale() == 'en')
                            {{--*/
                            $title = $top->title_eng;
                            /*--}}
                        @endif

                        <li>
                            <div class="best_articles">
                               <a itemprop="url" href="{{ url('articles', $top->uri) }}"><h4 itemprop="name">{{ $title }}</h4></a>
                            </div>
                        </li>
                    @endforeach
                 </ul>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="news-blocks last_comments">
                <div class="headerList">
                    <span class="text-uppercase">{{ trans('facade.last') }}</span>
                </div>
                <ul class="list-unstyled" itemscope itemtype="http://schema.org/UserComments">
                    @foreach ( $comments as $comment )

                        @if(App::getLocale() == 'ua')
                            {{--*/
                            $title = $comment->article->title;
                             /*--}}
                        @elseif(App::getLocale() == 'ru')
                            {{--*/
                            $title = $comment->article->title_rus;
                            /*--}}
                        @elseif(App::getLocale() == 'en')
                            {{--*/
                            $title = $comment->article->title_eng;
                            /*--}}
                        @endif

                        <li>
                            <strong>
                                <a itemprop="url" href="{{ url('users',  $comment->user->name ) }}"><span itemprop="name">{{  $comment->user->name  }}</span></a>
                            </strong>:
                            <a itemprop="url" href="{{ url('articles', $comment->article->uri) }}"><span itemprop="name">{{ $title }}</span></a>
                        </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection