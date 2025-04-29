<x-guest-layout title="Login">
  {{-- <div class="container">
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
  </div> --}}

  <!-- Logo above the login box -->
  <div class="mb-6">
    <img src="images/logo.png" alt="Logo" style="max-height: 60px;" />
  </div>

  <!-- Login Box -->
  <div class="w-full max-w-md p-8 rounded-2xl shadow-2xl backdrop">
    <div class="text-center mb-6">
      <h2 class="text-2xl font-bold text-black">Admin Login</h2>
    </div>

    <form id="loginForm" class="space-y-5" method="POST" action="{{ route('login') }}">
      @csrf
      <div>
        <label class="block mb-1 text-sm text-black">Username</label>
        <div class="relative">
          <input type="text" id="username"
            class="w-full px-4 py-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
            placeholder="Enter username" name="username" required />
          <i class="fas fa-user absolute right-3 top-3 text-gray-500"></i>
        </div>
      </div>
      <div>
        <label class="block mb-1 text-sm text-black">Password</label>
        <div class="relative">
          <input type="password" id="password"
            class="w-full px-4 py-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
            placeholder="Enter password" name="password" required />
          <i class="fas fa-lock absolute right-3 top-3 text-gray-500"></i>
        </div>
      </div>
      <button type="submit" class="w-full bg-blue-600 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
        <i class="fas fa-sign-in-alt mr-2"></i> Login
      </button>
    </form>

    @if (session('error'))
      <p id="message" class="mt-4 text-center text-sm text-red-300 hidden">{{ session('error') }}</p>
    @endif
  </div>
</x-guest-layout>
