@extends('layouts.site')

@section('css_after')
@endsection

@section('content')
    <style>
        .agencia-bg{
            position: absolute;
            right: 0px;
            top: -80px;
            height: 309%;
            filter: grayscale(1) brightness(1.2) blur(0.5px);
        }
        .agencia{
            padding: 0px 50px;
        }
        .foto-default{
            width: 100%;
            border: 10px solid white;
            box-shadow: 1px  1px 5px #3333;
            background-size: cover;
        }
        .foto1{
            height: 500px;
        }
        .foto2{
            height: 300px;
        }
        .foto3{
            height: 300px;
        }
        .foto4{
            height: 300px;
        }
    </style>
    <div class="container padding-15"> <!-- CONTENT-BEGAN -->
        <div class="row" style="padding: 65px 0;">
            <div class="col-md-5">
                <img class="agencia-bg" src="<?php echo url( env('APP_PREFIX') . '/images/agencia-bg.jpg' ); ?>" alt="">

            </div>
            <div class="col-md-7">
                <div class="agencia">
                    <div class="agencia__title medium-text bold">
                        A PHAROS ELENCO
                    </div>
                    <div class="agencia__paragrafo">
                        <p>
                            Entramos no mercado de agenciamentos de atores com a certeza de realizar um excelente trabalho. Isto porque estamos preocupados em formar e preparar nossos agenciados para um melhor desenvolvimento na área de teledramaturgia e publicidade. Desta forma buscamos ser o farol que guia os sonhos e desejos profissionais de cada agenciado. Queremos iluminar esse árduo caminho na direção das realizações e melhores conquistas. Acreditamos que tudo é possível, desde que seja sonhado e trabalhado com profissionais que acreditem no seu potencial. Nós acreditamos em sonhos!
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row" style="padding-bottom: 65px;">
            <div class="col-md-4">
                <!--  -->
            </div>
            <div class="col-md-8">
                <div class="foto-default foto1" style="background-image: url('<?php echo url( env('APP_PREFIX') . '/images/inside-agencia0.jpg'); ?>">
                    
                </div>
            </div>
        </div>
        
        <div class="row" style="padding-bottom: 65px;">
            <div class="col-md-5">
                <div class="foto-default foto2" style="background-image: url('<?php echo url( env('APP_PREFIX') . '/images/inside-agencia1.jpg'); ?>">
                </div>
            </div>
            <div class="col-md-7">
                <div class="foto-default foto3" style="background-image: url('<?php echo url( env('APP_PREFIX') . '/images/inside-agencia2.jpg'); ?>">
                </div>
            </div>
        </div>

        <div class="row" style="position: relative; top: -100px;">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="foto-default foto4" style="background-image: url('<?php echo url( env('APP_PREFIX') . '/images/agencia-owners.jpg'); ?>"></div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
        <div class="row"  style="position: relative; top: -60px;">
            <div class="col-md-6 text-right">
                <div class="owner">
                    <div class="owner__name medium-text bold">
                        ALEXANDRE <br> CARDOSO
                    </div>
                    <div class="owner__description" style="width: 60%; float: right;">
                        Ator desde 1998, com formação em teatro e Teledramaturgia. Nestes anos de atuação estão trabalhos como: A ferro e fogo – Fora do Ar – Entrevista – Tóxic – O Tempo e o Vento -  Animal...entre outros. Professor na Casa de Teatro de Porto Alegre, no Núcleo de Tv e Cinema (Take 04), Alexandre vem desenvolvendo, durante 7 anos como professor, um processo de ensino direcionado para formação e preparação dos atores para o mercado de trabalho. Na publicidade estão vários comerciais realizados como ator e agora na Pharos, o encaminhamento profissional de todos os atores.
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-left">
                <div class="owner">
                    <div class="owner__name medium-text bold">
                        CLÁUDIA <br> SARTORI
                    </div>
                    <div class="owner__description" style="width: 60%;">
                    Atriz desde o ano de 2011, com atuações voltadas para a teledramaturgia, realizou diversos cursos, bem como trabalhos ligados a área de Teatro, Cinema e Televisão. Cláudia Sartori se formou em Direito no ano de 2008, é advogada e Pós-Graduada em Direito do Trabalho. <br> <br> Com a união dos seus conhecimentos na área do Direito e da Arte, proporciona para a Agência maior segurança para o bom encaminhamento de todas as relações e atividades profissionais.
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- CONTENT-END -->
@endsection

@section('js')
@endsection
