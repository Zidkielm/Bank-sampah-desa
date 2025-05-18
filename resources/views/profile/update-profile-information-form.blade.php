<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informasi data diri') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Perbarui alamat rumah kamu, nomor telepon, dan email kamu') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden" wire:model.live="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="h-20 w-20 rounded-full object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block h-20 w-20 rounded-full bg-cover bg-center bg-no-repeat"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="me-2 mt-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nama') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.live="state.name" required
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="username" value="{{ __('Username') }}" />
            <x-input id="username" type="text" class="mt-1 block w-full" wire:model.live="state.username" required
                autocomplete="username" />
            <x-input-error for="username" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model.live="state.email" required
                autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="mt-2 text-sm dark:text-white">
                    {{ __('Your email address is unverified.') }}

                    <button type="button"
                        class="focus:outline-hidden rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 text-sm font-medium text-green-700">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        {{-- alamat --}}
        <div class="col-span-6 sm:col-span-4">
            <x-label for="alamat" value="{{ __('Alamat') }}" />
            <x-input id="alamat" type="text" class="mt-1 block w-full" wire:model.live="state.alamat" required
                autocomplete="alamat" />
            <x-input-error for="alamat" class="mt-2" />
        </div>

        {{-- no hp --}}
        <div class="col-span-6 sm:col-span-4">
            <x-label for="no_hp" value="{{ __('Nomor Telepon') }}" />
            <x-input id="no_hp" type="text" class="mt-1 block w-full" wire:model.live="state.no_hp" required
                autocomplete="no_hp" />
            <x-input-error for="no_hp" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
