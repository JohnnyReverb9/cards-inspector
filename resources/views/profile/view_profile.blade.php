@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-end">
            <a href="#"  class="btn btn-primary" style="width: 150px" onclick="window.history.back();">Назад</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if($user->id == Auth::user()->id)
                            {{ __("Профиль") }}
                        @else
                            {{ __("Профиль пользователя №" . $user->id) }}
                        @endif
                    </div>
                    <div class="row">
                        <div class="card-body profile-card col-md-2">
                            <label for="user_id" class="col-form-label-lg profile-label">ID сотрудника:</label>
                            <input id="user_id" name="user_id" type="text" class="form-control profile-input" value="{{ $user->id }}" readonly>
                            <label for="user_name" class="col-form-label-lg">Имя сотрудника:</label>
                            <input id="user_name" name="user_name" type="text" class="form-control profile-input" value="{{ $user->name }}" readonly>
                            <label for="user_email" class="col-form-label-lg">Email сотрудника:</label>
                            <input id="user_email" name="user_email" type="text" class="form-control profile-input" value="{{ $user->email }}" readonly>
                            @if($user->id == Auth::user()->id)
                            <label for="user_pass" class="col-form-label-lg">Пароль сотрудника:</label>
                            <input id="user_pass" name="user_pass" type="password" class="form-control profile-input-pass" value="**********" readonly>
                                <div class="col-md-12 text-center" style="width: fit-content">
                                    <br>
                                    <a href="#" class="btn btn-danger">Изменить пароль</a>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 position-relative profile-avatar">
                            <img src="{{ asset("assets/images/avatar.png") }}" alt="avatar.png" width="200" height="auto">
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
