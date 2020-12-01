<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Jadwal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Jadwal</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Informasi Jadwal
                        </p>
                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="POST" action="{{ route('schedules.update', $schedule) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="route_id" value="{{ __('Rute') }}" />
                                        <select id="route_id" name="route_id" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                            @foreach ($routes as $route)
                                                <option value="{{ $route->id }}" @if($schedule->route_id === $route->id) selected @endif>{{ $route->sourcePool->name ?? 'dihapus' }} - {{ $route->destinationPool->name ?? 'dihapus' }}</option>
                                            @endforeach
                                        </select>
                                        <x-jet-input-error for="route_id" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="day" value="{{ __('Hari') }}" />
                                        <select id="day" name="day" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                            @for($day = 0; $day < 7; $day++)
                                                <option value="{{ $day }}" @if($day === $schedule->day) selected @endif>{{ App\Models\Schedule::DAYS[$day] }}</option>
                                            @endfor
                                        </select>
                                        <x-jet-input-error for="day" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="departure" value="{{ __('Jam Keberangkatan') }}" />
                                        <x-jet-input id="departure" type="time" class="mt-1 block w-full" name="departure" value="{{ $schedule->departure }}" />
                                        <x-jet-input-error for="departure" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="arrival" value="{{ __('Jam Kedatangan') }}" />
                                        <x-jet-input id="arrival" type="time" class="mt-1 block w-full" name="arrival" value="{{ $schedule->arrival }}" />
                                        <x-jet-input-error for="arrival" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="passenger_capacity" value="{{ __('Kapasitas Penumpang') }}" />
                                        <x-jet-input id="passenger_capacity" type="number" value="0" class="mt-1 block w-full" name="passenger_capacity" value="{{ $schedule->passenger_capacity }}" />
                                        <x-jet-input-error for="passenger_capacity" class="mt-2" />
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
