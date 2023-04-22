<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Master Kelurahan') }}
            </h2>
            <x-button-group-init>
                <x-button-group-content-middle :href="route('kelurahanCreate')">
                    <i class="fa fa-plus text-blue-600 text-lg"></i>
                </x-button-group-content-middle>
            </x-button-group-init>
        </div>
    </x-slot>

    <div class="max-w-max sm:max-w-7xl mx-auto my-10">
        <table id="kelurahanTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kecamatan</th>
                    <th>Dibuat</th>
                    <th>Diedit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</x-app-layout>

<script>
    $(document).ready( function () {
        $('#kelurahanTable').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('ApiMasterKelurahan') }}",
            "columns" : [
                {"data" : "id"},
                {"data" : "name"},
                {"data" : "kecamatan_id"},
                {"data" : "created_at"},
                {"data" : "updated_at"},
                {"data" : "action"}
            ]
        });
    });
</script>