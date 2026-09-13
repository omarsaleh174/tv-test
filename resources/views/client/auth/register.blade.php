@extends('client.layout.client')

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
            <div class="col-md-12">
                <!-- Tabs for Login and Register -->
                <ul class="nav nav-tabs" id="login-register-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">{{ trans('cruds.login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">{{ trans('cruds.register') }}</a>
                    </li>
                </ul>

                <div class="tab-content mt-4 card card-body" id="login-register-tabs-content">
                    <!-- Login Form -->
                    <div class="tab-pane fade show active " id="login" role="tabpanel" aria-labelledby="login-tab">
                        <h3 class="text-center mb-4">{{ trans('cruds.login') }}</h3>
                        <form action="{{ route('client.post_login') }}" method="POST">
                            @csrf
                            <div class="form-group ">
                                <label for="email">{{ trans('cruds.email') }}</label>
                                <input type="email" name="email" id="email_login" class="form-control" placeholder="{{ trans('cruds.email') }}" required>
                            </div>
                            <div class="form-group ">
                                <label for="password">{{ trans('cruds.password') }}</label>
                                <input type="password" name="password" id="password_login" class="form-control" placeholder="{{ trans('cruds.password') }}" required>
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
                            <div class="form-group  d-flex justify-content-between align-items-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                    <label class="custom-control-label" for="remember">{{ trans('cruds.remember_me') }}</label>
                                </div>
                                <a href="#" class="text-muted small">{{ trans('cruds.forgot_password') }}</a>
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="btn btn-primary btn-block">{{ trans('cruds.login') }}</button>
                            </div>
                        </form>
                        <p class="text-center mt-3">
                            {{ trans('cruds.no_account') }}
                            <a href="#" id="go-to-register">{{ trans('cruds.register') }}</a>
                        </p>
                    </div>

                    <!-- Register Form -->
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <h3 class="text-center mb-4">{{ trans('cruds.register') }}</h3>
                        <form id="register-form" action="{{ route('client.post_register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

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

                                {{-- <div class="form-group col-6">
                                    <label for="photo">{{ trans('cruds.profile_photo') }}</label>
                                    <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                                </div> --}}
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
                                </div>

                                <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

                                <div class="form-group col-12">
                                    <label>{{ trans('cruds.category') }}</label>
                                    <select name="category_id[]" class="form-control select2" multiple>
                                        <option value="">{{ trans('cruds.select_category') }}</option>
                                        @foreach(App\Entities\Admin\Category::all() as $category)
                                            <option value="{{ $category->id }}" {{ in_array($category->id, old('category_id', [])) ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                                
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

                                <div class="form-group col-6">
                                    <button type="button" id="register-submit" class="btn btn-primary btn-block">{{ trans('cruds.register') }}</button>
                                </div>
                        </form>
                        <div id="error-messages" class="alert alert-danger d-none">
                            <ul id="error-list"></ul>
                        </div>
                        <div id="success-message" class="alert alert-success d-none">
                            <p>ØªÙ… Ø§Ù†Ø´Ø§Ø¡ Ø­Ø³Ø§Ø¨ Ø¨Ù†Ø¬Ø§Ø­</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<SCRipt>$(document).ready(function() { $('.select2').select2(); });</SCRipt>

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
    $(document).ready(function() {
        $('#register-submit').on('click', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Clear previous messages
            $('#error-messages').addClass('d-none');  // Hide the general error message
            $('#success-message').addClass('d-none');
            $('#error-list').empty();  // Empty the error list
            $('.is-invalid').removeClass('is-invalid');  // Remove the 'is-invalid' class from all fields

            // Get the form data
            var formData = new FormData($('#register-form')[0]);

            // Send the data via AJAX
            $.ajax({
                url: $('#register-form').attr('action'),
                method: 'POST',
                data: formData,
                processData: false, // Don't process the data
                contentType: false, // Don't set content type
                success: function(response) {
                    if (response.status === 'success') {
                        // Display the success message
                        $('#success-message').removeClass('d-none');
                        setTimeout(function() {
                            // Redirect to the welcome route after a short delay
                            window.location.href = '{{ route('welcome') }}';
                        }, 2000);
                    }
                },
                error: function(xhr) {
                    // If there are validation errors, display them
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $('#error-messages').removeClass('d-none');  // Show the error container
                        
                        $.each(errors, function(field, messages) {
                            var inputField = $("#" + field);  // Get the field with the error

                            // Add 'is-invalid' class to the input field
                            inputField.addClass('is-invalid');

                            // Loop through the messages for the field and add them
                            $.each(messages, function(index, message) {
                                // Check if the error message already exists to avoid duplicates
                                if (inputField.next('.invalid-feedback').length === 0) {
                                    // Create and display each error message
                                    var errorMessage = $("<div>").addClass('invalid-feedback').text(message);
                                    
                                    // Append the error message below the input field
                                    inputField.after(errorMessage);
                                }
                            });
                        });
                    }
                }
            });
        });
    });
</script>

<script>
    // When the #go-to-register link is clicked
    $('#go-to-register').on('click', function(e) {
        e.preventDefault(); // Prevent default link behavior
        // Trigger a click on the #register-tab link
        $('#register-tab').click();
    });
</script>

@endsection

