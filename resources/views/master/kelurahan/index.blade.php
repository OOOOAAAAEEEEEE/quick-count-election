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
        <table id="kecamatanTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Dibuat</th>
                    <th>Diedit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td> {{ $post->name }}</td>
                        <td> {{ $post->created_at }}</td>
                        <td> {{ $post->updated_at }}</td>
                        <td> 
                            <x-edit-icon :href="route('kelurahanEdit', ['id' => $post->id])"></x-edit-icon>
                            <x-delete-icon :action="route('kelurahanDestroy', ['id' => $post->id])"></x-delete-icon>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

<script>
    $(document).ready( function () {
        $('#kecamatanTable').DataTable();
    } );
</script>