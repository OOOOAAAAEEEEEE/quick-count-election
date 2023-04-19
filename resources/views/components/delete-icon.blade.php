@if (auth()->user()->role == 'Superadmin')
    <div class="inline" onclick="validateDelete()">
        <i class="fa fa-trash text-red-600" role="button"></i>
    </div>
    <form {{ $attributes }} method="post">
        @csrf
        @method('delete')
        <button id="confirmDelete" class="hidden"></button>
    </form>
@endif