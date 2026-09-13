
{{-- @extends('client.layout.client')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('client/images/bg_1.jpg') }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">{{ trans('cruds.login') }}</h1>
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="{{ route('welcome') }}">{{ trans('cruds.home') }} <i class="ion-ios-arrow-forward"></i></a>
                    </span>
                    <span>{{ trans('cruds.login') }} <i class="ion-ios-arrow-forward"></i></span>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-form p-4 bg-white shadow rounded">
                    <h3 class="text-center mb-4">{{ trans('cruds.login') }}</h3>
                    <form action="{{ route('client.post_login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ trans('cruds.email') }}</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="{{ trans('cruds.enter_email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">{{ trans('cruds.password') }}</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="{{ trans('cruds.enter_password') }}" required>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                <label class="custom-control-label" for="remember">{{ trans('cruds.remember_me') }}</label>
                            </div>
                            <a href="#" class="text-muted small">{{ trans('cruds.forgot_password') }}</a>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">{{ trans('cruds.login') }}</button>
                        </div>
                    </form>
                    <p class="text-center mt-3">
                        {{ trans('cruds.no_account') }}
                        <a href="{{ route('client.register') }}">{{ trans('cruds.register') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection --}}

