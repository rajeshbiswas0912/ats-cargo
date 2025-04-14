<x-guest-layout>
  <div class="container">
    <div class="login-wrap">
      <div class="login-content">
        <div class="login-logo">
          <a href="#">
            <img src="images/icon/logo.png" alt="CoolAdmin">
          </a>
        </div>
        <div class="login-form">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <label>Username</label>
              <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
            </div>
            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>
