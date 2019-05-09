@extends('layouts.site')

@section('css_after')
<style>
    .works{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 15px;
    }
    .work__item{
        display: grid;
        grid-template-rows: 1fr;
        grid-template-columns: 1fr;
    }
    .work__inside{
        display: grid;
        align-items: end;
    }
    .work__image{
        background-size: cover;
        background-repeat: no-repeat;
    }
    
    .works__item__main{
        grid-row: 1 / 3;
        grid-column: 1 / 3;
    }
    .work__item__information{
        background-image: linear-gradient(#fff0 -20%, #000);
        padding: 5px 10px;
        color: white;
    }
    .work__item__information_main{
        padding: 25px 25px 25px 25px;
    }
    .work__Information__title{
        text-transform: uppercase;
    }
    .works__item__sec{
        height: 250px;
    }
    .rounded-base{
        border-radius: 0px 0px 10px 10px;
    }
    .xlarge-text{
        font-size: 36px
    }
</style>
@endsection

@section('content')
    <div class="container padding-50"> <!-- CONTENT-BEGAN -->
        <div class="row">
            <div class="col-md-12">
                <label class='text-uppercase large-text bold'> Trabalhos</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="works">
                    
                    @forelse($works as $key =>  $val)
                        <?php if(!$val['media']){
                            $val['media'] = 'default_notice.png';
                        }?>
                            @if( in_array( $key, ['0']) )
                                <a href="<?php echo url( env('APP_PREFIX') . '/trabalho/' . $val['slug'] ); ?>"
                                class="work__item works__item__main work__image rounded-corner"
                                style="background-image: url('uploads/notices/<?php echo $val['media']; ?>'); background-position: 50% 50%; ">
                                    <div class="work__inside">
                                        <div class="work__item__information work__item__information_main rounded-base">
                                            <div class="work__Information__title medium-text bold">
                                                <?php
                                                    $txt = $val['subtitle'];
                                                    $len = 35;
                                                    if( strlen( $txt ) <= $len ){
                                                        echo  $txt;
                                                    } else {
                                                        echo substr($txt, 0, $len).'...';
                                                    }
                                                ?>
                                            </div>
                                            <div class="work__Information__subtitle xlarge-text bold">
                                                
                                                <?php
                                                    $txt = $val['title'];
                                                    $len = 25;
                                                    if( strlen( $txt ) <= $len ){
                                                        echo  $txt;
                                                    } else {
                                                        echo substr($txt, 0, $len).'...';
                                                    }
                                                ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @else
                                <a href="<?php echo url( env('APP_PREFIX') . '/trabalho/' . $val['slug'] ); ?>" class="work__item works__item__sec">
                                    <div class="work__inside work__image" style="background-image: url('uploads/notices/<?php echo $val['media'] ; ?>'); background-position: 50% 50%;">
                                        <div class="work__item__information">
                                            <div class="work__Information__title bold">
                                                <?php
                                                    $txt = $val['subtitle'];
                                                    $len = 25;
                                                    if( strlen( $txt ) <= $len ){
                                                        echo  $txt;
                                                    } else {
                                                        echo substr($txt, 0, $len).'...';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="work__Information__subtitle bold">
                                        <?php
                                            $txt = $val['title'];
                                            $len = 25;
                                            if( strlen( $txt ) <= $len ){
                                                echo  $txt;
                                            } else {
                                                echo substr($txt, 0, $len).'...';
                                            }
                                        ?>
                                    </div>
                                </a> 
                            @endif
                    @empty
                        <div class="" style="grid-row: 1; grid-column: 1 / 4">
                            Aqui estaremos expondo os trabalhos que nossa agência tem atuado no momento.<br>
                            Tente voltar mais tarde...
                        </div>
                    @endforelse
                </div>
            </div> 
        </div>
    </div> <!-- CONTENT-END -->
@endsection

@section('js')
@endsection
