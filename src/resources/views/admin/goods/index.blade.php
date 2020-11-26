@extends('adminlte::page')

@section('title', 'Список товаров')

@section('content_header')
    <h1>Список товаров</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <td>#</td>
                <td>Название</td>
                <td>Игра</td>
                <td>Сервер</td>
                <td>Тип</td>
                <td></td>

                </thead>
                <tbody>
                @foreach($goods as $storeItem)
                    <tr>
                        <td>{{$storeItem->id}}</td>
                        <td>{{$storeItem->name}}</td>
                        <td>{{$storeItem->server->mod->game->name}}</td>
                        <td>{{$storeItem->server->name}}</td>
                        <td></td>
                        <td>
                            <a href="{{route('admin.goods.edit', ['id' => $storeItem->id])}}" class="btn btn-default">Редактировать</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{route('admin.goods.create')}}" class="btn btn-success">Добавить новый товар</a>
        </div>
    </div>
@stop
