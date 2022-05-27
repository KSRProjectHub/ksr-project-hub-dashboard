<form action="{{ route('update.userTypes', $item->id)}}" class="p-3" method="POST"  enctype="multipart/form-data">
    {{ method_field('patch') }}
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
                        <div class="form-group">
                            <strong>{{ __('Job Role') }}:</strong>
                            <input type="text" class="form-control" id="updateUserType" value="{{$item->userType}}" name="userType">
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <button type="submit" class="btn btn-warning">{{ __('Edit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>