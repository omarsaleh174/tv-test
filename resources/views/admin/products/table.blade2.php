<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
        <th>{{trans('cruds.id')}}</th>
        <th>{{trans('cruds.title_en')}}</th>
        <th>{{trans('cruds.title_ar')}}</th>
        <th>{{trans('cruds.category')}}</th>
        <th>{{trans('cruds.unit')}}</th>
        <th>{{trans('cruds.price')}}</th>
        <th>{{trans('cruds.real_price')}}</th>
        <th>{{trans('cruds.photo')}}</th>
        <th>{{trans('cruds.suspend')}}</th>
        <th>{{ trans('cruds.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $item)
        <tr>
            <td> {{$item->id??''}}</td>
            <td> {{$item->title_en??''}}</td>
            <td> {{$item->title_ar??''}}</td>
            <td> {{$item->price??''}}</td>
            <td> {{$item->real_price??''}}</td>
            <td> {{$item->category->title_en??''}}</td>
            <td> {{$item->unit->title_en??''}}</td>
            <td> <img src="{{ asset($item->photo) }}" width="50" height="50"></td>
          <td class="center">
                @if($item->active==1)
                <svg style="color:blue" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16"><path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/></svg>
                  @else
                  <svg style="color:red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/></svg>
                @endif
                </td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default">{{ trans('cruds.action') }}</button>
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"></button>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="{{route('products.show',$item->id)}}" >    {{ trans('cruds.view') }}</a>
                        <a class="dropdown-item" href="{{route('products.edit',$item->id)}}" >    {{ trans('cruds.edit') }}</a>
                        <a class="dropdown-item" href="{{route('products.suspend',$item->id)}}" > {{ $item->active==1?trans('cruds.suspend'):trans('cruds.unsuspend') }}</a>
                        <form method="POST" action="{{ route('products.destroy', $item->id) }}"
                            accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" style="margin-left:6px;background: none; color: inherit; border: none; font: inherit; cursor: pointer; outline: inherit;" onclick="return confirm(&quot;Confirm delete?&quot;)">{{ trans('cruds.delete') }}</button>
                        </form>
                    </div>
                  </div>

            </td>
        </tr>
      @endforeach
     </tbody>
    <tfoot>
    <tr>
      <th>{{trans('cruds.id')}}</th>
      <th>{{trans('cruds.title_en')}}</th>
      <th>{{trans('cruds.title_ar')}}</th>
      <th>{{trans('cruds.category')}}</th>
      <th>{{trans('cruds.price')}}</th>
      <th>{{trans('cruds.real_price')}}</th>
      <th>{{trans('cruds.photo')}}</th>
      <th>{{trans('cruds.suspend')}}</th>
      <th>{{ trans('cruds.action') }}</th>
    </tr>
    </tfoot>
  </table>
