@extends('adminlte::page')

@section('title', 'Настройки')

@section('content_header')
    <h1>Настройки</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

        </div>
        <div class="card-footer">
            <a href="{{route('admin.settings.main.save')}}" class="btn btn-success">Сохранить</a>
        </div>
    </div>
@stop
