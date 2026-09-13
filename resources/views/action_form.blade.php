{{-- 'show','edit','delete','suspend' --}}

    @if(in_array('show',$actions))
        @canany(['admin', "view all $permission"])
            <a id="bEdit" href="{{route("$route.show",$item->id)}}"  class="btn btn-sm btn-primary" ><span class="fe fe-eye"> </span></a>
        @endcanany
    @endif
    
    @if(in_array('edit',$actions))
        @canany(['admin', "update $permission"])
                <a id="bDel" href="{{route("$route.edit",$item->id)}}" class="btn  btn-sm btn-success" ><span class="fe fe-edit"> </span></a>
        @endcanany    
    @endif


@isset($item->active )
@if(in_array('suspend',$actions))
    @canany(['admin', "suspend $permission"])
        <a id="bAcep" href="{{route("$route.suspend",$item->id)}}"  class="btn  btn-sm btn-{{ $item->active==1? 'danger':'primary'}}" ><span class="fe {{ $item->active==1? 'fe-circle':'fe-check'}}"> </span></a>
    @endcanany 
    @endif
@endisset
@if(in_array('approved',$actions))
    @if ($item->approved_by==null)
        <a id="bAcep" href="javascript:void(0)" class="btn btn-sm btn-info" data-tender-id="{{ $item->id }}" data-toggle="modal" data-target="#approvalModal"><span class="fe fe-circle"></span></a>
    @else
    <a   href="javascript:void(0)" class="btn btn-sm btn-dark"    ><span class="fe fe-check"></span></a>
    @endif
    @endif

@if(in_array('delete',$actions))
@canany(['admin', "delete $permission"])
    <form method="POST" action="{{ route("$route.destroy", $item->id) }}"
        accept-charset="UTF-8" style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit"  onclick="return confirm(&quot;Confirm delete?&quot;)"  class="btn  btn-sm btn-danger">   <span class="fe fe-trash"> </span>  </button>
    </form>
@endcanany
@endif


