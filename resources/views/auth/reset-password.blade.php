<x-guest-layout>
    <h2 class="text-lg font-semibold text-white mb-6">{{ __('Reset Password') }}</h2>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <label for="email" class="block text-sm font-medium mb-1" style="color: #c9d1e0;">
                {{ __('Email') }}
            </label>
            <input id="email" type="email" name="email"
                   value="{{ old('email', $request->email) }}"
                   required autofocus autocomplete="username"
                   class="w-full px-4 py-3 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-purple-500"
                   style="background-color: #0f1117; border: 1px solid #2d2f3e;" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div>
            <label for="password" class="block text-sm font-medium mb-1" style="color: #c9d1e0;">
                {{ __('New Password') }}
            </label>
            <input id="password" type="password" name="password"
                   required autocomplete="new-password"
                   placeholder="••••••••"
                   class="w-full px-4 py-3 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-purple-500"
                   style="background-color: #0f1117; border: 1px solid #2d2f3e;" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium mb-1" style="color: #c9d1e0;">
                {{ __('Confirm Password') }}
            </label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                   required autocomplete="new-password"
                   placeholder="••••••••"
                   class="w-full px-4 py-3 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-purple-500"
                   style="background-color: #0f1117; border: 1px solid #2d2f3e;" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <button type="submit"
                class="w-full py-3 rounded-xl text-white font-semibold text-sm transition hover:opacity-90"
                style="background: linear-gradient(135deg, #6c63ff, #8b5cf6);">
            {{ __('Reset Password') }}
        </button>
    </form>
</x-guest-layout>