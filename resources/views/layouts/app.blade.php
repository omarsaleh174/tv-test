
        @include('includes.header')
        @include('includes.sidebar')
    <div class="content-wrapper">
        @if(session()->has('message') )
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{session('message')}}
            </div>
        @endif

          @yield('content')

        </div>
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(5000, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 2000);
</script>
    @include('includes.footer')

