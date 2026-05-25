<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 px-4">

        <div class="w-full max-w-3xl bg-white/10 backdrop-blur-xl rounded-2xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

            <!-- LEFT -->
            <div class="hidden md:flex flex-col justify-center p-10 text-white">
                <h1 class="text-3xl font-bold mb-4">🔐 Reset Password</h1>
                <p class="text-sm text-white/80 leading-relaxed">
                    Nhập mật khẩu mới để khôi phục quyền truy cập tài khoản của bạn một cách an toàn.
                </p>
            </div>

            <!-- RIGHT -->
            <div class="bg-white p-8 md:p-10">

                <div class="mb-6 text-center">
                    <h2 class="text-2xl font-bold text-gray-800">Đặt lại mật khẩu</h2>
                    <p class="text-sm text-gray-500">Nhập thông tin bên dưới</p>
                </div>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input
                            id="email"
                            class="block mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="email"
                            name="email"
                            :value="old('email', $request->email)"
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
                            autocomplete="new-password"
                            placeholder="Mật khẩu mới"
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
                            placeholder="Nhập lại mật khẩu"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Button -->
                    <div class="mt-6">
                        <x-primary-button class="w-full justify-center py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 shadow-lg transition">
                            🔄 Reset Password
                        </x-primary-button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-guest-layout>