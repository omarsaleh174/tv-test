@extends('client.layout.client')

@section('content')
    <br><br><br><br>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .bg_img {
            background: url('{{ asset('images/404.jpg') }}');
            height: 400px;
            width: 100%;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
        }
    </style>

    <section class="py-5">
        <div class="d-flex justify-content-center align-items-center flex-column text-center w-100">
            <div class="bg_img w-50"></div>

            <div>
                <p class="display-4">هل تحتاج إلى مساعدة؟</p>
                <p>عذرًا، ليس لديك صلاحية للوصول إلى هذه الصفحة.</p>

                <a href="{{ route('welcome') }}"
                   class="text-white text-decoration-none px-4 py-3 bg-success d-inline-block mt-2 rounded">
                    الصفحة الرئيسية
                </a>
            </div>
        </div>
    </section>
@endsection