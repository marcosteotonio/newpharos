@extends('layouts.backend')

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Agenciados</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item">Agenciados</li>
                        <li class="breadcrumb-item active" aria-current="page">Todos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <a href="{{ route('profiles.create') }}" class="btn btn-primary push">Novo agenciado</a>
    
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
                <h3 class="block-title">Agenciados</h3>
            </div>
            <div class="block-content">
                <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                    <thead>
                        <tr class="text-uppercase">
                            <th class="text-center" style="width: 100px;">
                                <i class="far fa-user"></i>
                            </th>
                            <th>NOME / E-MAIL</th>
                            <th class="text-center" style="width: 200px;">CADASTRO</th>
                            <th class="text-center" style="width: 100px;">FOTOS</th>
                            <th class="text-center" style="width: 100px;">TRABALHOS</th>
                            <th class="text-center" style="width: 100px;">STATUS</th>
                            <th class="text-center" style="width: 100px;">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($profiles->sortBy('fancy_name') as $profile)
                        <tr>
                            <td class="text-center">
                       
                                @if ($profile->medias->first())
                                <img class="img-avatar img-avatar48" src="{{ asset('public/uploads/profiles/'. $profile->user_id . '/thumb/' . $profile->medias->first()->path) }}" alt="">
                                @else
                                <img class="img-avatar img-avatar48" src="https://api.adorable.io/avatars/48/{{$profile->user->email}}" alt="">
                                @endif
                            </td>
                            <td>
                                <div class="font-w600 font-size-base">{{ $profile->user->name }}</div>
                                <div class="text-muted">{{ $profile->user->email }}</div>
                            </td>
                            <td class="text-center font-size-base">
                                {{ $profile->user->created_at->format('d/m/Y') }}
                            </td>
                            <td class="text-center">
                                {{ $profile->medias->count() }}
                            </td>
                            <td class="text-center">
                                 {{ App\Notices::where('agenciado','like','%"'. $profile->user_id.'"%')->count() }}
                            </td>
                            <td class="text-center">
                                @if ($profile->status == 1)
                                <span class="badge badge-success">ATIVO</span>
                                @else
                                <span class="badge badge-danger">INATIVO</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Editar" data-placement="left">
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