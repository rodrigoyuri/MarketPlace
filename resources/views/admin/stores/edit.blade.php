@extends('layouts.app')


@section('content')

<h1>Atualizar Loja</h1>

<form action="{{route('admin.stores.update', ['store' => $store->id])}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method("PUT")

    <div class="form-group">
        <label for="">Nome da Loja</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$store->name}}">

        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Descrição</label>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$store->description}}">

        @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Telefone</label>
        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$store->phone}}">

        @error('phone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Celular/WhatsApp</label>
        <input type="text" id="mobile_phone" name="mobile_phone" class="form-control @error('mobile_phone') is-invalid @enderror" value="{{$store->mobile_phone}}">

        @error('mobile_phone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <p>
            <img src="{{asset('storage/' . $store->logo)}}" alt="">
        </p>
        <label for="">Logo da Loja</label>
        <input type="file" name="logo" id="" class="form-control @error('logo') is-invalid @enderror">

        @error('logo')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <button type="submit" class="btn btn-lg btn-success">Atualizar Loja</button>
    </div>

</form>

@endsection

@section('scripts')

<script>
    let imPhone = new Inputmask('(99) 9999-9999');
    imPhone.mask(document.getElementById('phone'));

    let imMobilePhone = new Inputmask('(99) 9 9999-9999');
    imMobilePhone.mask(document.getElementById('mobile_phone'));

</script>

@endsection

