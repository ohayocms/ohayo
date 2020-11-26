@extends('adminlte::page')

@section('title', 'Создать валюту')

@section('content_header')
    <h1>Создать валюту</h1>
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
        <form action="{{route('admin.currencies.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="modName">Название валюты</label>
                    <input type="text" name="name" class="form-control" id="modName" style="width: 600px;" required>
                </div>
                <div class="form-group">
                    <label for="currencySign">Символ валюты (например <a href="#" onclick="putSign('$');return false;">$</a> или <a href="#" onclick="putSign('₽');return false;">₽</a>)</label>
                    <input type="text" name="sign" class="form-control" id="currencySign" style="width: 600px;" required>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Добавить валюту</button>
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
