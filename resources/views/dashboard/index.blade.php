<x-app-layout>
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

    <div class="md:m-1 2xl:max-w-7xl xl:translate-x-16 lg:w-1/2 2xl:relative 2xl:translate-x-1/2 2xl:w-1/3 md:p-3 p-0 bg-white rounded-xl shadow">
        {!! $chart->container() !!}
    </div>

</x-app-layout>
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}