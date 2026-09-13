<div class="app-header header sticky">
	<div class="container-fluid main-container">
		<div class="d-flex align-items-center">
			<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0);"></a>
			<!-- sidebar-toggle-->
			<a class="logo-horizontal " href="{{ route('promo-codes.index') }}">
				<img src="{{asset('images/settings/' . getSettingValue('logo'))}}" class="header-brand-img desktop-logo"width="50" height="50" alt="logo">
				<img src="{{asset('images/settings/' . getSettingValue('logo'))}}" class="header-brand-img light-logo1" width="50" height="50"  alt="logo">
			</a>
		
			<div class="d-flex order-lg-2 ms-auto header-right-icons">
				<button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon fe fe-more-vertical"></span>
				</button>
				<div class="navbar navbar-collapse responsive-navbar p-0">
					<div class="collapse navbar-collapse navbarSupportedContent-4" id="navbarSupportedContent-4">
						<div class="d-flex order-lg-2">
							<div class="dropdown d-flex profile-1">
								<a href="javascript:void(0);" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
									<img src="{{asset('images/settings/' . getSettingValue('logo'))}}" alt="profile-user"
										class="avatar  profile-user brround cover-image">
								</a>
								<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
									<div class="drop-heading">
										<div class="text-center">
											<h5 class="text-dark mb-0 fs-14 fw-semibold">{{ auth()->user()->name }}</h5>
											<small class="text-muted">{{ auth()->user()->email }}</small>
										</div>
									</div>
									<div class="dropdown-divider m-0"></div>
									<a class="dropdown-item" href="{{ route('profile.index') }}">
										<i class="dropdown-icon fe fe-user"></i> {{ __('profile') }}
									</a>
									<div class="main-header-center ms-3 d-none d-lg-block">
										<div class="swichermainleft">
											<div class="skin-body">
												<div class="switch_section">
													<div class="switch-toggle d-flex">
														<span style="margin-right: 10px;margin-left: 10px;">{{ __('ltr') }}</span>
														<p class="onoffswitch2">
															<input type="radio" name="onoffswitch7" id="myonoffswitch23" class="onoffswitch2-checkbox" checked>
															<label for="myonoffswitch23" class="onoffswitch2-label"></label>
														</p>
													</div>
													<div class="switch-toggle d-flex mt-2" id="rtlOption">
														<span style="margin-right: 10px;margin-left: 10px;">{{ __('rtl') }}</span>
														<p class="onoffswitch2">
															<input type="radio" name="onoffswitch7" id="myonoffswitch24" class="onoffswitch2-checkbox">
															<label for="myonoffswitch24" class="onoffswitch2-label"></label>
														</p>
													</div>
												</div>
											</div>
										</div>
										<div class="swichermainleft">
											<div class="skin-body">
												<div class="switch_section">
													<div class="switch-toggle d-flex">
														<span class="me-auto">{{ __('vertical_menu') }}</span>
														<p class="onoffswitch2">
															<input type="radio" name="onoffswitch15" id="myonoffswitch34" class="onoffswitch2-checkbox" checked>
															<label for="myonoffswitch34" class="onoffswitch2-label"></label>
														</p>
													</div>
													<div class="switch-toggle d-flex mt-2">
														<span class="me-auto">{{ __('horizontal') }}</span>
														<p class="onoffswitch2">
															<input type="radio" name="onoffswitch15" id="myonoffswitch35" class="onoffswitch2-checkbox">
															<label for="myonoffswitch35" class="onoffswitch2-label"></label>
														</p>
													</div>
													<div class="switch-toggle d-flex mt-2">
														<span class="me-auto">{{ __('hover') }}</span>
														<p class="onoffswitch2">
															<input type="radio" name="onoffswitch15" id="myonoffswitch111" class="onoffswitch2-checkbox">
															<label for="myonoffswitch111" class="onoffswitch2-label"></label>
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<form method="POST" action="{{ route('logout') }}" accept-charset="UTF-8" id="form1">
										{{ method_field('POST') }} {{ csrf_field() }}
										<a class="dropdown-item" href="#" onclick="document.getElementById('form1').submit();">
											<i class="dropdown-icon fe fe-alert-circle"></i> {{ __('sign out') }}
										</a>
									</form>
								</div>
								
							</div>
							<div class="d-flex">
								<a class="nav-link icon theme-layout nav-link-bg layout-setting">
									<span class="dark-layout"><i class="fe fe-moon"></i></span>
									<span class="light-layout"><i class="fe fe-sun"></i></span>
								</a>
							</div>
							<!-- Cart -->
							<div class="dropdown  d-flex shopping-cart">
								@if(app()->getLocale()=="en")
								<a class=" icon text-center" href="{{ \LaravelLocalization::getLocalizedURL('ar')}}" >
									<img src="{{asset('build/assets/images/flags/1.jpg')}}" width="30" alt="ar_flag">
								</a>
								@else
								<a class=" icon text-center" href="{{ \LaravelLocalization::getLocalizedURL('en')}}" >
									<img src="{{asset('build/assets/images/flags/2.jpg')}}" width="30" alt="en_flag">
								</a>
								@endif
								<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
									<div class="drop-heading border-bottom">
										<div class="d-flex">
											<h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">Language</h6>
											<div class="ms-auto">
											</div>
										</div>
									</div>
										<div class="dropdown-item  p-4">
											<div class="">
												<ul class="row p-3">
													<li class="col-lg-6 mb-2">
														<a href="{{ \LaravelLocalization::getLocalizedURL('en')}}"   class="btn btn-country btn-lg btn-block active">
															<span class="country-selector"><img alt="" src="{{asset('build/assets/images/flags/2.jpg')}}"class="me-3 language"></span>English
														</a>
													</li>
								
													<li class="col-lg-6 mb-2">
														<a href="{{ \LaravelLocalization::getLocalizedURL('ar')}}"   class="btn btn-country btn-lg btn-block">
															<span class="country-selector"><img alt=""src="{{asset('build/assets/images/flags/1.jpg')}}"class="me-3 language"></span> Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©
														</a>
													</li>
								
												</ul>
											</div>
										</div>
									<div class="dropdown-divider m-0"></div>
								</div>
							</div>
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
