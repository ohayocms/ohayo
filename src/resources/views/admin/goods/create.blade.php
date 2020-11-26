@extends('adminlte::page')

@section('title', 'Создать товар')

@section('content_header')
    <h1>Создать товар</h1>
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
        <form action="{{route('admin.goods.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="storeItemName">Название товара</label>
                    <input type="text" name="name" class="form-control" id="storeItemName" style="width: 600px;"
                           required>
                </div>
                <div class="form-group" style="width: 600px;">
                    <label for="storeItemGameSelect">Выберите сервер</label>
                    <select class="form-control" id="storeItemGameSelect" name="server_id">
                        @foreach($servers as $server)
                            <option value="{{$server->id}}">{{$server->name}} ({{$server->mod->game->name}})</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="storeItemDescription">Описание товара (Для страницы с товаром)</label>
                    <textarea class="form-control ckeditor" id="gameDescription" rows="3" name="storeItemDescription" style="width: 600px;"></textarea>
                </div>
                <div class="form-group">
                    <label for="storeItemImage">Изображение товара (Для страницы с товаром и списка товаров)</label>
                    <input type="file" name="image" class="form-control-file" id="storeItemImage" required accept="image/*">
                </div>
                <div class="form-group" style="width: 600px;">
                    <label for="storeItemType">Выберите тип товара</label>
                    <select class="form-control" id="storeItemType" name="type">
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Добавить товар</button>
            </div>
        </form>
    </div>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection