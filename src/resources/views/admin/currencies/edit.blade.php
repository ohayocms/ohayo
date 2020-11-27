@extends('adminlte::page')

@section('title', 'Редактирование валюты')

@section('content_header')
    <h1>Редактирование валюты</h1>
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
        <form action="{{route('admin.currencies.update', ['id' => $currency->id])}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="currencyName">Название валюты</label>
                    <input type="text" name="name" class="form-control" value="{{$currency->name}}" id="currencyName" style="width: 600px;" required>
                </div>
                <div class="form-group">
                    <label for="currencySign">Символ валюты (например <a href="#" onclick="putSign('$');return false;">$</a> или <a href="#" onclick="putSign('₽');return false;">₽</a>)</label>
                    <input type="text" name="sign" class="form-control" value="{{$currency->sign}}" id="currencySign" style="width: 600px;" required>
                </div>
                <h4>База данных</h4>
                <div class="form-group">
                    <label for="currencyConnection">Подключение (Подробнее про подключения в <a href="https://laravel.com/docs/8.x/database">документации</a>)</label>
                    <select class="form-control" id="currencyConnection" name="connection" style="width: 600px" required>
                        @foreach($connections as $key => $connection)
                            @if($connection['connection'] === $currency->$connection)
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
                    <input type="text" name="table" value="{{$currency->table}}" class="form-control" id="currencyTable" style="width: 600px;" required>
                </div>
                <div class="form-group">
                    <label for="currencyField">Название поля</label>
                    <input type="text" name="field" value="{{$currency->field}}" class="form-control" id="currencyField" style="width: 600px;" required>
                </div>
                <div class="form-group">
                    <label for="currencyUserIdentityField">Поле идентификации пользователя</label>
                    <input type="text" name="user_identity_field" class="form-control" id="currencyUserIdentityField" value="{{$currency->user_identity_field}}" style="width: 600px;" required>
                </div>
                <div class="form-group">
                    <label for="currencyUserIdentityType">Тип идентификации пользователя</label>
                    <select class="form-control" id="currencyUserIdentityType" name="user_identity_type" style="width: 600px" required>
                        <option value="0" @if($currency->user_identity_type === 0) selected @endif>ID пользователя на сайте</option>
                        <option value="1" @if($currency->user_identity_type === 1) selected @endif>Имя пользователя на сайте</option>
                        <option value="2" @if($currency->user_identity_type === 2) selected @endif>Email пользователя на сайте</option>
                        <option value="3" @if($currency->user_identity_type === 3) selected @endif>SteamID пользователя</option>
                        <option value="4" @if($currency->user_identity_type === 4) selected @endif>SteamID64 пользователя</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Обновить валюту</button>
                <a href="{{route('admin.currencies.delete', ['id' => $currency->id])}}" class="btn btn-danger">Удалить</a>
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
