<x-app-layout>
    <x-slot name="header">
        <h2 class="float-left font-semibold text-xl text-gray-800 leading-tight">
            Promo
        </h2>
        <div class="float-right">
            <a href="{{ route('promos.create') }}" class="px-2 py-2 rounded-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">{{ __('Create') }}</a>
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
                                            {{ __("URL") }}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __("Kode") }}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __("Tipe") }}
                                        </th>
                                        <th scope="col"
                                            class="text-right px-6 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __("Nilai") }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50">
                                            <span class="sr-only">{{ __("Actions") }}</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($promos as $promo)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full"
                                                            src="{{ Storage::disk('public')->get($promo->path) }}"
                                                            alt="Foto">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm text-gray-900">
                                                            <a href="{{ $promo->url }}" target="_blank">{{ $promo->url }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $promo->code }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ ucfirst($promo->discount_type) }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                                <div class="text-sm text-gray-900">
                                                    {{
                                                        ($promo->discount_type === 'nominal' ? 'Rp ' : '') .
                                                        number_format($promo->discount_value) .
                                                        ($promo->discount_type === 'persentase' ? '%' : '')
                                                     }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('promos.edit', $promo) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                                                <form method="post" action="{{ route('promos.destroy', $promo) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="javascript:void(0)" onclick="if(confirm('Anda yakin ingin menghapus promo ini?')) event.target.parentElement.submit()" class="text-red-600 hover:text-red-900">{{ __('Delete') }}</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                {{ __('No records found.') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $promos->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
