@extends('adminlte::page')

@section('title', 'Редактирование игры')

@section('content_header')
    <h1>Редактировать игру</h1>
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
        <form action="{{route('admin.games.update', ['id' => $game->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="gameName">Название игры</label>
                    <input type="text" name="name" class="form-control" id="gameName" value="{{$game->name}}" style="width: 600px;" required>
                </div>
                <div class="form-group" style="width: 600px;">
                    <label for="gameTypeSelect">Тип игры (Для мониторинга)</label>
                    <select class="form-control" id="gameTypeSelect" name="type">
                        <option value="0" @if($game->type === 0) selected @endif>Gold Source Engine</option>
                        <option value="1" @if($game->type === 1) selected @endif>Source Engine</option>
                        <option value="2" @if($game->type === 2) selected @endif>Minecraft</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gameDescription">Описание игры (Для страницы с игрой)</label>
                    <textarea class="form-control ckeditor" id="gameDescription" rows="3" name="description" style="width: 600px;">{{$game->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="gameImage">Изображение игры (Для страницы с игрой)</label>
                    <input type="file" name="image" class="form-control-file" id="gameImage" accept="image/*">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Сохранить</button>
                <a href="{{route('admin.games.delete', ['id' => $game->id])}}" class="btn btn-danger">Удалить</a>
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
