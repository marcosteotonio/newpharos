@extends('layouts.site')

@section('css_after')
    <style>
        .map_image{
                width: 100%;
            }
        @media (min-width:1px) and (max-width:767px){
            .map_image{
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container padding-50"> <!-- CONTENT-BEGAN -->
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
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
                <br>
                <br>
                <br>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
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

                        <div class="bold margin-default">
                            <div style="width: 100%"><iframe width="100%" height="300" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Avenida%20Get%C3%BAlio%20Vargas%2C%201157+(Pharos%20Elenco)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Map a route</a></iframe></div><br />
                            <a href="https://www.google.com.br/maps/place/Av.+Get%C3%BAlio+Vargas,+1157+-+506+-+Menino+Deus,+Porto+Alegre+-+RS,+90150-005/@-30.0548176,-51.2257599,17z/data=!3m1!4b1!4m5!3m4!1s0x951978f5c00421cf:0xf32c7e2b63c39e92!8m2!3d-30.0548176!4d-51.2235712?hl=pt" class="text-small thin orange-logo-color" target="pharos_address"> Abrir Mapa</a>
                        </div>

                    </div>
            </div>
        </div>
    </div> <!-- CONTENT-END -->
@endsection

@section('js')
@endsection
