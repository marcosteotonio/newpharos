<style>
    #ag_form{
        position: absolute;
        background-color: white;
        z-index: 100;
        padding: 15px;
        max-width: 40%;
        min-width: 35%;
        right: 0px;
        top: -0px;
        display: none;
    }
</style>
<div id="ag_form" class="formularios">
    <div class="btn_pointer_agenc" style=""></div>
    <div class="padding-bottom">
        <span class="ag_form__botoes_default">
            <label style="cursor: pointer;"  class="ag_form__login_link">
                LOGIN
            </label>
            <label style="color: #ccc; cursor: pointer;" class="ag_form__resend_link">
                CADASTRO
            </label>
        </span>
        <span class="ag_form__botoes_default" style="display: none;">
            <label style="cursor: pointer;" class="ag_form__back">
                <i class="fa fa-fw fa-arrow-left"></i> RECUPERAÇÃO DE SENHA
            </label>
        </span>
        <label  class="float-right" style="color: #ccc; cursor: pointer;" onclick="$('#ag_form').hide(); ag_login();">
            <i class="fa fa-fw fa-times"></i>
        </label>
    </div>

    <div id="ag_form__login" style="display: block;">
        {!! Form::open(['method' => 'post', 'name' => 'form_login_agenciado', 'id' => 'form_login_agenciado', 'onsubmit' => 'return false;' ])!!}
            <div class="form-group">
                {!! Form::label('login_email', 'E-mail', ['style' => 'font-size: 14px; font-weight: 200;'])!!}
                {!! Form::text('login_email', null, ['class' => 'form-control'])!!}
            </div>
            <div class="form-group">
            {!! Form::label('login_password', 'Senha', ['style' => 'font-size: 14px; font-weight: 200;'])!!}
                {!! Form::password('login_password', ['class' => 'form-control'])!!}
            </div>
            <div class="text-center padding-bottom">
                {!! Form::submit('ENTRAR', ['class' => 'btn btn-access']) !!}
            </div>
        {!! Form::close()!!}
        <div class="text-center padding-bottom">
            <a class="ag_form__forgot" style="font-weight: 200; color: #aaa; cursor: pointer;">
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
        <script>
           
        </script>
    </div>

    <div id="ag_form__resend" style="display: none;">
        {!! Form::open(['method' => 'post', 'url' => '#', 'onsubmit' => 'return false;' ])!!}
            <div class="form-group">
                {!! Form::label('email', 'E-mail', ['style' => 'font-size: 14px; font-weight: 200;'])!!}
                {!! Form::text('email', null, ['class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Senha', ['style' => 'font-size: 14px; font-weight: 200;'])!!}
                {!! Form::password('password', ['class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('password_confirm', 'Confirmar Senha', ['style' => 'font-size: 14px; font-weight: 200;'])!!}
                {!! Form::password('password', ['class' => 'form-control'])!!}
            </div>
            <div class="text-center padding-bottom">
            {!! Form::submit('CADASTRAR', ['class' => 'btn btn-access']) !!}
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

    <div id="ag_form__forgot" style="display: none;">
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
    console.log('JS Loading')
    $('[name=form_login_agenciado]').on('submit', function(e){
        
        let formdata = {
            'email': $('[name=login_email]').val(),
            'password': $('[name=login_password]').val()
        }

        $.ajax({
        method: "POST",
        url: "{!! url('ajax/login-agenciado') !!}",
        data: formdata
        })
        .done( function( msg ) {
            alert( "Data Saved: " + msg );
        })
        .fail( function( msg ) {
            console.log(msg)
            alert( "Data Saved: " + msg.statusText );
        });
    })



    $('.ag_form__login_link').click(function(e){
        $('.ag_form__login_link')[0].style.color = '#000'
        $('.ag_form__resend_link')[0].style.color = '#ccc'
        ag_login()
    })

    $('.ag_form__resend_link').click(function(e){
        $('.ag_form__login_link')[0].style.color = '#ccc'
        $('.ag_form__resend_link')[0].style.color = '#000'
        ag_resend()
    })

    $('.ag_form__back').click(function(e){
        ag_login()
        $('.ag_form__botoes_default').toggle()
    })

    $('.ag_form__forgot').click(function(e){
        ag_forgot()
        $('.ag_form__botoes_default').toggle()
    })

    function ag_login(){
        $('#ag_form__resend').hide()
        $('#ag_form__forgot').hide()
        $('#ag_form__login').slideDown(500)
    }

    function ag_resend(){
        $('#ag_form__login').hide()
        $('#ag_form__forgot').hide()
        $('#ag_form__resend').slideDown(500)
    }

    function ag_forgot(){
        $('#ag_form__login').hide()
        $('#ag_form__resend').hide()
        $('#ag_form__forgot').slideDown(500)
    }

    function ag_back(){
        login_home_back();
        $('.ag_form__botoes_default').toggle()
    }
</script>
