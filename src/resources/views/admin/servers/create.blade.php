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
                    <label for="modName">Название мода</label>
                    <input type="text" name="name" class="form-control" id="modName" style="width: 600px;" required>
                </div>
                <div class="form-group" style="width: 600px;">
                    <label for="modGameSelect">Выберите игру</label>
                    <select class="form-control" id="modGameSelect" name="game_id">
                        @foreach($games as $game)
                            <option value="{{$game->id}}">{{$game->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Добавить новый мод</button>
            </div>
        </form>
    </div>
@stop
