<div class="row">

    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
        <div class="card col-md-12">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card-body">

                    @include('pages.user.common')

                    <div class="row">
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-sm-3">
                            <div class="form-group row">
                                <label for="tag"
                                       class="col-md-3 col-form-label">{{ __('common.name')}}</label>
                                <div class="col-md-4 d-flex justify-content-center">
                                    <label for="tag"
                                           class="col-md-3 col-form-label font-weight-bold">{{ $user->name}}</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group row">
                                <label for="tag"
                                       class="col-md-3 col-form-label">{{ __('common.email')}}</label>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <label for="tag"
                                           class="col-md-3 col-form-label font-weight-bold">{{ $user->email}}</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group row">
                                <label for="tag"
                                       class="col-md-3 col-form-label">{{ __('common.registered_at')}}</label>
                                <div class="col-md-3 d-flex justify-content-center">
                                    <label for="tag"
                                           class="col-md-3 col-form-label font-weight-bold">{{ $user->created_at}}</label>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group row">
                                <label for="tag"
                                       class="col-md-9 col-form-label">{{ __('common.mobile')}}</label>
                                <div class="col-md-3 d-flex justify-content-center">
                                    <label for="tag"
                                           class="col-md-3 col-form-label font-weight-bold">{{ $user->mobile}}</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>


    <img width="75px" height="75px" id='loaderImage' src="{{asset('assets/images/ajax-loader.gif')}}"
         style="display: none; margin: 0 auto; position: fixed; top:50%; left: 50%;"/>
</div>