<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Tabs -->
    <div class="flex rounded-xl p-1 mb-6" style="background-color: #0f1117;">
        <a href="{{ route('login') }}"
           class="flex-1 text-center py-2 rounded-lg text-sm font-medium text-white"
           style="background-color: #2d2f3e;">
            {{ __('Login') }}
        </a>
        <a href="{{ route('register') }}"
           class="flex-1 text-center py-2 rounded-lg text-sm font-medium"
           style="color: #8b9bb4;">
            {{ __('Register') }}
        </a>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium mb-1" style="color: #c9d1e0;">
                {{ __('Email') }}
            </label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   required autofocus autocomplete="username"
                   placeholder="you@example.com"
                   class="w-full px-4 py-3 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-purple-500"
                   style="background-color: #0f1117; border: 1px solid #2d2f3e; color: #fff;" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div>
            <label for="password" class="block text-sm font-medium mb-1" style="color: #c9d1e0;">
                {{ __('Password') }}
            </label>
            <input id="password" type="password" name="password"
                   required autocomplete="current-password"
                   placeholder="••••••••"
                   class="w-full px-4 py-3 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-purple-500"
                   style="background-color: #0f1117; border: 1px solid #2d2f3e;" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center gap-2 text-sm" style="color: #8b9bb4;">
                <input type="checkbox" name="remember"
                       class="rounded border-gray-600 text-purple-600 focus:ring-purple-500"
                       style="background-color: #0f1117;" />
                {{ __('Remember me') }}
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm hover:underline" style="color: #6c63ff;">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <button type="submit"
                class="w-full py-3 rounded-xl text-white font-semibold text-sm transition hover:opacity-90"
                style="background: linear-gradient(135deg, #6c63ff, #8b5cf6);">
            {{ __('Log in') }}
        </button>
    </form>
</x-guest-layout>