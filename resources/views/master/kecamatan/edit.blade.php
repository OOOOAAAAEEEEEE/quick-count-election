<x-app-layout>
    {{-- @dd($post) --}}
    <x-slot name="header">
        <div class="flex justify-between">
            <a href="{{ route('kecamatanIndex') }}" class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Kecamatan') }}
            </a>
            <x-button-group-init>
                <x-button-group-content-middle :href="route('kecamatanCreate')">
                    <i class="fa fa-plus text-blue-600 text-lg"></i>
                </x-button-group-content-middle>
            </x-button-group-init>
        </div>
    </x-slot>

    <div class="max-w-sm lg:max-w-7xl mx-auto mb-5">
        <form method="POST" action="{{ route('kecamatanUpdate', ['id' => $post->id]) }}">
            @csrf
            @method('patch')
                <div class="mb-6">
                    <x-input-label for="name">Kecamatan</x-input-label>
                    <x-input-text value="{{ $post->name }}" type="text" id="name"  name="name" placeholder="Nama Kecamatan"></x-input-text>
                    @error('name')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>  
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
</x-app-layout>