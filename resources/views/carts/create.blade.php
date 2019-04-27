@section('css_after')

@stop
@extends('layouts.backend')
@section('content')
    <!-- Page Content -->
    <div class="row no-gutters flex-md-10-auto">
        <div class="col-md-4 col-lg-5 col-xl-3 order-md-1">
            <div class="content">
                <!-- Toggle Side Content -->
                <div class="d-md-none push">
                    <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                    <button type="button" class="btn btn-block btn-hero-primary" data-toggle="class-toggle" data-target="#side-content" data-class="d-none">
                        Side Content
                    </button>
                </div>
                <!-- END Toggle Side Content -->

                <!-- Side Content -->
                <profile-filter></profile-filter>
                <!-- END Side Content -->
            </div>
        </div>
        <div class="col-md-8 col-lg-7 col-xl-9 order-md-0 bg-body-dark">
            <!-- Main Content -->
            <div class="content content-full">
                <div class="block block-fx-pop">
                    <div class="block-content">
                        <form action="{{ route('carts.store') }}" method="POST">
                            @csrf
                            <!-- Vital Info -->
                            <h2 class="content-heading pt-0">Informações</h2>
                            <div class="row push">
                                <div class="col-lg-4">
                                    <p class="text-muted">
                                        Algumas informações importantes sobre seu novo carrinho.
                                    </p>
                                </div>
                                <div class="col-lg-8 col-xl-5">
                                    <div class="form-group">
                                        <label for="name">
                                            Nome <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="ex.: Meu carrinho">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-8">
                                            <label for="client_id">
                                                Para <span class="text-danger">*</span>
                                            </label>
                                            <select class="custom-select" id="client_id" name="client_id">
                                                <option value="">Selecione um destinatário</option>
                                                @foreach ($clients as $client)
                                                <option value="{{$client->id}}">{{$client->user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Vital Info -->
        
                            <!-- People -->
                            <h2 class="content-heading pt-0">Agenciados</h2>
                            <div class="row push">
                                <div class="col-lg-12">
                                    <profile-list></profile-list>
                                </div>
                            </div>
                            <!-- END People -->
        
                            <!-- Submit -->
                            <div class="row push">
                                <div class="col-lg-8 col-xl-5 offset-lg-4">
                                    <div class="form-group">
                                        <button type="submit" name="action" class="btn btn-success" value="create_send">
                                            <i class="fa fa-check-circle mr-1"></i> Salvar e enviar
                                        </button>
                                        <button type="submit" name="action" class="btn btn-success" value="save">
                                            <i class="fa fa-check-circle mr-1"></i> Salvar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- END Submit -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- END Main Content -->
        </div>
    </div>
    <!-- END Page Content -->
    
@endsection
@section('js_after')

@stop