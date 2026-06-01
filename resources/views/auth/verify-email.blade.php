<x-guest-layout>
    <h2 class="text-lg font-semibold text-white mb-2">{{ __('Verify Your Email') }}</h2>
    <p class="text-sm mb-4" style="color: #8b9bb4;">
        {{ __('Thanks for signing up! Please verify your email address by clicking the link we sent you.') }}
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 p-3 rounded-xl text-sm font-medium text-green-400"
             style="background-color: rgba(74,222,128,0.1);">
            {{ __('A new verification link has been sent to your email.') }}
        </div>
    @endif

    <div class="space-y-3">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit"
                    class="w-full py-3 rounded-xl text-white font-semibold text-sm transition hover:opacity-90"
                    style="background: linear-gradient(135deg, #6c63ff, #8b5cf6);">
                {{ __('Resend Verification Email') }}
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full py-3 rounded-xl text-sm font-medium transition hover:opacity-80"
                    style="color: #8b9bb4; background-color: #0f1117; border: 1px solid #2d2f3e;">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>