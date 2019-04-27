<?php ?>
<div class="container-page">
    <div class=header-menu-main>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
                    <a href="{!!route('home')!!}">
                        <img src="<?php echo url( env('APP_PREFIX') . '/images/logo.png' ); ?>" alt="PharosElenco" style="margin-top: 10px; height: 145px;">
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 inline-menu-top">
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
                                @if(isset($agenciado))
                                    Agenciado
                                @elseif(isset($cliente))
                                    Cliente
                                @else
                                    <button type="button" class="btn btn-access acess_agenciado" style="color: white; height: 50px;">
                                        <i class="fa fa-fw fa-star"></i>
                                        <span class="d-none d-sm-inline-block">ÁREA DO AGENCIADO</span>
                                    </button>
                                    
                                    <button type="button" class="btn btn-access acess_client" style="color: white; height: 50px;">
                                        <i class="fa fa-fw fa-eye"></i>
                                        <span class="d-none d-sm-inline-block">AREA DO CLIENTE</span>
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

</script>