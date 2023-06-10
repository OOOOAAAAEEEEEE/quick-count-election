<x-app-layout>
    {{-- @dd($post->image) --}}
    <x-slot name="header">
        <div class="flex justify-between">
            <a href="{{ route('dataLengkapMember') }}" class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Data') }}
            </a>
            <x-button-group-init>
                <x-button-group-content-middle :href="route('dataLengkapMemberCreate')">
                    <i class="fa fa-plus text-blue-600 text-lg"></i>
                </x-button-group-content-middle>
            </x-button-group-init>
        </div>
    </x-slot>

    <div class="max-w-sm lg:max-w-7xl mx-auto mb-5">
        <form method="POST" action="{{ route('dataLengkapMemberUpdate', ['id' => $post->uuid]) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <input type="hidden" name="uuid" value="{{ Str::uuid() }}">
                    <x-input-label for="kecamatan_id">Kecamatan</x-input-label>
                    <x-select-input id="kecamatan_id" name="kecamatan_id">
                        <option value="{{ $post->kecamatan_id }}">{{ $post->kecamatan }} | Current</option>
                        @foreach ($kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->id }}"> {{ $kecamatan->name }} </option>
                        @endforeach
                    </x-select-input>
                </div>
                <div>
                    <x-input-label for="kelurahan_id">Kelurahan</x-input-label>
                    <x-select-input id="kelurahan_id" name="kelurahan_id">
                        <option value="{{ $post->kelurahan_id }}"> {{ $post->kelurahan }} | Current</option>
                    </x-select-input>
                </div>
                <div>
                    <x-input-label for="rw">RW</x-input-label>
                    <x-input-text type="number" value="{{ $post->rw }}" name="rw" id="rw" placeholder="Harus angka"></x-input-text>
                    @error('rw')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <x-input-label for="rt">RT</x-input-label>
                    <x-input-text type="number" value="{{ $post->rt }}" name="rt" id="rt" placeholder="Harus angka"></x-input-text>
                    @error('rt')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <x-input-label for="no_tps">TPS</x-input-label>
                <x-input-text type="number" value="{{ $post->no_tps }}" name="no_tps" id="no_tps" placeholder="Harus angka"></x-input-text>
                @error('no_tps')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="mb-6">
                    <x-input-label for="total_dpt">Total DPT</x-input-label>
                    <x-input-text type="number" value="{{ $post->total_dpt }}" name="total_dpt" id="total_dpt" placeholder="Harus angka"></x-input-text>
                    @error('total_dpt')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div> 
                <div class="mb-6">
                    <x-input-label for="total_sss">Total Surat Suara Sah</x-input-label>
                    <x-input-text type="number" value="{{ $post->total_sss }}" name="total_sss" id="total_sss" placeholder="Harus angka"></x-input-text>
                    @error('total_sss')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div> 
                <div class="mb-6">
                    <x-input-label for="total_ssts">Total Surat Suara Tidak Sah</x-input-label>
                    <x-input-text type="number" value="{{ $post->total_ssts }}" name="total_ssts" id="total_ssts" placeholder="Harus angka"></x-input-text>
                    @error('total_ssts')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div> 
                <div class="mb-6">
                    <x-input-label for="total_ssr">Total Surat Suara Rusak</x-input-label>
                    <x-input-text type="number" value="{{ $post->total_ssr }}" name="total_ssr" id="total_ssr" placeholder="Harus angka"></x-input-text>
                    @error('total_ssr')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div> 
                <div class="mb-6">
                    <x-input-label for="pemilih_hadir">Total Pemilih Hadir</x-input-label>
                    <x-input-text type="number" value="{{ $post->pemilih_hadir }}" name="pemilih_hadir" id="pemilih_hadir" placeholder="Harus angka"></x-input-text>
                    @error('pemilih_hadir')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div> 
                <div class="mb-6">
                    <x-input-label for="pemilih_tidak_hadir">Total Pemilih Tidak Hadir</x-input-label>
                    <x-input-text type="number" value="{{ $post->pemilih_tidak_hadir }}" name="pemilih_tidak_hadir" id="pemilih_tidak_hadir" placeholder="Harus angka"></x-input-text>
                    @error('pemilih_tidak_hadir')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div> 
            </div>
            {{--!! LAH KOK GITU SIH --}}

            <div class="mb-6">
                <x-input-label for="partai_id">Partai</x-input-label>
                <x-select-input id="partai_id" name="partai_id">
                    <option value="{{ $post->partai_id }}">{{ $post->partai }} | Current</option>
                    @foreach ($partais as $partai)
                        <option value="{{ $partai->id }}">{{ $partai->name }}</option>
                    @endforeach
                </x-select-input>
                    @error('partai_id')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
            </div>
            <div id="unhide" class="hidden">
                <div id="inputValue" class="grid gap-6 mb-6 p-3 rounded-xl md:grid-cols-2 bg-slate-200">
                    
                </div>
            </div>

            {{--!! LAH KOK GITU SIH --}}
            <div class="mb-6">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Gambar Plano</label>
                <a class="text-indigo-500 active:text-indigo-900 hover:text-indigo-700" href="/storage/{{ $post->image }}">{{ $post->image }}</a>
                <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                @error('image')
                    <p class="text-red-500 text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="flex items-start my-10">
                <div class="flex items-center h-5">
                <input id="agree" required type="checkbox" class="w-9 h-9 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                </div>
                <label for="agree" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Klik tombol ini jika anda sudah yakin dengan isian anda!! </label>
                @error('agree')
                    <p class="text-red-500 text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
</x-app-layout>

<script>
    const dataKelurahan = @json($kelurahans);
    const dataCaleg = @json($calegs);

    let objectKelurahan = JSON.parse(dataKelurahan);
    let objectCaleg = JSON.parse(dataCaleg);

    const kecamatan = document.getElementById("kecamatan_id");
    const partai = document.getElementById("partai_id");
    const unhide = document.getElementById("unhide");
    const inputValue = document.getElementById("inputValue");

    function filterCaleg(){
        partai.addEventListener("change", () => {
            let partaiID = partai.value;
            
            if(partaiID != ""){
                unhide.classList.remove("hidden");

                inputValue.innerHTML= "";

                let filtered = objectCaleg.filter((partai_id) => partai_id.partaiID == partaiID);

                filtered.forEach((result, index) => {
                    const inputText = document.createElement('input');
                    inputText.value = result.caleg;
                    inputText.readOnly = true;
                    inputText.classList.add('bg-gray-50', 'border', 'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-lg', 'focus:ring-blue-500', 'focus:border-blue-500', 'block', 'w-full', 'p-2.5');
                    inputText.name = `caleg${index+1}`;
                    inputValue.appendChild(inputText);

                    const inputSuara = document.createElement('input');
                    inputSuara.setAttribute('type', 'number');
                    inputSuara.placeholder = `Perolehan Suara ${result.caleg}`;
                    inputSuara.classList.add('bg-gray-50', 'disabled', 'border', 'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-lg', 'focus:ring-blue-500', 'focus:border-blue-500', 'block', 'w-full', 'p-2.5');
                    inputSuara.name = `suara${index+1}`;
                    inputValue.appendChild(inputSuara);
                });

            }else{
                unhide.classList.add("hidden");
            }
        })
    }


    function filterKelurahan() {
        kecamatan.addEventListener("change", () => {
            const select = document.getElementById("kelurahan_id");
            let kecamatanID = kecamatan.value;

            let filtered = objectKelurahan.filter((id) => id.kecamatanID == kecamatanID);

            select.innerHTML = "";

            filtered.forEach((result) => {
                const option = document.createElement("option");
                option.value = result.kelurahanID;
                option.textContent = result.kelurahan;
                select.appendChild(option);
            });

            if (filtered.length === 0) {
                option = document.createElement("option");
                option.textContent = "Data Not Found";
                select.appendChild(option);
            }
        });
    }

filterCaleg();
filterKelurahan();
</script>