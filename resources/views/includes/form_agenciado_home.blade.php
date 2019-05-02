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
<div id="ag_form" class="formularios" style="box-shadow: 1px 1px 10px #0006;">
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

    <!-- login #################################################################################### -->

    <div id="ag_form__login" style="display: block;">
        {!! Form::open(['method' => 'post','url' => url('/login-agenciado'), 'name' => 'form_login_agenciado', 'id' => 'form_login_agenciado' ])!!}
            <div class="form-group">
                {!! Form::label('email', 'E-mail', ['style' => 'font-size: 14px; font-weight: 200;'])!!}
                {!! Form::email('email', null, ['id' => 'email_login', 'class' => 'form-control','required' => ''])!!}
            </div>
            <div class="form-group">
            {!! Form::label('password', 'Senha', ['style' => 'font-size: 14px; font-weight: 200;'])!!}
                {!! Form::password('password', ['id' => 'password_login', 'class' => 'form-control','required' => ''])!!}
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

    <!-- register #################################################################################### -->


    <div id="ag_form__resend" style="display: none;">
        <form method="POST" action="{{ url('registrar-agenciado') }}" id="form_register_agenciado" name="agenciado" aria-label="{{ __('Register') }}">
            @csrf
            <input type="hidden" name="level" value="3" id="">

            <div class="form-group ">
                <label for="name" style="font-size: 14px; font-weight: 200;">nome</label>

                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="form-group ">
                <label for="email" style="font-size: 14px; font-weight: 200;">E-mail</label>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password" style="font-size: 14px; font-weight: 200;">senha</label>

                <input id="password" type="password" class="form-control" name="password" required>
            </div>

            <div class="form-group">
                <label for="password-confirm" style="font-size: 14px; font-weight: 200;">Confirmar senha</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Cadastrar
                    </button>
                </div>
            </div>
        </form>
        <div class="text-center padding-bottom">
            <hr>
        </div>
        <div class="text-center padding-bottom">
            <a href="#" class="btn btn-facebook">
                <i class="fab fa-facebook-square" style="color: white;"></i> CADASTRAR COM O FACEBOOK
            </a>
        </div>
    </div>

    <!-- forgot #################################################################################### -->


    <div id="ag_form__forgot" style="display: none;">
        {!! Form::open(['method' => 'post','url' => '','onSubmit' => 'return false;','name' => 'form_resend_agenciado', 'id' => 'form_resend_agenciado' ])!!}
            <div class="" id="response-default">
                Informe o email do seu cadastro para receber um link e recuperação de senha.
            </div>
            <div class="d-none" id="response-false">
                <i class="fa fa-exclamation-triangle" style="color: red;"></i> Informe o email do seu cadastro para receber um link e recuperação de senha.
            </div>
            <div class="form-group">
                {!! Form::label('email', 'E-mail', ['style' => 'font-size: 14px; font-weight: 200;'])!!}
                {!! Form::text('email', null, ['class' => 'form-control'])!!}
            </div>
            <div class="text-center padding-bottom">
                <div class="text-center padding-bottom">
                    {!! Form::submit('OBTER LINK', ['class' => 'btn btn-access']) !!}
                </div>
            </div>
        {!! Form::close()!!}
    </div>

    <div id="ag_form__forgot__response" style="display: none;">
        <div>
            Um link de recuperação de senha foi enviado com sucesso para o email
            <b><span id="email_masked"></span></b>
        </div>
        <div class="text-center padding-bottom">
            <button type="button" class="btn btn-access ag_form__back">FAZER LOGIN</button>
        </div>
    </div>





</div>
<script type="text/javascript">

    function showMessagesError(msgs){
        msgs = msgs.error;
        for (var key in msgs) {
            if (msgs.hasOwnProperty(key)) {
                $.notify({
                    message: msgs[key][0]
                },{type: 'danger' });
            }
        }
    }
    function mask_email_address(string) {
        let divisor = '@'
        let limit_showed = 3
        string = string.split(divisor);
        let email_print = ''
        for (i=0;i<string[0].length;i++){
            if(i < limit_showed){
            email_print += string[0][i]
            } else {
                email_print += '*'
            }
        }
        return email_print + '@' + string[1];
    }


    $('#form_login_agenciado').submit(function(e){
        e.preventDefault()
        var formData = new FormData( document.querySelector("#form_login_agenciado") );
        $('.btn-primary').attr('disabled', 'disabled');
        $.ajax({
            method: "POST",
            url: "{!! url('/api/site/login-agenciado') !!}",
            data: formData,
            processData: false,
            contentType: false,
            // enctype: 'multipart/form-data'
        })
        .done( function( result ) {
            $('.btn-primary').removeAttr('disabled');
            if(result.error){
                $.notify({
                    message: result.error
                },{type: 'danger' });
            } else {
                $('#form_login_agenciado').unbind('submit').submit()
            }
        })
        .fail( function( msg ) {
            $('.btn-primary').removeAttr('disabled');
            $.notify({
                message: msg 
            },{type: 'danger' });
        });
    })

    $('#form_register_agenciado').submit(function(e){
        e.preventDefault()
        var formData = new FormData( document.querySelector("#form_register_agenciado") );
        $('.btn-primary').attr('disabled', 'disabled');
        $.ajax({
            method: "POST",
            url: "{!! url('/api/site/register-agenciado') !!}",
            data: formData,
            processData: false,
            contentType: false,
            // enctype: 'multipart/form-data'
        })
        .done( function( result ) {
            $('.btn-primary').removeAttr('disabled');
            if(result.error){
                showMessagesError(result)
            } else {
                $('#form_register_agenciado').unbind('submit').submit()
            }
        })
        .fail( function( msg ) {
            $('.btn-primary').removeAttr('disabled');
            $.notify({
                message: msg 
            },{type: 'danger' });
        });
    })

    $('#form_resend_agenciado').submit(function(e){
        e.preventDefault()
        var formData = new FormData( document.querySelector("#form_resend_agenciado") );

        $('.btn-primary').attr('disabled', 'disabled');

        $.ajax({
            method: "POST",
            url: "/api/site/resend-agenciado",
            data: formData,
            processData: false,
            contentType: false,
            // enctype: 'multipart/form-data'
        })
        .done( function( result ) {
            $('.btn-primary').removeAttr('disabled');
            if(result.error){
                showMessagesError(result)
            } else {
               $('#ag_form__forgot').hide()
               $('#email_masked').text( mask_email_address(result.success) ) 
               $('#ag_form__forgot__response').show()
            }
        })
        .fail( function( fail ) {

            $('.btn-primary').removeAttr('disabled');
            $.notify({
                message: msg 
            },{type: 'danger' });
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
        $('#ag_form__forgot__response').hide()
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
        $('#ag_form__forgot__response').hide()
        $('#ag_form__forgot').slideDown(500)
    }

    function ag_back(){
        login_home_back();
        $('.ag_form__botoes_default').toggle()
    }
</script>
