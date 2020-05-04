<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>@yield('title','Все заявки')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<div class="container">
    <div class="row">

        @if(Route::currentRouteAction() ==  'App\Http\Controllers\PostController@index')
            @foreach ($posts as $post)
                <h2>Заголовок заявки - {{ $post->title  }}</h2>
                <h3 >Текст - {{ $post->content  }}</h3>
                {{--<h4>{{ $post->user_id  }}</h4>--}}

                @if($post->view_post !== 1)
                    <p>Заявка не просмотренна</p>
                @else
                    <p>Заявка просмотренна</p>
                @endif

                @if($post->state_post !== 1)
                    <p>Заявка открта</p>
                @else
                    <p>Заявка закрыта</p>
                @endif

                @if($post->quantity_responses == 0)
                    <p>На данную заявку пока нет ответов</p>
                @else
                    <p>Вам ответили <strong>{{ $post->quantity_responses }}</strong> раз</p>
                @endif
                <h1>{{ $post->created_at }}</h1>
                <a href="/post/{{ $post->id  }}">подробнее</a>
                <hr>
            @endforeach
        @endif





        @include('admin.part.msg')
        @yield('content')
    </div>
</div>

</html>