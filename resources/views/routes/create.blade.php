<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Rute
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Route Information') }}</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Route Information') }}
                        </p>
                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="POST" action="{{ route('routes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="source_pool_id" value="{{ __('Pool Asal') }}" />
                                        <select id="source_pool_id" name="source_pool_id" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                            @foreach ($pools as $pool)
                                                <option value="{{ $pool->id }}">{{ $pool->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-jet-input-error for="source_pool_id" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="destination_pool_id" value="{{ __('Pool Tujuan') }}" />
                                        <select id="destination_pool_id" name="destination_pool_id" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                            @foreach ($pools as $pool)
                                                <option value="{{ $pool->id }}">{{ $pool->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-jet-input-error for="destination_pool_id" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="price" value="{{ __('Harga') }}" />
                                        <x-jet-input id="price" type="number" value="0" class="mt-1 block w-full" name="price" />
                                        <x-jet-input-error for="price" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="package_delivery_price" value="{{ __('Harga Pengiriman Barang') }}" />
                                        <x-jet-input id="package_delivery_price" type="number" value="0" class="mt-1 block w-full" name="package_delivery_price" />
                                        <x-jet-input-error for="package_delivery_price" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="package_delivery_price_next_kg" value="{{ __('Harga Pengiriman Barang per KG Berikutnya') }}" />
                                        <x-jet-input id="package_delivery_price_next_kg" type="number" value="0" class="mt-1 block w-full" name="package_delivery_price_next_kg" />
                                        <x-jet-input-error for="package_delivery_price_next_kg" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <x-jet-button>
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
