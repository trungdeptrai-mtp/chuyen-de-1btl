<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 px-4">

        <div class="w-full max-w-4xl bg-white/10 backdrop-blur-xl rounded-2xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

            <!-- LEFT -->
            <div class="hidden md:flex flex-col justify-center p-10 text-white">
                <h1 class="text-3xl font-bold mb-4">🔐 Welcome Back</h1>
                <p class="text-sm text-white/80 leading-relaxed">
                    Đăng nhập để tiếp tục sử dụng hệ thống quản lý hiện đại, nhanh và bảo mật.
                </p>
            </div>

            <!-- RIGHT -->
            <div class="bg-white p-8 md:p-10">

                <div class="mb-6 text-center">
                    <h2 class="text-2xl font-bold text-gray-800">Đăng nhập</h2>
                    <p class="text-sm text-gray-500">Nhập thông tin tài khoản</p>
                </div>

                <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input
                            id="email"
                            class="block mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="you@example.com"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input
                            id="password"
                            class="block mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember + Forgot -->
                    <div class="flex items-center justify-between mt-4">

                        <label class="flex items-center">
                            <input id="remember_me" type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                   name="remember">
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-600 hover:text-indigo-800 transition"
                               href="{{ route('password.request') }}">
                                Quên mật khẩu?
                            </a>
                        @endif

                    </div>

                    <!-- Button -->
                    <div class="mt-6">
                        <x-primary-button class="w-full justify-center py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 shadow-lg transition">
                            Đăng nhập
                        </x-primary-button>
                    </div>

                    <!-- Register -->
                    <div class="mt-6 text-center text-sm text-gray-600">
                        Chưa có tài khoản?
                        <a href="{{ route('register') }}"
                           class="text-indigo-600 hover:text-indigo-800 font-medium">
                            Đăng ký ngay
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-guest-layout>