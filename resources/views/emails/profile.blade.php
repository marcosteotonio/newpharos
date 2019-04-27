<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$profile->user->name}}</title>
</head>
<body>
    <div>Nome: {{$profile->user->name}}</div>
    <div>DRT: {{$profile->drt}}</div>
    <div>Altura: {{$profile->height}}</div>
    <div>Camisa: {{$profile->shirt}}</div>
    <div>Manequim: {{$profile->dummy}}</div>
    <div>Sapato: {{$profile->feet}}</div>
    <div>Aniversário: {{$profile->date_birth}}</div>
    <div>Cor dos olhos: {{$profile->eye_color}}</div>
    <div>Cor do cabelo: {{$profile->hair_color}}</div>

    <h3>Fotos:</h3>
    <table><tr>
    @foreach ($profile->medias as $image)
        <td><img src="{{ public_path()}}/uploads/profiles/{{$profile->user_id}}/thumb/{{$image->path}}" alt=""></td>
    @endforeach
    </tr>
    </table>

</body>
</html>


