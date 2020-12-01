<x-app-layout>
    <x-slot name="header">
        <h2 class="float-left font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Routes') }}
        </h2>
        <div class="float-right">
            <a href="{{ route('routes.create') }}" class="px-2 py-2 rounded-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">{{ __('Create') }}</a>
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
                                            {{ __("Pool Asal") }}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __("Pool Tujuan") }}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __("Harga") }}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __("Harga Kiriman Barang") }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50">
                                            <span class="sr-only">{{ __("Actions") }}</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($routes as $route)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $route->sourcePool->name ?? 'dihapus' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $route->destinationPool->name ?? 'dihapus' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $route->formatted_price }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $route->formatted_package_delivery_price }}
                                                </div>
                                                <div class="text-xs text-gray-700">
                                                    {{ $route->formatted_package_delivery_price_next_kg }}/kg berikutnya
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                @unless(empty($route->map_link))
                                                    <a href="{{ $route->map_link }}" class="text-gray-600 hover:text-gray-900" target="_blank">{{ __('Map') }}</a>
                                                    <br />
                                                @endunless
                                                <a href="{{ route('routes.edit', $route) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                                                <form method="post" action="{{ route('routes.destroy', $route) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="javascript:void(0)" onclick="if(confirm('Anda yakin ingin menghapus route ini?')) event.target.parentElement.submit()" class="text-red-600 hover:text-red-900">{{ __('Delete') }}</a>
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
                {{ $routes->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
