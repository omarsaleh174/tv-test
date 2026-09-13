<div class="modal fade" id="modal-language">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Language </h3>
                </div>
				<div class="modal-body">
					<ul class="row p-3">
						<li class="col-lg-6 mb-2">
							<a href="{{ \LaravelLocalization::getLocalizedURL('en')}}"   class="btn btn-country btn-lg btn-block active">
								<span class="country-selector"><img alt="" src="{{asset('build/assets/images/flags/2.jpg')}}"class="me-3 language"></span>English
							</a>
						</li>
	
						<li class="col-lg-6 mb-2">
							<a href="{{ \LaravelLocalization::getLocalizedURL('ar')}}"   class="btn btn-country btn-lg btn-block">
								<span class="country-selector"><img alt=""src="{{asset('build/assets/images/flags/1.jpg')}}"class="me-3 language"></span>Ø§Ù„Ù„ÙØ© Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©
							</a>
						</li>
	
					</ul>
				</div>
        </div>
      </div>
    </div>
   </div>
  </div>

