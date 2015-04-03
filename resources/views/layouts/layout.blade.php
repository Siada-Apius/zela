<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    <header>
        @include('layouts.navbar')

        @if(Auth::user() && Auth::user()->role == 'admin')
            @include('admin.navbar')
        @endif
    </header>

    <section>
        <div class="container" itemscope itemtype="http://schema.org/Article">
            @yield('content')
        </div>
    </section>

    <footer class="footer">
        @include('layouts.footer')
    </footer>
</body>
</html>
