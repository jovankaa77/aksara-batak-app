<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Username')" />
            <x-text-input id="name" class="block mt-1 w-full focus:!ring-red-800 focus:!border-red-800 dark:focus:!ring-red-800 dark:focus:!border-red-800" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Alamat Email')" />
            <x-text-input id="email" class="block mt-1 w-full focus:!ring-red-800 focus:!border-red-800 dark:focus:!ring-red-800 dark:focus:!border-red-800" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full focus:!ring-red-800 focus:!border-red-800 dark:focus:!ring-red-800 dark:focus:!border-red-800"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full focus:!ring-red-800 focus:!border-red-800 dark:focus:!ring-red-800 dark:focus:!border-red-800"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-red-200 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:!ring-red-800 focus:ring-offset-2 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Sudah daftar?') }}
            </a>

            <x-primary-button class="ms-4 !bg-red-800 hover:!bg-red-700 focus:!bg-red-800 active:!bg-red-900 focus:!ring-red-800">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
