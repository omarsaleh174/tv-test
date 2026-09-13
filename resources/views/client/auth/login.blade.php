@extends('client.layout.client')
@section('content')
style
<br><br><br>
<style>
     .select2-container .select2-selection--multiple { min-width: 100% ; height: 60px ; }
     
     .select2-container .select2-selection--multiple {
    overflow: hidden; /* Ù…Ù†Ø¹ Ø§Ù„Ø¹Ù†Ø§ØµØ± Ù…Ù† Ø§Ù„Ø®Ø±ÙˆØ¬ */
}

.select2-container .select2-selection__choice {
    font-size: 14px; /* Ø¶Ø¨Ø· Ø­Ø¬Ù… Ø§Ù„Ø®Ø· */
    margin-top: 5px; /* Ù…Ø³Ø§ÙØ© Ø¨ÙŠÙ† Ø§Ù„Ø¹Ù†Ø§ØµØ± */
    margin-right: 5px;
}

     </style>
<section id="contact" class="contact section py-5">
    <div class="container text-center" data-aos="fade-up">
        <h2>{{ trans('cruds.login') }}</h2>
    </div>

    <!-- Login Form Section -->
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12">
                <!-- Login Form -->
                <div id="loginForm">
                    <form action="{{ route('client.post_login') }}" method="post" class="php-email-form  p-4 shadow-lg rounded-3">
                        @csrf

                        <div class="row gy-4">
                            <div class="col-12">
                                <label style="margin-bottom: 20px">{{ trans('cruds.email') }}</label>
                                <input type="email" name="email" class="form-control" placeholder="{{ trans('cruds.email') }}" required="">
                            </div>
                            
                            <div class="col-12">
                                <label style="margin-bottom: 20px">{{ trans('cruds.password') }}</label>
                                <input type="password" class="form-control" name="password" placeholder="{{ trans('cruds.password') }}" required="">
                            </div>
                            
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary w-100">{{ trans('cruds.login') }}</button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center mt-3">
                        {{ trans('cruds.no_account') }}
                        <a href="#" id="go-to-register">{{ trans('cruds.register') }}</a>
                    </p>

                    <a class="text-center mt-3" href="{{ route('client.password.reset') }}">Reset Password</a>
                    
                </div>
                
                <!-- Register Form Section -->
                <div id="registerForm" style="display: none;">
                    <form id="register-form" action="{{ route('client.post_register') }}" method="POST" enctype="multipart/form-data" class="php-email-form  p-4 shadow-lg rounded-3">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row gy-4">
                            <div class="form-group col-6">
                                <label for="company_name">{{ trans('cruds.company_name') }}</label>
                                <input type="text" name="company_name" id="company_name" class="form-control" placeholder="{{ trans('cruds.company_name') }}">
                            </div>
                            
                            <div class="form-group col-6">
                                <label for="name">{{ trans('cruds.full_name') }}</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="{{ trans('cruds.name') }}" required>
                            </div>

                            <div class="form-group col-6">
                                <label for="email">{{ trans('cruds.email') }}</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="{{ trans('cruds.email') }}" required>
                            </div>

                            <div class="form-group col-6">
                                <label for="password">{{ trans('cruds.password') }}</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="{{ trans('cruds.password') }}" required>
                            </div>

                            <div class="form-group col-6">
                                <label for="phone">{{ trans('cruds.phone') }}</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="{{ trans('cruds.phone') }}" required>
                            </div>

                            <div class="form-group col-6">
                                <label for="phone_2">{{ trans('cruds.second_phone') }}</label>
                                <input type="text" name="phone_2" id="phone_2" class="form-control" placeholder="{{ trans('cruds.second_phone') }}">
                            </div>

                            <div class="form-group col-6">
                                <label for="whatsapp">{{ trans('cruds.whatsapp') }}</label>
                                <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="{{ trans('cruds.whatsapp') }}">
                            </div>

                            <div class="form-group col-6">
                                <label for="gender">{{ trans('cruds.gender') }}</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">{{ trans('cruds.select_gender') }}</option>
                                    <option value="1">{{ trans('cruds.male') }}</option>
                                    <option value="2">{{ trans('cruds.female') }}</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label for="country_id">{{ trans('cruds.country') }}</label>
                                <select name="country_id" id="country_id" class="form-control" required>
                                    <option value="" selected>{{ trans('cruds.select_country') }}</option>
                                    @foreach(App\Entities\Admin\Country::all() as $country)
                                        <option value="{{ $country->id }}">{{ $country->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label for="city_id">{{ trans('cruds.city') }}</label>
                                <select name="city_id" id="city_id" class="form-control">
                                    <option value="">{{ trans('cruds.select_city') }}</option>
                                </select>
                                @error('city_id')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group col-12">
                                <label>{{ trans('cruds.category_select') }}</label>
                                <select name="category_id[]"  class="form-control select2" multiple required style="in-width: 100% ; height: 40px ;width:100%">
                                    <option value="" disabled >{{ trans('cruds.select_category') }}</option>
                                    @foreach(App\Entities\Admin\Category::all() as $category)
                                        <option value="{{ $category->id }}" {{ in_array($category->id, old('category_id', [])) ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="policy" id="policy" required>
                                <label for="policy">
                                    <a href="{{ route('privacy.policy') }}" target="_blank">{{ trans('cruds.privacy_policy') }}</a>
                                </label>
                                <div class="text-danger" id="policy_error"></div>
                            </div>
                            <div class="form-group col-6">
                                <button type="submit" id="register-submit" class="btn btn-primary btn-block">{{ trans('cruds.register') }}</button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center mt-3">
                        {{ trans('cruds.have_account') }}
                        <a href="#" id="go-to-login">{{ trans('cruds.login') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
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
    // Show Register Form and hide Login Form
    document.getElementById('go-to-register').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('loginForm').style.display = 'none';
        document.getElementById('registerForm').style.display = 'block';
    });

    // Show Login Form and hide Register Form
    document.getElementById('go-to-login').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('registerForm').style.display = 'none';
        document.getElementById('loginForm').style.display = 'block';
    });
</script>

@endsection
@endsection

