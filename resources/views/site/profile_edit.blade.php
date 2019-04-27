@extends('layouts.site')

@section('css_after')
<style>
    .profile_edit{

    }
    .profile_edit__title{
        text-transform: uppercase;
        margin-bottom: 30px;
        font-size: 34px;
        font-weight: 600;
    }
</style>
@endsection

@section('content')
    <div class="container padding-65 profile_edit"> <!-- CONTENT-BEGAN -->
       <div class="row">
            <div class="col-md-3"> </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile_edit__title">
                            Editar Perfil
                        </div>
                    </div>
                        <div class="col-md-12">
                            {!! Form::open(['method' => 'post'])!!}

                                <div class="form-group">
                                    {!! Form::label('email','Email')!!}
                                    {!! Form::text('email', '',['class' => 'form-control'])!!}
                                </div>
                            
                                <div class="form-group">
                                    {!! Form::label('nome','Nome')!!}
                                    {!! Form::text('nome', '',['class' => 'form-control'])!!}
                                </div>
                                <!--  -->
                                <div class="form-group" style="width: 37%; padding-right: 5px; display: inline-block;">
                                    {!! Form::label('dt_nasc','Data de Nascimento')!!}
                                    {!! Form::text('dt_nasc', '',['class' => 'form-control', 'style' => ''])!!}
                                </div>

                                <div class="form-group" style="width: 20%;  padding-right: 5px; display: inline-block;">
                                    {!! Form::label('height','Altura')!!}
                                    {!! Form::text('height', '',['class' => 'form-control', 'style' => ''])!!}
                                </div>

                                <div class="form-group" style="width: 20%; padding-right: 5px;  display: inline-block;">
                                    {!! Form::label('type','Manequin')!!}
                                    {!! Form::text('type', '',['class' => 'form-control', 'style' => ''])!!}
                                </div>

                                <div class="form-group" style="width: 20%; display: inline-block; float: right;">
                                    {!! Form::label('shoes','Calçado')!!}
                                    {!! Form::text('shoes', '',['class' => 'form-control', 'style' => ''])!!}
                                </div>
                                <!--  -->

                                <div class="form-group" style="">
                                    {!! Form::label('','Sexo')!!}<br>
                                    {!! Form::radio('sex', 'M',  ['class' => 'form-control', 'style' => '' ]) !!}  Masculino
                                    &nbsp &nbsp
                                    {!! Form::radio('sex', 'F',  ['class' => 'form-control', 'style' => '']) !!} Feminino
                                </div>

                                <div class="form-group" style="">
                                    {!! Form::label('resume','Calçado')!!}
                                    {!! Form::textarea('resume', '',['class' => 'form-control', 'style' => 'background-color: #eee;'])!!}
                                </div>

                                <!--  -->

                                <div class="form-group" style="">
                                    {!! Form::label('file','Foto de Apresentação')!!}
                                    {!! Form::file('image')!!}
                                </div>

                                <!--  -->
                                <div class="" style="background-color: #eee; padding: 15px;">
                                    <div class="title_yt">
                                        Playlist de Vídeos
                                    </div>
                                    <div class="form-group" style="">
                                        {!! Form::text('title_yt[]', '',['class' => 'form-control', 'placeholder' => 'Digiteo título do vídeo', 'style' => 'display: inline-block; width: 39%;'])!!}
                                        {!! Form::text('link_yt[]', '',['class' => 'form-control', 'placeholder' => 'Digiteo título do vídeo', 'style' => 'display: inline-block; width: 49%;'])!!}
                                        <button type="button" class="btn" style="float: right;"><i class="fa fa-trash" style=" color: #9f432c"></i></button>
                                    </div>
                                    <div class="form-group" style="">
                                        {!! Form::text('title_yt[]', '',['class' => 'form-control', 'placeholder' => 'Digiteo título do vídeo', 'style' => 'display: inline-block; width: 39%; background-color: #fff !important;'])!!}
                                        {!! Form::text('link_yt[]', '',['class' => 'form-control', 'placeholder' => 'Digiteo título do vídeo', 'style' => 'display: inline-block; width: 49%; background-color: #fff !important;'])!!}
                                        <button type="button" class="btn btn-access" style="float: right;"><i class="fa fa-check"></i></button>
                                    </div>
                                    <div style=" text-align: right;">
                                        <button type="button" class="btn btn-access" style=""> <i class="fa fa-plus-circle"></i> Adicionar Vídeo</button>
                                    </div>
                                </div>
                                <br>
                                <div class="" style="background-color: #eee; padding: 15px;">
                                    <div class="title_yt">
                                        Galeria de Fotos
                                    </div>
                                    <div class="form-group" style="">
                                        {!! Form::text('image_profile[]', '',[
                                        'class' => 'form-control',
                                        'placeholder' => 'Digiteo título do vídeo',
                                        'style' => 'display: inline-block; width: 39%;'])!!}
                                        <button type="button" class="btn" style="float: right;"><i class="fa fa-trash" style=" color: #9f432c"></i></button>
                                    </div>
                                    
                                    <div style=" text-align: right;">
                                        <button type="button" class="btn btn-access" style=""> <i class="fa fa-plus-circle"></i> Adicionar Imagem</button>
                                    </div>
                                </div>


                                

                            {!! Form::close()!!}
                        </div>
                </div>
            </div>
            
       </div>
    </div> <!-- CONTENT-END -->
@endsection

@section('js')
<script>
</script>
@endsection
