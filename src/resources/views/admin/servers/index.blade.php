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
                <td>Игра</td>
                <td>Серверов</td>
                <td></td>

                </thead>
                <tbody>
                @foreach($mods as $mod)
                    <tr>
                        <td>{{$mod->id}}</td>
                        <td>{{$mod->name}}</td>
                        <td>{{$mod->game->name}}</td>
                        <td>{{$mod->servers->count()}}</td>
                        <td>
                            <a href="{{route('admin.mods.edit', ['id' => $mod->id])}}" class="btn btn-default">Редактировать</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{route('admin.mods.create')}}" class="btn btn-success">Добавить новую модификацию</a>
        </div>
    </div>
@stop
