<?php
if(0){
    // use Illuminate\Support\Facades\Auth;
    // $login = Auth::user();
    // if(Auth::check()){
    //     $level = $login->level;
    // }
    // Auth::logout()
}
?>
<style>

</style>
<div class="container-page">
    <div class=header-menu-main>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
                    <a href="{!!route('home')!!}">
                        <img src="<?php echo url( '/images/logo.png' ); ?>" alt="PharosElenco" style="margin-top: 10px; height: 145px;">
                    </a>
                </div>
                <button type="button" class="menu_mobile_open" style="display: none; z-index: 99; background-color: #d3d3d3; border-radius: 0px 0px 10px 10px;">
                    <i class="fa fa-bars"></i>
                </button>
                <div id="menu_mobile_topo" class="menu_mobile" style="display: none;">
                    <div class="menu_mobile__main">
                        <a class="menu_mobile__main__image" href="{!!route('home')!!}">
                            <img src="<?php echo url( '/images/logo-white.png' ); ?>" alt="PharosElenco" style="margin-top: 10px; height: 145px;">
                        </a>
                        <div class="menu_mobile__main__menu">
                            <ul>
                                <li>
                                    <a href="{!!route('elencos')!!}">
                                        ELENCO
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! route('trabalhos') !!}">
                                        TRABALHOS
                                    </a>
                                </li>
                                <li>
                                    <a href="{!!route('agencia')!!}">
                                        AGÊNCIA
                                    </a>
                                </li>
                                <li>
                                    <a href="{!!route('contato')!!}">
                                        CONTATO
                                    </a>
                                </li>
                            </ul>
                            <br>
                            <div class="" style="font-size: 16px; color: white;">
                                    Avenida Getúlio Vargas, 1151<br>
                                    sala 506, Menina Deus<br>
                                    Porto Alegre/RS - Brasil<br>
                                    <br>
                                    (51) 3209-8378
                                    <br>
                                    {!! env('EMAILCONTATOPHAROS', 'claudia@pharoselenco.com.br') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                    <div class="row">
                        <div class="col-md-12 inline-menu-top mobile-hide">
                            <ul class=inline-menu>
                                <li>
                                    <a href="{!!route('elencos')!!}">
                                        ELENCO
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! route('trabalhos') !!}">
                                        TRABALHOS
                                    </a>
                                </li>
                                <li>
                                    <a href="{!!route('agencia')!!}">
                                        AGÊNCIA
                                    </a>
                                </li>
                                <li>
                                    <a href="{!!route('contato')!!}">
                                        CONTATO
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <style>
                        
                        </style>
                        <div id="botos_de_acesso_usuarios" class="col-md-12">
                            <div class="login-field">
                                @if( auth()->check() )
                                    @if( auth()->user()->level == 3 )
                                        <div class="logged_user">
                                            <div class="logged_user__title">
                                                Olá, {{ auth()->user()->name }}!
                                            </div>
                                            <div class="logged_user__options">
                                                <a href="{{ url('/perfil') }}"> Área do Agenciado </a> |  <a href="{{ url('/logout')}}">Sair</a>
                                            </div>
                                        </div>
                                    @elseif( auth()->user()->level == 2 )
                                        <div class="logged_user">
                                            <div class="" style="font-size: 24px;font-weight: 800;">
                                            Olá,{{ auth()->user()->name }}!
                                            </div>
                                            <div class="" style="text-align: right;">
                                            <a href="{{ url('/cliente') }}"> Área do Cliente </a> |  <a href="{{ url('/logout')}}">Sair</a>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <button type="button" class="btn btn-access acess_agenciado" style="color: white; height: 50px;">
                                        <i class="d-none d-sm-inline-block fa fa-fw fa-star"></i>
                                        <span class="">ÁREA DO AGENCIADO</span>
                                    </button>
                                    
                                    <button type="button" class="btn btn-access acess_client" style="color: white; height: 50px;">
                                        <i class="d-none d-sm-inline-blockfa fa-fw fa-eye"></i>
                                        <span class="">AREA DO CLIENTE</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="">  <!-- ID: ag_form forms internos -->
                    @include('includes.form_agenciado_home')
                </div> <!-- forms internos -->
            </div>

            <div class="row">
                <div class="col-md-12" style="">  <!-- ID cli_form forms internos -->
                    @include('includes.form_client_home')
                </div> <!-- forms internos -->
            </div>
            
        </div>
    </div>
</div>
<script>
    
    $('.acess_agenciado').on('click', function(){
        $('.formularios').hide()
        $('#ag_form').show()
    })

    $('.acess_client').on('click', function(){
        $('.formularios').hide()
        $('#cli_form').show()
    })

    $('.menu_mobile_open').click( function(){
        // $("#menu_mobile_topo").toggle("slide")
        $("#menu_mobile_topo").animate({'width': 'toggle'})
    })
    

</script>