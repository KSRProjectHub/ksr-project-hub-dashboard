<form action="{{ route('admin.updatePerm', $userRIds->id)}}" class="p-3" method="POST"  enctype="multipart/form-data">
    {{ csrf_field() }}
     
    <div class="modal fade text-left" id="ModalEdit{{$userRIds->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ms-2">{{ __('Update ') }}{{$userRIds->fname }}'s {{ __('User Permissions') }}</h4>
                    <button type="button" class="btn-close me-2" data-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row p-2">
                            <div class="col-6 mb-2">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="floatingText" value="{{$userRIds->userType}}" name="userType" disabled>
                                    <label for="floatingInput">{{ __('User Role') }}</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingText" value="{{$userRIds->full_name}}" name="user" disabled>
                                    <label for="floatingInput">{{ __('User') }}</label>
                                </div>
                            </div>

                            <div class="col-6 mb-3">

                                <h6 class="mb-4"><strong>Permissions</strong></h6>
                                <div class="form-check-inline">

                                    <input class="form-check-input" type="checkbox" name="add" value="1" id="flexCheckDefault"
                                        {{ $userRIds->add==1 ? 'checked':'' }}>
                                    <label class="form-check-label me-2" for="add">
                                        {{ __('Add') }}
                                    </label>

                                    <input class="form-check-input" type="checkbox" name="update" value="1" id="flexCheckDefault"
                                        {{ $userRIds->update==1 ? 'checked':'' }}>
                                    <label class="form-check-label me-2" for="update">
                                        {{ __('Update') }}
                                    </label>                            

                                    <input class="form-check-input" type="checkbox" name="delete" value="1" id="flexCheckDefault"
                                        {{ $userRIds->delete==1 ? 'checked':'' }}>
                                    <label class="form-check-label me-2" for="delete">
                                        {{ __('Delete') }}
                                    </label>                                                
                                </div>
                            </div> 
                        </div> 
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-warning">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>