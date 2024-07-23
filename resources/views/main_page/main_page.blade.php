@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="container">
            <h1>Добро пожаловать!</h1>
        </div>
        <div class="container">
            <a href="{{ url("/create_card") }}" class="btn btn-primary">Создать пропуск</a>
        </div>
    </div>

@endsection
