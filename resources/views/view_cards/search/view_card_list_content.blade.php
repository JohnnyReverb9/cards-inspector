@forelse($card_list as $card)
    <div class="card card-in-list" style="margin: 10px; position: relative; cursor: pointer;" onclick="window.location='{{ url('/view_card', $card->id) }}';">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $card->id }}</p>
            <p><strong>ФИО:</strong> {{ $card->full_name }}</p>
            <p><strong>Номер квартиры:</strong> {{ $card->flat_num }}</p>
            <p><strong>Дата окончания:</strong> @if($card->expiration == null) Бессрочно @endif {{ $card->expiration }}</p>
            <p><strong>Добавил сотрудник:</strong>
                <a style="color: inherit;" href="{{ url('/user_profile/' . $card->staff_add) }}">
                    {{ $users[$card->staff_add]->name . " (email: " . $users[$card->staff_add]->email . ")" }}
                </a>
            </p>
        </div>
    </div>
@empty
    <div class="card-body">
        {{ __("Нет данных для отображения") }}
    </div>
@endforelse

<div class="pagination-wrapper">
    {{ $card_list->links() }}
</div>
