@extends('layouts.backend')

@section('content')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Trabalhos</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">App</li>
                    <li class="breadcrumb-item">Trabalhos</li>
                    <li class="breadcrumb-item active" aria-current="page">Novo</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="content">
    <a href="{{ route('posts.index') }}" class="btn btn-primary push">Voltar</a>

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
            <h3 class="block-title">Postagem</h3>
        </div>
        <div class="block-content">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="content-heading pt-0">Nova postagem</h2>
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="text-muted">
                            Hora de realizar uma postagem. Cadastrar um novo projeto realizado, uma novidade ou o que você julgar interessante para seus visitantes.
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="form-group">
                            <label for="title">Título *</label>
                            <input type="text" class="form-control" name="title" placeholder="" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Subtítulo</label>
                            <input type="text" class="form-control" name="subtitle" placeholder="" value="{{ old('subtitle') }}">
                        </div>
                        <div class="form-group">
                            <label for="body">Conteúdo *</label>
                            <textarea type="text" class="form-control" name="body" rows="10" placeholder="">{{ old('body') }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                <input type="radio" class="custom-control-input" id="typeImage" name="typeFile" checked="" value="typeImage">
                                <label class="custom-control-label" for="typeImage">Imagem</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                <input type="radio" class="custom-control-input" id="typeMovie" name="typeFile" value="typeMovie">
                                <label class="custom-control-label" for="typeMovie">Vídeo</label>
                            </div>
                        </div>
                        <div class="form-group" id="type-image">
                            <label class="d-block" for="image">Anexar imagem</label>
                            <input type="file" id="image" name="image">
                        </div>
                        <div class="form-group type-movie-disabled" id="type-movie">
                            <label for="movie">Link do vídeo (Youtube / Vimeo)</label>
                            <input type="text" class="form-control" name="movie" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="d-block">Agenciado <small>(Segure <code>CTRL</code> e clique para selecionar mais de um)</small></label>
                            <select class="form-control" id="profile_id" name="profile_id[]" multiple>
                                <option value="">-- Selecione --</option>
                                @foreach($profiles as $profile)
                                    <option value="{{$profile->id}}">{{$profile->user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="d-block">Status</label>
                            <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                <input type="radio" class="custom-control-input" id="status-active" name="status" checked value="1">
                                <label class="custom-control-label" for="status-active">Ativo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                <input type="radio" class="custom-control-input" id="status-inactive" name="status" value="2">
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