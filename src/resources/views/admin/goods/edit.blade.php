@extends('adminlte::page')

@section('title', 'Редактировать товар')

@section('content_header')
    <h1>Редактировать товар</h1>
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
        <form action="{{route('admin.goods.update', ['id' => $storeItem->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="storeItemName">Название товара</label>
                    <input type="text" name="name" value="{{$storeItem->name}}" class="form-control" id="storeItemName" style="width: 600px;"
                           required>
                </div>
                <div class="form-group" style="margin-left:25px;">
                    @if($storeItem->is_countable)
                        <input type="checkbox" name="is_countable" class="form-check-input" id="storeItemIsCountable" checked>
                    @else
                        <input type="checkbox" name="is_countable" class="form-check-input" id="storeItemIsCountable">
                    @endif
                    <label class="form-check-label" for="storeItemIsCountable">Предмет продается с выбором количества</label>
                </div>
                <div class="form-group" style="width: 600px;">
                    <label for="storeItemGameSelect">Выберите сервер</label>
                    <select class="form-control" id="storeItemGameSelect" name="server_id"
                            onchange="showItemTypes();return false;">
                        @foreach($servers as $server)
                            @if($server->id === $storeItem->server_id)
                                <option selected value="{{$server->id}}">{{$server->name}} ({{$server->mod->game->name}})</option>
                            @else
                                <option value="{{$server->id}}">{{$server->name}} ({{$server->mod->game->name}})</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="width: 600px;">
                    <label for="storeItemType">Выберите тип товара</label>
                    <select class="form-control" id="storeItemType" name="store_item_type_id">
                    </select>
                </div>
                <div class="form-group">
                    <label for="storeItemDescription">Описание товара (Для страницы с товаром)</label>
                    <textarea class="form-control ckeditor" id="storeItemDescription" rows="3" name="description"
                              style="width: 600px;">{{$storeItem->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="storeItemImage">Изображение товара (Для страницы с товаром и списка товаров)</label>
                    <input type="file" name="image" class="form-control-file" id="storeItemImage"
                           accept="image/*">
                </div>
                <div class="form-group" style="width: 600px;">
                    <h4>Ценники</h4>
                    <div class="alert alert-info">
                        <p class="text-bold">Примите во внимание.</p>
                        Оставьте цену -1, если не хотите продавать товар за выбранную валюту
                    </div>
                    <table class="table">
                        <thead>
                        <td>Валюта</td>
                        <td>Количество</td>
                        </thead>
                        <tbody>
                        @foreach($currencies as $currency)
                            <tr>
                                <td>{{$currency->name}}</td>
                                <td class="input-group mb-3">
                                    <input name="priceCurrency[{{$currency->id}}]" aria-describedby="basic-addon2" value="{{$storeItem->storeItemPrices->filter(function ($price) use ($storeItem, $currency) {if($currency->id === $price->currency_id && $storeItem->id === $price->store_item_id) return $price;})->first()->value}}" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">{{$currency->sign}}</span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Обновить товар</button>
            </div>
        </form>
    </div>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            showItemTypes();
            $('.ckeditor').ckeditor();
        });

        function showItemTypes() {
            let gameId = $('#storeItemGameSelect').val();
            $.post('/admin/goods/getStoreItemTypes', {
                'gameId': gameId,
                '_token': "{{ csrf_token() }}",
            }).then(function (response) {
                let options = '';
                for (let i = 0; i < response.length; i++) {
                    if("{{$storeItem->store_item_type_id}}" == response[i].id) {
                        options += '<option selected value="' + response[i].id + '">' + response[i].name + '</option>';
                    } else {
                        options += '<option value="' + response[i].id + '">' + response[i].name + '</option>';
                    }
                }
                $('#storeItemType').html(options);
            })
        }
    </script>
@endsection
