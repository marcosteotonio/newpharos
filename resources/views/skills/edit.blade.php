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
                        <li class="breadcrumb-item active" aria-current="page">Edição</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->
<div class="content">
    <a href="{{ route('skills.index') }}" class="btn btn-primary push">Voltar</a>

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
            <h3 class="block-title">Característica</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('skills.update', $skill->id) }}" method="POST">

                @csrf
                @method('PUT')

                <h2 class="content-heading pt-0">Editando característica</h2>
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="text-muted">
                            Aqui você pode e deve fazer as alterações necessárias para determinada característica.
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="form-group">
                            <label for="example-text-input">Característica</label>
                            <input type="text" class="form-control" name="name" placeholder="" value="{{ $skill->name }}">
                        </div>
                        <div class="form-group">
                            <label class="d-block">Status</label>
                            <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                            <input type="radio" class="custom-control-input" id="status-active" name="status" {{ $skill->status == 1 ? 'checked' : '' }} value="1">
                                <label class="custom-control-label" for="status-active">Ativo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                <input type="radio" class="custom-control-input" id="status-inactive" name="status" {{ $skill->status == 2 ? 'checked' : '' }} value="2">
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