@extends('adminlte::page')

@section('title', 'Список типов товаров')

@section('content_header')
    <h1>Список типов товаров</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <td>#</td>
                <td>Название</td>
                <td>Игра</td>
                <td></td>

                </thead>
                <tbody>
                @foreach($storeItemTypes as $storeItemType)
                    <tr>
                        <td>{{$storeItemType->id}}</td>
                        <td>{{$storeItemType->name}}</td>
                        <td>{{$storeItemType->game->name}}</td>
                        <td>
                            <a href="{{route('admin.store_types.edit', ['id' => $storeItemType->id])}}" class="btn btn-default">Редактировать</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{route('admin.store_types.create')}}" class="btn btn-success">Добавить тип товара</a>
        </div>
    </div>
@stop
