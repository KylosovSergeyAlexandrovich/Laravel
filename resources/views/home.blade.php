@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Главная</div>
                {{--TODO: если используется шаблонизатор, то лучше не юзать --}}
                <p class="alert">Вы -  <?php echo e(Auth::user()->role); ?>  </p>

                <div class="panel-body">




                    {{--TODO: status лучше переименовать в message--}}
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Вы успешно авторизованы!
                        @if(Auth::user()->role == 'manager' )
                            <p><a href="{{route('admin-panel.create')}}">создание поста</a></p>
                            <p><a href="{{route('admin-panel.index')}}">просмотр всех заявок</a></p>
                        @else
                            <p><a href="{{route('post.create')}}">создание поста</a></p>
                            <p><a href="{{route('post.index')}}">просмотр всех заявок</a></p>

                        @endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
