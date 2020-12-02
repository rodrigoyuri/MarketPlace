@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{route('admin.notifications.read.all')}}" class="btn btn-lg btn-success">Marcar todas como lidas!</a>
        <hr>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <td>Notificação</td>
            <td>Criado em</td>
            <td>Ação</td>
        </tr>
    </thead>
    <tbody>
        @forelse($unreadNotifications as $n)
            <tr>
                <td>{{$n->data['message']}}</td>
                <!-- <td>{{$n->created_at->format('d/m/Y H:i:s')}}</td> -->
                <td>{{$n->created_at->locale('pt')->diffForHumans()}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('admin.notifications.read', ['notification' => $n->id])}}" class="btn btn-sm btn-primary">Marcar como Lida</a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">
                    <div class="alert alert-warning">Nenhuma notificação Recebida</div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection