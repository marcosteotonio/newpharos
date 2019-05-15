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
                    <li class="breadcrumb-item active" aria-current="page">Todos</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="content">
    <a href="{{ route('posts.create') }}" class="btn btn-primary push">Nova postagem</a>
    
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
            <h3 class="block-title">Postagens</h3>
        </div>
        <div class="block-content">
            <p>
                Este é o lugar que você encontra todos as novidades que foram contadas para os visitantes da Pharos Elenco!
            </p>
            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                <thead>
                    <tr class="text-uppercase">
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>FOTO</th>
                        <th>TÍTULO</th>
                        <th>SLUG</th>
                        <th class="text-center" style="width: 200px;">POSTADO EM</th>
                        <th class="text-center" style="width: 100px;">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <th class="text-center" scope="row">{{ ++$i }}</th>
                        <td class="font-w600 font-size-base">
                            @if($post->media)
                            <img src="{{ url('/uploads/notices/'.$post->media )}}" alt="" class="image-grayscale" width="100">
                                @else
                                <img src="https://via.placeholder.com/100x100.png?text=SEM+FOTO" alt="" >
                            @endif
                        </td>
                        
                        <td class="font-w600 font-size-base">
                            {{ $post->title }}
                        </td>

                        <td class="font-w600 font-size-base">
                            {{ $post->slug }}
                        </td>

                        <td class="text-center font-size-base">
                            {{ isset($post->created_at) ? $post->created_at->format('d/m/Y') : ''}}
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Editar" data-placement="left">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>

                                {{--<a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remover" data-placement="left">--}}
                                   <form method="post" action="{{ route('posts.destroy', $post->id) }}">
                                       @csrf
                                        @method('DELETE')
                                      <button class="btn btn-sm btn-danger" type="submit"> <i type="submit" class="fa fa-trash-alt"></i></button>
                                   </form>
                                {{--</a>--}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div>{{$posts->links()}}</div>
        </div>
    </div>
</div>
@endsection
