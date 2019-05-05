@extends('layouts.site')

@section('css_after')
@endsection

@section('content')
    <div class="container padding-50"> <!-- CONTENT-BEGAN -->
    
        {!! Form::open(['url' => url( env('APP_PREFIX') .'/elencos'),'class'=> '','name' => 'pesquisa_form', 'method'=> 'get', 'style'=> ''])!!}
        <div class="row">
            
            <div class="col-md-4 col-sm-12 col-xs-12">
                <i class="fa fa-star fa-lg" style="color: #ffa916;"></i>
                <label class='text-uppercase large-text bold'> Agenciados</label>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="inline-flex float-right form-busca-agenciado">
                        {!! Form::text('search', isset($input['search']) ? $input['search'] : '' , ['class'=> 'input-text-w-image', 'placeholder' => 'Encontre um agenciado...'])!!}
                        <button type="submit" class="btn-transparent">
                            <i class='fa fa-search'></i>
                        </button>
                </div>
            </div>


            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="bg-gray rounded-corner" id="characteristics" style="padding: 15px">
                            <div class="row">
                                @if(1)
                                <div class="col-md-12 col-sm-4">
                                    <div class="form-group age">
                                        <label class="">Faixa Etária</label>
                                        <div class="form-check">
                                            <input class="side_search form-check-input" type="checkbox" value="0_20" name="age[]" <?php if( isset($input['age']) ){ if( in_array(   '0_20', $input['age']) ){ echo 'checked="true"'; } } else { echo 'checked="true"'; };  ?>  >
                                            <label class="form-check-label normal" for="age['0_20']">até 20</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="side_search form-check-input" type="checkbox" value="20_30" name="age[]" <?php if( isset($input['age']) ){ if( in_array(   '20_30', $input['age']) ){ echo 'checked="true"'; } } else { echo 'checked="true"'; };  ?>  >
                                            <label class="form-check-label normal" for="age['20_30']">20 a 30</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="side_search form-check-input" type="checkbox" value="30_40" name="age[]" <?php if( isset($input['age']) ){ if( in_array(   '30_40', $input['age']) ){ echo 'checked="true"'; } } else { echo 'checked="true"'; };  ?>  >
                                            <label class="form-check-label normal" for="age['30_40']">30 a 40</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="side_search form-check-input" type="checkbox" value="40_50" name="age[]" <?php if( isset($input['age']) ){ if( in_array(   '40_50', $input['age']) ){ echo 'checked="true"'; } } else { echo 'checked="true"'; };  ?>  >
                                            <label class="form-check-label normal" for="age['40_50']">40 a 50</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="side_search form-check-input" type="checkbox" value="50_100" name="age[]" <?php if( isset($input['age']) ){ if( in_array(   '50_100', $input['age']) ){ echo 'checked="true"'; } } else { echo 'checked="true"'; };  ?>  >
                                            <label class="form-check-label normal" for="age['50-99']">Acima de 50</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-4">
                                    <div class="form-group sex">
                                        <label class="">Sexo</label>
                                        <div class="form-check">
                                            <input class="side_search form-check-input" type="checkbox" value="feminino" <?php if( isset($input['sex']) ){ if( in_array(   'feminino', $input['sex']) ){ echo 'checked="true"'; } } else { echo 'checked="true"'; };  ?> name="sex[]">
                                            <label class="form-check-label normal" for="sex['F']">Feminino</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="side_search form-check-input" type="checkbox" value="masculino" <?php if( isset($input['sex']) ){ if( in_array( 'masculino', $input['sex']) ){ echo  'checked="true"'; } } else { echo 'checked="true"'; };  ?> name="sex[]">
                                            <label class="form-check-label normal" for="sex['M']">Masculino</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-4">
                                    <div class="form-group hair">
                                        <label class="">Cabelo</label>
                                        <div class="form-check">
                                            <input class="side_search form-check-input" type="checkbox" value="preto" name="hair[]" <?php if( isset($input['hair']) ){ if( in_array( 'preto', $input['hair']) ){ echo  'checked="true"'; } } else { echo 'checked="true"'; }; ?> >
                                            <label class="form-check-label normal" for="hair[]">Preto</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="side_search form-check-input" type="checkbox" value="loiro" name="hair[]" <?php if( isset($input['hair']) ){ if( in_array( 'loiro', $input['hair']) ){ echo  'checked="true"'; } } else { echo 'checked="true"'; }; ?> >
                                            <label class="form-check-label normal" for="hair[]">Loiro</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="side_search form-check-input" type="checkbox" value="castanho" name="hair[]" <?php if( isset($input['hair']) ){ if( in_array( 'castanho', $input['hair']) ){ echo  'checked="true"'; } } else { echo 'checked="true"'; }; ?> >
                                            <label class="form-check-label normal" for="hair[]">Castanho</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="side_search form-check-input" type="checkbox" value="ruivo" name="hair[]" <?php if( isset($input['hair']) ){ if( in_array( 'ruivo', $input['hair']) ){ echo  'checked="true"'; } } else { echo 'checked="true"'; }; ?> >
                                            <label class="form-check-label normal" for="hair[]">Ruivo</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="side_search form-check-input" type="checkbox" value="grisalhos" name="hair[]" <?php if( isset($input['hair']) ){ if( in_array( 'grisalhos', $input['hair']) ){ echo  'checked="true"'; } } else { echo 'checked="true"'; }; ?> >
                                            <label class="form-check-label normal" for="hair[]">Brancos/Grisalhos</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-4 col-push-8">
                                    <button type="submit" class="btn btn-access runFilter"> Filtrar </button>
                                </div>

                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="mobile-show" style="display: none;">
                            <br>
                            <br>
                            <div class="elenco">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="owl-carousel owl-theme owl-loaded owl-drag" style="display: none">
                                            @foreach($profiles as $key => $val)
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
                        <div class="row mobile-hide">
                            @forelse ($profiles as $profile)
                                <?php $profile->toArray(); ?>
                                <div class="col-xl-3 col-md-6 col-sm-6 col-xs-12" style="padding-bottom: 15px" id="elenco-{{$profile['id']}}">
                                    <a href="<?php echo url( env('APP_PREFIX') .'/elenco/'. $profile->slug ); ?>">
                                        <div class="ElencoShowCase__image"
                                            style="background-image: url('<?php echo '/uploads/profiles/' . $profile['user_id'] . '/' . $profile['medias'][0]['path'] ;?>'); height: 250px;">
                                        </div>
                                    </a>
                                    <div class="ElencoShowCase__name">
                                        {{ $profile->fancy_name }}
                                    </div>
                                    <div class="ElencoShowCase__description">
                                        {{ $profile->years_old }}
                                        <?php
                                            $ocupation = "";
                                            if( $profile->occupation ){
                                                $ocupation = ' - '.$profile->occupation;
                                            } else if($profile->alternative_occupation){
                                                $ocupation =  ' - '.$profile->alternative_occupation;
                                            }
                                            $size = 24;
                                            if(strlen($ocupation) >= $size){
                                                echo substr($ocupation, 0, $size). '...';
                                            } else {
                                                echo $ocupation;

                                            }
                                        ?>
                                    </div>
                                </div>
                            @empty
                                <div class="col-xs-12 ElencoShowCase__image" style="padding-bottom: 15px; text-align: center; display: grid; align-content: center;">
                                    SEM RESULTADOS!
                                </div>
                            @endforelse

                        </div>
                        <div class="col-md-12" style="padding-bottom: 15px">
                            <!-- {..!! $profiles->render() !!} -->
                            {{ $profiles->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {!! Form::close()!!}
    </div> <!-- CONTENT-END -->
@endsection


@section('js_after')
<script type="text/javascript">
    console.log('MAY the "Gambiarra" begin')
    
    document.querySelectorAll('.side_search').forEach((e)=>{
        e.addEventListener('change', (el)=>{
            $('Form[name=search]').submit()
        })
    })

    $(document).ready(function(){
        setTimeout(() => {
            let url = window.location.href
            $('.page-link').each(function(k, v){
                let href = v.href
                if( href ){
                    if( url.indexOf('?') !== -1 ){
                        v.href = url + '&' + href.split('?')[1]
                    } else {
                        v.href = url + '?' + href.split('?')[1]
                    }
                }
            })
        }, 1300);
    })
    function submit(){
        $('Form[name=search]').submit()
    }

    $('.owl-carousel').owlCarousel({
        items: 4,
        // loop:true,
        margin:10,
        nav: true,
        dots: false,
        // autoplay:true,
        // infinite: true,
        lazyLoadEager: true,
        // autoplayHoverPause: true,
        navText: ['<i class="fa fa-angle-left fa-2x"></i>','<i class="fa fa-angle-right fa-2x"></i>'],
        responsive:{
            0:{
                items: 1
            },
            600:{
                items: 2
            },
            1000:{
                items: 4
            }
        }
    }).show()
    
</script>
@endsection
