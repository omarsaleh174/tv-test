<div class="sticky">
	<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
		<div class="app-sidebar">
			<div class="side-header">
				<a class="header-brand1" href="{{route('promo-codes.index')}}">
					<img src="{{asset('images/settings/' . getSettingValue('logo'))}}" width="100" height="40" class="header-brand-img desktop-logo" alt="logo">
					<img src="{{asset('images/settings/' . getSettingValue('logo'))}}" width="100" height="40" class="header-brand-img toggle-logo" alt="logo">
					<img src="{{asset('images/settings/' . getSettingValue('logo'))}}" width="100" height="40" class="header-brand-img light-logo" alt="logo">
					<img src="{{asset('images/settings/' . getSettingValue('logo'))}}" width="100" height="40" class="header-brand-img light-logo1" alt="logo">
				</a>
			</div>
			<div class="main-sidemenu">
				<div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
					<path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" /></svg></div>
				<ul class="side-menu">
					@canany(['admin','view consultants section', 'view all consultants'  , 'view all departments',])
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
								<i class="side-menu__icon fe fe-cpu"></i>
								<span class="side-menu__label">{{ trans('cruds.consultants') }}</span><i class="angle fe fe-chevron-right"></i>
							</a>
							<ul class="slide-menu">
								<li class="panel sidetab-menu">
									<div class="tab-menu-heading p-0 pb-2 border-0">
										<div class="tabs-menu ">
											<ul class="nav panel-tabs">
												<li><a href="#side9" class="d-flex " data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
													<li><a href="#side10" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
											</ul>
										</div>
									</div>
									<div class="panel-body tabs-menu-body p-0 border-0">
										<div class="tab-content">
											<div class="tab-pane"  id="side9">
												<ul class="sidemenu-list">
													<li class="side-menu-label1"><a href="javascript:void(0);">{{ trans('cruds.consultants') }}</a></li>
													@canany(['admin','view all consultants',]) <li><a href="{{route("consultants.index")}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['consultants.index', 'consultants.edit', 'consultants.show']) ? '' : '' }} "> {{ trans('cruds.consultants') }}</a></li> @endcanany
													@canany(['admin','view all departments',]) <li><a href="{{route("departments.index")}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['departments.index', 'departments.edit', 'departments.show']) ? '' : '' }} "> {{ trans('cruds.departments') }}</a></li> @endcanany
													@canany(['admin','view all consultations',]) <li><a href="{{route("consultations.index")}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['consultations.index', 'consultations.edit', 'consultations.show']) ? '' : '' }} "> {{ trans('cruds.consultations') }}</a></li> @endcanany
													@canany(['admin','view all consultants',]) <li><a href="{{route("vip-consultants.index")}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['vip-consultants.index']) ? '' : '' }} "> {{ trans('cruds.vip_consultants') }}</a></li> @endcanany
													@canany(['admin','view all articles',]) <li><a href="{{route("articles.index")}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['articles.index', 'articles.edit', 'articles.show']) ? '' : '' }} "> {{ trans('cruds.articles') }}</a></li> @endcanany
													@canany(['admin','view all classifications',]) <li><a href="{{route("classifications.index")}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['classifications.index', 'classifications.edit', 'classifications.show']) ? '' : '' }} "> {{ trans('cruds.classifications') }}</a></li> @endcanany
												</ul>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</li>
					@endcanany

					@canany(['admin','view all countries','view all cities'])
					<li class="slide">
						<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
							<i class="side-menu__icon fe fe-cpu"></i>
							<span class="side-menu__label">{{ trans('cruds.locations') }}</span><i class="angle fe fe-chevron-right"></i>
						</a>
						<ul class="slide-menu">
							<li class="panel sidetab-menu">
								<div class="tab-menu-heading p-0 pb-2 border-0">
									<div class="tabs-menu ">
										<ul class="nav panel-tabs">
											<li><a href="#side9" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
												<li><a href="#side10" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
										</ul>
									</div>
								</div>
								<div class="panel-body tabs-menu-body p-0 border-0">
									<div class="tab-content">
										<div class="tab-pane {{ in_array(Route::currentRouteName(), ['countries.index', 'countries.edit', 'countries.show','countries.old']) ? 'active' : '' }}" id="side9">
											<ul class="sidemenu-list">
												<li class="side-menu-label1"><a href="javascript:void(0);">{{ trans('cruds.countries') }}</a></li>
												@canany(['admin','view all countries',]) <li><a href="{{route("countries.index")}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['countries.index', 'countries.edit', 'countries.show']) ? '' : '' }} "> {{ trans('cruds.countries') }}</a></li> @endcanany
												@canany(['admin','view all cities',]) <li><a href="{{route("cities.index")}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['cities.index', 'cities.edit', 'cities.show']) ? '' : '' }} "> {{ trans('cruds.cities') }}</a></li> @endcanany
											</ul>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</li>
				@endcanany

					
					
					@canany(['admin','view all clients','view all subscriptions'])
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-box"></i><span
								class="side-menu__label">{{trans('cruds.clients')}}</span><i
								class="angle fe fe-chevron-right"></i>
							</a>
							<ul class="slide-menu">
								<li class="panel sidetab-menu">
									<div class="tab-menu-heading p-0 pb-2 border-0">
										<div class="tabs-menu ">
											<ul class="nav panel-tabs">
												<li><a href="#side5" class="d-flex " data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
												<li><a href="#side6" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
											</ul>
										</div>
									</div>
									<div class="panel-body tabs-menu-body p-0 border-0">
										<div class="tab-content">
											<div class="tab-pane"   id="side5">
												<ul class="sidemenu-list">
													<li class="side-menu-label1"><a href="javascript:void(0);">{{trans('cruds.clients')}}</a></li>
													@canany(['admin','view all clients'])<li><a href="{{route('clients.index')}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['clients.index', 'clients.edit', 'clients.show']) ? '' : '' }} "> {{ trans('cruds.clients') }}</a></li>@endcanany
													@canany(['admin','view all subscriptions'])<li><a href="{{route('subscriptions.index')}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['subscriptions.index', 'subscriptions.edit', 'subscriptions.show']) ? '' : '' }} "> {{ trans('cruds.subscriptions') }}</a></li>@endcanany
												</ul>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</li>
					@endcanany


					@canany(['admin', 'view all tenders','view all types'])
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-clipboard"></i><span
								class="side-menu__label">{{trans('cruds.tenders')}}</span><i
								class="angle fe fe-chevron-right"></i></a>
								<ul class="slide-menu">
									<li class="panel sidetab-menu">
										<div class="tab-menu-heading p-0 pb-2 border-0">
											<div class="tabs-menu ">
												<ul class="nav panel-tabs">
													<li><a href="#side42" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
													<li><a href="#side43" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
												</ul>
											</div>
										</div>
										<div class="panel-body tabs-menu-body p-0 border-0">
											<div class="tab-content">
												<div class="tab-pane active" id="side42">
													<ul class="sidemenu-list">
														<li class="side-menu-label1"><a href="javascript:void(0);">{{ trans('cruds.tenders') }}</a></li>
														@canany(['admin','view all tenders'])<li><a href="{{route('tenders.index')}}" class="slide-item"> {{ trans('cruds.tenders') }}</a></li>@endcanany
														@canany(['admin','view all client_tenders'])<li><a href="{{route('client_tenders.index')}}" class="slide-item"> {{ trans('cruds.client_tenders') }}</a></li>@endcanany
														@canany(['admin','view all categories'])<li><a href="{{route('categories.index')}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['categories.index', 'categories.edit', 'categories.show']) ? 'active' : '' }} "> {{ trans('cruds.categories') }}</a></li>@endcanany
														@canany(['admin','view all types'])<li><a href="{{route('types.index')}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['types.index', 'types.edit', 'types.show']) ? 'active' : '' }} "> {{ trans('cruds.types') }}</a></li>@endcanany
													</ul>
												</div>
											</div>
										</div>
									</li>
								</ul>
						</li>
					@endcanany

					@canany(['admin','view all users', 'view all notifications','can change settings', 'view all contact us', 'view all about us', 'view all payment'])
						<li class="slide">
						<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-box"></i><span
							class="side-menu__label">{{trans('cruds.website')}}</span><i
							class="angle fe fe-chevron-right"></i>
						</a>
						<ul class="slide-menu">
							<li class="panel sidetab-menu">
								<div class="tab-menu-heading p-0 pb-2 border-0">
									<div class="tabs-menu ">
										<!-- Tabs -->
										<ul class="nav panel-tabs">
											<li><a href="#side13" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
											<li><a href="#side14" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
										</ul>
									</div>
								</div>
								<div class="panel-body tabs-menu-body p-0 border-0">
									<div class="tab-content">
										<div class="tab-pane {{ in_array(Route::currentRouteName(), ['roles.index', 'roles.edit', 'roles.show' ,'users.index', 'users.edit', 'users.show' ,'index', 'notifications.edit', 'notifications.show' ,'settings.index', 'settings.edit', 'settings.show' ,'profile.index', 'profile.edit', 'profile.show']) ? 'active' : '' }} " id="side13">
											<ul class="sidemenu-list">
												<li class="side-menu-label1"><a href="javascript:void(0);">{{trans('cruds.website')}}</a></li>
												@canany(['admin','view all roles'])<li><a href="{{route('roles.index')}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['roles.index', 'roles.edit', 'roles.show']) ? 'active' : '' }} "> {{ trans('cruds.roles') }}</a></li>@endcanany
												@canany(['admin','view all users'])<li><a href="{{route('users.index')}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['users.index', 'users.edit', 'users.show']) ? 'active' : '' }} "> {{ trans('cruds.users') }}</a></li>@endcanany
												@canany(['admin','can change settings'])<li><a href="{{route('settings.index')}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['settings.index', 'settings.edit', 'settings.show']) ? 'active' : '' }} "> {{ trans('cruds.settings') }}</a></li>@endcanany
												@canany(['admin','can change seo'])<li><a href="{{route('seo.index')}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['seo.index', 'seo.edit', 'seo.show']) ? 'active' : '' }} "> {{ trans('cruds.seo') }}</a></li>@endcanany
												@canany(['admin','view all profile'])<li><a href="{{route('profile.index')}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['profile.index', 'profile.edit', 'profile.show']) ? 'active' : '' }} "> {{ trans('cruds.profile') }}</a></li>@endcanany
												@canany(['admin','view all logs'])<li><a href="{{route('logs.index')}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['logs.index', 'logs.edit', 'logs.show']) ? 'active' : '' }} "> {{ trans('cruds.logs') }}</a></li>@endcanany
												@canany(['admin','can change parts'])<li><a href="{{route('parts.index')}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['parts.index', 'parts.edit', 'parts.show']) ? 'active' : '' }} "> {{ trans('cruds.parts') }}</a></li>@endcanany
												@canany(['admin','can change photos'])<li><a href="{{route('photos.index')}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['photos.index', 'photos.edit', 'photos.show']) ? 'active' : '' }} "> {{ trans('cruds.photos') }}</a></li>@endcanany
												@canany(['admin','view all banners'])<li><a href="{{route('banners.index')}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['banners.index', 'banners.edit', 'banners.show']) ? 'active' : '' }} "> {{ trans('cruds.banners') }}</a></li>@endcanany

												@canany(['admin','view all reports'])<li><a href="{{route('reports.index')}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['reports.index']) ? 'active' : '' }} "> {{ trans('cruds.reports') }}</a></li>@endcanany
												@canany(['admin','view all reports'])<li><a href="{{route('tender-reports')}}" class="slide-item  {{ in_array(Route::currentRouteName(), ['tender-reports']) ? 'active' : '' }} "> {{ trans('cruds.reports_tender') }}</a></li>@endcanany
											</ul>
										</div>
									</div>
								</div>
							</li>
						</ul>
						</li>
					@endcanany
				</ul>
				<div class="slide-right" id="slide-right">
					<svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
						<path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
					</svg>
				</div>
			</div>
	</div>
</div>
