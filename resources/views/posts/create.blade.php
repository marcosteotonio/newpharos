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
                            <textarea type="text" class="form-control" name="description" rows="10" placeholder="">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Foto</label>
                            <input type="file" class="form-control" name="image" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Video</label>
                            <input type="text" class="form-control" name="video" placeholder="Adicione um vídeo" value="{{ old('video') }}">
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Agenciado <span id="normal_PC"><small> (segure <span style="color: darkred;">ctrl</span> e clique para selecionar mais de um)</small></label></span> <span id="mac_PC" style="display:none;"><small> (segure <span style="color: darkred;">cmd</span> e clique para selecionar mais de um)</small></label></span>
                            <script>
                                if( navigator.appVersion.indexOf('Macintosh') > 0){
                                    document.getElementById('normal_PC').style.display = 'none'
                                    document.getElementById('mac_PC').style.display = 'inline-block'
                                }
                            </script>
                            <div style="width: 100%; background-color: #eee; border: 1px solid #d8dfed; border-radius: 3px; padding: 10px;">
                                <select name="agenciado[]" id="" style="width:100%; border: none;" multiple>
                                    <option value="">-- Selecione --</option>
                                    @foreach(\app\Profile::select('user_id','fancy_name')->orderBy('fancy_name', 'ASC')->get() as $key => $value)
                                        <option value="{{ $value->user_id }}">{{ $value->fancy_name }}</option>
                                    @endforeach
                                </select>
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
@section('js_after')

    <script src="https://cloud.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
@endsection
