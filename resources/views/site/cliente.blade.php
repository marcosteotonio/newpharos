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
        <div class="col-md-12 col-sm-12 col-xs-12">
            <i class="fa fa-star fa-lg" style="color: #ffa916;"></i>
            <label class="text-uppercase large-text bold"> AGENCIADOS QUE DEMONSTREI INTERESSE</label>
        </div>
        @if(count($favoritos))
        <div class="elenco">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme owl-loaded owl-drag" style="display: none">

                        @foreach($favoritos as $key => $val)
                            <div class="ElencoShowCase" style=" max-height: 400px; max-width: 400px;">
                                <a href="{{ url(env('APP_PREFIX').'/elenco/'.$val['slug'] ) }}">
                                    <div class="ElencoShowCase__image"
                                         style="background-image: url( '<?php
                                         echo url( env('APP_PREFIX'). '/uploads/profiles/' . $val['user_id'] . '/' . $val['medias'][0]['path'] ); ?>' );">
                                    </div>
                                </a>
                                <div class="ElencoShowCase__name">
                                    {{ $val['fancy_name'] }}
                                </div>
                                <div class="ElencoShowCase__description">
                                    {{ $val['years_old'] }}
                                    <?php
                                    if(0){
                                        $ocupation = "";
                                        if( $val['occupation'] ){
                                            $ocupation = ' - '.$val['occupation'];
                                        } else if($val['alternative_occupation']){
                                            $ocupation =  ' - '.$val['alternative_occupation'];
                                        }
                                        $size = 24;
                                        if(strlen($ocupation) >= $size){
                                            echo substr($ocupation, 0, $size). '...';
                                        } else {
                                            echo $ocupation;

                                        }
                                    } else {
                                        echo $val['gender'];
                                    }
                                    ?>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        @else
            <div style="text-align: center">Você não possui nenhum agenciado adicionado, por favor acesse a página elenco.</div>
        @endif
    </div> <!-- CONTENT-END -->
@endsection

@section('js')
@endsection

@section('js_after')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                items: 4,
                loop:{{( count($favoritos) >= 4 ? "true" : "false"  )}},
                margin:10,
                nav:true,
                dots: false,
                autoplay:true,
                // infinite: true,
                lazyLoadEager: true,
                autoplayHoverPause: true,
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
    </script>
@endsection
