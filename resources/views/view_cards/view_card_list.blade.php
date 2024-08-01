@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __("Список всех пропусков") }}</div>
                    @forelse($card_list as $card)
                        <div class="card-body">
                            <p><strong>Имя:</strong> {{ $card->full_name }}</p>
                            <p><strong>Номер квартиры:</strong> {{ $card->flat_num }}</p>
                            <p><strong>Телефон:</strong> {{ $card->phone }}</p>
                            <p><strong>Псеводним:</strong> {{ $card->alias }}</p>
                            <p><strong>Дата окончания:</strong> {{ $card->expiration }}</p>
                            <p><strong>Паспорт / свидетельство о рождении:</strong> {{ $card->passport }}</p>
                            <p><strong>Добавил сотрудник:</strong> {{ $card->staff_add }}</p>
                        </div>
                    @empty
                        <div class="card-body">
                            {{ __("Нет данных для отображения") }}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
