<x-app-layout>
    {{-- @dd($posts) --}}
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Master User') }}
            </h2>
            <x-button-group-init>
                <x-button-group-content-middle :href="route('userCreate')">
                    <i class="fa fa-plus text-blue-600 text-lg"></i>
                </x-button-group-content-middle>
            </x-button-group-init>
        </div>
    </x-slot>

    <div class="max-w-sm sm:max-w-7xl mx-auto my-10">
        <table id="userTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telp</th>
                    <th>Role</th>
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
        $('#userTable').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "fixedHeader": true,
            "ajax": "{{ route('ApiMasterUser') }}",
            "columns" : [
                {"data" : "id"},
                {"data" : "name"},
                {"data" : "email"},
                {"data" : "telp"},
                {"data" : "role"},
                {"data" : "created_at"},
                {"data" : "updated_at"},
                {"data" : "action"}
            ]
        });
    });
</script>