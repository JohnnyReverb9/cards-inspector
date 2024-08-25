@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="row justify-content-end" style="margin-bottom: 15px;">
            <div class="col-md-7" style="padding-left: 77px;">
                <input type="text" id="search_cards" name="search_cards" class="form-control" placeholder="ID, ФИО, номер квартиры...">
            </div>
            <div class="col-md-2"  style="margin-right: 25px;">
                <button id="search_button" class="btn btn-primary" style="width: 150px;">Поиск</button>
            </div>
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
                @if (session("success"))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ session("success") }}</li>
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        {{ __("Список всех пропусков") }}
                    </div>
                    <div class="card-body" id="search_results">
                        @include('view_cards/search/view_card_list_content', ["card_list" => $card_list, "users" => $users])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                search(page);
            });

            function search(page = 1) {
                var query = $('#search_cards').val();
                $.ajax({
                    url: '{{ route("view_cards") }}',
                    type: 'GET',
                    data: { search: query, page: page },
                    success: function(response) {
                        $('#search_results').html(response.html);
                    }
                });
            }

            $('#search_button').on('click', function(e) {
                e.preventDefault();
                search();
            });

            $('#search_cards').on('keypress', function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                    search();
                }
            });
        });
    </script>

@endsection
