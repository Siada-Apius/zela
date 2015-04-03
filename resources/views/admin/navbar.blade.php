<div class="container">
<nav class="navbar navbar-admin">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Admin Menu</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse-2">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Article <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('articles') }}">All Articles</a></li>
                        <li><a href="{{ url('articles/create') }}">Create a new Article</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tags <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('tags') }}">All Tags</a></li>
                        <li><a href="{{ url('tags/create') }}">Create a new Tag</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('users') }}">Users</a></li>
            </ul>
        </div>

</nav>
</div>