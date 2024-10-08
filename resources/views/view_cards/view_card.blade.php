@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="row justify-content-end">
            <a href="#"  class="btn btn-primary" style="width: 150px" onclick="window.history.back();">Назад</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session("success"))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ session("success") }}</li>
                        </ul>
                    </div>
                @endif
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
                    <div class="card-header">
                        {{ __("Постоянный пропуск №" . $card->id . "- квартира №" . $card->flat_num) }}
                    </div>
                    <div class="row">
                        <div class="card-body profile-card col-md-2">
                            <label for="card_id" class="col-form-label-lg profile-label">ID пропуска:</label>
                            <input id="card_id" name="card_id" type="text" class="form-control profile-input" value="{{ $card->id }}" readonly>
                            <label for="cardholder_name" class="col-form-label-lg">ФИО доверенного лица:</label>
                            <input id="cardholder_name" name="cardholder_name" type="text" class="form-control profile-input" value="{{ $card->full_name }}" readonly>
                            <label for="flat_num" class="col-form-label-lg">Номер квартиры:</label>
                            <input id="flat_num" name="flat_num" type="text" class="form-control profile-input" value="{{ $card->flat_num }}" readonly>
                            <label for="phone" class="col-form-label-lg">Номер телефона:</label>
                            <input id="phone" name="phone" type="text" class="form-control profile-input" value="{{ $card->phone }}" readonly>
                            <label for="alias" class="col-form-label-lg">На кого оформлен пропуск:</label>
                            <input id="alias" name="alias" type="text" class="form-control profile-input" value="{{ $card->alias }}" readonly>
                            <label for="expiration" class="col-form-label-lg">Дата окончания действия:</label>
                            <input id="expiration" name="expiration" type="text" class="form-control profile-input" placeholder="Бессрочно" value="{{ $card->expiration }}" readonly>
                            <label for="passport" class="col-form-label-lg">Паспорт / свидетельство о рождении:</label>
                            <input id="passport" name="passport" type="text" class="form-control profile-input" value="{{ $card->passport }}" readonly>
                            <label for="staff_add" class="col-form-label-lg">Добавил сотрудник:</label>
                            <input id="staff_add" name="staff_add" type="text" class="form-control profile-input" value="{{ $users[$card->staff_add]->name . " (ID: " . $users[$card->staff_add]->id . "; email: " . $users[$card->staff_add]->email . ")" }}" readonly>
                            <div class="col-md-12 text-center" style="width: fit-content">
                                <br>
                                <a href="{{ url("/delete_card", $card->id) }}" type="delete" class="btn btn-danger">Аннулировать пропуск</a>
                            </div>
                        </div>
                        <div class="col-md-4 position-relative view-card-avatar">
                            <img src="{{ asset("assets/images/view_access_card.png") }}" alt="avatar.png" width="300" height="auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.profile-input').click(function() {
                $(this).select();
                document.execCommand("copy");
                let notification = $('<div>Значение скопировано</div>');
                notification.css({
                    position: 'fixed',
                    bottom: '20px',
                    right: '20px',
                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                    color: '#fff',
                    padding: '10px 20px',
                    borderRadius: '5px',
                    zIndex: '1000',
                    opacity: '1',
                    transition: 'opacity 1s ease-in-out'
                });
                $('body').append(notification);
                setTimeout(function() {
                    notification.css('opacity', '0');
                    setTimeout(function() {
                        notification.remove();
                    }, 1000);
                }, 1000);
            });
        });
    </script>
@endsection
