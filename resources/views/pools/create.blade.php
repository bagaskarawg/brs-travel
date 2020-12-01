<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Pool
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Pool Information') }}</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Pool Information') }}
                        </p>
                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="POST" action="{{ route('pools.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="name" value="{{ __('Name') }}" />
                                        <x-jet-input id="name" name="name" type="text" class="mt-1 block w-full" autocomplete="name" />
                                        <x-jet-input-error for="name" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="address" value="{{ __('Address') }}" />
                                        <textarea class="form-input rounded-md shadow-sm mt-1 block w-full" name="address"></textarea>
                                        <x-jet-input-error for="address" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="phone" value="{{ __('Phone') }}" />
                                        <x-jet-input id="phone" type="text" class="mt-1 block w-full" autocomplete="phone" name="phone" />
                                        <x-jet-input-error for="phone" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="whatsapp" value="{{ __('WhatsApp') }}" />
                                        <x-jet-input id="whatsapp" type="text" class="mt-1 block w-full" autocomplete="whatsapp" name="whatsapp" />
                                        <x-jet-input-error for="whatsapp" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="map_link" value="{{ __('Map Link') }}" />
                                        <x-jet-input id="map_link" type="text" class="mt-1 block w-full" autocomplete="map_link" name="map_link" />
                                        <x-jet-input-error for="map_link" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="photo" value="{{ __('Photo') }}" />
                                        <x-jet-input id="photo" type="file" class="mt-1 block w-full" name="photo" />
                                        <x-jet-input-error for="photo" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                                    {{ __('Save') }}
                                </x-jet-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
