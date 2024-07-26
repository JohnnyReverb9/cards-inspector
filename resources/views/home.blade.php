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
                                <a href="{{ url("/create_card") }}" class="btn btn-primary">Создать пропуск</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
