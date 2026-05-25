<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 px-4">

        <div class="w-full max-w-4xl bg-white/10 backdrop-blur-xl rounded-2xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

            <!-- LEFT -->
            <div class="hidden md:flex flex-col justify-center p-10 text-white">
                <h1 class="text-3xl font-bold mb-4">🧠 Create Account</h1>
                <p class="text-sm text-white/80 leading-relaxed">
                    Tạo tài khoản để truy cập hệ thống quản lý hiện đại, bảo mật cao và tối ưu trải nghiệm người dùng.
                </p>
                <div class="mt-6 text-xs text-white/60">
                    Join us & start managing smarter 🚀
                </div>
            </div>

            <!-- RIGHT -->
            <div class="bg-white p-8 md:p-10">

                <div class="mb-6 text-center">
                    <h2 class="text-2xl font-bold text-gray-800">Đăng ký</h2>
                    <p class="text-sm text-gray-500">Tạo tài khoản mới</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input
                            id="name"
                            class="block mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Nhập họ tên..."
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input
                            id="email"
                            class="block mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
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
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input
                            id="password_confirmation"
                            class="block mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between mt-6">

                        <a class="text-sm text-indigo-600 hover:text-indigo-800 transition"
                           href="{{ route('login') }}">
                            ← Đã có tài khoản?
                        </a>

                        <x-primary-button class="px-6 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 shadow-md transition">
                            🚀 Register
                        </x-primary-button>

                    </div>

                </form>
            </div>

        </div>
    </div>
</x-guest-layout>