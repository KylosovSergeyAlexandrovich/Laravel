@extends('admin.admin-index')

@section('title', 'Просмотр заявки')


@section('content')
    {{--<h1>{{ $post->id  }}</h1>--}}
    <h2>Заголовок заявки - {{ $post->title  }}</h2>
    <h3>Текст - {{ $post->content  }}</h3>
    {{--<h4>{{ $post->user_id  }}</h4>--}}

    @if($post->view_post !== 1)
        <p>Заявка не просмотренна</p>
    @else
        <p>Заявка просмотренна</p>
    @endif

    @if($post->state_post !== 1)
        <p><a href="/post/{{ $post->id }}/edit/" style="background-color: yellowgreen">Заявка открта</a></p>
    @else
        <p style="background-color:blanchedalmond"><a style="color: red">Заявка закрыта</a></p>
    @endif

    @if($post->quantity_responses == 0)
        <p>На данную заявку пока нет ответов</p>
    @else
        <p>Вам ответили <strong>{{ $post->quantity_responses }}</strong> раз</p>
    @endif
    {{$post->created_at}}

@endsection







