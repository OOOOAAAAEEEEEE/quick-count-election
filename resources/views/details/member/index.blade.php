<x-app-layout>
    {{-- @dd(route('ApiDataLengkapMember', ['user_id' => auth()->user()->id])) --}}
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Details') }}
            </h2>
            <x-button-group-init>
                <x-button-group-content-middle :href="route('dataLengkapMemberCreate')">
                    <i class="fa fa-plus text-blue-600 text-2xl"></i>
                </x-button-group-content-middle>
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
                    <th>Partai</th>
                    <th>Gambar</th>
                    <th>Dibuat</th>
                    <th>Diupdate</th>
                    <th>Caleg1</th>
                    <th>Suara1</th>
                    <th>Caleg2</th>
                    <th>Suara2</th>
                    <th>Caleg3</th>
                    <th>Suara3</th>
                    <th>Caleg4</th>
                    <th>Suara4</th>
                    <th>Caleg5</th>
                    <th>Suara5</th>
                    <th>Caleg6</th>
                    <th>Suara6</th>
                    <th>Caleg7</th>
                    <th>Suara7</th>
                    <th>Caleg8</th>
                    <th>Suara8</th>
                    <th>Caleg9</th>
                    <th>Suara9</th>
                    <th>Caleg10</th>
                    <th>Suara10</th>
                    {{-- <th>Aksi</th> --}}
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
            "ajax": "{{ route('ApiDataLengkapMember', [ 'user_id' => auth()->user()->id ]) }}",
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
                {"data" : "partai"},
                {
                    "data" : "image",
                    "render" : function(data, type, row){
                        return '<img src="/storage/' +data+ '" '+ 'alt="plano" ' + '/>'
                    }
                },
                {"data" : "created_at"},
                {"data" : "updated_at"},
                {"data" : "caleg1"},
                {"data" : "suara1"},
                {"data" : "caleg2"},
                {"data" : "suara2"},
                {"data" : "caleg3"},
                {"data" : "suara3"},
                {"data" : "caleg4"},
                {"data" : "suara4"},
                {"data" : "caleg5"},
                {"data" : "suara5"},
                {"data" : "caleg6"},
                {"data" : "suara6"},
                {"data" : "caleg7"},
                {"data" : "suara7"},
                {"data" : "caleg8"},
                {"data" : "suara8"},
                {"data" : "caleg9"},
                {"data" : "suara9"},
                {"data" : "caleg10"},
                {"data" : "suara10"}
                // {"data" : "action"}
            ]
        });
    });
</script>