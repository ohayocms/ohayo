@extends('adminlte::page')

@section('title', 'Настройки')

@section('content_header')
    <h1>Настройки</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{route('admin.settings.main.save')}}" method="POST">
            @csrf
            <div class="card-header">
                <a href="{{route('admin.settings.index')}}" style="margin-right:15px;">Общие настройки</a>
                <a href="{{route('admin.settings.payment.index')}}">Настройки платежных систем</a>
            </div>
            <div class="card-body">
                @foreach($settings->settings as $setting)
                    <div class="row" style="padding:15px;">
                        <div class="col col-3">{{$setting['key']}}</div>
                        <div class="col col-9"><input type="text" class="form-control"
                                                      name="settings[{{$setting['key']}}]"
                                                      value="{{$setting['value']}}"></div>
                    </div>
                @endforeach
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@stop
<script>
    import Button from "../../../js/Jetstream/Button";
    export default {
        components: {Button}
    }
</script>
