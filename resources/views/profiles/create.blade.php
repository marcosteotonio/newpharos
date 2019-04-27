@extends('layouts.backend')

@section('content')

<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Agenciados</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">App</li>
                    <li class="breadcrumb-item">Agenciados</li>
                    <li class="breadcrumb-item active" aria-current="page">Novo</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="content">
    <a href="{{ route('profiles.index') }}" class="btn btn-primary push">Voltar</a>

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

    <!-- Block Tabs Alternative Style -->
    <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="block block-rounded block-bordered">
        <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#btabs-alt-static-home">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#profile-gallery">Galeria</a>
            </li>
        </ul>
        <div class="block-content tab-content">
            <div class="tab-pane active" id="btabs-alt-static-home" role="tabpanel">
                    

                <div class="row push">

                    <!-- DADOS PESSOAIS -->
                    <div class="col-md-6">
                        <h2 class="content-heading pt-0">Dados pessoais</h2>

                        <div class="form-group form-row">
                            <div class="col-6">
                                <label for="name">Nome completo *</label>
                                <input type="text" class="form-control" name="name" placeholder="" value="{{ old('name') }}">
                            </div>
                            <div class="col-6">
                                <label for="fancy_name">Nome artístico *</label>
                                <input type="text" class="form-control" name="fancy_name" placeholder="" value="{{ old('fancy_name') }}">
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <label for="email">E-mail *</label>
                                <input type="email" class="form-control" name="email" placeholder="" value="{{ old('email') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="email">DRT</label>
                                <input type="text" class="form-control" name="drt" placeholder="" value="{{ old('drt') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="email">CNH</label>
                                <input type="text" class="form-control" name="drt" placeholder="" value="{{ old('cnh') }}">
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-4">
                                <label for="rg">Nº identidade *</label>
                                <input type="text" class="form-control" name="rg" placeholder="" value="{{ old('rg') }}">
                            </div>
                            <div class="col-4">
                                <label for="organ">Órgão expedidor *</label>
                                <input type="text" class="form-control" name="organ" placeholder="" value="{{ old('organ') }}">
                            </div>
                            <div class="col-4">
                                <label for="cpf">CPF *</label>
                                <input type="text" class="form-control" name="cpf" placeholder="" value="{{ old('cpf') }}">
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-6">
                                <label for="date_birth">Data de nascimento *</label>
                                <input type="text" class="form-control" name="date_birth" placeholder="" value="{{ old('date_birth') }}">
                            </div>
                            <div class="col-6">
                                <label for="gender">Sexo *</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="">-- Selecione --</option>
                                    @foreach($gender_list as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-9">
                                <label for="address">Endereço *</label>
                                <input type="text" class="form-control" name="address" placeholder="" value="{{ old('address') }}">
                            </div>
                            <div class="col-3">
                                <label for="phone_number">Telefone *</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="" value="{{ old('phone_number') }}">
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-4">
                                <label for="marital_status">Estado civil *</label>
                                    <select class="form-control" id="marital_status" name="marital_status">
                                    <option value="">-- Selecione --</option>
                                    @foreach($marital_status_list as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="education">Escolaridade *</label>
                                <select class="form-control" id="education" name="education">
                                    <option value="">-- Selecione --</option>
                                    @foreach($education_list as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="city_birth">Natural de *</label>
                                <input type="text" class="form-control" name="city_birth" placeholder="" value="{{ old('city_birth') }}">
                            </div>
                        </div>
                    </div>
                    <!-- /DADOS PESSOAIS -->

                    <!-- INFORMAÇÕES FÍSICAS -->
                    <div class="col-md-6">
                        <h2 class="content-heading pt-0">Informações físicas</h2>

                        <div class="form-group form-row">
                            <div class="col-6">
                                <label for="height">Altura (Ex.: 1.72) *</label>
                                <input type="text" class="form-control" name="height" placeholder="" value="{{ old('height') }}">
                            </div>
                            <div class="col-6">
                                <label for="weight">Peso (Kg) *</label>
                                <input type="text" class="form-control" name="weight" placeholder="" value="{{ old('weight') }}">
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-4">
                                <label for="shirt">Camisa *</label>
                                <input type="text" class="form-control" name="shirt" placeholder="" value="{{ old('shirt') }}">
                            </div>
                            <div class="col-4">
                                <label for="pants">Calça *</label>
                                <input type="text" class="form-control" name="pants" placeholder="" value="{{ old('pants') }}">
                            </div>
                            <div class="col-4">
                                <label for="feet">Sapato *</label>
                                <input type="text" class="form-control" name="feet" placeholder="" value="{{ old('feet') }}">
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-3">
                                <label for="dummy">Manequim *</label>
                                <input type="text" class="form-control" name="dummy" placeholder="" value="{{ old('dummy') }}">
                            </div>
                            <div class="col-3">
                                <label for="bust">Busto (cm)</label>
                                <input type="text" class="form-control" name="bust" placeholder="" value="{{ old('bust') }}">
                            </div>
                            <div class="col-3">
                                <label for="waist">Cintura (cm)</label>
                                <input type="text" class="form-control" name="waist" placeholder="" value="{{ old('waist') }}">
                            </div>
                            <div class="col-3">
                                <label for="hip">Quadril (cm)</label>
                                <input type="text" class="form-control" name="hip" placeholder="" value="{{ old('hip') }}">
                            </div>
                        
                        </div>

                        <div class="form-group form-row">
                            <div class="col-4">
                                <label for="skin_color">Cor da pele *</label>
                                <input type="text" class="form-control" name="skin_color" placeholder="" value="{{ old('skin_color') }}">
                            </div>
                            <div class="col-4">
                                <label for="eye_color">Cor dos olhos *</label>
                                <input type="text" class="form-control" name="eye_color" placeholder="" value="{{ old('eye_color') }}">
                            </div>
                            <div class="col-4">
                                <label for="hair_color">Cor do cabelo *</label>
                                <select class="form-control" id="hair_color" name="hair_color">
                                    <option value="" selected="selected"> -- Selecione --</option>
                                    @foreach($hair_color_list as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-6">
                                <label for="hair_type">Tipo de cabelo *</label>
                                <input type="text" class="form-control" name="hair_type" placeholder="" value="{{ old('hair_type') }}">
                            </div>
                            <div class="col-6">
                                <label for="hair_size">Tamanho do cabelo *</label>
                                <input type="text" class="form-control" name="hair_size" placeholder="" value="{{ old('hair_size') }}">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col-3">
                                <label for="tattoo" class="d-block">Possui tatuagens? *</label>
                                
                                <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                    <input type="radio" class="custom-control-input" id="tattoo_active" name="tattoo" value="1">
                                    <label class="custom-control-label" for="tattoo_active">Sim</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                    <input type="radio" class="custom-control-input" id="tattoo_inactive" name="tattoo" checked value="0">
                                    <label class="custom-control-label" for="tattoo_inactive">Não</label>
                                </div>
                            </div>
                            <div class="col-9">
                                <label for="name">Quais locais do corpo?</label>
                                <input type="text" class="form-control" name="tattoo_location" placeholder="" value="{{ old('tattoo_location') }}">
                            </div>
                        </div>
                        
                    </div>
                    <!-- /INFORMAÇÕES FÍSICAS -->
                </div>

                <div class="row push">

                    <!-- INFORMAÇÕES ADICIONAIS -->
                    <div class="col-md-6">
                        <h2 class="content-heading pt-0">Informações adicionais</h2>
                        <div class="form-group form-row">
                            <div class="col-6">
                                <label for="practice_sports">Pratica algum esporte? *</label>
                                <input type="text" class="form-control" name="practice_sports" placeholder="" value="{{ old('practice_sports') }}">
                            </div>
                            <div class="col-6">
                                <label for="play_instrument">Toca algum instrumento musical? *</label>
                                <input type="text" class="form-control" name="play_instrument" placeholder="" value="{{ old('play_instrument') }}">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col-4">
                                <label for="film_outside" class="d-block">Grava em outras locais? *</label>
                                <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                    <input type="radio" class="custom-control-input" id="film_outside_active" name="film_outside" value="1">
                                    <label class="custom-control-label" for="film_outside_active">Sim</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                    <input type="radio" class="custom-control-input" id="film_outside_inactive" name="film_outside" checked value="0">
                                    <label class="custom-control-label" for="film_outside_inactive">Não</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="make_figuration" class="d-block">Aceita fazer figuração? *</label>
                                <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                    <input type="radio" class="custom-control-input" id="make_figuration_active" name="make_figuration" value="1">
                                    <label class="custom-control-label" for="make_figuration_active">Sim</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                    <input type="radio" class="custom-control-input" id="make_figuration_inactive" name="make_figuration" checked value="0">
                                    <label class="custom-control-label" for="make_figuration_inactive">Não</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="make_event" class="d-block">Aceita fazer eventos? *</label>
                                <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                    <input type="radio" class="custom-control-input" id="make_event_active" name="make_event" value="1">
                                    <label class="custom-control-label" for="make_event_active">Sim</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                    <input type="radio" class="custom-control-input" id="make_event_inactive" name="make_event" checked value="0">
                                    <label class="custom-control-label" for="make_event_inactive">Não</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /INFORMAÇÕES ADICIONAIS -->

                    <!-- DADOS BANCÁRIOS -->
                    <div class="col-md-6">
                        <h2 class="content-heading pt-0">Dados bancários</h2>
                        <div class="form-group form-row">
                            <div class="col-6">
                                <label for="bank_nro">Banco *</label>
                                <input type="text" class="form-control" name="bank_nro" placeholder="" value="{{ old('bank_nro') }}">
                            </div>
                            <div class="col-6">
                                <label for="back_agency">Agência *</label>
                                <input type="text" class="form-control" name="back_agency" placeholder="" value="{{ old('back_agency') }}">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col-4">
                                <label for="bank_account">Conta corrente *</label>
                                <input type="text" class="form-control" name="bank_account" placeholder="" value="{{ old('bank_account') }}">
                            </div>
                            <div class="col-4">
                                <label for="bank_holder_name">Nome do titular *</label>
                                <input type="text" class="form-control" name="bank_holder_name" placeholder="" value="{{ old('bank_holder_name') }}">
                            </div>
                            <div class="col-4">
                                <label for="bank_holder_cpf">CPF do titular *</label>
                                <input type="text" class="form-control" name="bank_holder_cpf" placeholder="" value="{{ old('bank_holder_cpf') }}">
                            </div>
                        </div>
                    </div>
                    <!-- /DADOS BANCÁRIOS -->

                </div>

                <div class="row push">
                    <!-- MENORIDADE -->
                    <div class="col-md-12">
                        <h2 class="content-heading pt-0">Menoridade</h2>
                        <div class="form-group form-row">
                            <div class="col-md-3">
                                <label for="tutor_name">Nome do responsável</label>
                                <input type="text" class="form-control" name="tutor_name" placeholder="" value="{{ old('tutor_name') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="tutor_rg">Nº identidade responsável</label>
                                <input type="text" class="form-control" name="tutor_rg" placeholder="" value="{{ old('tutor_rg') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="tutor_organ">Órgão Expedidor</label>
                                <input type="text" class="form-control" name="tutor_organ" placeholder="" value="{{ old('tutor_organ') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="tutor_cpf">CPF do responsável</label>
                                <input type="text" class="form-control" name="tutor_cpf" placeholder="" value="{{ old('tutor_cpf') }}">
                            </div>
                        </div>
                    </div>
                    <!-- /MENORIDADE -->
                </div>
            </div>

            <div class="tab-pane" id="profile-gallery" role="tabpanel">
                <h2 class="content-heading pt-0">Galeria de fotos</h2>
                <div class="row gutters-tiny js-gallery img-fluid-100 pb-4">
                    <div class="form-group">
                        <label>Enviar fotos</label>
                        <div class="custom-file">                        
                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                        <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien"      -->
                        <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-multiple-custom" name="images[]" multiple>
                        <label class="custom-file-label" for="images[]">Escolher arquivos</label>
                        </div>              
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group text-right">
        <a href="{{ route('profiles.index') }}" class="btn btn-danger push">Cancelar</a>
        <button type="submit" class="btn btn-success push">Salvar</button>
    </div>
    </form>
</div>
@endsection