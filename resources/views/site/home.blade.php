@extends('layouts.home')

@section('css_after')
    <style>
        .ElencoShowCase{
            padding: 5px;
        }
        .owl-prev{
            position: absolute;
            top: 40%;
            left: -15px;
        }
        .owl-next{
            position: absolute;
            top: 40%;
            right: -15px;
        }
    </style>
    <style>
        .worksHomePage{
            display: grid;
            grid-template-columns: 50% 50%;
            grid-gap: 15px;
        }
        .mainWork{
            grid-row: 1fr;
            grid-column: 1fr;
            height: 500px;
            border-radius: 10px;
        }
        .secWork{
            display: grid;
            grid-template-rows: repeat(2, 1fr);
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 15px;

        }
        .work{
            display: grid;
            align-items: end;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr;
            background-size: cover;
        }
        .mainWork__Information{
            background-image: linear-gradient(#fff0 -20px, black);
            padding: 10px 15px 10px 15px;
            color: white;
            border-radius: 0 0 10px 10px;
        }

        .work__Information{
            background-image: linear-gradient(#fff0 -20px, black);
            padding: 10px 15px 10px 15px;
            color: white;
        }
        .work__Information__agency{
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .work__Information__tipo{
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .work__Information__work_title{
            font-size: 26px;
            font-weight: 600;
            text-transform: uppercase;
            
        }
        .work__Information__work_description{
            font-size: 16px;
            font-weight: 600;
            line-height: 105%;
            padding: 5px 0px;
        }
        .secWork__block{
            display: grid;
            grid-template-rows: auto 40px;
        }
    </style>
@endsection

@section('content')

    <div class="container padding-50">
        <div class="upperButtons">
            <div class="row">
                <div class="col md-12">
                    <div class="inline-flex float-right btn_facaparte">
                        <a href="#">
                            <div class="btn btn-golden">FAÇA PARTE DO NOSSO ELENCO</div>
                        </a>
                    </div>
                    <div class="inline-flex float-right form-busca-agenciado">
                        {!! Form::open(['url' => url( env('APP_PREFIX') .'/elencos'),'class'=> '','name' => 'pesquisa_form', 'method'=> 'get', 'style'=> ''])!!}
                            {!! Form::text('search', isset($input['search']) ? $input['search'] : '' , ['class'=> 'input-text-w-image', 'placeholder' => 'Encontre um agenciado...'])!!}
                            <button type="submit" class="btn-transparent">
                                <i class='fa fa-search'></i>
                            </button>
                        {!! Form::close()!!}
                    </div>
                </div>
            </div>
            
        </div> 
        <div class="row padding-15">
            <div class="col-md-12">
                <div class="title-block">
                    AGENCIADOS / ADULTOS
                </div>
                <div class="elenco">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel owl-theme owl-loaded owl-drag" style="display: none">
                                @foreach($elencoShowCase as $key => $val)
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
            </div>
        </div>
        <div class="row padding-15">
            <div class="col-md-12 text-center padding-15">
                @include('includes.btn_decorated', [
                'url' => url( env('APP_PREFIX').'/elencos?age[]=20_30&age[]=30_40&age[]=40_50&age[]=50_100' ),
                'text' => 'VEJA TODO  O NOSSO ELENCO ADULTO'
                ])
            </div>
        </div>

        <div class="row padding-15">
            <div class="col-md-12">
        
                <div class="title-block">
                    AGENCIADOS / INFANTIL
                </div>
                <div class="elenco">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel owl-theme owl-loaded owl-drag" style="display: none" >
                                @foreach($elencoKidShowCase as $key => $val)
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
            </div>
        </div>
        <div class="row padding-15">
            <div class="col-md-12 text-center padding-15">
            @include('includes.btn_decorated', [
                'url' => url( env('APP_PREFIX').'/elencos?search=&age[]=0_20' ),
                'text' => 'VEJA TODO  O NOSSO ELENCO INFANTIL'
            ])
            </div>
        </div>
        
    </div>
    
@endsection

@section('works')
<?php //dd($WorksShowCase[0]->media) ?>

    <div class="container padding-15">
        <div class="row">
            <div class="col-md-12">
                <div class="title-block">
                    <i class="fa fa-star" style="color: yellow"></i> TRABALHOS
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="worksHomePage">
                    @if( !isset($secWorksShowCase) )
                        <a href="<?php echo url( env('APP_PREFIX').'trabalho/'.$WorksShowCase[0]->slug ); ?>" 
                            class="work mainWork"
                            style="background-image: url('<?php echo $WorksShowCase[0]->media; ?>">
                            <div class="mainWork__Information">
                                <div class="work__Information__agency">
                                    <?php
                                    if( strlen($WorksShowCase[0]->subtitle) >= 30){
                                        echo substr( $WorksShowCase[0]->subtitle, 0, 30);
                                    } else {
                                        echo $WorksShowCase[0]->subtitle;
                                    }
                                    ?>
                                </div>
                                <div class="work__Information__work_title">
                                    {{ $WorksShowCase[0]->title }}
                                </div>
                            </div>
                        </a>

                        <div class="secWork">
                        
                            @foreach($secWorksShowCase as $chave => $val)
                            <?php //dd($chave) ?>
                                @if($chave != 0 || $chave <= 3 )
                                    <a href="{{ url(env('APP_PREFIX').'trabalho/'.$val->slug) }}" class="secWork__block">
                                        <div class="work"style="background-image: url('<?php echo $val->media; ?>')">
                                            <div class="work__Information">
                                                <div class="work__Information__tipo">
                                                    <?php
                                                    if( strlen($val->subtitle) >= 30){
                                                        echo substr( $val->subtitle, 0, 30);
                                                    } else {
                                                        echo $val->subtitle;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="work__Information__work_description">
                                            {{ $val->title }}
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row padding-15">
            <div class="col-md-12 text-center padding-15">
                @include('includes.btn_decorated', ['url' => url( env('APP_PREFIX').'/trabalhos' ),'text' => 'Veja todos os nossos trabalhos'])
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                items: 4,
                loop:true,
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
