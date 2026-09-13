<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
        <th>{{trans('cruds.id')}}</th>
        <th>{{trans('cruds.title_en')}}</th>
        <th>{{ trans('cruds.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <td> {{$item->id??''}}</td>
                <td> {{$item->title_en??''}}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">{{ trans('cruds.action') }}</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        </button>
                        <div class="dropdown-menu" role="menu">
                            @canany(['admin', 'view all category'])
                                <a class="dropdown-item" href="{{route('categories.show',$item->id)}}" >{{ trans('cruds.view') }}</a>
                            @endcan

                            @canany(['admin', 'update category'])
                            <a class="dropdown-item" href="{{route('categories.edit',$item->id)}}" >{{ trans('cruds.edit') }}</a>
                            @endcan

                            @canany(['admin', 'delete category'])
                            <form method="POST" action="{{ route('categories.destroy', $item->id) }}"
                                accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" style="margin-left:6px;background: none; color: inherit; border: none; font: inherit; cursor: pointer; outline: inherit;" onclick="return confirm(&quot;Confirm delete?&quot;)">{{ trans('cruds.delete') }}</button>
                            </form>
                            @endcan


                        </div>

                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>{{trans('cruds.id')}}</th>
        <th>{{trans('cruds.title_en')}}</th>
        <th>{{ trans('cruds.action') }}</th>
      </tr>
    </tfoot>
</table>