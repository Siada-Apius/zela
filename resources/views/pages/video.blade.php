@extends('layouts.layout')

@section('description', 'В цьому розділі Ви зможете переглянути відеоуроки для Zend framework, що значно прискорить Ваше навчання.')
@section('title', 'Відеоуроки')

@section('content')
    <article>
        <div class="text-center"><h1>Zend Framework відеоуроки</h1></div>

        <div class="col-md-12">В цьому розділі Ви зможете переглянути відеоуроки для Zend framework, що значно прискорить Ваше навчання.</div>

        <div class="col-md-12 help-block">
            <div class="videoUnit news-article">

                <h3>Урок перший: Установка Zend Framework на Xampp</h3>

                <iframe width="560" height="315" src="http://www.youtube.com/embed/km5dAQOtWKg" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-12 help-block">
            <div class="videoUnit news-article">

                <h3>Урок другий: підключення Zend Layout та Zend MySQL налаштування</h3>

                <iframe width="560" height="315" src="http://www.youtube.com/embed/cJzaa7acKVA" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </article>
@endsection