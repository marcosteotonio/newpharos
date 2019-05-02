<style>
    #cli_form{
        position: absolute;
        background-color: white;
        z-index: 100;
        padding: 15px;
        max-width: 40%;
        min-width: 35%;
        right: 0px;
        top: -1px;
        display: none;
    }
</style>
<div id="cli_form" class="formularios" style="box-shadow: 1px 1px 10px #0006;">
    <div class="btn_pointer_client" style=""></div>
    <div class="padding-bottom">
        <span class="cli_form__botoes_default">
            <label style="cursor: pointer;"  class="cli_form__login_link">
                LOGIN
            </label>
            <label style="color: #ccc; cursor: pointer;" class="cli_form__resend_link">
                CADASTRO
            </label>
        </span>
        <span class="cli_form__botoes_default" style="display: none;">
            <label style="cursor: pointer;" class="cli_form__back">
                <i class="fa fa-fw fa-arrow-left"></i> RECUPERAÇÃO DE SENHA
            </label>
        </span>
        <label  class="float-right" style="color: #ccc; cursor: pointer;" onclick="$('#cli_form').hide(); cli_login();">
            <i class="fa fa-fw fa-times"></i>
        </label>
    </div>

    <div id="cli_form__login" style="display: block;">
        {!! Form::open(['method' => 'post', 'url' => '#', 'id' => 'form_login_cliente' ])!!}
            <div class="form-group">
                {!! Form::label('email', 'E-mail', ['style' => 'font-size: 14px; font-weight: 200;'])!!}
                {!! Form::text('email', null, ['class' => 'form-control'])!!}
            </div>
            <div class="form-group">
            {!! Form::label('password', 'Senha', ['style' => 'font-size: 14px; font-weight: 200;'])!!}
                {!! Form::password('password', ['class' => 'form-control'])!!}
            </div>
            <div class="text-center padding-bottom">
                <button type="submit" class="btn btn-access">
                    ENTRAR
                </button>
            </div>
        {!! Form::close()!!}
        <div class="text-center padding-bottom">
            <a class="cli_form__forgot" style="font-weight: 200; color: #aaa; cursor: pointer;">
                Esqueci minha senha
            </a>
        </div>
        <div class="text-center padding-bottom">
            <hr>
        </div>
        <div class="text-center padding-bottom">
            <a class="btn btn-facebook"  style="color: white;">
                <i class="fab fa-facebook-square"></i> ENTRAR COM O FACEBOOK
            </a>
        </div>
    </div>

    <div id="cli_form__resend" style="display: none;">
        {!! Form::open(['method' => 'post', 'id' => 'form_resend_cliente' ])!!}
            <div class="form-group">
                {!! Form::label('email', 'E-mail', ['style' => 'font-size: 14px; font-weight: 200;'])!!}
                {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'inputClienteEmail'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Senha', ['style' => 'font-size: 14px; font-weight: 200;'])!!}
                {!! Form::password('password', ['class' => 'form-control', 'id' => 'inputClientePassword'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('password_confirm', 'Confirmar Senha', ['style' => 'font-size: 14px; font-weight: 200;'])!!}
                {!! Form::password('password', ['class' => 'form-control'])!!}
            </div>
            <div class="text-center padding-bottom">
                <a href="" class="btn btn-access">
                    CADASTRAR
                </a>
            </div>
        {!! Form::close()!!}
        <div class="text-center padding-bottom">
            <hr>
        </div>
        <div class="text-center padding-bottom">
            <a href="#" class="btn btn-facebook">
                <i class="fab fa-facebook-square" style="color: white;"></i> CADASTRAR COM O FACEBOOK
            </a>
        </div>
    </div>

    <div id="cli_form__forgot" style="display: none;">
        {!! Form::open(['method' => 'post', 'url' => '#', 'onsubmit' => 'return false;' ])!!}
            <div>
                Informe o email do seu cadastro para receber um link e recuperação de senha.
            </div>
            <div class="form-group">
                {!! Form::label('email', 'E-mail', ['style' => 'font-size: 14px; font-weight: 200;'])!!}
                {!! Form::text('email', null, ['class' => 'form-control'])!!}
            </div>
            <div class="text-center padding-bottom">
                <a href="" class="btn btn-access">
                    OBTER LINK
                </a>
            </div>
        {!! Form::close()!!}
    </div>
</div>

<script type="text/javascript" defer>

    {{--Login Cliente--}}

    $('form#form_login_cliente').submit(function(e){
        e.preventDefault()
        $.post('url', { email: $('#inputClienteEmail').val(), password: $('#inputClientePassword') })
          .done(function(data){

          })
    })

    $('.cli_form__login_link').click(function(e){
        $('.cli_form__login_link')[0].style.color = '#000'
        $('.cli_form__resend_link')[0].style.color = '#ccc'
        cli_login()
    })

    $('.cli_form__resend_link').click(function(e){
        $('.cli_form__login_link')[0].style.color = '#ccc'
        $('.cli_form__resend_link')[0].style.color = '#000'
        cli_resend()
    })

    $('.cli_form__back').click(function(e){
        cli_login()
        $('.cli_form__botoes_default').toggle()
    })

    $('.cli_form__forgot').click(function(e){
        cli_forgot()
        $('.cli_form__botoes_default').toggle()
    })

    function cli_login(){
        $('#cli_form__resend').hide()
        $('#cli_form__forgot').hide()
        $('#cli_form__login').slideDown(500)
    }

    function cli_resend(){
        $('#cli_form__login').hide()
        $('#cli_form__forgot').hide()
        $('#cli_form__resend').slideDown(500)
    }

    function cli_forgot(){
        $('#cli_form__login').hide()
        $('#cli_form__resend').hide()
        $('#cli_form__forgot').slideDown(500)
    }

    function cli_back(){
        login_home_back();
        $('.cli_form__botoes_default').toggle()
    }
</script>
