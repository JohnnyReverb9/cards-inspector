@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Панель управления') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

{{--                    {{ __('You are logged in!') }}--}}
                        <div class="container">
                            <div class="container">
                                <h1>Добро пожаловать, {{ Auth::user()->name }}!</h1>
                            </div>
                            <div class="container">
                                <h3>Выберите действие:</h3>
                            </div>
                            <div class="container">
                                <div class="container m-md-3">
                                    <a href="{{ route("view_cards") }}" class="btn btn-primary" style="width: 250px">Показать созданные пропуска</a>
                                </div>
                                <div class="container m-md-3">
                                    <a href="{{ route("create_card") }}" class="btn btn-primary" style="width: 250px">Создать пропуск</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
