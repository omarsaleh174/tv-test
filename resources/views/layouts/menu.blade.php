<li class="nav-item">
    <form method="POST" action="{{ route('logout') }}"  accept-charset="UTF-8" id="form1">
        {{ method_field('POST') }} {{ csrf_field() }}
        <a  class="nav-link" href="#" onclick="document.getElementById('form1').submit();"><i class="fas fa-sign-out-alt"></i> <p>{{trans('cruds.logout')}}</p></a>
    </form>
</li><li class="nav-item">
    <a href="{{ route('categories.index') }}"
       class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
        <p>Categories</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('subCategories.index') }}"
       class="nav-link {{ Request::is('subCategories*') ? 'active' : '' }}">
        <p>Sub Categories</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cities.index') }}"
       class="nav-link {{ Request::is('cities*') ? 'active' : '' }}">
        <p>Cities</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('states.index') }}"
       class="nav-link {{ Request::is('states*') ? 'active' : '' }}">
        <p>States</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('products.index') }}"
       class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
        <p>Products</p>
    </a>
</li>


{{-- <li class="nav-item">
    <a href="{{ route('units.index') }}"
       class="nav-link {{ Request::is('units*') ? 'active' : '' }}">
        <p>Units</p>
    </a>
</li> --}}


<li class="nav-item">
    <a href="{{ route('configs.index') }}"
       class="nav-link {{ Request::is('configs*') ? 'active' : '' }}">
        <p>@lang('models/configs.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('orders.index') }}"
       class="nav-link {{ Request::is('orders*') ? 'active' : '' }}">
        <p>@lang('crud.orders')</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('contacts.index') }}"
       class="nav-link {{ Request::is('contacts*') ? 'active' : '' }}">
        <p>@lang('models/contacts.plural')</p>
    </a>
</li>


