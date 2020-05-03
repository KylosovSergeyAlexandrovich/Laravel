@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Главная</div>
                <p class="alert">Вы -  <?php echo e(Auth::user()->role); ?></p>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Вы успешно авторизованы!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
