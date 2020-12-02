@extends('layouts.app')


@section('content')

<a href="{{route('admin.notifications.read.all')}}" class="btn btn-lg btn-success">Marcar todas como lidas!</a>

<table class="table table-striped">
    <thead>
        <tr>
            <td>Notificação</td>
            <td>Criado em</td>
            <td>Ação</td>
        </tr>
    </thead>
    <tbody>
        @foreach($unreadNotifications as $n)
            <tr>
                <td>{{$n->data['message']}}</td>
                <!-- <td>{{$n->created_at->format('d/m/Y H:i:s')}}</td> -->
                <td>{{$n->created_at->locale('pt')->diffForHumans()}}</td>
                <td>
                    <div class="btn-group">
                        <a href="#" class="btn btn-sm btn-primary">Marcar como Lida</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection