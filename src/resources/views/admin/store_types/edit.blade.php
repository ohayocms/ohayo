@extends('adminlte::page')

@section('title', 'Редактирование валюты')

@section('content_header')
    <h1>Редактирование валюты</h1>
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
        <form action="{{route('admin.currencies.update', ['id' => $currency->id])}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="currencyName">Название валюты</label>
                    <input type="text" name="name" class="form-control" value="{{$currency->name}}" id="currencyName" style="width: 600px;" required>
                </div>
                <div class="form-group">
                    <label for="currencySign">Символ валюты (например <a href="#" onclick="putSign('$');return false;">$</a> или <a href="#" onclick="putSign('₽');return false;">₽</a>)</label>
                    <input type="text" name="sign" class="form-control" value="{{$currency->sign}}" id="currencySign" style="width: 600px;" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Обновить валюту</button>
                <a href="{{route('admin.currencies.delete', ['id' => $currency->id])}}" class="btn btn-danger">Удалить</a>
            </div>
        </form>
    </div>
@stop
@section('js')
    <script>
    function putSign(sign) {
        $('#currencySign').val(sign);
    }
    </script>
@endsection
