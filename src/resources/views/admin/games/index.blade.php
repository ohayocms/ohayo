@extends('adminlte::page')

@section('title', 'Игры')

@section('content_header')
    <h1>Список игр</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <td>#</td>
                <td></td>
                <td>Название</td>
                <td>Описание</td>
                <td>Модификаций</td>
                <td></td>

                </thead>
                <tbody>
                @foreach($games as $game)
                    <tr>
                        <td>{{$game->id}}</td>
                        <td width="50px"><img src="/storage/{{$game->image}}" /></td>
                        <td>{{$game->name}}</td>
                        <td>{{$game->description}}</td>
                        <td>{{$game->mods->count()}}</td>
                        <td>
                            <a href="{{route('admin.games.edit', ['id' => $game->id])}}" class="btn btn-default">Редактировать</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{route('admin.games.create')}}" class="btn btn-success">Добавить новую игру</a>
        </div>
    </div>
@stop
