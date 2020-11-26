@extends('adminlte::page')

@section('title', 'Список валют')

@section('content_header')
    <h1>Список валют</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <td>#</td>
                <td>Название</td>
                <td>Знак</td>
                <td></td>

                </thead>
                <tbody>
                @foreach($currencies as $currency)
                    <tr>
                        <td>{{$currency->id}}</td>
                        <td>{{$currency->name}}</td>
                        <td>{{$currency->sign}}</td>
                        <td>
                            <a href="{{route('admin.currencies.edit', ['id' => $currency->id])}}" class="btn btn-default">Редактировать</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{route('admin.currencies.create')}}" class="btn btn-success">Добавить новую валюту</a>
        </div>
    </div>
@stop
