@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Produtoras</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">App</li>
                    <li class="breadcrumb-item">Produtoras</li>
                    <li class="breadcrumb-item active" aria-current="page">Todas</li>
                </ol>
            </nav>
        </div>
   </div>
</div>
<!-- END Hero -->
<div class="content">
    <a href="{{ route('clients.create') }}" class="btn btn-primary push">Nova produtora</a>

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
            <h3 class="block-title">Produtoras</h3>
        </div>
        <div class="block-content">
            <p>
                Aqui você encontra a lista de produtoras que você aprovou previamente a fazer parte do sistema. Elas estão aptas a fazer solicitações de lista de agenciados!
            </p>
            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                <thead>
                    <tr class="text-uppercase">
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>NOME</th>
                        <th class="text-center" style="width: 200px;">CADASTRO</th>
                        <th class="text-center" style="width: 200px;">STATUS</th>
                        <th class="text-center" style="width: 100px;">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <th class="text-center" scope="row">{{ ++$i }}</th>
                        <td>
                            <div class="font-w600 font-size-base">{{ $client->user->name }}</div>
                            <div class="text-muted">{{ $client->user->email }}</div>
                        </td>
                        <td class="text-center font-size-base">
                            {{ $client->user->created_at->format('d/m/Y') }}
                        </td>
                        
                        <td class="text-center">
                            <span class="badge badge-success">APROVADO</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Editar" data-placement="left">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Novo pedido" data-placement="left">
                                    <i class="fa fa-box-open"></i>
                                </a>
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Histórico de pedidos" data-placement="left">
                                    <i class="fa fa-cubes"></i>
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