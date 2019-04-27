@extends('layouts.backend')

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Solicitações</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    {{-- <ol class="breadcrumb">
                        <li class="breadcrumb-item">Tables</li>
                        <li class="breadcrumb-item active" aria-current="page">Responsive</li>
                    </ol> --}}
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <h2 class="content-heading">Solicitações pendentes</h2>
        
        <div class="row">
            @foreach($profiles as $profile)
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop" href="{{ route('profiles.edit', $profile->id) }}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <img class="img-avatar img-avatar48" src="http://i.pravatar.cc/150?img={{$profile->user->email}}.jpg" alt="">
                        <div class="ml-3 text-right">
                            <p class="font-w600 mb-0">{{$profile->user->name}}</p>
                            <p class="font-size-sm font-italic text-muted mb-0">
                                {{$profile->user->email}}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection