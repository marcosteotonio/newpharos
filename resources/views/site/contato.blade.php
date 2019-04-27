@extends('layouts.site')

@section('css_after')
@endsection

@section('content')
    <div class="container padding-50"> <!-- CONTENT-BEGAN -->
        <div class="row">
            
            <div class="col-md-8 col-sm-8 col-xs-12">
                <label class='text-uppercase large-text bold'> CONTATO </label>
                {!! Form::open([]) !!}
                    <div class="form-group">
                        {!! Form::label('name','Nome') !!}
                        {!! Form::text('name', null, ['class' => 'form-control bg-gray-light'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email','E-mail') !!}
                        {!! Form::email('email', null, ['class' => 'form-control bg-gray-light'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone','Telefone') !!}
                        {!! Form::text('phone', null, ['class' => 'form-control bg-gray-light'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('message','Mensagem') !!}
                        {!! Form::textarea('message', null, ['class' => 'form-control bg-gray-light'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Enviar',['class' => 'btn btn-access', 'style' => 'float: right'])!!}
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="bg-gray-light rounded-corner padding-normal">
                        <div class="">
                            <i class="fa fa-phone-square fa-lg orange-logo-color"></i><br>
                        </div>
                        <div class="text-medium bold margin-default">
                            (51) 3209-8378
                        </div>

                        <div class="">
                            <i class="fa fa-envelope fa-lg orange-logo-color"></i><br>
                        </div>
                        <div class="text-medium bold margin-default">
                            alexandre@pharoselenco.com.br<br>
                            claudia@pharoselenco.com.br
                        </div>

                        <div class="">
                            <i class="fa fa-map-marker-alt fa-lg orange-logo-color"></i><br>
                        </div>
                        <div class="text-medium bold margin-default">
                            Avenida Getúlio Vargas, 1157<br>
                            sala 506 - Menino Deus<br>
                            Porto Alegue - RS - Brasil
                        </div>

                        <div class=" bold margin-default">
                            <img src="<?php echo url( env('APP_PREFIX') . '/images/maps-local.png' ); ?>" alt=""><br>
                            <a href="#" class="text-small thin orange-logo-color"> Abrir Mapa</a>
                        </div>

                    </div>
            </div>
        </div>
    </div> <!-- CONTENT-END -->
@endsection

@section('js')
@endsection
