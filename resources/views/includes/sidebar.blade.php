<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('images/settings/' . getSettingValue('logo'))}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name ?? '' }}</a>
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append"><button class="btn btn-sidebar"><i class="fas fa-search fa-fw"></i></button></div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @canany(['admin','view all clients','can chat','view all cities'])
                <li class="nav-item menu{{ in_array(Route::currentRouteName(),  ['clients.index', 'clients.edit', 'clients.show','index', 'chats.edit', 'chats.show' , 'cities.index','cities.edit','cities.show']) ? '-open' : '' }}">
                    <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['clients.index','clients.edit','clients.show' , 'cities.index','cities.edit','cities.show' ]) ? 'active': '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{ trans('cruds.clients') }} <i class="right fas fa-angle-left"></i></p>
                    </a>
                    @canany(['admin','view all clients'])
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('clients.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['clients.index', 'clients.edit', 'clients.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.clients') }}</p>
                            </a>
                        </li>
                    </ul>
                    @endcanany
                    @canany(['admin','view all cities'])
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cities.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['cities.index', 'cities.edit', 'cities.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.cities') }}</p>
                            </a>
                        </li>
                    </ul>
                    @endcanany
                        @canany(['admin','can chat'])
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('chats.index') }}"class="nav-link {{ in_array(Route::currentRouteName(), ['chats.index', 'chats.edit', 'chats.show']) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ trans('cruds.chats') }}</p>
                                </a>
                            </li>
                        </ul>
                    @endcanany
                </li>
                @endcanany
                @canany(['admin','view all coupons'])
                <li class="nav-item menu{{ in_array(Route::currentRouteName(), ['coupons.index', 'coupons.edit', 'coupons.show']) ? '-open' : '' }}">
                    <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['coupons.index', 'coupons.edit', 'coupons.show']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> {{ trans('cruds.coupons') }} <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('coupons.index') }}"
                            class="nav-link {{ in_array(Route::currentRouteName(), ['coupons.index', 'coupons.edit', 'coupons.show']) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ trans('cruds.coupons') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcanany
            @canany(['admin','view all categories', 'view all products', 'view all units', 'view all brands', 'view all manufactures', 'view all countries', 'view all types'])
                <li class="nav-item menu{{ in_array(Route::currentRouteName(), [ 
                        'products.index', 'products.edit', 'products.show',
                         'categories.index', 'categories.edit', 'categories.show',
                         'units.index', 'units.edit', 'units.show',
                         'manufactures.index', 'manufactures.edit', 'manufactures.show',
                         'types.index', 'types.edit', 'types.show',
                         'countries.index', 'countries.edit', 'countries.show',
                         'brands.index', 'brands.edit',
                        'brands.show' ]) ? '-open' : '' }}">
                    <a href="#"
                        class="nav-link
                    {{ in_array(Route::currentRouteName(), [
                     'products.index', 'products.edit', 'products.show',
                     'categories.index', 'categories.edit', 'categories.show',
                     'units.index', 'units.edit', 'units.show',
                     'manufactures.index', 'manufactures.edit', 'manufactures.show',
                     'types.index', 'types.edit', 'types.show',
                     'countries.index', 'countries.edit', 'countries.show',
                     'brands.index', 'brands.edit', 'brands.show','product.lowStock'
                    ])? 'active': '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ trans('cruds.products') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @canany(['admin','view all categories'])
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['categories.index', 'categories.edit', 'categories.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.categories') }}</p>
                            </a>
                        </li>
                        @endcanany
                    </ul>
                    <ul class="nav nav-treeview">
                        @canany(['admin','view all products'])
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['products.index', 'products.edit', 'products.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.products') }}</p>
                            </a>
                        </li>
                        @php
                            $low = App\Entities\Admin\Product::getLowStockProductsCount();
                        @endphp
                        @if($low>0)
                        <li class="nav-item">
                            <a href="{{ route('products.lowStock') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['product.lowStock']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.lowStock') }} \ <p style="background-color: red;color:white;padding-left: 6px;padding-right: 6px">{{$low}}</p></p>
                            </a>
                        </li>
                        @endif
                        @endcanany
                    </ul>
                    <ul class="nav nav-treeview">
                        @canany(['admin','view all units'])
                        <li class="nav-item">
                            <a href="{{ route('units.index') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['units.index', 'units.edit', 'units.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.units') }}</p>
                            </a>
                        </li>
                        @endcanany
                    </ul>
                    <ul class="nav nav-treeview">
                        @canany(['admin','view all brands'])
                        <li class="nav-item">
                            <a href="{{ route('brands.index') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['brands.index', 'brands.edit', 'brands.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.brands') }}</p>
                            </a>
                        </li>
                        @endcanany
                    </ul>
                    <ul class="nav nav-treeview">
                        @canany(['admin','view all manufactures'])
                        <li class="nav-item">
                            <a href="{{ route('manufactures.index') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['manufactures.index', 'manufactures.edit', 'manufactures.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.manufactures') }}</p>
                            </a>
                        </li>
                        @endcanany
                    </ul>
                    <ul class="nav nav-treeview">
                        @canany(['admin','view all countries'])
                        <li class="nav-item">
                            <a href="{{ route('countries.index') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['countries.index', 'countries.edit', 'countries.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.countries') }}</p>
                            </a>
                        </li>
                        @endcanany
                    </ul>
                    <ul class="nav nav-treeview">
                        @canany(['admin','view all types'])
                        <li class="nav-item">
                            <a href="{{ route('types.index') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['types.index', 'types.edit', 'types.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.types') }}</p>
                            </a>
                        </li>
                        @endcanany
                    </ul>
                </li>
                @endcanany
                @canany(['admin','view all orders','view all reports'])

                <li class="nav-item menu{{ in_array(Route::currentRouteName(), ['orders.old','orders.index','orders.edit','orders.show',
                'reports.index','reports.edit','reports.show' ]) ? '-open' : '' }}">
                    <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['orders.old','orders.index','orders.edit','orders.show','reports.index','reports.edit','reports.show',])? 'active': '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ trans('cruds.orders') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @canany(['admin','view all orders'])
                        <li class="nav-item">
                            <a href="{{ route('orders.index') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['orders.index', 'orders.edit', 'orders.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.new_orders') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('orders.old') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['orders.old']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.old_orders') }}</p>
                            </a>
                        </li>
                        @endcanany
                    </ul>

                    {{-- <ul class="nav nav-treeview">
                        @canany(['admin','view all reports'])
                        <li class="nav-item">
                            <a href="{{ route('reports.index') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['reports.index', 'reports.edit', 'reports.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.reports') }}</p>
                            </a>
                        </li>
                        @endcanany
                    </ul> --}}
                </li>
                @endcanany
                
                @canany(['admin','view all users', 'view all notifications','can change settings', 'view all contact us', 'view all about us', 'view all payment'])
                <li class="nav-item menu{{ in_array(Route::currentRouteName(), ['roles.index', 'roles.edit', 'roles.show',
                         'users.index', 'users.edit', 'users.show',
                         'index', 'notifications.edit', 'notifications.show',
                         'settings.index', 'settings.edit', 'settings.show',
                         'contact-us.index', 'contact-us.show',
                         'about-us.index', 'about-us.edit', 'about-us.show',
                         'all-payment']) ? '-open' : '' }}">
                    <a href="#" class="nav-link
                        {{ in_array(Route::currentRouteName(), ['roles.index', 'roles.edit', 'roles.show',
                             'users.index', 'users.edit', 'users.show',
                             'index', 'notifications.edit', 'notifications.show',
                             'settings.index', 'settings.edit', 'settings.show',
                             'contact-us.index', 'contact-us.show',
                             'about-us.index', 'about-us.edit', 'about-us.show',
                             'all-payment']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ trans('cruds.website') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @canany(['admin','view all users'])
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['roles.index', 'roles.edit', 'roles.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.roles') }}</p>
                            </a>
                        </li>
                        @endcanany
                        @canany(['admin','view all users'])
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['users.index', 'users.edit', 'users.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.users') }}</p>
                            </a>
                        </li>
                        @endcanany
                        @canany(['admin','view all users'])
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['notifications.index', 'notifications.edit', 'notifications.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.notifications') }}</p>
                            </a>
                        </li>
                        @endcanany

                        @canany(['admin','view all contact'])
                        {{-- <li class="nav-item">
                            <a href="{{ route('contact-us.index') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['contact-us.index', 'contact-us.edit', 'contact-us.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.contact_us') }}</p>
                            </a>
                        </li> --}}
                        @endcanany

                        @canany(['admin','view all about'])
                        {{-- <li class="nav-item">
                            <a href="{{ route('about-us.index') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['about-us.index', 'about-us.edit', 'about-us.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.about_us') }}</p>
                            </a>
                        </li> --}}
                        @endcanany

                        @canany(['admin','can change settings'])
                        <li class="nav-item">
                            <a href="{{ route('settings.index') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['settings.index', 'settings.edit', 'settings.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('cruds.settings') }}</p>
                            </a>
                        </li>
                        @endcanany
                        @canany(['admin','view all profile'])
                        <li class="nav-item">
                            <a href="{{ route('profile.index') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['profile.index', 'profile.edit', 'profile.show']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> {{ trans('cruds.profile') }}  </p>
                            </a>
                        </li>
                        @endcanany
                    </ul>
                </li>
                @endcanany
            </ul>
        </nav>
    </div>
</aside>

