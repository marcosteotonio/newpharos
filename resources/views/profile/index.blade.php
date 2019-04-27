@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Meu Perfil</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">App</li>
                    <li class="breadcrumb-item">Meu Perfil</li>
                    <li class="breadcrumb-item active" aria-current="page">Edição</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->
<div class="content">
    <a href="{{ route('users.index') }}" class="btn btn-primary push">Voltar</a>

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
            <h3 class="block-title">Meu perfil</h3>
        </div>
        <div class="block-content">
                <form action="{{ url('/profile') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <h2 class="content-heading pt-0">Editando perfil</h2>
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="text-muted">
							Agora de você atualizar os seus dados, para isso basta preencher os dados que seguem! ;)
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div style="text-align: center;">
                          
						</div>
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
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection