@extends('layouts.site')

@section('css_after')
    <style>
        .perfil_buttons_area{
            height: 500px;
            display: grid;
            align-content: center;
            text-align: center;
        }
        .btn-profile{
            height: 250px;
            width: 250px;
            border: 1px solid #dddd;
            background-color: white;
            font-size: 18px;
            text-transform: uppercase;
            font-weight: 600;
        }
        
        .btn-profile i{
            margin-bottom: 40px;
            font-size: 50px;
            color: #9e442c;
        }
        .btn-profile:first-child{
            margin-right: 25px;
        }
        .perfil_buttons_area__title{
            margin-bottom: 60px;
            font-size: 34px;
            font-weight: 600;
        }
        .pointer{
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="container padding-15"> <!-- CONTENT-BEGAN -->
        <div class="perfil_buttons_area">
            <div>
                <div class="perfil_buttons_area__title">
                    ÁREA DO AGENCIADO
                </div>
                @if($profile)
                    <a href="{{ url( env('APP_PREFIX').'/elenco/'.$profile->slug) }}">
                        <button class="btn-profile pointer">
                            <i class="fa fa-fw fa-eye"></i><br>
                            visualizar perfil
                        </button>      
                    </a>
                @endif
                <a href="{{ url(env('APP_PREFIX').'/perfil/editar') }}">
                    <button class="btn-profile pointer">
                        <i class="fa fa-fw fa-edit"></i><br>
                        editar perfil
                    </button>
                </a>
            </div>
        </div>

    </div> <!-- CONTENT-END -->
@endsection

@section('js')
@endsection
