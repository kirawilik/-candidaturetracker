<x-guest-layout>
    <h2 class="text-lg font-semibold text-white mb-2">{{ __('Confirm Password') }}</h2>
    <p class="text-sm mb-6" style="color: #8b9bb4;">
        {{ __('This is a secure area. Please confirm your password before continuing.') }}
    </p>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
        @csrf
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

        <button type="submit"
                class="w-full py-3 rounded-xl text-white font-semibold text-sm transition hover:opacity-90"
                style="background: linear-gradient(135deg, #6c63ff, #8b5cf6);">
            {{ __('Confirm') }}
        </button>
    </form>
</x-guest-layout>