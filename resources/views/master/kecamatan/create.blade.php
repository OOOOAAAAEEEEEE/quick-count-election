<x-app-layout>
    {{-- @dd($posts) --}}
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Kecamatan') }}
            </h2>
            <x-button-group-init>
                <x-button-group-content-middle :href="route('kecamatanCreate')">
                    <i class="fa fa-plus text-blue-600 text-lg"></i>
                </x-button-group-content-middle>
            </x-button-group-init>
        </div>
    </x-slot>

    <div class="max-w-sm lg:max-w-7xl mx-auto mb-5">
        <form method="POST" action="{{ route('kecamatanStore') }}">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <x-input-label for="kecamatan_id">Kecamatan</x-input-label>
                    <x-select-input id="kecamatan_id" name="kecamatan_id"></x-select-input>
                </div>
                <div>
                    <x-input-label for="kelurahan_id">Kelurahan</x-input-label>
                    <x-select-input id="kelurahan_id" name="kelurahan_id"></x-select-input>
                </div>
                <div>
                    <x-input-label for="rw">RW</x-input-label>
                    <x-input-text type="number" name="rw" id="rw" placeholder="Harus angka"></x-input-text>
                </div>  
                <div>
                    <x-input-label for="rt">RT</x-input-label>
                    <x-input-text type="number" name="rt" id="rt" placeholder="Harus angka"></x-input-text>
                </div>
            </div>
            <div class="mb-6">
                <x-input-label for="no_tps">TPS</x-input-label>
                <x-input-text type="number" name="no_tps" id="no_tps" placeholder="Harus angka"></x-input-text>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="mb-6">
                    <x-input-label for="perolehan_suara">Perolehan Suara</x-input-label>
                    <x-input-text type="number" name="perolehan_suara" id="perolehan_suara" placeholder="Harus angka"></x-input-text>
                </div>
                <div class="mb-6">
                    <x-input-label for="total_dpt">Total DPT</x-input-label>
                    <x-input-text type="number" name="total_dpt" id="total_dpt" placeholder="Harus angka"></x-input-text>
                </div> 
                <div class="mb-6">
                    <x-input-label for="total_sss">Total Surat Suara Sah</x-input-label>
                    <x-input-text type="number" name="total_sss" id="total_sss" placeholder="Harus angka"></x-input-text>
                </div> 
                <div class="mb-6">
                    <x-input-label for="total_ssts">Total Surat Suara Tidak Sah</x-input-label>
                    <x-input-text type="number" name="total_ssts" id="total_ssts" placeholder="Harus angka"></x-input-text>
                </div> 
                <div class="mb-6">
                    <x-input-label for="total_ssr">Total Surat Suara Rusak</x-input-label>
                    <x-input-text type="number" name="total_ssr" id="total_ssr" placeholder="Harus angka"></x-input-text>
                </div> 
                <div class="mb-6">
                    <x-input-label for="pemilih_hadir">Total Pemilih Hadir</x-input-label>
                    <x-input-text type="number" name="pemilih_hadir" id="pemilih_hadir" placeholder="Harus angka"></x-input-text>
                </div> 
                <div class="mb-6">
                    <x-input-label for="pemilih_tidak_hadir">Total Pemilih Tidak Hadir</x-input-label>
                    <x-input-text type="number" name="pemilih_tidak_hadir" id="pemilih_tidak_hadir" placeholder="Harus angka"></x-input-text>
                </div> 
            </div>
            <div class="mb-6">
                <x-input-label for="caleg_id">Caleg</x-input-label>
                <x-select-input id="caleg_id" name="caleg_id">

                </x-select-input>
            </div>
            <div class="mb-6">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Gambar Plano</label>
                <input name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
            </div>
            <div class="flex items-start mb-6">
                <div class="flex items-center h-5">
                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required>
                </div>
                <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
</x-app-layout>