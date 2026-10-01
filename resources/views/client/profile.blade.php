@extends('client.layout.client')

@section('content')
<style>
     .select2-container .select2-selection--multiple { min-width: 100% ; height: 60px ; }
     
             .select2-container .select2-selection--multiple {
            overflow: hidden; 
        }
        
        .select2-container .select2-selection__choice {
            font-size: 14px; 
            margin-top: 5px; 
            margin-right: 5px;
        }

</style>
     
     
<section style="background-color: #f9f9f9;" @if(app()->getLocale() == 'ar') dir="rtl" @endif>
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col">
                <nav class="nav justify-content-center bg-light p-3 rounded shadow">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <a class="nav-link active" id="personal-data-link" href="#" onclick="showSection('personal-data')">
                        <i class="bi bi-person-circle"></i> {{ trans('cruds.personal_data') }}
                    </a>
                    <a class="nav-link" id="subscription-link" href="#" onclick="showSection('subscription')">
                        <i class="bi bi-card-checklist"></i> {{ trans('cruds.subscription') }}
                    </a>
                    <a class="nav-link" id="consultations-link" href="#" onclick="showSection('consultations')">
                        <i class="bi bi-chat-square-text"></i> {{ trans('cruds.consultations') }}
                    </a>
                    <a class="nav-link" id="consultations-link" href="#" onclick="showSection('tenders')">
                        <i class="bi bi-chat-square-text"></i> {{ trans('cruds.tenders') }}
                    </a>

                    <a class="nav-link" id="update-profile-link" href="#" onclick="showSection('update-profile')">
                        <i class="bi bi-pencil-square"></i> {{ trans('cruds.update_profile') }}
                    </a>
                    <a class="nav-link" id="update-password-link" href="#" onclick="showSection('update-password')">
                        <i class="bi bi-lock"></i> {{ trans('cruds.update_password') }}
                    </a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body text-center">
                        <img src="{{asset('images/settings/' . getSettingValue('logo'))}}" alt="{{ trans('cruds.client_image') }}" class="rounded-circle img-fluid" style="width: 250px; border: 5px solid #ffc451;">
                        <h5 class="my-3 text-primary">{{ auth()->guard('client')->user()->company_name ?? auth()->guard('client')->user()->name }}</h5>
                        <p class="text-muted mb-4">{{ auth()->guard('client')->user()->title }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 card card-body" >
                <div id="personal-data" class="section-content">
                    <h4 class="mb-4 text-center text-primary">{{ trans('cruds.personal_data') }}</h4>
                    @foreach (['company_name', 'name', 'phone', 'phone_2', 'email', 'whatsapp',] as $item)
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <p class="mb-0 font-weight-bold">{{ trans("cruds.$item") }}</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ auth()->guard('client')->user()->$item ?? '--' }}</p>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <p class="mb-0 font-weight-bold">{{ trans("cruds.gender") }}</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ auth()->guard('client')->user()->my_gender ?? '--' }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <p class="mb-0 font-weight-bold">{{ trans('cruds.country') }}</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ auth()->guard('client')->user()->country->title ?? '--' }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <p class="mb-0 font-weight-bold">{{ trans('cruds.city') }}</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ auth()->guard('client')->user()->city->title ?? '--' }}</p>
                        </div>
                    </div>
                    <hr>
                </div>
                <div id="subscription" class="section-content card card-body" style="display:none;">
                    <h4 class="mb-4 text-center text-primary">{{ trans('cruds.subscription') }}</h4>
                    @if(auth()->guard('client')->user()->subscription)
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <p class="mb-0 font-weight-bold">{{ trans('cruds.title') }}</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ auth()->guard('client')->user()->subscription->title ?? '--' }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <p class="mb-0 font-weight-bold">{{ trans('cruds.description') }}</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ auth()->guard('client')->user()->subscription->description ?? '--' }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <p class="mb-0 font-weight-bold">{{ trans('cruds.subscription_type') }}</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ auth()->guard('client')->user()->subscription->subscription_type ?? '--' }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <p class="mb-0 font-weight-bold">{{ trans('cruds.duration') }}</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ auth()->guard('client')->user()->subscription->duration ?? '--' }} months</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <p class="mb-0 font-weight-bold">{{ trans('cruds.status') }}</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ auth()->guard('client')->user()->subscription->status ?? '--' }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <p class="mb-0 font-weight-bold">{{ trans('cruds.price') }}</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ auth()->guard('client')->user()->subscription->price ?? '--' }} USD</p>
                        </div>
                    </div>
                    @endif
                    <hr>
                </div>
                <div id="consultations" class="section-content" style="display:none; background-color: #fff; padding: 20px; border-radius: 8px;">
                    <h4 class="mb-4 text-center text-primary">{{ trans('cruds.consultations') }}</h4>
                    @foreach(auth()->guard('client')->user()->consultations as $consultation)
                    <div class="consultation-item" style="margin-bottom: 30px; padding: 20px; background-color: #f8f9fa; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <p class="mb-0 font-weight-bold">{{ trans('cruds.consultant') }}</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $consultation->consultant->name ?? '--' }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <p class="mb-0 font-weight-bold">{{ trans('cruds.department') }}</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $consultation->consultant->department->title??"" }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <p class="mb-0 font-weight-bold">{{ trans('cruds.title') }}</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $consultation->title ?? '--' }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <p class="mb-0 font-weight-bold">{{ trans('cruds.message') }}</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $consultation->message ?? '--' }}</p>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid #ccc;">
                    </div>
                    @endforeach
                </div>


                <div id="tenders" class="section-content" style="display:none; background-color: #fff; padding: 20px; border-radius: 8px;">
                    <h4 class="mb-4 text-center text-primary">{{ trans('cruds.tenders') }}</h4>
                    @foreach(auth()->guard('client')->user()->tenders as $tender)
                    <div class="card mb-3"style="direction: rtl;">
                        <div class="row g-0 align-items-center"style="direction: rtl;">
                          <div class="col-md-2 text-center">
                             <img src="{{asset('images/settings/' . getSettingValue('logo'))}}" width="80" class="img-fluid rounded-start" alt="User">
                          </div>
                          <div class="col-md-8"style="direction: rtl;">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{$tender->title}}  
                                    <span class="badge {{ $tender->approved_by == null ? 'bg-warning' : 'bg-success' }} text-white">
                                        {{ $tender->approved_by == null ? 'جاري الموافقة' : 'تمت الموافقة' }}
                                    </span>
                                </h5>
                                                              <p class="card-text">
                                <strong>{{ trans('cruds.opening_date') }}:</strong>    {{$tender->opening_date}}             <br>
                                <strong>{{ trans('cruds.closing_date') }}:</strong>    {{$tender->closing_date}}             <br>
                                <small class="text-muted">{{$tender->publisher_name}}</small>
                              </p>
                            </div>
                          </div>
                          <div class="col-md-2 text-center">
                              @if(Auth::guard('client')->check())  
                              <a class="btn btn-warning" href="{{route('client.tender.show',$tender->slug??$tender->id)}}">{{ trans('cruds.more_info') }} </a>
                              @else
                              <a class="btn btn-warning" href="{{route('client.login')}}">{{ trans('cruds.more_info') }} </a>
                              @endif
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>

                <div id="update-profile" class="section-content" style="display:none;">
                    <h4 class="mb-4 text-center text-primary">{{ trans('cruds.update_profile') }}</h4>
                    <form id="update-profile-form" action="{{ route('client.updateProfile') }}" method="POST" enctype="multipart/form-data" class="php-email-form p-4 shadow-lg rounded-3">
                        @csrf
                        @method('PUT') <!-- Used PUT method for updating -->
                    
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
                                <input type="text" name="company_name" id="company_name" class="form-control" value="{{ auth()->guard('client')->user()->company_name }}" placeholder="{{ trans('cruds.company_name') }}">
                            </div>
                            
                            <div class="form-group col-6">
                                <label for="name">{{ trans('cruds.full_name') }}</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ auth()->guard('client')->user()->name }}" placeholder="{{ trans('cruds.name') }}" required>
                            </div>
                    
                            <div class="form-group col-6">
                                <label for="email">{{ trans('cruds.email') }}</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ auth()->guard('client')->user()->email }}" placeholder="{{ trans('cruds.email') }}" required>
                            </div>
                    
                            <div class="form-group col-6">
                                <label for="phone">{{ trans('cruds.phone') }}</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ auth()->guard('client')->user()->phone }}" placeholder="{{ trans('cruds.phone') }}" required>
                            </div>
                    
                            <div class="form-group col-6">
                                <label for="phone_2">{{ trans('cruds.second_phone') }}</label>
                                <input type="text" name="phone_2" id="phone_2" class="form-control" value="{{ auth()->guard('client')->user()->phone_2 }}" placeholder="{{ trans('cruds.second_phone') }}">
                            </div>
                    
                            <div class="form-group col-6">
                                <label for="whatsapp">{{ trans('cruds.whatsapp') }}</label>
                                <input type="text" name="whatsapp" id="whatsapp" class="form-control" value="{{ auth()->guard('client')->user()->whatsapp }}" placeholder="{{ trans('cruds.whatsapp') }}">
                            </div>
                    
                            <div class="form-group col-6">
                                <label for="gender">{{ trans('cruds.gender') }}</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">{{ trans('cruds.select_gender') }}</option>
                                    <option value="1" {{ auth()->guard('client')->user()->gender == 1 ? 'selected' : '' }}>{{ trans('cruds.male') }}</option>
                                    <option value="2" {{ auth()->guard('client')->user()->gender == 2 ? 'selected' : '' }}>{{ trans('cruds.female') }}</option>
                                </select>
                            </div>
                    
                            <div class="form-group col-6">
                                <label for="country_id">{{ trans('cruds.country') }}</label>
                                <select name="country_id" id="country_id" class="form-control" required>
                                    <option value="" selected>{{ trans('cruds.select_country') }}</option>
                                    @foreach(App\Entities\Admin\Country::all() as $country)
                                        <option value="{{ $country->id }}" {{ auth()->guard('client')->user()->country_id == $country->id ? 'selected' : '' }}>{{ $country->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                            <div class="form-group col-6">
                                <label for="city_id">{{ trans('cruds.city') }}</label>
                                <select name="city_id" id="city_id" class="form-control">
                                    <option value="">{{ trans('cruds.select_city') }}</option>
                                    @foreach(App\Entities\Admin\City::where('country_id', auth()->guard('client')->user()->country_id)->get() as $city)
                                        <option value="{{ $city->id }}" {{ auth()->guard('client')->user()->city_id == $city->id ? 'selected' : '' }}>{{ $city->title }}</option>
                                    @endforeach
                                </select>
                                @error('city_id')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                    
                            <div class="form-group col-12">
                                <label>{{ trans('cruds.category') }}</label>
                                <select name="category_id[]" class="form-control select2" multiple style="in-width: 100% ; height: 40px ;width:100%">
                                    <option value="">{{ trans('cruds.select_category') }}</option>
                                    @foreach(App\Entities\Admin\Category::all() as $category)
                                        <option value="{{ $category->id }}" 
                                                {{ in_array($category->id,  auth()->guard('client')->user()->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                    
                            <div class="form-group col-6">
                                <button type="submit" id="update-profile-submit" class="btn btn-primary btn-block">{{ trans('cruds.update_profile') }}</button>
                            </div>
                        </div>
                    </form>
                                        
                </div>

                <div id="update-password" class="section-content" style="display:none;">
                    <h4 class="mb-4 text-center text-primary">{{ trans('cruds.update_password') }}</h4>
                    <form action="{{ route('client.updatePassword') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <p class="mb-0 font-weight-bold">{{ trans('cruds.current_password') }}</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="current_password" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <p class="mb-0 font-weight-bold">{{ trans('cruds.new_password') }}</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="new_password" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <p class="mb-0 font-weight-bold">{{ trans('cruds.confirm_password') }}</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="new_password_confirmation" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">{{ trans('cruds.save_changes') }}</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<script>
    function showSection(sectionId) {
        const sections = document.querySelectorAll('.section-content');
        sections.forEach(section => section.style.display = 'none');
        const selectedSection = document.getElementById(sectionId);
        if (selectedSection) {
            selectedSection.style.display = 'block';
        }
        const links = document.querySelectorAll('.nav-link');
        links.forEach(link => link.classList.remove('active'));
        document.getElementById(sectionId + '-link').classList.add('active');
    }
    showSection('personal-data');
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@include('includes.select2')

@endsection
