@extends('auth.master')

@section('content')

<!-- Page Content -->
<div class="bg-image" style="background-image: url('images/pharos/83644542.jpg');">
    <div class="row no-gutters bg-primary-op">
        <!-- Main Section -->
        <div class="hero-static col-md-6 d-flex align-items-center bg-white">
            <div class="p-3 w-100">
                <!-- Header -->
                <div class="text-center">
                    <a class="link-fx font-w700 font-size-h1" href="index.html">
                        <span class="text-dark">Pharos</span><span class="text-primary">elenco</span>
                    </a>
                    <p class="text-uppercase font-w700 font-size-sm text-muted">Lembrar senha</p>
                </div>
                <!-- END Header -->

                <!-- Reminder Form -->
                <div class="row no-gutters justify-content-center">
                    <div class="col-sm-8 col-xl-6">
                        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}" class="js-validation-reminder">
                        @csrf
                            <div class="form-group py-3">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg form-control-alt" name="email" value="{{ old('email') }}" placeholder="E-mail" required>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-block btn-hero-lg btn-hero-primary">
                                    <i class="fa fa-fw fa-reply mr-1"></i> Lembrar senha
                                </button>
                                <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                    <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{ route('login') }}">
                                        <i class="fa fa-sign-in-alt text-muted mr-1"></i> Entrar
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Reminder Form -->
            </div>
        </div>
        <!-- END Main Section -->

        <!-- Meta Info Section -->
        <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
            <div class="p-3">
                {{-- <p class="display-4 font-w700 text-white mb-0">
                    Resgate sua ..
                </p>
                <p class="font-size-h1 font-w600 text-white-75 mb-0">
                    .. senha!
                </p> --}}
            </div>
        </div>
        <!-- END Meta Info Section -->
    </div>
</div>
<!-- END Page Content -->

@endsection
