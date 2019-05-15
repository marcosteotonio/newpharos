@extends('layouts.backend')
<?php
?>

@section('content')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Trabalhos</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">App</li>
                    <li class="breadcrumb-item">Trabalhos</li>
                    <li class="breadcrumb-item active" aria-current="page">Edição</li>
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
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                
                @csrf
                @method('PUT')

                <h2 class="content-heading pt-0">Editando postagem</h2>
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="text-muted">
                            Ops, algo precisa ser consertado. Hora de editar uma postagem ;)
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        
                        {{--@if ($post->medias()->count() > 0 && @$post->medias[0]->type == 'image')--}}
                        {{--<div class="row items-push">--}}
                            {{--<div class="col-md-4 animated fadeIn">--}}
                                {{--<div class="options-container">--}}
                                    {{--<img class="img-fluid options-item" src="{{asset(@$post->medias[0]->path)}}" alt="">--}}
                                    {{--<div class="options-overlay bg-primary-dark-op">--}}
                                        {{--<div class="options-overlay-content">--}}
                                            {{--<h3 class="h4 text-white mb-2">{{$post->slug}}</h3>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--@endif--}}

                        <div class="form-group">
                            <label for="title">Título *</label>
                            <input type="text" class="form-control" name="title" placeholder="" value="{{ old('title', $post->title) }}">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Subtítulo</label>
                            <input type="text" class="form-control" name="subtitle" placeholder="" value="{{ old('subtitle', $post->subtitle) }}">
                        </div>
                        <div class="form-group">
                            <label for="body">Conteúdo *</label>
                            <textarea type="text" class="form-control" name="description" rows="10" placeholder="">{{ old('body', $post->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="subtitle">FOTO</label>
                            <input type="file" class="form-control" name="image" placeholder="">
                        </div>




                        {{--<div class="form-group">--}}
                            {{--@if ($post->medias()->count() > 0)--}}
                            {{--<div class="custom-control custom-radio custom-control-inline custom-control-primary">--}}
                                {{--<input type="radio" class="custom-control-input" id="typeImage" name="typeFile" value="typeImage" {{ $post->medias[0]->type == 'image' ? 'checked' : '' }}>--}}
                                {{--<label class="custom-control-label" for="typeImage">Imagem</label>--}}
                            {{--</div>--}}
                            {{--<div class="custom-control custom-radio custom-control-inline custom-control-primary">--}}
                                {{--<input type="radio" class="custom-control-input" id="typeMovie" name="typeFile" value="typeMovie" {{ $post->medias[0]->type == 'movie' ? 'checked' : '' }}>--}}
                                {{--<label class="custom-control-label" for="typeMovie">Vídeo</label>--}}
                            {{--</div>--}}
                            {{--@else--}}
                            {{--<div class="custom-control custom-radio custom-control-inline custom-control-primary">--}}
                                {{--<input type="radio" class="custom-control-input" id="typeImage" name="typeFile" value="typeImage" checked }}>--}}
                                {{--<label class="custom-control-label" for="typeImage">Imagem</label>--}}
                            {{--</div>--}}
                            {{--<div class="custom-control custom-radio custom-control-inline custom-control-primary">--}}
                                {{--<input type="radio" class="custom-control-input" id="typeMovie" name="typeFile" value="typeMovie">--}}
                                {{--<label class="custom-control-label" for="typeMovie">Vídeo</label>--}}
                            {{--</div>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        
                        {{--@if ($post->medias()->count() > 0)--}}
                        {{--<div class="form-group {{ $post->medias[0]->type == 'movie' ? 'type-image-disabled' : '' }}" id="type-image">--}}
                            {{--<label class="d-block" for="image">Anexar imagem</label>--}}
                            {{--<input type="file" id="image" name="image">--}}
                        {{--</div>--}}

                        {{--<div class="form-group {{ $post->medias[0]->type == 'image' ? 'type-movie-disabled' : '' }}" id="type-movie">--}}
                            {{--<label for="movie">Youtube link</label>--}}
                            {{--<input type="text" class="form-control" name="movie" placeholder="" value="{{ $post->medias[0]->type == 'movie' ? $post->medias[0]->path : '' }}">--}}
                        {{--</div>--}}
                        {{--@else--}}
                        {{--<div class="form-group" id="type-image">--}}
                            {{--<label class="d-block" for="image">Anexar imagem</label>--}}
                            {{--<input type="file" id="image" name="image">--}}
                        {{--</div>--}}
                        {{--<div class="form-group type-movie-disabled" id="type-movie">--}}
                            {{--<label for="movie">Link do vídeo (Youtube / Vimeo)</label>--}}
                            {{--<input type="text" class="form-control" name="movie" placeholder="" value="">--}}
                        {{--</div>--}}
                        {{--@endif--}}

                        {{--<div class="form-group">--}}
                            {{--<label class="d-block">Agenciado <small>(Segure <code>CTRL</code> e clique para selecionar mais de um)</small></label>--}}
                            {{--<select class="form-control" id="profile_id" name="profile_id[]" multiple>--}}
                                {{--<option value="">-- Selecione --</option>--}}
                                {{--@foreach($profiles as $profile)--}}
                                    {{--@if ($post->profiles->contains($profile))--}}
                                    {{--<option value="{{$profile->id}}" selected>{{$profile->user->name}}</option>--}}
                                    {{--@else--}}
                                    {{--<option value="{{$profile->id}}">{{$profile->user->name}}</option>--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label class="d-block">Status</label>--}}
                            {{--<div class="custom-control custom-radio custom-control-inline custom-control-primary">--}}
                            {{--<input type="radio" class="custom-control-input" id="status-active" name="status" {{ $post->status == 1 ? 'checked' : '' }} value="1">--}}
                                {{--<label class="custom-control-label" for="status-active">Ativo</label>--}}
                            {{--</div>--}}
                            {{--<div class="custom-control custom-radio custom-control-inline custom-control-primary">--}}
                                {{--<input type="radio" class="custom-control-input" id="status-inactive" name="status" {{ $post->status == 2 ? 'checked' : '' }} value="2">--}}
                                {{--<label class="custom-control-label" for="status-inactive">Inativo</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group">
                            <label for="subtitle">Video</label>
                            @if($post->video )
                            <div>
                                <iframe src="{{ $post->video }}" style="max-width: 100%;" frameborder="0"></iframe>
                            </div>
                            @endif
                            <input type="text" class="form-control" name="video" placeholder="Adicione um vídeo" value="{{ old('video')  }}">
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
                                    @foreach( $profiles as $key => $value)
                                        <option value="{{ $value['user_id'] }}" {{ $value['selected'] ? "selected" : '' }}>{{ $value['fancy_name'] }}</option>
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
