<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Profile Photo
            
        </h2>
        
       <img width="60" height="60" class="rounded-full" src="{{ "/storage/$user->photo" }}" alt="NoProfilePhoto">
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Add or Update User Photo
        </p>
    </header>
    @if (session('message'))
      <div class="text-red-500">
        {{ session('message') }}
      </div>
   @endif
    <form method="post" action="{{route('profile.photo')}}" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div>
            <x-input-label for="photo" value="Profile Picture" />
            <x-text-input id="photo" name="photo" type="file" class="mt-1 block w-full" :value="old('name', $user->photo)" required autofocus autocomplete="photo" />
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>

        <div class="flex items-center gap-4 mt-6">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>
    </form>
</section>
