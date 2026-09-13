@extends('client.layout.client')

@section('content')

<br><br><br><br>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">

            <div class="card shadow border-0">
                <div class="card-body p-4">

                    <h3 class="text-center mb-4">
                        الاشتراك في الباقة
                    </h3>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif


                    <div class="mb-4 text-center">

                        <h4>
                            {{ $subscription->title }}
                        </h4>

                        <p class="text-muted">
                            {{ $subscription->description }}
                        </p>

                        <div class="text-muted">
                            السعر الأساسي
                        </div>

                        <h2 class="font-weight-bold">

                            <span id="original_price">
                                {{ number_format($subscription->price, 2) }}
                            </span>

                            ريال

                        </h2>

                    </div>


                    <hr>


                    <form
                        method="POST"
                        action="{{ route('client.subscription.payment') }}"
                        id="subscriptionPaymentForm"
                    >

                        @csrf


                        <input
                            type="hidden"
                            name="subscription_id"
                            id="subscription_id"
                            value="{{ $subscription->id }}"
                        >


                        <div class="form-group">

                            <label
                                for="promo_code"
                                class="font-weight-bold"
                            >
                                هل لديك Promo Code؟
                            </label>


                            <div class="input-group">

                                <input
                                    type="text"
                                    name="promo_code"
                                    id="promo_code"
                                    class="form-control"
                                    placeholder="ادخل البرومو كود"
                                    value="{{ old('promo_code') }}"
                                    autocomplete="off"
                                >


                                <div class="input-group-append">

                                    <button
                                        type="button"
                                        id="applyPromo"
                                        class="btn btn-success"
                                    >
                                        Apply
                                    </button>

                                </div>

                            </div>


                            <div
                                id="promo_message"
                                class="mt-2"
                            ></div>

                        </div>



                        <div
                            id="promo_result"
                            class="card border-success mt-4"
                            style="display:none;"
                        >

                            <div class="card-body">


                                <div class="d-flex justify-content-between mb-2">

                                    <span>
                                        السعر قبل الخصم
                                    </span>

                                    <strong>

                                        <span id="price_before"></span>

                                        ريال

                                    </strong>

                                </div>



                                <div class="d-flex justify-content-between mb-2">

                                    <span>
                                        نسبة الخصم
                                    </span>

                                    <strong class="text-success">

                                        <span id="discount_percentage"></span>%

                                    </strong>

                                </div>



                                <div class="d-flex justify-content-between mb-2">

                                    <span>
                                        قيمة الخصم
                                    </span>

                                    <strong class="text-success">

                                        -
                                        <span id="discount_amount"></span>

                                        ريال

                                    </strong>

                                </div>


                                <hr>


                                <div class="d-flex justify-content-between">

                                    <strong>
                                        السعر بعد الخصم
                                    </strong>


                                    <h4 class="text-success">

                                        <span id="price_after"></span>

                                        ريال

                                    </h4>

                                </div>


                            </div>

                        </div>



                        <div class="alert alert-light border mt-4 text-center">

                            <div class="text-muted">
                                المبلغ الذي سيتم دفعه
                            </div>


                            <h3>

                                <span id="final_price">

                                    {{ number_format($subscription->price, 2) }}

                                </span>

                                ريال

                            </h3>

                        </div>



                        <button
                            type="submit"
                            id="payButton"
                            class="btn btn-primary btn-lg btn-block mt-4"
                        >
                            الدفع الآن
                        </button>


                    </form>

                </div>
            </div>

        </div>
    </div>
</div>



<script>

document.addEventListener('DOMContentLoaded', function () {


    const applyButton =
        document.getElementById('applyPromo');


    const promoInput =
        document.getElementById('promo_code');


    const subscriptionId =
        document.getElementById('subscription_id');


    const messageBox =
        document.getElementById('promo_message');


    const resultBox =
        document.getElementById('promo_result');


    const finalPrice =
        document.getElementById('final_price');


    const paymentForm =
        document.getElementById('subscriptionPaymentForm');


    const payButton =
        document.getElementById('payButton');


    let appliedPromoCode = null;



    applyButton.addEventListener('click', function () {


        const code =
            promoInput.value.trim();


        messageBox.innerHTML = '';


        resultBox.style.display =
            'none';


        if (code === '') {


            messageBox.innerHTML =

                '<span class="text-danger">' +

                'من فضلك ادخل Promo Code' +

                '</span>';


            return;

        }



        applyButton.disabled =
            true;


        applyButton.innerText =
            'Checking...';



        fetch('{{ route('client.promo.check') }}', {


            method: 'POST',


            headers: {

    'Content-Type':
        'application/json',

    'Accept':
        'application/json',

    'X-CSRF-TOKEN':
        '{{ csrf_token() }}'

},


            body: JSON.stringify({

                code:
                    code,

                order:
                    subscriptionId.value

            })


        })


        .then(async function (response) {


            const data =
                await response.json();


            if (!response.ok) {

                throw data;

            }


            return data;

        })


        .then(function (response) {


            if (!response.success) {


                messageBox.innerHTML =

                    '<span class="text-danger">' +

                    (response.message || 'Promo Code غير صحيح') +

                    '</span>';


                return;

            }



            document
                .getElementById('price_before')
                .innerText =

                    Number(
                        response.price_before
                    ).toFixed(2);



            document
                .getElementById('discount_percentage')
                .innerText =

                    response.discount_percentage;



            document
                .getElementById('discount_amount')
                .innerText =

                    Number(
                        response.discount_amount
                    ).toFixed(2);



            document
                .getElementById('price_after')
                .innerText =

                    Number(
                        response.price_after
                    ).toFixed(2);



            finalPrice.innerText =

                Number(
                    response.price_after
                ).toFixed(2);



            resultBox.style.display =
                'block';



            appliedPromoCode =
                code.toUpperCase();



            messageBox.innerHTML =

                '<span class="text-success">' +

                'Promo Code صحيح وتم تطبيق الخصم بنجاح ✓' +

                '</span>';

        })


        .catch(function (error) {


            resultBox.style.display =
                'none';


            appliedPromoCode =
                null;


            let message =
                'Promo Code غير صحيح';



            if (
                error &&
                error.message
            ) {

                message =
                    error.message;

            }



            if (
                error &&
                error.errors
            ) {


                const firstError =

                    Object.values(
                        error.errors
                    )[0];



                if (
                    Array.isArray(firstError) &&
                    firstError.length > 0
                ) {

                    message =
                        firstError[0];

                }

            }



            messageBox.innerHTML =

                '<span class="text-danger">' +

                message +

                '</span>';

        })


        .finally(function () {


            applyButton.disabled =
                false;


            applyButton.innerText =
                'Apply';

        });


    });



    promoInput.addEventListener(
        'input',
        function ()
        {


            if (
                appliedPromoCode &&
                promoInput.value
                    .trim()
                    .toUpperCase()
                    !==
                    appliedPromoCode
            ) {


                appliedPromoCode =
                    null;


                resultBox.style.display =
                    'none';


                finalPrice.innerText =
                    '{{ number_format($subscription->price, 2, ".", "") }}';


                messageBox.innerHTML =

                    '<span class="text-warning">' +

                    'تم تغيير البرومو كود، اضغط Apply مرة أخرى.' +

                    '</span>';

            }


        }
    );



    paymentForm.addEventListener(
        'submit',
        function (event)
        {


            const code =
                promoInput.value.trim();



            if (
                code !== '' &&
                appliedPromoCode !==
                    code.toUpperCase()
            ) {


                event.preventDefault();


                messageBox.innerHTML =

                    '<span class="text-danger">' +

                    'اضغط Apply وتأكد من البرومو كود قبل الدفع.' +

                    '</span>';


                return;

            }



            payButton.disabled =
                true;


            payButton.innerText =
                'جاري تحويلك إلى بوابة الدفع...';


        }
    );


});

</script>


@endsection
