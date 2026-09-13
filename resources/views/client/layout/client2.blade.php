
        @include('client.includes.header')
          @yield('content')

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(5000, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 2000);
</script>
@include('client.includes.footer')
@yield('js')

