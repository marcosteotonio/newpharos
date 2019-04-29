@extends('layouts.site')
<?php
use Carbon\Carbon;
?>
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
                                    {!! Form::text('email', $user->email ,['class' => 'form-control'])!!}
                                </div>
                            
                                <div class="form-group">
                                    {!! Form::label('name','Nome')!!}
                                    {!! Form::text('name', $user->name,['class' => 'form-control'])!!}
                                </div>
                                <!--  -->
                                <div class="form-group" style="width: 37%; padding-right: 5px; display: inline-block;">
                                    {!! Form::label('date_birth','Data de Nascimento')!!}
                                    {!! Form::text('date_birth', isset($profile->date_birth) ? Carbon::parse( $profile->date_birth )->format('d/m/Y'): '',['class' => 'form-control', 'style' => ''])!!}
                                </div>

                                <div class="form-group" style="width: 20%;  padding-right: 5px; display: inline-block;">
                                    {!! Form::label('height','Altura')!!}
                                    {!! Form::text('height', isset($profile->height) ? $profile->height : '',['class' => 'form-control', 'style' => ''])!!}
                                </div>

                                <div class="form-group" style="width: 20%; padding-right: 5px;  display: inline-block;">
                                    {!! Form::label('dummy','Manequin')!!}
                                    {!! Form::text('dummy', isset( $profile->dummy) ? $profile->dummy : '',['class' => 'form-control', 'style' => ''])!!}
                                </div>

                                <div class="form-group" style="width: 20%; display: inline-block; float: right;">
                                    {!! Form::label('feet','Calçado')!!}
                                    {!! Form::text('feet', isset($profile->feet) ? $profile->feet : '',['class' => 'form-control', 'style' => ''])!!}
                                </div>
                                <!--  -->

                                <div class="form-group" style="">
                                    <label for="">Sexo</label><br>
                                    <input  name="gender" type="radio" value="masculino" <?php if(isset($profile->gender)){ if($profile->gender == 'masculino'){ echo  'checked="true"'; } }?> > Masculino
                                    &nbsp; &nbsp;
                                    <input  name="gender" type="radio" value="feminino" <?php if(isset($profile->gender)){ if($profile->gender == 'feminino'){ echo  'checked="true"'; } } ?> > Feminino
                                </div>

                                <div class="form-group" style="">
                                    {!! Form::label('resume','Currículo')!!}
                                    {!! Form::textarea('resume', '',['class' => 'form-control', 'style' => 'background-color: #eee;'])!!}
                                </div>

                                <!--  -->

                                <div class="form-group" style="">
                                    {!! Form::label('file','Foto de Apresentação')!!}
                                    {!! Form::file('media[]')!!}
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
                                    <div class="row">
                                        <div class="col md-12">
                                            <style>
                                            
                                            </style>
                                            <div class="owl-carousel owl-theme owl-loaded owl-drag">
                                                @if($profile)
                                                    @forelse($profile->toArray()['medias'] as $key => $val )
                                                    <div class="media_list">
                                                        <div class="media_list__delete">
                                                            <i class="fa fa-trash" style=" color: #9f432c"></i>
                                                        </div>
                                                        <div class="media_list__background" style="background-image: url( '<?php echo url( '/uploads/profiles/' .$profile->user_id.'/'. $val['path'] ); ?>' );">
                                                        </div>
                                                    </div>
                                                    @endforelse
                                                @forelse
                                                    <div class="media_list">
                                                        <div class="media_list__background">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group" style="">
                                        {!! Form::label('file', 'Adicionar Foto')!!}
                                        {!! Form::file('media[]')!!}
                                    </div>
                                </div>


                                

                            {!! Form::close()!!}
                        </div>
                </div>
            </div>
            
       </div>
    </div> <!-- CONTENT-END -->
@endsection

@section('js_after')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                items: 4,
                margin:10,
                nav:true,
                dots: false,
                lazyLoadEager: true,
                navText: ['<i class="fa fa-angle-left fa-2x"></i>','<i class="fa fa-angle-right fa-2x"></i>'],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:4
                    }
                }
            }).show()
        });

        var  new_form_yt = '<div class="form-group" style=""> \
                    <input class="form-control" placeholder="Digiteo título do vídeo" style="display: inline-block; width: 39%; background-color: #fff !important;" name="title_yt[]" type="text" value=""> \
                    <input class="form-control" placeholder="Digiteo título do vídeo" style="display: inline-block; width: 49%; background-color: #fff !important;" name="link_yt[]" type="text" value=""> \
                    <button type="button" class="btn btn-access" style="float: right;"><i class="fa fa-check"></i></button> \
                </div>'
    </script>
@endsection
