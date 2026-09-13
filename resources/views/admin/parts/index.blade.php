@extends('layouts.master')

@section('content')
@include('includes.header_without_input',['item'=>'parts','page'=>'parts'])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <select id="sectionFilter" class="form-control">
                            <option value="">Ø§Ø®ØªØ§Ø± Ø§Ù„Ø³ÙƒØ´Ù†</option>
                            <option value="hero">Hero</option>
                            <option value="about">About</option>
                            <option value="features">Features</option>
                            <option value="call_to_action">Call to Action</option>
                            <option value="stats">Stats</option>
                            <option value="subscription">Subscription</option>
                            <option value="services">Services</option>
                        </select>
                        
                    </div>
                </div>

                <!-- Table -->
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ trans('cruds.id') }}</th>
                            <th>{{ trans('cruds.title') }}</th>
                            <th>{{ trans('cruds.description') }}</th>
                            <th>{{ trans('cruds.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr class="item-row" data-section="{{ $item->section }}">
                                <td> {{ $item->id ?? '' }}</td>
                                <td> {{ $item->title ?? '' }}</td>
                                <td> {!! $item->value ?? '' !!}</td>
                                <td>
                                    @canany(['admin', "delete parts"])
                                    <a id="bDel" href="{{ route('parts.edit', $item->id) }}" class="btn btn-sm btn-success">
                                        <span class="fe fe-edit"> </span>
                                    </a>
                                    @endcanany
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Filter Table -->
<script>
    document.getElementById("sectionFilter").addEventListener("change", function() {
        var selectedSection = this.value.toLowerCase(); // Get the selected section value
        var rows = document.querySelectorAll("#example1 .item-row"); // Get all rows in the table

        rows.forEach(function(row) {
            var section = row.getAttribute("data-section").toLowerCase(); // Get the section of the current row
            if (selectedSection === "" || section === selectedSection) {
                row.style.display = "";  // Show row
            } else {
                row.style.display = "none";  // Hide row
            }
        });
    });
</script>

@endsection

