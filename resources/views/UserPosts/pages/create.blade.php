@extends('UserPosts.user-index')

@section('title', 'Добавить заявку')


@section('content')
    {!! Form::open(['route' => 'post.store']) !!}

        <div class="form-group">
            <div class="col-md-3">
                {{  Form::label('title', 'Загловок заявки') }}
            </div>
            <div class="col-md-9">
                {{  Form::text('title', '',['class' => 'form-control']) }}
            </div>
        </div>
    <div class="form-group">
        <div class="col-md-3">
            {{  Form::label('content', 'Текст заявки') }}
        </div>
        <div class="col-md-9">
            {{  Form::textarea('content', '',['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            {{  Form::submit('Отправить',['class' => 'btn btn-primary' ]) }}
        </div>

    </div>






    {!! Form::close() !!}
@endsection
