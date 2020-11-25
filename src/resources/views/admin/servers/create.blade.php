@extends('adminlte::page')

@section('title', 'Добавить новый сервер')

@section('content_header')
    <h1>Добавить сервер</h1>
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
        <form action="{{route('admin.servers.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="serverName">Название сервера</label>
                    <input type="text" name="name" class="form-control" id="serverName" style="width: 600px;" required>
                </div>
                <div class="form-group">
                    <label for="serverAddress">IP:port сервера</label>
                    <input type="text" name="address" class="form-control" id="serverAddress" style="width: 600px;" required>
                </div>
                <div class="form-group" style="width: 600px;">
                    <label for="serverModSelect">Выберите мод</label>
                    <select class="form-control" id="serverModSelect" name="mod_id">
                        @foreach($mods as $mod)
                            <option value="{{$mod->id}}">{{$mod->name}} ({{$mod->game->name}})</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Добавить сервер</button>
            </div>
        </form>
    </div>
@stop
