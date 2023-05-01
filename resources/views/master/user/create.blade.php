<x-app-layout>
    {{-- @dd($posts) --}}
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah User') }}
            </h2>
            <x-button-group-init>
                <x-button-group-content-middle :href="route('userCreate')">
                    <i class="fa fa-plus text-blue-600 text-lg"></i>
                </x-button-group-content-middle>
            </x-button-group-init>
        </div>
    </x-slot>

    <div class="max-w-sm lg:max-w-7xl mx-auto mb-5">
        <form method="POST" action="{{ route('userStore') }}">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <x-input-label for="name">Nama</x-input-label>
                    <x-input-text value="{{ old('name') }}" type="text" name="name" id="name" placeholder="Harus huruf"></x-input-text>
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>  
                <div>
                    <x-input-label for="email">Email</x-input-label>
                    <x-input-text value="{{ old('email') }}" type="email" name="email" id="email" placeholder="Harus huruf"></x-input-text>
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="mb-6">
                    <x-input-label for="telp">No Telepon</x-input-label>
                    <x-input-text value="{{ old('telp') }}" type="tel" name="telp" id="telp" placeholder="Harus angka"></x-input-text>
                    @error('telp')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <x-input-label for="password">Password</x-input-label>
                    <x-input-text value="{{ old('password') }}" type="password" name="password" id="password" placeholder="Password"></x-input-text>
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div> 
            </div>
            <div class="mb-6">
                <x-input-label for="role">Role</x-input-label>
                <x-select-input id="role" name="role">
                    <option value="Member">Member</option>
                    <option value="Admin">Admin</option>
                </x-select-input>
                @error('role')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
</x-app-layout>