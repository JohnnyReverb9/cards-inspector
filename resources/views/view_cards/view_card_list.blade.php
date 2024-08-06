@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="row justify-content-end">
            <a href="{{ route("home") }}" class="btn btn-primary" style="width: 150px">На главную</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __("Список всех пропусков") }}</div>
                        <div class="card-body">
                        @forelse($card_list as $card)
                            <div class="card card-in-list" style="margin: 10px; position: relative; cursor: pointer;" onclick="window.location='{{ url('/view_card', $card->id) }}';">
                                <div class="card-body">
                                    <p><strong>ФИО:</strong> {{ $card->full_name }}</p>
                                    <p><strong>Номер квартиры:</strong> {{ $card->flat_num }}</p>
                                    <p><strong>Дата окончания:</strong>@if($card->expiration == null) Бессрочно @endif {{ $card->expiration }}</p>
                                    <p><strong>Добавил сотрудник:</strong> <a style="color: inherit;" href="{{ url('/user_profile/' . $card->staff_add) }}">{{ $users[$card->staff_add]->name . " (email: " . $users[$card->staff_add]->email . ")" }}</a></p>
                                </div>
                            </div>
                        @empty
                        </div>
                        <div class="card-body">
                            {{ __("Нет данных для отображения") }}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
