@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="container">
                            <h3>Форма создания пропуска</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/create_card" method="post" class="form-control-lg">
                            <div class="row">
                                <div class="col-md-7">
                                    <img src="{{ asset("assets/images/access_card.jpg") }}" alt="access_card.jpg" width="450" height="auto">
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-8">
                                        <label for="full_name" class="col-form-label" style="font-size: 14px">ФИО доверенного лица</label>
                                        <input type="text" id="full_name" name="full_name" class="form-control-lg" placeholder="Введите ФИО"
                                               minlength="4" maxlength="100" style="width: 300px" required>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="flat_num" class="col-form-label" style="font-size: 14px">Номер квартиры</label>
                                        <input type="text" id="flat_num" name="flat_num" class="form-control-lg"
                                               placeholder="Введите номер квартиры" min="0" max="561" style="width: 300px" required>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="phone" class="col-form-label" style="font-size: 14px">Номер телефона</label>
                                        <input type="text" id="phone" name="phone" class="form-control-lg" placeholder="+7 (912) 345-67-89"
                                               style="width: 300px" required>
                                    </div>
                                    <div class="col-md-12 text-center" style="width: fit-content">
                                        <br>
                                        <button type="submit" class="btn btn-primary">Создать</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#flat_num").inputmask({"mask": "999"})
            $("#phone").inputmask({"mask": "+7 (999) 999-99-99"});
        });
    </script>
@endsection
