@extends('layouts.custom-master')
@section('content')
<div class="">
    <div class="col col-login mx-auto mt-7">
        <div class="text-center">
            <img src="{{asset('images/settings/' . getSettingValue('logo'))}}" class="header-brand-img" width="100" height="50" alt="logo">
        </div>
    </div>
    
    <div class="container-login100">
        <div class="wrap-login100 p-6">
          <form action="{{route('login')}}" method="post" class="login100-form validate-form">
            @csrf
                <span class="login100-form-title"> Login </span>
                <div class="wrap-input100 validate-input mb-4" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100  @error('email') is-invalid @enderror"  type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="zmdi zmdi-email" aria-hidden="true"></i>
                      </span>
                      @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100  @error('password') is-invalid @enderror"  type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"><i class="zmdi zmdi-lock" aria-hidden="true"></i></span>
                    @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                  </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn btn-primary">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
