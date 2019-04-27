@extends('layouts.backend')

@section('content')
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
            <h3 class="block-title">Novo agenciado</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="content-heading pt-0">Informações pessoais</h2>
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="text-muted">
                            Hora de cadastrar um novo agenciado. Para isso basta preencher os dados que seguem.
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="form-group form-row">
                            <div class="col-6">
                                <label for="name">Nome completo *</label>
                                <input type="text" class="form-control" name="name" placeholder="">
                            </div>
                            <div class="col-6">
                                <label for="fancy_name">Nome artístico *</label>
                                <input type="text" class="form-control" name="fancy_name" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input">E-mail *</label>
                            <input type="email" class="form-control" name="email" placeholder="">
                        </div>
                        
                        <div class="form-group form-row">
                            <div class="col-6">
                                <label for="cpf">CPF *</label>
                                <input type="text" class="form-control" name="cpf" placeholder="">
                            </div>
                            <div class="col-6">
                                <label for="marital_status">Estado civil *</label>
                                <select class="form-control" id="marital_status" name="marital_status">
                                    <option value="Solteiro">Solteiro</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Separado">Separado</option>
                                    <option value="Divorciado">Divorciado</option>
                                    <option value="Viúvo">Viúvo</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group form-row">
                            <div class="col-6">
                                <label for="rg">RG *</label>
                                <input type="text" class="form-control" name="rg" placeholder="">
                            </div>
                            <div class="col-6">
                                <label for="organ">Orgão expedidor *</label>
                                <input type="text" class="form-control" name="organ" placeholder="">
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-6">
                                <label for="date_birth">Data de nascimento *</label>
                                <input type="text" class="form-control" name="date_birth" placeholder="">
                            </div>
                            <div class="col-6">
                                <label for="gender">Sexo *</label>
                                <select class="form-control" id="gender" name="marital_status">
                                    <option value="masculino">Masculino</option>
                                    <option value="feminino">Feminino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input">Naturalidade *</label>
                            <input type="email" class="form-control" name="email" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="example-text-input">Endereço *</label>
                            <input type="email" class="form-control" name="email" placeholder="">
                        </div>

                        <div class="form-group form-row">
                            <div class="col-6">
                                <label for="education">Operadora *</label>
                                <select class="form-control" id="education" name="marital_status">
                                    <option value="claro">Claro</option>
                                    <option value="vivo">Vivo</option>
                                    <option value="oi">Oi</option>
                                    <option value="tim">Tim</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="phone">Telefone *</label>
                                <input type="text" class="form-control" name="phone" placeholder="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="education">Escolaridade *</label>
                            <select class="form-control" id="education" name="education">
                                <option value="Fundamental Incompleto">Fundamental Incompleto</option>
                                <option value="Fundamental Completo">Fundamental Completo</option>
                                <option value="Médio Incompleto">Médio Incompleto</option>
                                <option value="Médio Completo">Médio Completo</option>
                                <option value="Superior Incompleto">Superior Incompleto</option>
                                <option value="Superior Completo">Superior Completo</option>
                                <option value="Pós-graduação Incompleto">Pós-graduação Incompleto</option>
                                <option value="Pós-graduação Completo">Pós-graduação Completo</option>
                                <option value="Pós-graduação (mestrado) Incompleto">Pós-graduação (mestrado) Incompleto</option>
                                <option value="Pós-graduação (mestrado) Completo">Pós-graduação (mestrado) Completo</option>
                                <option value="Pós-graduação (doutorado) Incompleto">Pós-graduação (doutorado) Incompleto</option>
                                <option value="Pós-graduação (doutorado) Completo">Pós-graduação (doutorado) Completo</option>
                            </select>
                        </div>

                        <h2 class="content-heading pt-0">Informações físicas</h2>

                        <div class="form-group form-row">
                            <div class="col-4">
                                <label for="weight">Peso (Kg) *</label>
                                <input type="text" class="form-control" name="weight" placeholder="">
                            </div>
                            <div class="col-4">
                                <label for="height">Altura *</label>
                                <input type="text" class="form-control" name="height" placeholder="">
                            </div>
                            <div class="col-4">
                                <label for="dummy">Manequim *</label>
                                <input type="text" class="form-control" name="dummy" placeholder="">
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-4">
                                <label for="shirt">Camisa *</label>
                                <input type="text" class="form-control" name="shirt" placeholder="">
                            </div>
                            <div class="col-4">
                                <label for="pants">Calça *</label>
                                <input type="text" class="form-control" name="pants" placeholder="">
                            </div>
                            <div class="col-4">
                                <label for="feet">Sapato *</label>
                                <input type="text" class="form-control" name="feet" placeholder="">
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-4">
                                <label for="hair_color">Cor do cabelo *</label>
                                <select class="form-control" id="hair_color" name="hair_color">
                                    <option value="Preto">Preto</option>
                                    <option value="Loiro">Loiro</option>
                                    <option value="Castanho">Castanho</option>
                                    <option value="Ruivo">Ruivo</option>
                                    <option value="Branco / Grisalho">Branco / Grisalho</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="hair_type">Tipo do cabelo *</label>
                                <select class="form-control" id="hair_type" name="hair_type">
                                    <option value="Original">Original</option>
                                    <option value="Tintura">Tintura</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="hair_size">Tamanho atual do cabelo *</label>
                                <input type="text" class="form-control" name="hair_size" placeholder="">                                
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-6">
                                <label for="eye_color">Cor dos olhos *</label>
                                <input type="text" class="form-control" name="eye_color" placeholder="">
                            </div>
                            <div class="col-6">
                                <label for="skin_color">Cor da pele *</label>
                                <input type="text" class="form-control" name="skin_color" placeholder="">
                            </div>
                        </div>
                        
                        <h2 class="content-heading pt-0">Dados bancários</h2>

                        <div class="form-group form-row">
                            <div class="col-4">
                                <label for="shirt">Banco *</label>
                                <input type="text" class="form-control" name="shirt" placeholder="">
                            </div>
                            <div class="col-4">
                                <label for="pants">Agência *</label>
                                <input type="text" class="form-control" name="pants" placeholder="">
                            </div>
                            <div class="col-4">
                                <label for="feet">Conta *</label>
                                <input type="text" class="form-control" name="feet" placeholder="">
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-6">
                                <label for="shirt">Nome do titular *</label>
                                <input type="text" class="form-control" name="shirt" placeholder="">
                            </div>
                            <div class="col-6">
                                <label for="feet">CPF do titular *</label>
                                <input type="text" class="form-control" name="feet" placeholder="">
                            </div>
                        </div>

                        <h2 class="content-heading pt-0">Alteração de senha</h2>

                        <div class="form-group form-row">
                            <div class="col-6">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" name="password" placeholder="">
                            </div>
                            <div class="col-6">
                                    <label for="password_confirmation">Confirma senha</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>

                <div class="row push">
                    <div class="col-lg-4">
                        <p class="text-muted">
                            Imagens
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5 overflow-hidden">
                        <div class="form-group">
                            <label class="d-block" for="image">Anexar imagem</label>
                            <input type="file" id="image" name="image">
                        </div>
                        {{-- <div class="form-group">
                            <label class="d-block" for="example-file-input-multiple">File Input (Multiple)</label>
                            <input type="file" id="example-file-input-multiple" name="example-file-input-multiple" multiple="">
                        </div> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection