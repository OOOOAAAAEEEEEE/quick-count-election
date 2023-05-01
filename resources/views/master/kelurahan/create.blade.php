<x-app-layout>
    {{-- @dd($posts) --}}
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Kelurahan') }}
            </h2>
            <x-button-group-init>
                <x-button-group-content-middle :href="route('kelurahanCreate')">
                    <i class="fa fa-plus text-blue-600 text-lg"></i>
                </x-button-group-content-middle>
            </x-button-group-init>
        </div>
    </x-slot>

    <div class="max-w-sm lg:max-w-7xl mx-auto mb-5">
        <form method="POST" action="{{ route('kelurahanStore') }}">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <x-input-label for="kecamatan_id">Kecamatan</x-input-label>
                    <x-select-input id="kecamatan_id" name="kecamatan_id">
                        @foreach ($posts as $post)
                            <option value="{{ $post->id }}"> {{ $post->name }} </option>
                        @endforeach
                    </x-select-input>
                    @error('kecamatan_id')
                        <p class="text-red-500 text-sm"> {{ $message }} </p>
                    @enderror
                </div>
                <div>
                    <x-input-label for="name">Kelurahan</x-input-label>
                    <x-input-text type="text" name="name" id="name" placeholder="Isi nama kelurahan"></x-input-text>
                    @error('name')
                        <p class="text-red-500 text-sm"> {{ $message }} </p>
                    @enderror
                </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
</x-app-layout>