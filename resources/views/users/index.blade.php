@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Usuários</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">App</li>
                    <li class="breadcrumb-item">Usuários</li>
                    <li class="breadcrumb-item active" aria-current="page">Todos</li>
                </ol>
            </nav>
        </div>
   </div>
</div>
<!-- END Hero -->
<div class="content">
    <a href="{{ route('users.create') }}" class="btn btn-primary push">Novo usuário</a>

    @if ($message = Session::get('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <div class="flex-00-auto">
            <i class="fa fa-fw fa-check"></i>
        </div>
        <div class="flex-fill ml-3">
            <p class="mb-0">{{$message}}</p>
        </div>
    </div>
    @endif

    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Usuários do sistema</h3>
        </div>
        <div class="block-content">
            <p>
                Este é o lugar que você encontra todos os usuários que possuem acesso ao sistema de administração da Pharos Elenco!
            </p>
            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                <thead>
                    <tr class="text-uppercase">
                        <th class="text-center" style="width: 100px;">
                            <i class="far fa-user"></i>
                        </th>
                        <th>NOME</th>
                        <th class="text-center" style="width: 200px;">CADASTRO</th>
                        <th class="text-center" style="width: 100px;">ACESSO</th>
                        <th class="text-center" style="width: 100px;">STATUS</th>
                        <th class="text-center" style="width: 100px;">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="text-center">
                            @if ($user->medias->first())
                            <img class="img-avatar img-avatar48" src="{{$user->medias->first()->path}}" alt="">
                            @else
                            <img class="img-avatar img-avatar48" src="https://api.adorable.io/avatars/48/{{$user->email}}" alt="">
                            @endif
                        </td>
                        <td>
                            <div class="font-w600 font-size-base">{{ $user->name }}</div>
                            <div class="text-muted">{{$user->email}}</div>
                        </td>
                        <td class="text-center font-size-base">
                            {{ $user->created_at->format('d/m/Y') }}
                        </td>
                        <td class="text-center">
                            @if ($user->level == 1)
                            <span class="badge badge-success">ADMIN</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($user->status == 1)
                            <span class="badge badge-success">ATIVO</span>
                            @else
                            <span class="badge badge-danger">INATIVO</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Editar" data-placement="left">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection