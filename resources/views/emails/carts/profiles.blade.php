<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nova Solicitação</title>
</head>
<body>
    
</body>
</html>

<div>
    <div>Pedido <strong>#{{$cart->id}}</strong></div>
    <br>
    <p>Segue em anexo o perfil dos agenciados solicitados:</p>
    <ul>
        @foreach ($cart->profiles as $profile)
        <li>{{$profile->user->name}}</li>
        @endforeach
    </ul>
    <br>
    <br>
    <p>Qualquer dúvida, estamos a disposição.</p>
    Cordialmente, <strong>Pharos Elenco</strong>
</div>