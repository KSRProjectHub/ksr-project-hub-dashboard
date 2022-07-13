<form action="{{ route('update.userTypes', $item->id)}}" class="p-3" method="POST"  enctype="multipart/form-data">
    {{ method_field('put') }}
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEdit{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ms-2">{{ __('Edit Job Role') }}</h4>
                    <button type="button" class="btn-close me-2" data-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-8 col-sm-8 col-md-8 mb-3 justify-content-center">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingText" value="{{$item->userType}}" name="userType">
                            <label for="floatingInput">{{ __('Job Role') }}</label>
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <button type="submit" class="btn btn-warning">{{ __('Save') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>