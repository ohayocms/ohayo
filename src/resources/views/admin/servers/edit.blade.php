@extends('adminlte::page')

@section('title', 'Редактирование сервера')

@section('content_header')
    <h1>Редактировать сервер</h1>
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
        <form action="{{route('admin.mods.update', ['id' => $mod->id])}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="modName">Название мода</label>
                    <input type="text" name="name" class="form-control" value="{{$mod->name}}" id="modName" style="width: 600px;" required>
                </div>
                <div class="form-group" style="width: 600px;">
                    <label for="modGameSelect">Выберите игру</label>
                    <select class="form-control" id="modGameSelect" name="game_id">
                        @foreach($games as $game)
                            @if($game->id === $mod->game_id)
                                <option value="{{$game->id}}" selected>{{$game->name}}</option>
                            @else
                                <option value="{{$game->id}}">{{$game->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Обновить мод</button>
                <a href="{{route('admin.mods.delete', ['id' => $mod->id])}}" class="btn btn-danger">Удалить</a>
            </div>
        </form>
    </div>
@stop
