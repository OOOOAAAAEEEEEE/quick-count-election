<x-app-layout>
    {{-- @dd($posts) --}}
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <x-button-group-init>
                <x-button-group-content-middle :href="route('dashboardCreate')">
                    <i class="fa fa-plus text-blue-600 text-lg"></i>
                </x-button-group-content-middle>
            </x-button-group-init>
        </div>
    </x-slot>

    <div class="p-6 m-20 bg-white rounded shadow">
        {!! $chart->container() !!}
    </div>

</x-app-layout>
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}