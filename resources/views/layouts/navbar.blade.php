<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand navbar_logo" href="{{ url('/') }}">
                <div class="logo_button"></div>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('tutorial') }}">{{ trans('facade.install') }}</a></li>
                <li><a href="{{ url('video') }}">{{ trans('facade.video') }}</a></li>
                <li><a href="{{ url('articles') }}">{{ trans('facade.articles') }}</a></li>
                <!-- <li><a href="{{ url('forum') }}">{{ trans('facade.forum') }}</a></li> -->
                <li><a href="{{ url('about') }}">{{ trans('facade.about') }}</a></li>
                <li>
                    <select class="selectpicker form-control navbar-form" id="lang">
                        <option value="ua" {{ Lang::locale() === 'ua' ? 'selected' : '' }}>Українська</option>
                        <option value="ru" {{ Lang::locale() === 'ru' ? 'selected' : '' }}>Русский</option>
                        <option value="en" {{ Lang::locale() === 'en' ? 'selected' : '' }}>English</option>
                    </select>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('facade.auth') }}<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('auth/login') }}">{{ trans('facade.login') }}</a></li>
                            <li><a href="{{ url('auth/register') }}">{{ trans('facade.register') }}</a></li>
                        </ul>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('users', Auth::user()->name) }}">{{ trans('facade.info') }}</a></li>
                            <li><a href="/auth/logout">{{ trans('facade.logout') }}</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <form class="navbar-form navbar-right" method="GET" action="{{ action('SearchController@search') }}">
                <input type="text" name="query" class="form-control" placeholder="{{ trans('facade.search') }}">
            </form>
        </div>
    </div>
</nav>