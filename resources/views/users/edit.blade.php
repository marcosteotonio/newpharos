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
                    <li class="breadcrumb-item active" aria-current="page">Edição</li>
                </ol>
            </nav>
        </div>
   </div>
</div>
<!-- END Hero -->
<div class="content">
    <a href="{{ route('users.index') }}" class="btn btn-primary push">Voltar</a>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <p class="mb-0">Verifique os seguintes erros:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Usuários</h3>
        </div>
        <div class="block-content">
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <h2 class="content-heading pt-0">Editando usuário de sistema</h2>
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="text-muted">
                            Hora de editar um usuário do sistema. Para isso basta preencher os dados que seguem. Vale lembrar que os usuários cadastrados aqui tem acesso total ao sistema.
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="form-group">
                            <label for="example-text-input">Nome</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Senha</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Confirma senha</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                        <div class="form-group" id="type-image">
                            <label class="d-block" for="image">Foto do perfil</label>
                            <input type="file" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <label class="d-block">Status</label>
                            <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                            <input type="radio" class="custom-control-input" id="status-active" name="status" {{ $user->status == 1 ? 'checked' : '' }} value="1">
                                <label class="custom-control-label" for="status-active">Ativo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                <input type="radio" class="custom-control-input" id="status-inactive" name="status" {{ $user->status == 2 ? 'checked' : '' }} value="2">
                                <label class="custom-control-label" for="status-inactive">Inativo</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection