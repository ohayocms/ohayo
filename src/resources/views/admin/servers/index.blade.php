@extends('adminlte::page')

@section('title', 'Серверы')

@section('content_header')
    <h1>Список серверов</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <td>#</td>
                <td>Название</td>
                <td>IP:port</td>
                <td>Игра</td>
                <td>Модификация</td>
                <td></td>

                </thead>
                <tbody>
                @foreach($servers as $server)
                    <tr>
                        <td>{{$server->id}}</td>
                        <td>{{$server->name}}</td>
                        <td>{{$server->address}}</td>
                        <td>{{$server->mod->game->name}}</td>
                        <td>{{$server->mod->name}}</td>
                        <td>
                            <a href="{{route('admin.servers.edit', ['id' => $server->id])}}" class="btn btn-default">Редактировать</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{route('admin.servers.create')}}" class="btn btn-success">Добавить сервер</a>
        </div>
    </div>
@stop
