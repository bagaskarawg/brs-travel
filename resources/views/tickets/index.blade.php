<x-app-layout>
    <x-slot name="header">
        <h2 class="float-left font-semibold text-xl text-gray-800 leading-tight">
            Reservasi
        </h2>
        <div class="float-right">
            <a href="{{ route('reservations.create') }}" class="px-2 py-2 rounded-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">{{ __('Create') }}</a>
        </div>
        <div class="clearfix"></div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mb-2">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __("Pelanggan") }}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __("Rute") }}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __("Jadwal") }}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __("Nomor Tiket") }}
                                        </th>
                                        <th scope="col"
                                            class="text-left px-6 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __("Tipe") }}
                                        </th>
                                        <th scope="col"
                                            class="text-right px-6 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __("Harga") }}
                                        </th>
                                        <th scope="col"
                                            class="text-right px-6 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __("Diskon") }}
                                        </th>
                                        <th scope="col"
                                            class="text-right px-6 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __("Total") }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($tickets as $ticket)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $ticket->user->name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $ticket->route->sourcePool->name }} - {{ $ticket->route->destinationPool->name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    <p class="text">
                                                        Tanggal: {{ $ticket->date->format('d F Y') }}
                                                    </p>
                                                    <p class="text">
                                                        Jam:
                                                        {{ $ticket->schedule->departure }} - {{ $ticket->schedule->arrival }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ strtoupper($ticket->ticket_number) }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ ucfirst($ticket->type) }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                                <div class="text-sm text-gray-900">
                                                    Rp {{ number_format($ticket->price, 0, ',', '.') }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                Rp {{ number_format($ticket->discount, 0, ',', '.') }}
                                                <br>
                                                @if($ticket->discount > 0)
                                                    <small>Kode Promo: {{ $ticket->promo_code }}</small>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                Rp {{ number_format($ticket->price - $ticket->discount, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                {{ __('No records found.') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $tickets->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
