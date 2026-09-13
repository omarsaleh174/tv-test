@extends('client.layout.client')

@section('content')
<br><br><br><br>
<section id="tenders" class="tenders section py-5">
    <div class="container" style="direction: rtl;" data-aos="fade-up">
        <h2 class="text-center mb-5">{{ trans('cruds.all_tenders') }}</h2>
        <div class="container my-4" style="direction: rtl;">
            <div class="row" style="direction: rtl;">
                <div class="col-12 col-lg-3 mb-3">
                    <!-- Country Filter -->
                    <div class="card m-3">
                        <div class="card-body m-2">
                            <h5 class="card-title">{{ trans('cruds.country') }}</h5>
                            <select name="country_id" class="form-control" id="country_id">
                                <option value="">{{ trans('cruds.select_country') }}</option>
                                @foreach(App\Entities\Admin\Country::all() as $country)
                                    <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="card m-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ trans('cruds.categories') }}</h5>
                            <ul class="list-group list-group-flush" id="categories_list">
                                <li class="list-group-item p-3">
                                    <input type="checkbox"  id="select_all_categories" class="category_checkbox" style="display: inline">
                                    <h4 style="display: inline">{{ trans('cruds.categories') }}</h4>
                                </li>

                                @foreach ($categories as $category)
                                    <li class="list-group-item p-3">
                                        <input type="checkbox" name="category_id" value="{{ $category->id }}" class="category_checkbox" style="display: inline">
                                        <h6 style="display: inline">{{ $category->title }}</h6>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Tender List -->
                <div class="col-12 col-lg-9" id="tender_list">
                    @foreach ($tenders as $item)
                        <div class="card mb-3">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-2 text-center">
                                    <img src="{{ asset('settings\\') . getSettingValue('logo') }}" width="80" class="img-fluid rounded-start" alt="User">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                        <p class="card-text">
                                            <strong>{{ trans('cruds.opening_date') }}:</strong> {{ $item->opening_date }} <br>
                                            <strong>{{ trans('cruds.closing_date') }}:</strong> {{ $item->closing_date }} <br>
                                            <small class="text-muted">{{ $item->publisher_name }}</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    @if(Auth::guard('client')->check())
                                        <a class="btn btn-warning" href="{{ route('client.tender.show', $item->slug??$item->id) }}">{{ trans('cruds.more_info') }}</a>
                                    @else
                                        <a class="btn btn-warning" href="{{ route('client.login') }}">{{ trans('cruds.more_info') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Flag to prevent re-triggering AJAX requests
    let isRequestInProgress = false;

    // Handle category selection toggle (Select All)
    $('#select_all_categories').change(function() {
        var isChecked = $(this).prop('checked');
        $('.category_checkbox').prop('checked', isChecked);
        // Trigger the change event to update the tenders list
        filterTenders();
    });

    // Handle individual category checkbox changes
    $('.category_checkbox').change(function() {
        // Trigger the change event for country and category checkboxes to reload the tenders
        filterTenders();
    });

    // Handle country and category changes to filter tenders
    $('#country_id').change(function() {
        // Trigger the change event for category checkboxes to reload the tenders
        filterTenders();
    });

    // Function to filter tenders via AJAX
    function filterTenders() {
        if (isRequestInProgress) {
            return; // Prevent multiple requests from being fired simultaneously
        }

        isRequestInProgress = true; // Set the flag to true to block other requests
        var country_id = $('#country_id').val();
        var category_ids = [];

        // Collect selected categories
        $('.category_checkbox:checked').each(function() {
            category_ids.push($(this).val());
        });

        // Make AJAX request to fetch the updated tenders
        $.ajax({
            url: '{{ route('client.tenders') }}', // Update with your correct route
            method: 'GET',
            data: {
                country_id: country_id,
                category_ids: category_ids
            },
            success: function(response) {
                // Update the tender list with new HTML from the response
                $('#tender_list').html(response.html);
                isRequestInProgress = false; // Reset flag after request is complete
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert("Ø­Ø¯Ø« Ø®Ø·Ø£ Ø£Ø«Ù†Ø§Ø¡ ØªØ­Ù…ÙŠÙ„ Ø§Ù„ØªÙ†Ø¯Ø±Ø§Øª.");
                isRequestInProgress = false; // Reset flag if there is an error
            }
        });
    }
});

</script>
@endsection

@endsection

