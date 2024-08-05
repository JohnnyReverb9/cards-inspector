@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-end">
            <a href="#"  class="btn btn-primary" style="width: 150px" onclick="window.history.back();">Назад</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __("Профиль") }}</div>
                        <div class="row">
                            <div class="card-body profile-card col-md-2">
                                <label for="user_id" class="col-form-label-lg profile-label">ID сотрудника:</label>
                                <input id="user_id" name="user_id" type="text" class="form-control profile-input" value="{{ $user->id }}" readonly>
                                <label for="user_name" class="col-form-label-lg">Имя сотрудника:</label>
                                <input id="user_name" name="user_name" type="text" class="form-control profile-input" value="{{ $user->name }}" readonly>
                                <label for="user_email" class="col-form-label-lg">Email сотрудника:</label>
                                <input id="user_email" name="user_email" type="text" class="form-control profile-input" value="{{ $user->email }}" readonly>
                                <label for="user_email" class="col-form-label-lg">Пароль сотрудника:</label>
                                <input id="user_email" name="user_email" type="password" class="form-control profile-input" value="**********" readonly>
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
        $('.profile-input').onclick(function() {
            var temp = $("<input>");
            $("body").append(temp);
            temp.val($('.profile-input').text()).select();
            document.execCommand("copy");
            temp.remove();
        });
    </script>

@endsection
