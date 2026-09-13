@if($seen=='index')
<div class="card">
  <div class="card-body">
    <div class="row">
        <div class="col-md-12 col-xl-4">
            <div class="form-group">
              <label class="col-sm-12 col-form-label">{{ trans('cruds.status') }} <span class="text-red">*</span></label>
                <div class="col-sm-12">
                    <select class="form-control form-select select2" id="status" name="status" data-bs-placeholder="Select">
                        <option value="" selected> {{ trans('cruds.status') }}</option>
                        <option value="0" > {{ trans('cruds.canceled') }}</option>
                        <option value="1" > {{ trans('cruds.placed') }}</option>
                        <option value="2" > {{ trans('cruds.confirmed') }}</option>
                        <option value="3" > {{ trans('cruds.shipped') }}</option>
                        <option value="4" > {{ trans('cruds.out_of_delivery') }}</option>
                        <option value="5" > {{ trans('cruds.delivered') }}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-4">
            <div class="form-group">
              <label class="col-sm-12 col-form-label">{{ trans('cruds.paid_type') }} <span class="text-red">*</span></label>
                <div class="col-sm-12">
                    <select class="form-control form-select select2" id="paid_type" name="paid_type" data-bs-placeholder="Select">
                        <option value="" selected> {{ trans('cruds.paid_type') }}</option>
                        <option value="0" > {{ trans('cruds.cash') }}</option>
                        <option value="1" > {{ trans('cruds.online') }}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-4">
            <div class="form-group">
              <label class="col-sm-12 col-form-label">{{ trans('cruds.date') }} <span class="text-red">*</span></label>
                <div class="col-sm-12">
                    <input type="date" name="created_at" id="created_at" class="form-control">
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endif
<table id="table" class="table table-bordered table-striped example1" width="100%">
    <thead>
          <tr style="">
            <th>{{trans('cruds.id')}}</th>
            <th>{{trans('cruds.email')}}</th>
            <th>{{trans('cruds.price')}}</th>
            <th>{{trans('cruds.status')}}</th>
            <th>{{trans('cruds.date')}}</th>
            <th>{{trans('cruds.action') }}</th>
          </tr>
      </thead>
      <tbody>
       </tbody>
      <tfoot>
      <tr>
        <th>{{trans('cruds.id')}}</th>
        <th>{{trans('cruds.email')}}</th>
        <th>{{trans('cruds.price')}}</th>
        <th>{{trans('cruds.status')}}</th>
        <th>{{trans('cruds.date')}}</th>
        <th>{{trans('cruds.action') }}</th>
      </tr>
      </tfoot>
    </table>
  @section('js')
  <script>
    $(function() {
        // Initialize DataTable and store the instance in a variable
        var table = $('#table').DataTable({
            processing: true,
            serverSide: true, 
            ajax: {
            url: '{{ route("orders.$seen") }}',
            data: function (d) {
                d.status = $('#status').val();
                d.created_at = $('#created_at').val();
                d.paid_type = $('#paid_type').val();
                d.search = $('input[type="search"]').val();
            }},
            columns: [
                { data: 'id', name: 'id', className: 'dt-control' }, // Add class for control
                { data: 'email', name: 'email' },
                { data: 'price_after_offer', name: 'price_after_offer' },
                { data: 'status', name: 'status' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            responsive: true,
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
            dom: '<"top"lfB>rt<"bottom"ip><"clear">',
            buttons: []
        });
    
        $('#status').change(function() {
            $('#table').DataTable().ajax.reload(); // Access DataTable instance directly
        });
        $('#paid_type').change(function() {
            $('#table').DataTable().ajax.reload(); // Access DataTable instance directly
        });
        $('#created_at').change(function() {
            $('#table').DataTable().ajax.reload(); // Access DataTable instance directly
        });

        // Add event listener for opening and closing details
        $('#table tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
    
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });
    
        // Format the child row details
        function format(d) {
            // d.products is an array of product objects
            var products = d.products;

            // Check if products exist and format the HTML
            if (products && products.length > 0) {
                var html = '<table class="col-4 table table-bordered">';
                html += '<thead><tr><th>Product</th><th>Amount</th><th>Price</th></tr></thead><tbody>';

                $.each(products, function(index, product) {
                    html += '<tr>';
                    html += '<td>' + product.title_en + '</td>';
                    html += '<td>' + product.pivot.amount + '</td>';
                    html += '<td>' + product.pivot.price + '</td>';
                    html += '</tr>';
                });

                html += '</tbody></table>';
            } else {
                // No products available
                var html = '<p>No products found for this order.</p>';
            }

            return html;
        }
    });
    </script>
    
    <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{ asset('build/assets/plugins/select2/select2.full.min.js') }}"></script>
<link rel="modulepreload" href="{{ asset('build/assets/select2-eb416f6c.js') }}" />
<script type="module" src="{{ asset('build/assets/select2-eb416f6c.js')}}"></script> 
<script src="{{asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('build/table-data.js')}}"></script>


  @endsection
