<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Reservasi
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('reservations.store') }}" enctype="multipart/form-data">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">Informasi Reservasi</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Informasi Reservasi
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="date" value="{{ __('Tanggal') }}" />
                                        <x-jet-input id="date" name="date" type="date" class="mt-1 block w-full" onchange="refreshSchedules()" />
                                        <x-jet-input-error for="date" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="route_id" value="{{ __('Rute') }}" />
                                        <select id="route_id" name="route_id" class="form-input rounded-md shadow-sm mt-1 block w-full" onchange="refreshSchedules()">
                                            <option>Pilih Rute</option>
                                            @foreach ($routes as $route)
                                                <option value="{{ $route->id }}">{{ $route->sourcePool->name ?? 'dihapus' }} - {{ $route->destinationPool->name ?? 'dihapus' }}</option>
                                            @endforeach
                                        </select>
                                        <x-jet-input-error for="route_id" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="schedule_id" value="{{ __('Jadwal') }}" />
                                        <select id="schedule_id" name="schedule_id" class="form-input rounded-md shadow-sm mt-1 block w-full" onchange="refreshPrice()">
                                            <option>Silakan pilih rute</option>
                                        </select>
                                        <x-jet-input-error for="schedule_id" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="type" value="{{ __('Tipe') }}" />
                                        <select id="type" name="type" class="form-input rounded-md shadow-sm mt-1 block w-full" onchange="refreshPrice()">
                                            <option value="penumpang">Penumpang</option>
                                            <option value="barang">Barang</option>
                                        </select>
                                        <x-jet-input-error for="type" class="mt-2" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="type" value="{{ __('Harga') }}" />
                                        <p id="price" class="text">Rp -</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="promo_code" value="{{ __('Kode Promo') }}" />
                                        <x-jet-input id="promo_code" name="promo_code" type="text" class="mt-1 block w-full" />
                                        <x-jet-input-error for="promo_code" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                                    {{ __('Save') }}
                                </x-jet-button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        let routes = @json($routes, JSON_PRETTY_PRINT);
        let schedules = @json($schedules, JSON_PRETTY_PRINT);

        function refreshSchedules() {
            let routeId = document.getElementById('route_id').value;
            let dayOfWeek = new Date(document.getElementById('date').value).getDay();
            let filtered = [
                '<option>Pilih jadwal</option>',
                ...schedules.filter((schedule) => {
                    return schedule.route_id == routeId && schedule.day == dayOfWeek;
                }).map(
                    (schedule) => `<option value="${schedule.id}">${schedule.departure}-${schedule.arrival}</option>`
                )
            ];

            document.getElementById('schedule_id').innerHTML = filtered;
        }

        function refreshPrice() {
            let scheduleId = document.getElementById('schedule_id').value;
            let schedule = schedules.filter(schedule => schedule.id == scheduleId)[0];
            let route = routes.filter(route => route.id == schedule.route_id)[0];
            let type = document.getElementById('type').value === 'penumpang' ? 'price' : 'package_delivery_price';

            document.getElementById('price').innerText = `Rp ${route[type]}`;
        }
    </script>
</x-app-layout>
