<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- role -->
        <!-- <div>
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" autocomplete="role" class="block w-full rounded-md">
                                        <option value="admin">Admin</option>
                                        <option value="branch_admin">Branch Admin</option>
                                        <option value="user">User</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div> -->

        <!-- empid -->
        <div>
            <x-input-label for="empid" :value="__('Employee ID')" />
            <x-text-input id="empid" class="block mt-1 w-full" type="text" name="empid" :value="old('empid')" required autofocus autocomplete="empid" />
            <x-input-error :messages="$errors->get('empid')" class="mt-2" />
        </div>

        <!-- branch_code -->
        <div>
            <x-input-label for="branch_code" :value="__('Branch Code')" />
            <select id="branch_code" name="branch_code" autocomplete="branch_code" class="block w-full rounded-md">
                                        <option value="0001">0001-Head Office</option>
                                        <option value="0002">0002-Principal Branch</option>
                                        <option value="0003">0003-Hemayetpur Branch</option>
                                        <option value="0004">0004-Agrabad Branch</option>
                                        <option value="0005">0005-Bhatiary Branch</option>
                                        <option value="0006">0006-Khulna Branch</option>
                                        <option value="0007">0007-Katakhali Branch</option>
                                        <option value="0008">0008-Keranigonj Branch</option>
                                        <option value="0009">0009-Uttara Branch</option>
                                        <option value="0010">0010-Gulshan Branch</option>
            </select>
            <x-input-error :messages="$errors->get('branch_code')" class="mt-2" />
        </div>

        <!-- img -->
        <div>
            <x-input-label for="img" :value="__('Profile Image')" />
            <input type="file" name="img" id="img" autocomplete="img" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <x-input-error :messages="$errors->get('img')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
