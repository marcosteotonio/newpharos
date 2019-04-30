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

    <div id="ag_form__resend" style="display: none;">
        <form method="POST" action="{{ url('registrar-agenciado') }}" name="registrar-agenciado" aria-label="{{ __('Register') }}">
            @csrf

            <div class="form-group ">
                <label for="name" style="font-size: 14px; font-weight: 200;">nome</label>

                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            
            </div>

            <div class="form-group ">
                <label for="email" style="font-size: 14px; font-weight: 200;">E-mail</label>

                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password" style="font-size: 14px; font-weight: 200;">senha</label>

                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
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
    // $('form[name=form_login_agenciado]').on('submit', function(e){
    //     e.preventDefault()
    //     console.log( document.getElementById('email_login').value )

    //     formdata = {
    //         'email': document.getElementById('email_login').value
    //     }
    //     $.ajax({
    //     method: "GET",
    //     url: "{!! url('/api/site/check-agenciado') !!}",
    //     data: formdata
    //     })
    //     .done( function( result ) {
    //         if(result.message){
    //             console.log( 'success', result )
    //         } else {
    //             console.log(result.content);
    //             // window.open('/', '_self')
    //         }
    //     })
    //     .fail( function( msg ) {
    //         console.log(msg)
    //         alert( "Data Saved: " + msg.statusText );
    //     });
    // })


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
