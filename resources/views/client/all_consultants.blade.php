@extends('client.layout.client')

@section('content')

<style>
    .card:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }

    .card-body {
        text-align: center;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .small-description {
        font-size: 0.9rem;
        color: #6c757d;
        margin-top: 10px;
    }

    .profile-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #f8f9fa;
    }

    .consultant-card {
        border: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }
</style>

<br><br><br><br>

<section id="consultants" class="consultants section py-5">

    <div class="col-md-12 text-center heading-section ftco-animate">

        <h2 class="mb-4">
            نقدم لك أفضل المستشارين
        </h2>

        <p>
            موقعنا يقدم لك أحدث المعلومات عن أبرز وأهم المستشارين في مختلف المجالات،
            ليكون دليلك الأمثل لاختيار الأفضل.
        </p>

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


    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">

            <button
                type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close"
            >
                <span aria-hidden="true">&times;</span>
            </button>

            {{ session('message') }}

        </div>
    @endif


    <div class="container" style="direction: rtl;" data-aos="fade-up">

        @if(Auth::guard('client')->check())

            <a
                class="btn btn-warning btn-sm"
                type="button"
                data-toggle="collapse"
                data-target="#collapseExample"
                aria-expanded="false"
                aria-controls="collapseExample"
            >
                {{ trans('cruds.request_consultation') }}
            </a>

            <br><br>

        @else

            <a
                class="btn btn-warning btn-sm"
                href="{{ route('client.login') }}"
            >
                {{ trans('cruds.request_consultation') }}
            </a>

        @endif


        @if(Auth::guard('client')->check())

            <div
                class="collapse"
                id="collapseExample"
                style="background-color: #f0f0f0;"
            >

                <div class="card card-body shadow-sm rounded-lg p-4">

                    <form
                        action="{{ route('client.request_consultation') }}"
                        method="POST"
                    >

                        @csrf

                        <div class="row">

                            <div class="form-group col-md-6">

                                <label
                                    for="title"
                                    class="font-weight-bold"
                                >
                                    {{ trans('cruds.title') }}
                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    class="form-control"
                                    placeholder="{{ trans('cruds.title') }}"
                                    required
                                >

                                @error('title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <div class="form-group col-md-6">

                                <label
                                    for="department_id"
                                    class="font-weight-bold"
                                >
                                    {{ trans('cruds.department') }}
                                </label>

                                <select
                                    class="form-control"
                                    name="department_id"
                                    id="department_id"
                                    required
                                >

                                    <option value="">
                                        {{ trans('cruds.select_department') }}
                                    </option>

                                    @foreach(App\Entities\Admin\Department::has('consultants')->get() as $department)

                                        <option
                                            value="{{ $department->id }}"
                                            {{ old('department_id') == $department->id ? 'selected' : '' }}
                                        >
                                            {{ $department->title }}
                                        </option>

                                    @endforeach

                                </select>

                                @error('department_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <div class="form-group col-md-6">

                                <label
                                    for="consultant_id"
                                    class="font-weight-bold"
                                >
                                    {{ trans('cruds.consultant') }}
                                </label>

                                <select
                                    class="form-control"
                                    name="consultant_id"
                                    id="consultant_id"
                                    required
                                >

                                    <option value="">
                                        {{ trans('cruds.select_consultant') }}
                                    </option>

                                </select>

                                @error('consultant_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <br><br>


                            <div class="form-group col-md-12">

                                <label
                                    for="message"
                                    class="font-weight-bold"
                                >
                                    {{ trans('cruds.message') }}
                                </label>

                                <textarea
                                    class="form-control"
                                    name="message"
                                    rows="7"
                                    id="message"
                                    placeholder="{{ trans('cruds.message') }}"
                                    required
                                >{{ old('message') }}</textarea>

                                @error('message')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <br><br>

                        </div>


                        <br><br>


                        <div class="form-group">

                            <button
                                type="submit"
                                class="btn btn-primary btn-block py-3 font-weight-bold"
                            >
                                {{ trans('cruds.submit') }}
                            </button>

                        </div>

                    </form>

                </div>

            </div>


            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

        @endif


        <div class="container my-4" style="direction: rtl;">

            <div class="row">

                <!-- Sidebar: Departments List -->

                <div class="col-12 col-lg-3 mb-4 mb-lg-0">

                    <div class="card shadow-sm border-light">

                        <div class="card-body">

                            <h5 class="card-title mb-4">
                                {{ trans('cruds.departments') }}
                            </h5>

                            <ul class="list-group list-group-flush">

                                @foreach ($departments as $department)

                                    <li class="list-group-item border-0">

                                        @if(request('department_id') == $department->id)

                                            <span class="text-primary">
                                                {{ $department->title }}
                                            </span>

                                        @else

                                            <a
                                                href="{{ route('all_consultants') }}?department_id={{ $department->id }}"
                                                class="text-dark"
                                            >
                                                {{ $department->title }}
                                            </a>

                                        @endif

                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    </div>

                </div>


                <!-- Consultants List -->

                <div class="col-12 col-lg-9">

                    <div class="row">

                        @foreach ($consultants as $consultant)

                            <div class="col-12 col-md-4 mb-4">

                                <div class="card consultant-card shadow-sm border-light rounded-3">

                                    <div class="card-body text-center">

                                        <div class="profile-img-container mb-3">

                                            <img
                                                src="{{ $consultant->photo ?? url('settings/' . getSettingValue('logo')) }}"
                                                alt="{{ $consultant->name }}"
                                                class="profile-img rounded-circle"
                                            >

                                        </div>


                                        <h5 class="card-title fw-bold text-dark">
                                            {!! $consultant->my_name !!}
                                        </h5>


                                        <p class="text-muted">
                                            {{ $consultant->title }}
                                        </p>


                                        <p class="text-primary">
                                            {{ $consultant->department->title ?? 'No department' }}
                                        </p>


                                        <p class="small-description text-muted">
                                            {{ Str::limit($consultant->description, 100) }}
                                        </p>


                                        @if(Auth::guard('client')->check())

                                            <a
                                                class="btn btn-warning btn-sm"
                                                href="{{ route('client.consultants.show', $consultant->slug ?? $consultant->id) }}"
                                            >
                                                {{ trans('cruds.more_info') }}
                                            </a>

                                        @else

                                            <a
                                                class="btn btn-warning btn-sm"
                                                href="{{ route('client.login') }}"
                                            >
                                                {{ trans('cruds.ask_advice') }}
                                            </a>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


@section('js')

@if(Auth::guard('client')->check())

<script>

    $(document).ready(function() {

        $('#department_id').change(function() {

            let department_id = $(this).val();

            let user_id = "{{ auth()->guard('client')->user()->id }}";

            if (department_id) {

                $.ajax({

                    url: "{{ route('get_all_consultants') }}",

                    method: 'GET',

                    data: {
                        department_id: department_id,
                        user_id: user_id
                    },

                    success: function(response) {

                        $('#consultant_id').empty();

                        $('#consultant_id').append(
                            '<option value="">{{ trans("cruds.select_consultant") }}</option>'
                        );

                        if (response && response.data.length > 0) {

                            $.each(response.data, function(index, consultant) {

                                $('#consultant_id').append(
                                    '<option value="' +
                                    consultant.id +
                                    '">' +
                                    consultant.name +
                                    '</option>'
                                );

                            });

                        } else {

                            $('#consultant_id').empty();

                            $('#consultant_id').append(
                                '<option value="">غير متوفر مستشار حاليًا</option>'
                            );

                        }

                    },

                    error: function() {

                        alert(
                            "There was an error fetching consultants. Please try again."
                        );

                    }

                });

            } else {

                $('#consultant_id').empty();

                $('#consultant_id').append(
                    '<option value="">{{ trans("cruds.select_consultant") }}</option>'
                );

            }

        });

    });

</script>

@endif

@endsection

@endsection