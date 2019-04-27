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
                    <li class="breadcrumb-item active" aria-current="page">Nova</li>
                </ol>
            </nav>
        </div>
   </div>
</div>
<!-- END Hero -->
<div class="content">
    <a href="{{ route('clients.index') }}" class="btn btn-primary push">Voltar</a>

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
            <h3 class="block-title">Produtoras</h3>
        </div>
        <div class="block-content">
                <form action="{{ route('clients.store') }}" method="POST">
                @csrf
                <h2 class="content-heading pt-0">Nova produtora</h2>
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="text-muted">
                            Hora de cadastrar uma nova produtora no sistema, ela poderá criar um carrinho de interesses, com os agenciados que ela selecionar! :)
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="form-group">
                            <label for="example-text-input">Nome *</label>
                            <input type="text" class="form-control" name="name" placeholder="" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Email *</label>
                            <input type="email" class="form-control" name="email" placeholder="" value="{{ old('email') }}">
                        </div>
                        <div class="form-group form-row">
                            <div class="col-6">
                                <label for="contact">Nome contato *</label>
                                <input type="text" class="form-control" name="contact" placeholder="" value="{{ old('contact') }}">
                            </div>
                            <div class="col-6">
                                <label for="phone_number">Telefone *</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="" value="{{ old('phone_number') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Senha</label>
                            <input type="password" class="form-control" name="password" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Confirma senha</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="d-block">Status</label>
                            <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                <input type="radio" class="custom-control-input" id="status-active" name="status" checked value="1">
                                <label class="custom-control-label" for="status-active">Aprovado</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline custom-control-warning ">
                                <input type="radio" class="custom-control-input" id="status-inactive" name="status" value="2">
                                <label class="custom-control-label" for="status-inactive">Aguardando</label>
                            </div>
                        </div>
                        <input type="hidden" name="level" value="3">
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