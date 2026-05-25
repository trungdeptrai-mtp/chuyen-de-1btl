<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 px-4">

        <div class="w-full max-w-2xl bg-white/10 backdrop-blur-xl rounded-2xl shadow-2xl p-8 md:p-10 text-center">

            <!-- TITLE -->
            <h2 class="text-2xl font-bold text-white mb-4">
                📩 Xác minh email
            </h2>

            <!-- MESSAGE -->
            <p class="text-sm text-white/80 leading-relaxed mb-6">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </p>

            <!-- STATUS -->
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-sm font-medium text-green-200 bg-green-500/20 px-4 py-2 rounded-lg">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <!-- ACTIONS -->
            <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-6">

                <!-- RESEND -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <x-primary-button class="px-6 py-2 rounded-lg bg-white text-indigo-600 hover:bg-gray-100 transition shadow-md">
                        📤 Gửi lại email xác minh
                    </x-primary-button>
                </form>

                <!-- LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                            class="text-sm text-white/80 hover:text-white underline transition">
                        🚪 Đăng xuất
                    </button>
                </form>

            </div>

            <!-- FOOTER NOTE -->
            <div class="mt-8 text-xs text-white/50">
                Kiểm tra cả hộp thư spam nếu không thấy email
            </div>

        </div>

    </div>
</x-guest-layout>