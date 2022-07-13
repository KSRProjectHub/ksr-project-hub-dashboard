@extends('layouts.adminApp')

@section('content')
<h2 class="container mb-3 justify-content-center">Admin Settings</h2>
<div class="container mb-3">
    <div class="row bg-light rounded mb-0">
        <h6 class="p-4 mb-4">Logging Session Details</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">IP Address</th>
                        <th scope="col">Login Time</th>
                        <th scope="col">Logout Time</th>
                        <th scope="col">Device</th>
                        <th scope="col">Browser</th>
                        <th scope="col">Operating System</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userloginsessions as  $key=> $loginsession)
                        <tr>
                            <th scope="row">{{$userloginsessions->firstItem() + $key }}</th>
                            <td>{{ $loginsession->last_login_ip }}</td>
                            <td>{{ $loginsession->created_at }}</td>
                            <td>{{ $loginsession->updated_at }}</td>
                            <td>{{ $loginsession->device }}</td>
                            <td>{{ $loginsession->browser }}</td>
                            <td>{{ $loginsession->operating_system }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row justify-content-between">
                <div class="col-5 justify-content-start">
                    Showing {{ $userloginsessions->firstItem() }} - {{ $userloginsessions->lastItem() }} of {{ $userloginsessions->total() }}
                </div>
                <div class="col-7 justify-content-end">
                    {{ $userloginsessions->onEachSide(1)->links() }}
                </div>
            </div>
        </div>        
    </div>
</div>


<div class="container mb-3">
    
    <div class="row">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Reset Password</h6>
            <form action="{{ route('update.password') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="password" id="old-password" name="oldPassword" class="form-control @error('oldPassword') is-invalid @enderror" placeholder="Old Password">                    

                    <script>
                        $(function() {
                          $('#old-password').password()
                        })
                      </script>
                
                    @error('oldPassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    @error('error')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div>

                <div class="input-group mb-3">
                    <input type="password" id="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror"  data-toggle="password"
                        placeholder="New Password">                    


                    @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" placeholder="Confirm New Password" data-toggle="password">
                        
                    @error('new_password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                            {{ __('Update Password') }}
                        </button>
                    </div>
                    <div class="col">
                        <button type="reset" class="btn btn-primary py-3 w-100 mb-4">
                            {{ __('Reset') }}
                        </button>                        
                    </div>
                </div>
                 
            </form>
        </div>
    </div>  
</div>


@endsection