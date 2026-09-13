<div class="col-sm-12">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-danger ">{{$error}}</div>
        @endforeach
    @endif
</div>
