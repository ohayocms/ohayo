@extends('adminlte::page')

@section('title', 'Редактирование сервера')

@section('content_header')
    <h1>Редактирование сервера</h1>
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
        <form action="{{route('admin.servers.update', ['id' => $server->id])}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="serverName">Название сервера</label>
                    <input type="text" name="name" class="form-control" value="{{$server->name}}" id="serverName" style="width: 600px;" required>
                </div>
                <div class="form-group">
                    <label for="serverAddress">IP:port сервера</label>
                    <input type="text" name="address" class="form-control" id="serverAddress" value="{{$server->address}}" style="width: 600px;" required>
                </div>
                <div class="form-group" style="width: 600px;">
                    <label for="serverModSelect">Выберите мод</label>
                    <select class="form-control" id="serverModSelect" name="mod_id">
                        @foreach($mods as $mod)
                            @if($mod->id === $server->mod_id)
                                <option value="{{$mod->id}}" selected>{{$mod->name}} ({{$mod->game->name}})</option>
                            @else
                                <option value="{{$mod->id}}">{{$mod->name}} ({{$mod->game->name}})</option>
                            @endif
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Обновить сервер</button>
                <a href="{{route('admin.servers.delete', ['id' => $server->id])}}" class="btn btn-danger">Удалить</a>
            </div>
        </form>
    </div>
@stop
