<x-guest-layout>
    <h2 class="text-lg font-semibold text-white mb-2">{{ __('Forgot Password') }}</h2>
    <p class="text-sm mb-6" style="color: #8b9bb4;">
        {{ __('Enter your email and we\'ll send you a reset link.') }}
    </p>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium mb-1" style="color: #c9d1e0;">
                {{ __('Email') }}
            </label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   required autofocus
                   placeholder="you@example.com"
                   class="w-full px-4 py-3 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-purple-500"
                   style="background-color: #0f1117; border: 1px solid #2d2f3e;" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <button type="submit"
                class="w-full py-3 rounded-xl text-white font-semibold text-sm transition hover:opacity-90"
                style="background: linear-gradient(135deg, #6c63ff, #8b5cf6);">
            {{ __('Send Reset Link') }}
        </button>

        <div class="text-center">
            <a href="{{ route('login') }}" class="text-sm hover:underline" style="color: #6c63ff;">
                ← {{ __('Back to login') }}
            </a>
        </div>
    </form>
</x-guest-layout>