@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Características</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">App</li>
                    <li class="breadcrumb-item">Características</li>
                    <li class="breadcrumb-item active" aria-current="page">Todas</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->
<div class="content">
    
    <a href="{{ route('skills.create') }}" class="btn btn-primary push">Nova característica</a>

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
            <h3 class="block-title">Características</h3>
            <div class="block-options">
                <div class="block-options-item">
                    
                </div>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                <thead>
                    <tr class="text-uppercase">
                        <th class="text-center" style="width: 50px;">#</th>
                        <th class="">DESCRIÇÃO</th>
                        <th class="text-center" style="width: 100px;">STATUS</th>
                        <th class="text-center" style="width: 100px;">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skills as $skill)
                    <tr>
                        <th class="text-center" scope="row">{{ ++$i }}</th>
                        <td class="font-w600 font-size-base">
                            {{ $skill->name }}
                        </td>
                        <td class="text-center">
                            @if ($skill->status == 1)
                            <span class="badge badge-success">ATIVO</span>
                            @else
                            <span class="badge badge-danger">INATIVO</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a  href="{{ route('skills.edit', $skill->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Editar" data-placement="left">
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
    
    {!! $skills->links() !!}
    
</div>
@endsection