<x-guest-layout title="Login">
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

    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <p id="message" class="mt-4 text-center text-sm text-red-500">{{ $error }}</p>
      @endforeach
    @endif

  </div>
</x-guest-layout>
