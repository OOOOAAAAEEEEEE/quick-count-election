<x-app-layout>
    {{-- @dd($posts) --}}
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Details') }}
            </h2>
            <x-button-group-init>
                <x-button-group-content-middle :href="route('dataLengkapCreate')">
                    <i class="fa fa-plus text-blue-600 text-lg"></i>
                </x-button-group-content-middle>
            </x-button-group-init>
        </div>
    </x-slot>

    <div class="max-w-sm sm:max-w-7xl mx-auto my-10">
        <table id="detailTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pengirim</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>TPS</th>
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
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "fixedHeader": true,
            "ajax": "{{ route('ApiDataLengkap') }}",
            "columns" : [
                {"data" : "id"},
                {"data" : "pengirim"},
                {"data" : "kecamatan"},
                {"data" : "kelurahan"},
                {"data" : "no_tps"},
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