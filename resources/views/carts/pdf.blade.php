<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PDF</title>
</head>
<body>
    
        <h1>Pharos Elenco</h1>
        <br>
        <table>
        @foreach ($cart->profiles as $profile)
            <tr>
                <td>Nome: {{$profile->user->name}}</td>
            </tr>
            @foreach ($profile->medias as $image)
            <tr>
                <td>
                    <img src="{{ public_path()}}/uploads/profiles/{{$profile->id}}/thumb/{{$image->path}}" alt="">
                </td>
            </tr>
            @endforeach
        @endforeach

        </table>
</body>
</html>