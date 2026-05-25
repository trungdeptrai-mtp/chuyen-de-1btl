<x-guest-layout>
    <div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md">

        <div class="mb-6 text-center">
            <h2 class="text-xl font-semibold text-gray-800">
                🔒 Xác nhận bảo mật
            </h2>
            <p class="mt-2 text-sm text-gray-600 leading-relaxed">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input
                    id="password"
                    class="block mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 transition"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Nhập mật khẩu của bạn..."
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-6">
                <x-primary-button class="px-6 py-2 rounded-lg shadow hover:shadow-md transition">
                    {{ __('Confirm') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</x-guest-layout>