@if(App::getLocale() == 'ua')
    {{--*/
    $title = $article->title;
    $short = $article->short;
    $full = $article->full;
     /*--}}
@elseif(App::getLocale() == 'ru')
    {{--*/
    $title = $article->title_rus;
    $short = $article->short_rus;
    $full = $article->full_rus;
    /*--}}
@elseif(App::getLocale() == 'en')
    {{--*/
    $title = $article->title_eng;
    $short = $article->short_eng;
    $full = $article->full_eng;
    /*--}}
@endif

@extends('layouts.layout')

@section('description', htmlspecialchars($short))
@section('title', $title)

@section('head')
    <link href="/js/syntaxhighlighter/styles/shCore.css" rel="stylesheet">
    <link href="/js/syntaxhighlighter/styles/shThemeDefault.css" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-12 article_body">
    @if(Auth::check() && Auth::user()->role == "admin")
        <div class="text-center alert-success">
            <a href="{{ url('articles', [$article->uri, 'edit']) }}">EDIT</a>
        </div>
    @endif

    <article>
        <h2 itemprop="name" class="text-center">{{ $title }}</h2>
        <div itemprop="articleBody">{!! $full !!}</div>

        <div class="article_info">

            <div class="col-md-3">
                <span class="article_info_rate" data-score="{{ $article->rate }}">Rating: {{ $article->rate }}</span>
            </div>

            <div class="col-md-6">
                <span class="article_info_tags">
                    <ul class="list-unstyled ">
                        <strong>Tags:</strong>
                        @foreach($article->tags as $tag)
                            <li><a itemprop="url" href="{{ url('tags', $tag->name) }}">{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                </span>
            </div>
            <div class="col-md-3">
                <div class="row">

                <span class="article_info_author">
                    <strong><em>{{ trans('facade.author') }}: <a itemprop="url" rel="author" href="{{ url('users', $article->user->name) }}"><span itemprop="author">{{ $article->user->name }}</span></a></em></strong>
                </span>
                </div>
                <div class="row">
                <span class="article_info_data">
                    <strong><em class="text-muted"><time datetime="{{ $article->created_at }}" itemprop="datePublished">{{ $article->created_at }}</time></em></strong>
                </span>
                </div>
            </div>
        </div>
    </article>
</div>

<div class="col-md-12 ">
    <div class="row">
    @unless($article->comments->isEmpty())
        <div class="comments_block article_body">
            <div class="col-md-12 headerList">
                <span class="text-uppercase">{{ trans('facade.all_com') }}</span>
            </div>

            <ul class="list-unstyled text-left" itemscope itemtype="http://schema.org/UserComments">
                @foreach($article->comments as $comment)
                    <li class="list-group">
                    <h4>
                        <a itemprop="url" href="{{ url('users', $comment->user->name) }}"><span itemprop="name">{{ $comment->user->name }}</span></a>
                        <small class="text-muted">• <span itemprop="commentTime">{{ $comment->created_at }}</span></small>
                    </h4>
                    <p itemprop="commentText">{!! $comment->comment !!}</p></li>
                @endforeach
            </ul>
        </div>
    @endunless

    <div class="add_comment_block">
        @if(Auth::check())
            {!! Form::open(['url' => 'comments']) !!}
            @include('articles.comment')
            {!! Form::close() !!}
        @else
            <p><a href="{{ url('auth/login') }}" class="btn btn-info">{{ trans('facade.add_com') }}</a></p>
        @endif
    </div>

    @include('errors/list')
</div>
</div>

@endsection

@section('footer')
    <script type="text/javascript" src="/js/syntaxhighlighter/scripts/shCore.js" ></script>
    <script type="text/javascript" src="/js/syntaxhighlighter/scripts/shBrushPhp.js" ></script>
    <script type="text/javascript" src="/js/syntaxhighlighter/scripts/shBrushJScript.js" ></script>
    <script type="text/javascript" src="/js/syntaxhighlighter/scripts/shBrushPlain.js" ></script>
    <script type="text/javascript">SyntaxHighlighter.all();</script>
@endsection