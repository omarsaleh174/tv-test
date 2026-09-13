@extends('client.layout.client')
@section('content')
<br><br><br>
<style>
        .register {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        margin-top: 2%;
        padding: 2%;
        }

        .register-left {
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }

        .register-left input {
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        .register-right {
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }

        .register-left img {
            margin-top: 15%;
            margin-bottom: 5%;
            width: 25%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }

        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        .register-left p {
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }

        .register .register-form {
            padding: 10%;
            margin-top: 10%;
        }

        .btnRegister {
            float: right;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }

        .register .nav-tabs {
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }

        .register .nav-tabs .nav-link {
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }

        .register .nav-tabs .nav-link:hover {
            border: none;
        }

        .register .nav-tabs .nav-link.active {
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }

        .register-heading {
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }
</style>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="{{asset('images/settings/' . getSettingValue('logo'))}}" alt="" />
            <h3>{{trans('cruds.add_tender_welcome') }}</h3>
            <p>{{trans('cruds.add_your_tender') }}</p>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">
    {{ app()->getLocale() == 'ar' ? 'إضافة مناقصتك' : 'Add Your Tender' }}
</h3>
                    <div class="row register-form">
                        @if(session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>

                        <form  id="tenderForm" method="POST" action="{{ route('client.tenders.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body row">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <p>{{$error}}</p>
                                        @endforeach
                                    </div>
                                @endif        
                                <input type="hidden" name="client_id" value="{{ auth()->guard('client')->user()->id }}">
                                
                                <div class="form-group col-12 col-md-6 ">
                                    <label for="title" class="font-weight-bold " style="float: {{ app()->getLocale()=='ar'?'right':'left' }};">{{ trans('cruds.tender_title') }}</label>
                                    <input type="text" name="title" class="form-control form-control-lg" id="title" value="{{ old('title') }}" placeholder="{{ trans('cruds.title') }}">
                                    @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                                    <div class="text-danger" id="title_error"></div>
                                </div>
                            
                                <div class="form-group col-12 col-md-6 ">
                                    <label for="publisher_name" class="font-weight-bold " style="float: {{ app()->getLocale()=='ar'?'right':'left' }};">{{ trans('cruds.publisher_name') }}</label>
                                    <input type="text" name="publisher_name" class="form-control form-control-lg" id="publisher_name" value="{{ old('publisher_name') }}">
                                    @error('publisher_name')<div class="text-danger">{{ $message }}</div>@enderror
                                    <div class="text-danger" id="publisher_name_error"></div>
                                </div>

                                <div class="form-group col-6">
                                    <label for="country_id">{{ trans('cruds.country') }}</label>
                                    <select name="country_id" id="country_id" class="form-control" required>
                                        <option value="" selected>{{ trans('cruds.select_country') }}</option>
                                        @foreach(App\Entities\Admin\Country::all() as $country)
                                            <option value="{{ $country->id }}">{{ $country->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger" id="country_error"></div>
                                </div>

                                <div class="form-group col-6">
                                    <label for="city_id">{{ trans('cruds.city') }}</label>
                                    <select name="city_id" id="city_id" class="form-control">
                                        <option value="">{{ trans('cruds.select_city') }}</option>
                                    </select>
                                    @error('city_id')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="form-group col-12">
                                    <label>{{ trans('cruds.select_category') }}</label>
                                    <select name="category_id[]"  class="form-control select2" multiple required style="in-width: 100% ; height: 40px ;width:100%">
                                        <option value="" disabled >{{ trans('cruds.select_category') }}</option>
                                        @foreach(App\Entities\Admin\Category::all() as $category)
                                            <option value="{{ $category->id }}" {{ in_array($category->id, old('category_id', [])) ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
                                    <div class="text-danger" id="category_id_error"></div>
                                </div>


                                <div class="form-group col-12 col-md-6 ">
                                    <label for="tender_code" class="font-weight-bold " style="float: {{ app()->getLocale()=='ar'?'right':'left' }};">{{ trans('cruds.tender_code') }}</label>
                                    <input type="text" name="tender_code" class="form-control form-control-lg" id="tender_code" value="{{ old('tender_code') }}" placeholder="{{ trans('cruds.tender_code') }}">
                                    @error('tender_code')<div class="text-danger">{{ $message }}</div>@enderror
                                    <div class="text-danger" id="tender_code_error"></div>
                                </div>

                                <div class="form-group col-12 col-md-6 ">
                                    <label for="closing_date" class="font-weight-bold " style="float: {{ app()->getLocale()=='ar'?'right':'left' }};">{{ trans('cruds.closing_date') }}</label>
                                    <input type="date" name="closing_date" class="form-control form-control-lg" id="closing_date" value="{{ old('closing_date') }}">
                                    @error('closing_date')<div class="text-danger">{{ $message }}</div>@enderror
                                    <div class="text-danger" id="closing_date_error"></div>
                                </div>    
                                
                                <div class="form-group col-12 col-md-6 ">
                                    <label for="bid_docs_price" class="font-weight-bold " style="float: {{ app()->getLocale()=='ar'?'right':'left' }};">{{ trans('cruds.bid_docs_price') }}</label>
                                    <input type="number" name="bid_docs_price" class="form-control form-control-lg" id="bid_docs_price" value="{{ old('bid_docs_price') }}">
                                    @error('bid_docs_price')<div class="text-danger">{{ $message }}</div>@enderror
                                    <div class="text-danger" id="bid_docs_price_error"></div>
                                </div>
                               
                                <div class="form-group col-12 col-md-6 ">
                                    <label for="opening_date" class="font-weight-bold " style="float: {{ app()->getLocale()=='ar'?'right':'left' }};">{{ trans('cruds.opening_date') }}</label>
                                    <input type="date" name="opening_date" class="form-control form-control-lg" id="opening_date" value="{{ old('opening_date') }}">
                                    @error('opening_date')<div class="text-danger">{{ $message }}</div>@enderror
                                    <div class="text-danger" id="opening_date_error"></div>
                                </div>    
                                
                                <div class="form-group col-12 col-md-6 ">
                                    <label for="submission_place" class="font-weight-bold " style="float: {{ app()->getLocale()=='ar'?'right':'left' }};">{{ trans('cruds.submission_place') }}</label>
                                    <input type="text" name="submission_place" class="form-control form-control-lg" id="submission_place" value="{{ old('submission_place') }}">
                                    @error('submission_place')<div class="text-danger">{{ $message }}</div>@enderror
                                    <div class="text-danger" id="submission_place_error"></div>
                                </div>

                                <div class="form-group col-12 col-md-6 ">
                                    <label for="docs_sale_place" class="font-weight-bold " style="float: {{ app()->getLocale()=='ar'?'right':'left' }};">{{ trans('cruds.docs_sale_place') }}</label>
                                    <input type="text" name="docs_sale_place" class="form-control form-control-lg" id="docs_sale_place" value="{{ old('docs_sale_place') }}">
                                    @error('docs_sale_place')<div class="text-danger">{{ $message }}</div>@enderror
                                    <div class="text-danger" id="docs_sale_place_error"></div>
                                </div>


                                <div class="form-group col-12 col-md-6 ">
                                    <label for="phone" class="font-weight-bold " style="float: {{ app()->getLocale()=='ar'?'right':'left' }};">{{ trans('cruds.phone') }}</label>
                                    <input type="text" name="phone" class="form-control form-control-lg" id="phone" value="{{ old('phone') }}">
                                    @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
                                    <div class="text-danger" id="phone_error"></div>
                                </div>
                                <div class="form-group col-12 col-md-6 ">
                                    <label for="internal_phone" class="font-weight-bold " style="float: {{ app()->getLocale()=='ar'?'right':'left' }};">{{ trans('cruds.internal_phone') }}</label>
                                    <input type="text" name="internal_phone" class="form-control form-control-lg" id="internal_phone" value="{{ old('internal_phone') }}">
                                    @error('internal_phone')<div class="text-danger">{{ $message }}</div>@enderror
                                    <div class="text-danger" id="internal_phone_error"></div>
                                </div>
                                <div class="form-group col-12 col-md-6 ">
                                    <label for="reference" class="font-weight-bold " style="float: {{ app()->getLocale()=='ar'?'right':'left' }};">{{ trans('cruds.reference') }}</label>
                                    <input type="text" name="reference" class="form-control form-control-lg" id="reference" value="{{ old('reference') }}">
                                    @error('reference')<div class="text-danger">{{ $message }}</div>@enderror
                                    <div class="text-danger" id="reference_error"></div>
                                </div>



                                <div class="form-group col-12 col-md-6 ">
                                    <label for="type" class="font-weight-bold " style="float: {{ app()->getLocale()=='ar'?'right':'left' }};">{{ trans('cruds.type') }}</label>
                                    <select name="type" class="form-control form-control-lg" id="type">
                                        <option value="">{{ trans('cruds.select_type') }}</option>
                                        @foreach (App\Entities\Admin\Type::all() as $item)
                                            <option value="{{$item->id}}" {{ old('type') == $item->id ? 'selected' : '' }}>{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger" id="type_error"></div>
                                    @error('type')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                                
                                <div class="form-group">
                                    <input type="checkbox" name="policy" id="policy" required>
                                    <label for="policy">
                                        <a href="{{ route('privacy.policy') }}" target="_blank">{{ trans('cruds.privacy_policy') }}</a>
                                    </label>
                                    <div class="text-danger" id="policy_error"></div>
                                </div>

                                <div class="card-footer text-right">
                                    <button type="submit" id="submitForm" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-sm btnRegister">
                                        {{ trans('cruds.submit') }}
                                    </button>
                                </div>
                                <br><br>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

<script>
	$(document).ready(function() {
		$('#country_id').change(function() {
			let country_id = $(this).val();

			if(country_id) {
				$.ajax({
					url: "{{ route('get_all_cities') }}",
					method: 'GET',
					data: {
						country_id: country_id,
					},
					success: function(response) {
						$('#city_id').empty();
						$('#city_id').append('<option value="">{{ trans("cruds.select_city") }}</option>');

						// Populate the city dropdown with the response
						if (response && response.data.length > 0) {
							$.each(response.data, function(index, city) {
								$('#city_id').append('<option value="' + city.id + '">' + city.title_ar + '</option>');
							});
						} else {
                            $('#city_id').empty();
						$('#city_id').append('<option value="">{{ trans("cruds.select_city") }}</option>');
						}
					},
					error: function() {
						alert("There was an error fetching citys. Please try again.");
					}
				});
			} else {
				$('#city_id').empty();
				$('#city_id').append('<option value="">{{ trans("cruds.select_city") }}</option>');
			}
		});
	});
</script>
<script>
(function () {
    function showValidationErrors(errors) {
        Object.keys(errors || {}).forEach(function (field) {
            var cleanField = field.replace(/\.\d+$/, '');
            var errorElement = document.getElementById(cleanField + '_error');

            if (errorElement && errors[field] && errors[field].length) {
                errorElement.textContent = errors[field][0];
            }
        });
    }

    var form = document.getElementById('tenderForm');
    var submitButton = document.getElementById('submitForm');

    if (!form || !submitButton) {
        console.error('Tender form or submit button not found.');
        return;
    }

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        document.querySelectorAll('.text-danger').forEach(function (element) {
            element.textContent = '';
        });

        var oldButtonText = submitButton.innerHTML;
        submitButton.disabled = true;
        submitButton.innerHTML = 'Please wait...';

        try {
            var response = await fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            });

            var rawResponse = await response.text();
            var data = null;

            try {
                data = JSON.parse(rawResponse);
            } catch (jsonError) {
                console.error('Non-JSON response:', rawResponse);
            }

            if (response.ok && data && data.success) {
                alert(data.message || 'تم إرسال المناقصة بنجاح.');
                window.location.reload();
                return;
            }

            if (response.status === 403 && data && data.subscription_required) {
                alert(data.message || 'يجب الاشتراك في إحدى الباقات أولاً.');
                window.location.href = "{{ route('welcome') }}";
                return;
            }

            if (response.status === 422 && data) {
                showValidationErrors(data.errors);

                var validationMessage = data.message || 'Please check the required fields.';

                if (data.errors) {
                    var firstKey = Object.keys(data.errors)[0];
                    if (firstKey && data.errors[firstKey] && data.errors[firstKey][0]) {
                        validationMessage = data.errors[firstKey][0];
                    }
                }

                alert(validationMessage);
                return;
            }

            if (data && data.message) {
                alert(data.message);
                return;
            }

            alert('حدث خطأ أثناء إرسال المناقصة.');
        } catch (error) {
            console.error('Submit error:', error);
            alert('حدث خطأ أثناء إرسال المناقصة: ' + error.message);
        } finally {
            submitButton.disabled = false;
            submitButton.innerHTML = oldButtonText;
        }
    });
})();
</script>
@endsection
@endsection

