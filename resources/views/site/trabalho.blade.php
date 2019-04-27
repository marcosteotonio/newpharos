@extends('layouts.site')

@section('css_after')
<style>
    .works{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 15px;
    }
    .xlarge-text{
        font-size: 36px
    }
    .outros_trabalhos{
        background-color: #f0f0f0;
        min-height: 100px;
        padding: 15px;
    }
    .work__title{
        font-size: 32px;
        font-weight: 600;
    }
    .work__agency{
        text-transform: uppercase;
        font-weight: 600;
        color: #aaa;
        line-height: 60%;
    }
    .work_image_main{
        width: 100%;
    }
    .title_other_works{
        text-align: right;
        font-size: x-large;
        line-height: 100%;
        font-weight: 800;
    }
    .image_others_works{

    }

    // 

    .works{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 15px;
    }
    .work__item{
        display: grid;
        grid-template-rows: 1fr;
        grid-template-columns: 1fr;
        margin: 15px 0;
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
            <div class="col-md-8">

                <div class="row">
                    <div class="col-md-9">
                        <div class="work__title">
                            {{ $work[0]->subtitle }}
                        </div>
                        <div class="work__agency">
                            {{ $work[0]->title }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="float-right">
                            <a href="#" class="btn btn-access" style="height: 50px; padding: 13px;">
                                <i class="fa fa-fw fa-share-alt fa-lg d-sm-none"></i>
                                <i class="fa fa-fw fa-share-alt fa-lg ml-1 d-none d-sm-inline-block"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 padding-15">
                        <img  class="work_image_main" src="<?php echo url( env('APP_PREFIX') . $work[0]->media ); ?>" alt="">
                    </div>
                    <div class="col-md-12">
                        <p>
                            {!! $work[0]->description !!}                        
                        </p>
                    </div>
                </div>
                
            </div>
            <div class="col-md-4 outros_trabalhos rounded-corner">
                <div class="title_other_works">
                    OUTROS<br>
                    TRABALHOS
                </div>
                <div class="image_others_works">
                    @forelse($secWorkShowCase as $key =>  $val)
                        @if($key <= 2)
                        <a href="<?php echo url( env('APP_PREFIX') . '/trabalho/' . $val->slug ); ?>" class="work__item works__item__sec">
                            <div class="work__inside work__image" style="background-image: url('<?php echo url( $val->media ); ?>">
                                <div class="work__item__information">
                                    <div class="work__Information__title bold">
                                        <?php
                                            $txt = $val->subtitle;
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
                                    $txt = $val->title;
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
                    
                    @endforelse
                </div>
            </div>
        </div>
    </div> <!-- CONTENT-END -->
@endsection

@section('js')
@endsection
