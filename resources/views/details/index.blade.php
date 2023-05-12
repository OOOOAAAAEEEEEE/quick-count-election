<x-app-layout>
    {{-- @dd($posts) --}}
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Details') }}
            </h2>
            <x-button-group-init>
                {{-- <x-button-group-content-start :href="route('dataLengkapExport')">
                    <i class="bi bi-file-excel-fill text-green-500 text-2xl" aria-hidden="true"></i>
                </x-button-group-content-start> --}}
                <x-button-group-content-start :href="route('dataLengkapCreate')">
                    <i class="fa fa-plus text-blue-600 text-2xl"></i>
                </x-button-group-content-start>
                {{-- <x-button-group-content-end href="/storage/dataLengkap.xlsx">
                    <i class="fa fa-download text-green-500 text-2xl"></i>
                </x-button-group-content-end> --}}
                <x-button-group-content-end href="{{ route('spatie') }}">
                    <i class="fa fa-download text-green-500 text-2xl"></i>
                </x-button-group-content-end>
            </x-button-group-init>
        </div>
    </x-slot>

    <div class="max-w-sm sm:max-w-7xl mx-auto my-10">
        <table id="detailTable" class="display">
            <thead>
                <tr>
                    <th>Pengirim</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>TPS</th>
                    <th>DPT</th>
                    <th>Surat Sah</th>
                    <th>Surat Tidak Sah</th>
                    <th>Surat Rusak</th>
                    <th>Pemilih Hadir</th>
                    <th>Pemilih Tidak Hadir</th>
                    <th>Caleg</th>
                    <th>Perolehan Suara</th>
                    <th>Gambar</th>
                    <th>Dibuat</th>
                    <th>Diupdate</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</x-app-layout>

<script>
    $(document).ready( function () {~
        $('#detailTable').DataTable({
            "searching": false,
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "fixedHeader": true,
            "ajax": "{{ route('ApiDataLengkap') }}",
            "columns" : [
                {"data" : "pengirim"},
                {"data" : "kecamatan"},
                {"data" : "kelurahan"},
                {"data" : "rt"},
                {"data" : "rw"},
                {"data" : "no_tps"},
                {"data" : "total_dpt"},
                {"data" : "total_sss"},
                {"data" : "total_ssts"},
                {"data" : "total_ssr"},
                {"data" : "pemilih_hadir"},
                {"data" : "pemilih_tidak_hadir"},
                {"data" : "caleg"},
                {"data" : "perolehan_suara"},
                {
                    "data" : "image",
                    "render" : function(data, type, row){
                        return '<img src="/storage/' +data+ '" '+ 'alt="plano" ' + '/>'
                    }
                },
                {"data" : "created_at"},
                {"data" : "updated_at"},
                {"data" : "action"}
            ]
        });
    });
</script>