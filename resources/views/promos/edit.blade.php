<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Testimonial
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Testimonial</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Informasi Testimonial
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="POST" action="{{ route('testimonials.update', $testimonial) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="name" value="{{ __('Nama') }}" />
                                        <x-jet-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ $testimonial->name }}" />
                                        <x-jet-input-error for="name" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="content" value="{{ __('Konten') }}" />
                                        <textarea class="form-input rounded-md shadow-sm mt-1 block w-full" name="content">{{ $testimonial->content }}</textarea>
                                        <x-jet-input-error for="content" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="image" value="{{ __('Photo') }}" />
                                        <x-jet-input id="image" type="file" class="mt-1 block w-full" name="image" />
                                        <x-jet-input-error for="image" class="mt-2" />
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
