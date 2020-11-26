@extends('layout.app')


@section('content')

<a href="{{route('admin.products.create')}}" class="btn btn-lg btn-success">Criar Produto</a>

<table class="table table-striped">
    <thead>
        <tr>
            <td>#</td>
            <td>Nome</td>
            <td>Loja</td>
            <td>Preço</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->store->name}}</td>
                <td>{{number_format($p->price, 2, ',', '.')}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('admin.products.edit', ['product' => $p->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                        <form action="{{route('admin.products.destroy', ['product' => $p->id])}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{$products->links()}}

@endsection