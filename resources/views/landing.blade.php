@extends('layouts.simple')

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('{{ asset('media/photos/photo15@2x.jpg') }}');">
        <div class="hero bg-white overflow-hidden">
            <div class="hero-inner">
                <div class="content content-full text-center">
                    <h1 class="display-4 font-w700 mb-2">
                        <span class="font-w300">PharosElenco</span>
                    </h1>
                    <span class="m-2 d-inline-block invisible" data-toggle="appear" data-timeout="300">
                        <a class="btn btn-hero-success" href="/dashboard">
                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Entrar
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
@endsection
