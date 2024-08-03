@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __("Список всех пропусков") }}</div>
                        <div class="card-body">
                        @forelse($card_list as $card)
                            <div class="card" style="margin: 10px; position: relative; cursor: pointer;" onclick="window.location='{{ url('/view_card', $card->id) }}';">
                                <div class="card-body">
                                    <p><strong>Имя:</strong> {{ $card->full_name }}</p>
                                    <p><strong>Номер квартиры:</strong> {{ $card->flat_num }}</p>
                                    <p><strong>Телефон:</strong> {{ $card->phone }}</p>
                                    <p><strong>Псеводним:</strong> {{ $card->alias }}</p>
                                    <p><strong>Дата окончания:</strong>@if($card->expiration == null) Бессрочно @endif {{ $card->expiration }}</p>
                                    <p><strong>Паспорт / свидетельство о рождении:</strong> {{ $card->passport }}</p>
                                    <p><strong>Добавил сотрудник:</strong> {{ $users[$card->staff_add]->name . " (ID: " . $card->staff_add . "; email: " . $users[$card->staff_add]->email . ")" }}</p>
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
