<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pengaturan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('settings.store') }}">
                @csrf
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">Tentang Kita</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Informasi Tentang Kita
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="story" value="{{ __('Cerita Kami') }}" />
                                        <textarea class="form-input rounded-md shadow-sm mt-1 block w-full" name="story">{{ $setting->story }}</textarea>
                                        <x-jet-input-error for="story" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="vision" value="{{ __('Visi') }}" />
                                        <textarea class="form-input rounded-md shadow-sm mt-1 block w-full" name="vision">{{ $setting->vision }}</textarea>
                                        <x-jet-input-error for="vision" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="mission" value="{{ __('Misi') }}" />
                                        <textarea class="form-input rounded-md shadow-sm mt-1 block w-full" name="mission">{{ $setting->mission }}</textarea>
                                        <x-jet-input-error for="mission" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <x-jet-button>
                                    {{ __('Save') }}
                                </x-jet-button>
                            </div>
                        </div>
                    </div>
                </div>
                <x-jet-section-border />
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">Media Sosial</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Informasi Akun Media Sosial
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="facebook_url" value="{{ __('URL Facebook') }}" />
                                        <x-jet-input id="facebook_url" name="facebook_url" type="text" class="mt-1 block w-full" value="{{ $setting->facebook_url }}" />
                                        <x-jet-input-error for="facebook_url" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="twitter_url" value="{{ __('URL Twitter') }}" />
                                        <x-jet-input id="twitter_url" name="twitter_url" type="text" class="mt-1 block w-full" value="{{ $setting->twitter_url }}" />
                                        <x-jet-input-error for="twitter_url" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="instagram_url" value="{{ __('URL Instagram') }}" />
                                        <x-jet-input id="instagram_url" name="instagram_url" type="text" class="mt-1 block w-full" value="{{ $setting->instagram_url }}" />
                                        <x-jet-input-error for="instagram_url" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <x-jet-button>{{ __('Save') }}</x-jet-button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
