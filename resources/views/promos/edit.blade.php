<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Promo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Promo</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Informasi Promo
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="POST" action="{{ route('promos.update', $promo) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="path" value="{{ __('Photo') }}" />
                                        <x-jet-input id="path" type="file" class="mt-1 block w-full" name="path" />
                                        <x-jet-input-error for="path" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="url" value="{{ __('URL') }}" />
                                        <x-jet-input id="url" name="url" type="url" class="mt-1 block w-full" value="{{ $promo->url }}" />
                                        <x-jet-input-error for="url" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="code" value="{{ __('Kode') }}" />
                                        <x-jet-input id="code" name="code" type="text" class="mt-1 block w-full" value="{{ $promo->code }}" />
                                        <x-jet-input-error for="code" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="discount_type" value="{{ __('Tipe') }}" />
                                        <select id="discount_type" name="discount_type" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                            <option value="nominal" @if($promo->discount_type === 'nominal') selected @endif>Nominal</option>
                                            <option value="persentase" @if($promo->discount_type === 'persentase') selected @endif>Persentase</option>
                                        </select>
                                        <x-jet-input-error for="discount_type" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="discount_value" value="{{ __('Nilai') }}" />
                                        <x-jet-input id="discount_value" name="discount_value" type="number" class="mt-1 block w-full" value="{{ $promo->discount_value }}" />
                                        <x-jet-input-error for="discount_value" class="mt-2" />
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
