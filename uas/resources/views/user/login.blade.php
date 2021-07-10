@include('layoutuser.v_head')
@include('layoutuser.v_nav')

<div id="login">
  @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button>
      {{session('pesan')}}
    </div>
  @endif
  <h3 class="text-center text-white pt-5">Login forms</h3>
  <div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
      <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
          <form id="login-form" class="form" action="" method="post">
            <h3 class="text-center text-white">Login</h3>
            <div class="form-group">
              <label for="username" class="text-info">Username:</label><br>
              <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="password" class="text-info">Password:</label><br>
              <input type="text" name="password" id="password" class="form-control">
            </div>
            <br>
            <div class="text-center" >
              <button type="submit" name="button" class="btn btn-info btn-md" style="color:white">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
