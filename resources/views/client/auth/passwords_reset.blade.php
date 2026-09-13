@extends('client.layout.client')
@section('content')
<section id="reset-password" class="reset-password section py-5" style="min-height: 80vh; display: flex; justify-content: center; align-items: center;">
    <div class="container" data-aos="fade-up">
        <div class="form-container">
            <h2>Ø¥Ø¹Ø§Ø¯Ø© ØªØ¹ÙŠÙŠÙ† ÙƒÙ„Ù…Ø© Ø§Ù„Ù…Ø±ÙˆØ±</h2>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">
        
                <div class="form-group">
                    <label for="password">ÙƒÙ„Ù…Ø© Ø§Ù„Ù…Ø±ÙˆØ± Ø§Ù„Ø¬Ø¯ÙŠØ¯Ø©</label>
                    <input type="password" class="form-control" name="password" required autofocus>
                </div>
        
                <div class="form-group">
                    <label for="password_confirmation">ØªØ£ÙƒÙŠØ¯ ÙƒÙ„Ù…Ø© Ø§Ù„Ù…Ø±ÙˆØ±</label>
                    <input type="password" class="form-control" name="password_confirmation" required>
                </div>
        <br><br><br>
                <button type="submit" class="btn btn-primary btn-block">Ø¥Ø¹Ø§Ø¯Ø© ØªØ¹ÙŠÙŠÙ† ÙƒÙ„Ù…Ø© Ø§Ù„Ù…Ø±ÙˆØ±</button>
            </form>
        </div>
    </div>
</section>
@endsection
