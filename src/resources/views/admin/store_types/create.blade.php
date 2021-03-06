@extends('adminlte::page')

@section('title', 'Создать тип товара')

@section('content_header')
    <h1>Создать тип товара</h1>
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
        <form action="{{route('admin.store_types.store')}}" method="POST">
            @csrf
            <div class="card-body row">
                <div class="col col-6">
                    <div class="form-group">
                        <label for="storeItemTypeName">Название типа</label>
                        <input type="text" name="name" class="form-control" id="storeItemTypeName" required>
                    </div>
                    <div class="form-group">
                        <label for="storeItemTypeGameSelect">Выберите игру</label>
                        <select class="form-control" id="storeItemTypeGameSelect" required name="game_id">
                            @foreach($games as $game)
                                <option value="{{$game->id}}">{{$game->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="storeItemTypeQuery">Запрос</label>
                        <input type="text" name="query" class="form-control" id="storeItemTypeQuery" required>
                    </div>
                </div>
                <div class="col col-6">
                    <h4>Список переменных</h4>
                    <div class="alert alert-info">
                        <p class="text-bold">Использование переменных в запросе</p>
                        Для использования переменных в запросе напишите {%название_переменной%} и убедитесь что такая переменная существует. <br>
                        Например: <br>
                        <pre>UPDATE {%table%} SET {%credits_field%}={%credits_field%}+{%value%} WHERE {%user_steam_id_field%}={%user_steam_id%}</pre> <br>
                        <p class="text-bold">Существующие переменные:</p>
                        {%value%} - По умолчанию 1. Перезапишите эту переменную, если нужно указать другой тип/количество. <br>
                        {%user_id%} - ID пользователя на сайте <br>
                        {%user_steam_id%} и {%user_steam_id_64%} - STEAM_0.0... и 765611... ID пользователя Steam. Может отсутствовать, если он авторизовался не через Steam. В таком случае он не сможет нажать на кнопку "Купить", его попросят привязать аккаунт. <br>
                        {%user_email%} - Email пользователя на сайте <br>
                        {%user_name%} - Имя пользователя на сайте <br><br>
                        <p class="text-bold">Использование Connections</p>
                        Если не указано подключение в переменных - будет использовано дефолтное подключение к базе данных. <br>
                        Подробнее про подключения в Laravel смотрите <a href="https://laravel.com/docs/8.x/database">документацию</a>.
                    </div>
                    <table class="table">
                        <thead>
                        <td>Название</td>
                        <td>Значение</td>
                        <td></td>
                        </thead>
                        <tbody id="vars_table">
                        <tr id="variable_0">
                            <td><input type="text" name="storeItemVariablesNames[0]" value="connection"
                                       class="form-control" required></td>
                            <td>
                                <select class="form-control" name="storeItemVariablesValues[0]">
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
                            </td>
                            <td><a href="#" onclick="removeVariable(0);return false;" class="btn btn-danger">Удалить</a></td>
                        </tr>
                        <tr id="variable_1">
                            <td><input type="text" name="storeItemVariablesNames[1]" value="table" class="form-control"
                                       required></td>
                            <td><input type="text" name="storeItemVariablesValues[1]" class="form-control" required></td>
                            <td><a href="#" onclick="removeVariable(1);return false;" class="btn btn-danger">Удалить</a></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="table-footer">
                        <a href="#" style="margin-left:10px;" class="btn btn-primary"
                           onclick="addNewVariable();return false;">Добавить переменную</a>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Добавить тип товара</button>
            </div>
        </form>
    </div>
@stop
@section('js')
    <script>
        let numVariables = 1;
        function addNewVariable() {
            ++numVariables;
            let i = numVariables;
            $('#vars_table').append('<tr id="variable_'+i+'">\n' +
                '                        <td><input type="text" name="storeItemVariablesNames['+i+']" class="form-control" required></td>\n' +
                '                        <td><input type="text" name="storeItemVariablesValues['+i+']" class="form-control" required></td>\n' +
                '                        <td><a href="#" onclick="removeVariable('+i+');return false;" class="btn btn-danger">Удалить</a></td>\n' +
                '                    </tr>');
        }

        function removeVariable(i)
        {
            $('#variable_'+i).remove();
        }
    </script>
@endsection
