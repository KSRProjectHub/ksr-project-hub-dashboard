<form action="{{ route('admin.addnewpermissions') }}" method="POST">
    @csrf
    <div class="modal fade text-left" id="ModalAdd" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ms-2">{{ __('Add User Permission') }}</h4>
                    <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                                    
                            <!-- Add job role  -->
                            <div class="form-floating mb-3">
                                <select type="select" class="form-select @error('jobRole') is-invalid @enderror" id="role" aria-label="Floating label select example" name="role_id" value="" required autocomplete="role" autofocus>
                                    <option  value="0"  disabled selected>Select Role</option>
                                    @foreach ($data as $roles)
                                        <option value="{{ $roles->id }}">{{ $roles->userType }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">{{ __('Role') }}</label>
                                @error('jobRole')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                        

                            <!-- Get User by job role  -->
                            <div class="form-floating mb-3">
                                <select type="select" class="form-select @error('user') is-invalid @enderror" id="user" aria-label="Floating label select example" name="user_id" value="" required autocomplete="user" autofocus>
                
                                </select>
                                <label for="floatingSelect">{{ __('User') }}</label>
                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                        
                            </div>
                            <script>
                                        $(document).ready(function () {
                                        $('#role').on('change', function () {
                                        let id = $(this).val();
                                        $('#user').empty();
                                        $('#user').append(`<option value="0" disabled selected>Processing...</option>`);
                                        $.ajax({
                                        type: 'GET',
                                        url: 'users/getUsersByUserRoles/' + id,
                                        success: function (response) {
                                        var response = JSON.parse(response);
                                        console.log(response);   
                                        $('#user').empty();
                                        $('#user').append(`<option value="0" disabled selected>Select User</option>`);
                                        response.forEach(element => {
                                            $('#user').append(`<option value="${element['id']}">${element['fname']} ${element['lname']}</option>`);
                                            });
                                        }
                                    });
                                });
                            });
                            </script>
                        </div>  

                        <div class="col-6 mb-3">

                            <h6 class="mb-4"><strong>User Permissions</strong></h6>
                            <div class="form-check ms-3">
                                <div class="col-6">
                                    <input class="form-check-input" type="checkbox" name="add" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="add">
                                        {{ __('Add') }}
                                    </label>
                                </div>

                                <div class="col-6">
                                    <input class="form-check-input" type="checkbox" name="update" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="update">
                                        {{ __('Update') }}
                                    </label>                            
                                </div>

                                <div class="col-6">
                                    <input class="form-check-input" type="checkbox" name="delete" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="delete">
                                        {{ __('Delete') }}
                                    </label>                            
                                </div>                    

                            </div>
                        </div>                
                                
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary float-left uppercase">
                        {{ __('Save') }}
                    </button>
                    <button type="reset" class="btn btn-primary float-left">
                        {{ __('Reset') }}
                    </button>
                </div>
            </div>
        </div>            
    </div>
</form>

