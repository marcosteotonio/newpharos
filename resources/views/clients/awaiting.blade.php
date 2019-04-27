@extends('layouts.backend')

@section('content')
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
                Aqui você encontra a lista de produtoras que estão aguardando serem aprovadas e desfrutarem dos benefícios!
            </p>
            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                <thead>
                    <tr class="text-uppercase">
                        <th class="text-center" style="width: 50px;">#</th>
                        <th class="font-w700">Nome</th>
                        <th class="font-w700">E-mail</th>
                        <th class="font-w700">Cadastrado em</th>
                        <th class="d-none d-sm-table-cell font-w700">Status</th>
                        <th class="font-w700 text-center" style="width: 60px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <th class="text-center" scope="row">{{ ++$i }}</th>
                        <td class="font-w600">
                            <a href="{{ route('clients.edit', $client->id) }}">{{ $client->user->name }}</a>
                        </td>
                        <td>{{ $client->user->email }}</td>
                        <td class="d-none d-sm-table-cell"><em class="text-muted">{{ $client->user->created_at->format('d/m/Y') }}</em></td>
                        
                        <td class="d-none d-sm-table-cell font-size-base">
                            <span class="badge badge-warning">AGUARDANDO APROVAÇÃO</span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('clients.edit', $client->id) }}" data-toggle="tooltip" title="Editar" data-placement="left">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection