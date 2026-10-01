@extends('client.layout.client')

@section('content')
<section id="reset-password" class="reset-password section py-5" style="min-height: 80vh; display: flex; justify-content: center; align-items: center;">
    <div class="container" data-aos="fade-up">
        <div class="form-container">
            <h2>إعادة تعيين كلمة المرور</h2>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="form-group">
                    <label for="password">كلمة المرور الجديدة</label>
                    <input type="password" class="form-control" name="password" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">تأكيد كلمة المرور</label>
                    <input type="password" class="form-control" name="password_confirmation" required>
                </div>

                <br><br><br>

                <button type="submit" class="btn btn-primary btn-block">
                    إعادة تعيين كلمة المرور
                </button>
            </form>
        </div>
    </div>
</section>
@endsection