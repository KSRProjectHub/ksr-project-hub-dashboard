<form action="{{ route('update.topic', $items->id)}}" class="p-3" method="POST"  enctype="multipart/form-data">
    {{ csrf_field() }}
     
    <div class="modal fade text-left" id="ModalEditTopic{{$items->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ms-2">{{ __('Update') }}</h4>
                    <button type="button" class="btn-close me-2" data-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row p-2">
                            <div class="col-6 mb-2">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="floatingText" value="{{$items->topic}}" name="topic">
                                    <label for="floatingInput">{{ __('User Role') }}</label>
                                </div>

                            </div>

                        </div> 
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-warning">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>