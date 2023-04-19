<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="my-10 max-w-7xl mx-auto">
        <table id="dashboardTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pengirim</th>
                    <th>TPS</th>
                    <th>Caleg</th>
                    <th>Perolehan Suara</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td></td>
                        <td>
                            {{-- <a href="{{ route('kecamatanEdit', ['id' => $post->id]) }}"> <i class="fa fa-pencil-square text-yellow-300"></i> </a>
                            <form class="inline" action="{{ route('kecamatanDestroy', ['id' => $post->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" ><i class="fa fa-trash text-red-600"></i></button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

<script>
    // $(document).ready( function () {
    //     $('#dashboardTable').DataTable();
    // } );
</script>