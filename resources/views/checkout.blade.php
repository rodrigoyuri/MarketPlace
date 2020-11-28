@extends('layouts.front');

@section('content')

<div class="container">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <h2>Dados para Pagamento</h2>
                <hr>
            </div>
        </div>          
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-12">
                    <label for="">Número do cartão</label>
                    <input type="text" name="card-number" id="" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="">Mês de Expiração</label>
                    <input type="text" name="car_month" id="" class="form-control">
                </div>

                <div class="col-md-4 form-group">
                    <label for="">Ano de Expiração</label>
                    <input type="text" name="card_year" id="" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 form-group">
                    <label for="">Código de Segurança</label>
                    <input type="text" name="card_cvv" id="" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-lg btn-success">Efetuar Pagamento</button>
        </form>
    </div>
</div>

@endsection