@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-end">
            <a href="{{ route("home") }}" class="btn btn-primary" style="width: 150px">На главную</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="container">
                            <h3>Форма создания пропуска</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route("create_card_post") }}" method="post" class="form-control-lg">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="col-md-8">
                                        <label for="full_name" class="col-form-label" style="font-size: 14px">ФИО доверенного лица</label>
                                        <input type="text" id="full_name" name="full_name" class="form-control-lg" placeholder="Введите ФИО"
                                               minlength="4" maxlength="100" style="width: 300px" required value="{{ old('full_name') }}">
                                        @error('full_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-8">
                                        <label for="flat_num" class="col-form-label" style="font-size: 14px">Номер квартиры</label>
                                        <input type="number" id="flat_num" name="flat_num" class="form-control-lg"
                                               placeholder="Введите номер квартиры" min="1" max="561" style="width: 300px" required value="{{ old('flat_num') }}">
                                        @error('flat_num')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-8">
                                        <label for="phone" class="col-form-label" style="font-size: 14px">Номер телефона</label>
                                        <input type="text" id="phone" name="phone" class="form-control-lg" placeholder="+7 (912) 345-67-89"
                                               style="width: 300px" required value="{{ old('phone') }}">
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-10">
                                        <label for="alias" class="col-form-label" style="font-size: 14px">Кому оформляется пропуск</label>
                                        <select name="alias" id="alias" style="width: 300px" class="form-control-lg form-custom-selector" required>
                                            <option value="">Выберите из списка</option>
                                            <option value="Член семьи">Член семьи</option>
                                            <option value="Арендатор">Арендатор</option>
                                            <option value="Представитель">Представитель</option>
                                            <option value="Персонал">Персонал</option>
                                            <option value="Сотрудник рабочей бригады">Сотрудник рабочей бригады</option>
                                            <option value="Другое">Другое</option>
                                        </select>
                                        <div id="other_input_container" class="col-md-10" style="display:none;">
                                            <input type="text" id="other_alias" name="other_alias" class="form-control-lg other_input" placeholder="Укажите самостоятельно" minlength="4" maxlength="100" style="width: 300px" required>
                                        </div>
                                        @error('alias')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-10">
                                        <label for="expiration" class="col-form-label" style="font-size: 14px">Дата окончания действия</label>
                                        <input type="text" id="expiration" name="expiration" style="width: 300px" class="datepicker form-control-lg"
                                               placeholder="Пусто, если бессрочно" value="{{ old('expiration') }}">
                                        @error('expiration')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-10">
                                        <label for="passport" class="col-form-label" style="font-size: 14px">Серия и номер документа, удостоверяющего личность</label>
                                        <input type="text" id="passport" name="passport" class="form-control-lg" placeholder="Паспорт / Свид. о рождении"
                                               style="width: 300px" minlength="0" maxlength="10" required value="{{ old('passport') }}">
                                        @error('passport')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 text-center" style="width: fit-content">
                                        <br>
                                        <button type="submit" class="btn btn-primary" style="width: 300px">Создать</button>
                                    </div>
                                </div>
                                <div class="col-md-5 position-relative">
                                    <img src="{{ asset("assets/images/access_card.jpg") }}" alt="access_card.jpg" width="450" height="auto">
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
            $("#expiration").inputmask({
                "placeholder": "дд.мм.гггг",
                "mask": "99.99.9999",
                "separator": ".",
                "alias": "expiration",
                "yearrange": { minyear: 2024, maxyear: 3000 }
            });

            $('#alias').on('change', function() {
                if (this.value === 'Другое') {
                    $('#other_input_container').show();
                    $('#other_alias').attr('required', true);
                } else {
                    $('#other_input_container').hide();
                    $('#other_alias').removeAttr('required');
                }
            });
        });
        </script>
    @endsection
