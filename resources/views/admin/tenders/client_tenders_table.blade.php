
<div class="col-4">
</div>
  <div class="card-body">
    <div class="row">
        <div class="col-md-12 col-xl-4">
            <div class="form-group">
              <label class="col-sm-12 col-form-label">{{ trans('cruds.client') }} <span class="text-red">*</span></label>
                <div class="col-sm-12">
                    <select class="form-control form-select select2" id="client_id" name="client_id" data-bs-placeholder="Select">
                        <option value="" selected> {{ trans('cruds.client') }}</option>
                        @foreach(App\Entities\Admin\Client::all() as $client)
                            <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->email }}</option>
                        @endforeach

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
        <div class="col-md-12 col-xl-4">
            <div class="form-group">
              <label class="col-sm-12 col-form-label">{{ trans('cruds.status') }} <span class="text-red">*</span></label>
                <div class="col-sm-12">
                    <select class="form-control form-select select2" id="status" name="status" data-bs-placeholder="Select">
                            <option value="0">الكل</option>
                              <option value="1">لم ترسل بعد</option>
                            <option value="2">تم إرسالها</option>
                  </select>
                </div>
            </div>
        </div>
    </div>
  </div>

<table id="table" class="table table-bordered table-striped example1" width="100%">
  <thead>
      <tr>
          <th>{{trans('cruds.id')}}</th>
          <th>{{trans('cruds.tender_code')}}</th>
          <th>{{trans('cruds.title')}}</th>
          <th>{{ trans('cruds.action') }}</th>
      </tr>
    </thead>
    <tbody>
     </tbody>
    <tfoot>
      <tr>
          <th>{{trans('cruds.id')}}</th>
          <th>{{trans('cruds.tender_code')}}</th>
          <th>{{trans('cruds.title')}}</th>
          <th>{{ trans('cruds.action') }}</th>
      </tr>
    </tfoot>
  </table>
@section('js')
<script>
  $(function() {
      $('#table').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url: '{{ route("client_tenders.index") }}',
            data: function (d) {
                d.client_id  = $('#client_id').val();
                d.status  = $('#status').val();
                d.created_at  = $('#created_at').val();
                d.category_id = $('#category_id').val();
                d.type = $('#type').val();
                d.search = $('input[type="search"]').val();
            }},
            columns: [
              { data: 'id', name: 'id' },
              { data: 'tender_code', name: 'tender_code' },
              { data: 'title', name: 'title' },
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

      }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');

      $('#client_id').change(function() {
            $('#table').DataTable().ajax.reload();
        });
      $('#status').change(function() {
            $('#table').DataTable().ajax.reload();
        });
      $('#category_id').change(function() {
            $('#table').DataTable().ajax.reload();
        });
        $('#type').change(function() {
            $('#table').DataTable().ajax.reload();
        });
        $('#created_at').change(function() {
            $('#table').DataTable().ajax.reload();
        });

    // Open Modal on "approve" button click
    $(document).on('click', '#bAcep', function() {
        var tender_id = $(this).data('tender-id');  // Get the tender ID from the button data
        $('#tender_id').val(tender_id);  // Set the tender ID to the hidden input field
        $('#approvalModal').modal('show');  // Show the modal
    });

    // Submit the approval form
    $('#approvalForm').submit(function(e) {
        e.preventDefault();

        var tender_id = $('#tender_id').val();
        var approval_date = $('#approval_date').val();

        $.ajax({
            url: '{{ route("client_tenders.approve") }}',  // Define the route to handle the approval
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                tender_id: tender_id,
                approval_date: approval_date
            },
            success: function(response) {
              
              if(response.success) {
                    alert(response.message);  // Show success message
                $('#table').DataTable().ajax.reload();
                    $('#approvalModal').modal('hide');  // Close the modal
                    table.ajax.reload();  // Reload the DataTable to reflect changes
                } else {
                    alert(response.message);  // Show error message
                }
            }
        });
    });
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





 <!-- Approval Modal -->
<div class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="approvalModalLabel">{{ trans('cruds.approve_tender') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form id="approvalForm">
                  <input type="hidden" name="tender_id" id="tender_id">
                  <div class="form-group">
                      <label for="approval_date">{{ trans('cruds.approval_date') }}</label>
                      <input type="datetime-local" class="form-control" id="approval_date" value="{{ $publicationDate }}" name="approval_date" required>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary">{{ trans('cruds.submit') }}</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
  
@endsection




