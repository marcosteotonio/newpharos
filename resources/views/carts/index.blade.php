@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Carrinho</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item">Carrinho</li>
                        <li class="breadcrumb-item active" aria-current="page">Todos</li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <div class="content">
        <a href="{{ route('carts.create') }}" class="btn btn-primary push">Novo carrinho</a>

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

        @if ($message = Session::get('warning'))
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-bell"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">{{$message}}</p>
            </div>
        </div>
        @endif
    
    
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Lista de pedidos</h3>
            </div>
            <div class="block-content">
                <table class="js-table-sections table table-hover table-vcenter">
                    <thead>
                        <tr class="text-uppercase">
                            <th style="width: 30px;"></th>
                            <th style="width: 300px;">Para</th>
                            <th>Nome</th>
                            <th class="text-center" style="width: 100px;">AGENCIADOS</th>
                            <th class="text-center" style="width: 200px;">CRIADO EM</th>
                            <th class="text-center" style="width: 100px;">ENVIADO</th>
                            <th class="text-center" style="width: 100px;">PDF</th>
                            <th class="text-center" style="width: 100px;">AÇÕES</th>
                        </tr>
                    </thead>
                    @foreach ($carts as $cart)
                    <tbody class="js-table-sections-header">
                        <tr>
                            <td class="text-center">
                                <i class="fa fa-angle-right text-muted"></i>
                            </td>
                            <td>
                                <div class="font-w600 font-size-base">{{$cart->client->user->name}}</div>
                                <div class="text-muted">{{$cart->client->user->email}}</div>
                            </td>
                            <td class="font-size-base">
                                {{$cart->name}}
                            </td>
                            <td class="text-center">
                                {{$cart->profiles->count()}}
                            </td>
                            <td class="text-center font-size-base">
                                {{$cart->created_at->format('d/m/Y')}}
                            </td>
                            <td class="text-center">
                                @if ($cart->sent == 1)
                                <span class="badge badge-success">ENVIADO</span>
                                @else
                                <span class="badge badge-danger">NÃO ENVIADO</span>
                                @endif
                            </td>
                            <td class="text-center">
                                {{$cart->profiles->count()}}
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('carts.send', $cart->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Enviar" data-placement="left">
                                        <i class="fa fa-paper-plane"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="font-size-sm">
                        @foreach ($cart->profiles as $profile)
                        <tr>
                            <td class="text-center">
                                @if ($profile->medias->first())
                                <img class="img-avatar img-avatar32" src="{{ asset('uploads/profiles/'. $profile->id . '/thumb/' . $profile->medias->first()->path) }}" alt="">
                                @else
                                <img class="img-avatar img-avatar32" src="https://api.adorable.io/avatars/48/{{$profile->user->email}}" alt="">
                                @endif
                            </td>
                            <td class="font-w600">
                                {{$profile->user->name}}
                            </td>
                            <td class="font-w600">
                                {{$profile->user->email}}
                            </td>
                            <td class=""></td>
                            <td class=""></td>
                            <td class=""></td>
                            <td class="text-center">
                                <a href="{{ route('profile.preview', [$cart->id, str_slug($profile->id)]) }}" data-toggle="tooltip" title="Visualizar" data-placement="left" target="_blank">
                                    <i class="fas fa-file-pdf fa-lg"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('profiles.edit', $profile->id) }}" target="_blank" class="btn btn-sm btn-outline-info" data-toggle="tooltip" title="Perfil completo" data-placement="left">
                                    <i class="fa fa-external-link-alt fa-sm"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @endforeach
                </table>

                {{ $carts->links() }}

            </div>
        </div>
    </div>
@endsection
@section('js_after')
    <script>jQuery(function(){ Dashmix.helpers(['table-tools-checkable', 'table-tools-sections']); });</script>
@stop
        