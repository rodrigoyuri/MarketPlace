<h1>Olá, {{$user->name}}, tudo bem? Espero que sim!</h1>

<h3>Obrigado por sua inscrição</h3>

<p>
    Faça bom proveito e excelentes compras em nosso Marketplace!
    Seu Email de cadastro é: <strong>{{$user->email}}</strong>
</p>
<hr>
Email envio em {{date('d/m/y H:i:s')}}.