@extends('adminlte::page')

@section('title', 'Создать валюту')

@section('content_header')
    <h1>Создать валюту</h1>
@stop

@section('content')
    <div class="card">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('admin.currencies.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="currencyName">Название валюты</label>
                    <input type="text" name="name" class="form-control" id="currencyName" style="width: 600px;" required>
                </div>
                <div class="form-group">
                    <label for="currencySign">Символ валюты (например <a href="#" onclick="putSign('$');return false;">$</a> или <a href="#" onclick="putSign('₽');return false;">₽</a>)</label>
                    <input type="text" name="sign" class="form-control" id="currencySign" style="width: 600px;" required>
                </div>
                <h4>База данных</h4>
                <div class="form-group">
                    <label for="currencyConnection">Подключение (Подробнее про подключения в <a href="https://laravel.com/docs/8.x/database">документации</a>)</label>
                    <select class="form-control" id="currencyConnection" name="connection" style="width: 600px" required>
                        @foreach($connections as $key => $connection)
                            @if($key === Illuminate\Support\Facades\DB::getDefaultConnection())
                                <option selected
                                        value="{{$connection['connection']}}">{{$connection['connection']}}</option>
                            @else
                                <option
                                    value="{{$connection['connection']}}">{{$connection['connection']}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="currencyTable">Название таблицы</label>
                    <input type="text" name="table" class="form-control" id="currencyTable" style="width: 600px;" required>
                </div>
                <div class="form-group">
                    <label for="currencyField">Название поля</label>
                    <input type="text" name="field" class="form-control" id="currencyField" style="width: 600px;" required>
                </div>
                <div class="form-group">
                    <label for="currencyUserIdentityField">Поле идентификации пользователя</label>
                    <input type="text" name="user_identity_field" class="form-control" id="currencyUserIdentityField" style="width: 600px;" required>
                </div>
                <div class="form-group">
                    <label for="currencyUserIdentityType">Тип идентификации пользователя</label>
                    <select class="form-control" id="currencyUserIdentityType" name="user_identity_type" style="width: 600px" required>
                        <option value="0">ID пользователя на сайте</option>
                        <option value="1">Имя пользователя на сайте</option>
                        <option value="2">Email пользователя на сайте</option>
                        <option value="3">SteamID пользователя</option>
                        <option value="4">SteamID64 пользователя</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Добавить валюту</button>
            </div>
        </form>
    </div>
@stop
@section('js')
    <script>
        function putSign(sign) {
            $('#currencySign').val(sign);
        }
    </script>
@endsection
