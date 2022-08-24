@extends("enduser.layout")
@section("front_content")
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
              <div class="card">
                  <div class="card-header">Reset Password</div>
                  <div class="card-body">
  
                    @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
  
                      <form action="{{ route("forgotpass.get") }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 ">E-Mail Address</label>
                              <div class="col-md-6 ipmail">
                                  <div class="input relative"> 
                                      <input placeholder="Email" id="e-address" name="email" type="text" maxlength="32" />
                                  </div>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="sendmail">
                              <button type="submit" class="btn btn-primary">
                                  Send Mail Password Reset
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
      </div>
  </div>
</main>
@endsection