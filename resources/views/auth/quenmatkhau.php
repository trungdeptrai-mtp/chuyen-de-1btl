<x-guest-layout>
    <div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md">

        <div class="mb-6 text-center">
            <h2 class="text-xl font-semibold text-gray-800">
                🔑 Quên mật khẩu
            </h2>
            <p class="mt-2 text-sm text-gray-600 leading-relaxed">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input
                    id="email"
                    class="block mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 transition"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    placeholder="Nhập email của bạn..."
                />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="px-6 py-2 rounded-lg shadow hover:shadow-md transition">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</x-guest-layout>