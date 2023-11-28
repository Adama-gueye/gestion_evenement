@include('header')

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" class="block mt-1 w-full bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0" type="role" name="role" :value="old('role')" autocomplete="role">
                <option value="">---Vous inscivez en tant que qui ?</option>
                <option value="association">Association</option>
                <option value="client">Client</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" autofocus autocomplete="nom" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>

        <div class="mt-4 client-fields">
            <x-input-label for="prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" autofocus autocomplete="prenom" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                         autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4 client-fields">
            <x-input-label for="telephone" :value="__('Telephone')" />
            <x-text-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" autocomplete="telephone" />
            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        </div>

        <div class="mt-4 association-fields">
            <x-input-label for="slogan" :value="__('Slogan')" />
            <x-text-input id="slogan" class="block mt-1 w-full" type="text" name="slogan" :value="old('slogan')" autofocus autocomplete="slogan" />
            <x-input-error :messages="$errors->get('slogan')" class="mt-2" />
        </div>

        <div class="mt-4 association-fields">
            <x-input-label for="logo" :value="__('Logo')" />
            <input type="text" class="block mt-1 w-full" id="logo" name="logo" :value="old('logo')" autofocus autocomplete="logo" />
            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
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

<script>
    $(document).ready(function() {
        $('.client-fields').hide();
        $('.association-fields').hide();
        $('#role').change(function() {
            $('.client-fields').hide();
            $('.association-fields').hide();
            var selectedRole = $(this).val();
            if (selectedRole === 'client') {
                $('.client-fields').show();
            } else if (selectedRole === 'association') {
                $('.association-fields').show();
            }
        });
    });
</script>

</body>
</html>
