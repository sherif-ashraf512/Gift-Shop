<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            User Avatar
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Upload Profile Avatar.") }}
        </p>
    </header>
    <img width="50" height="50" class="rounded-full" src="{{ "/storage/$user->avatar" }}" alt="user avatar" />

    <form method="post" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
        @method('patch')
        @csrf

        <div>
            <x-input-label for="avatar" value="Upload Avatar" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)"
                autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>


        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
