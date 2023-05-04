@if (url()->current() == route('ApiMasterKecamatan'))
    <a href="{{ route('kecamatanEdit', ['id' => $model->id]) }}" >
        <i class="fa fa-pencil-square text-yellow-300 text-3xl"></i>
    </a>
    <button class="inline" type="button" onclick="return validateDelete()">
        <i class="fa fa-trash text-red-600 text-2xl" role="button"></i>
    </button>
    <form class="inline" action="{{ route('kecamatanDestroy', ['id' => $model->id]) }}" method="post">
        @csrf
        @method('delete')
        <button id="confirmDelete{{ $model->id }}" class="hidden"></button>
    </form>
@elseif (url()->current() == route('ApiMasterKelurahan'))
    <a href="{{ route('kelurahanEdit', ['id' => $model->id]) }}" >
        <i class="fa fa-pencil-square text-yellow-300 text-3xl"></i>
    </a>
    <div class="inline" onclick="return validateDelete()">
        <i class="fa fa-trash text-red-600 text-2xl" role="button"></i>
    </div>
    <form action="{{ route('kelurahanDestroy', ['id' => $model->id]) }}" method="post">
        @csrf
        @method('delete')
        <button id="confirmDelete{{ $model->id }}" class="hidden"></button>
    </form>
@elseif (url()->current() == route('ApiMasterCaleg'))
    <a href="{{ route('calegEdit', ['id' => $model->id]) }}" >
        <i class="fa fa-pencil-square text-yellow-300 text-3xl"></i>
    </a>
    <div class="inline" onclick="return validateDelete()">
        <i class="fa fa-trash text-red-600 text-2xl" role="button"></i>
    </div>
    <form action="{{ route('calegDestroy', ['id' => $model->id]) }}" method="post">
        @csrf
        @method('delete')
        <button id="confirmDelete{{ $model->id }}" class="hidden"></button>
    </form>
@elseif (url()->current() == route('ApiMasterPartai'))
    <a href="{{ route('partaiEdit', ['id' => $model->id]) }}" >
        <i class="fa fa-pencil-square text-yellow-300 text-3xl"></i>
    </a>
    <div class="inline" onclick="return validateDelete()">
        <i class="fa fa-trash text-red-600 text-2xl" role="button"></i>
    </div>
    <form action="{{ route('partaiDestroy', ['id' => $model->id]) }}" method="post">
        @csrf
        @method('delete')
        <button id="confirmDelete{{ $model->id }}" class="hidden"></button>
    </form>
@elseif (url()->current() == route('ApiMasterUser'))
    <a href="{{ route('userEdit', ['id' => $model->id]) }}" >
        <i class="fa fa-pencil-square text-yellow-300 text-3xl"></i>
    </a>
    <div class="inline" onclick="return validateDelete()">
        <i class="fa fa-trash text-red-600 text-2xl" role="button"></i>
    </div>
    <form action="{{ route('userDestroy', ['id' => $model->id]) }}" method="post">
        @csrf
        @method('delete')
        <button id="confirmDelete{{ $model->id }}" class="hidden"></button>
    </form>
@elseif (url()->current() == route('ApiDataLengkap'))
    <a href="{{ route('dataLengkapEdit', ['id' => $model->uuid]) }}" >
        <i class="fa fa-pencil-square text-yellow-300 text-3xl"></i>
    </a>
    <div class="inline" onclick="return validateDelete()">
        <i class="fa fa-trash text-red-600 text-2xl" role="button"></i>
    </div>
    <form action="{{ route('dataLengkapDelete', ['id' => $model->id]) }}" method="post">
        @csrf
        @method('delete')
        <button id="confirmDelete{{ $model->id }}" class="hidden"></button>
    </form>
@elseif (url()->current() == route('ApiDataLengkapMember', ['user_id' => $model->user_id]))
    <a href="{{ route('dataLengkapMemberEdit', ['id' => $model->uuid]) }}" >
        <i class="fa fa-pencil-square text-yellow-300 text-3xl"></i>
    </a>
    <div class="inline" onclick="return validateDelete()">
        <i class="fa fa-trash text-red-600 text-2xl" role="button"></i>
    </div>
    <form action="{{ route('dataLengkapMemberDelete', ['id' => $model->id]) }}" method="post">
        @csrf
        @method('delete')
        <button id="confirmDelete{{ $model->id }}" class="hidden"></button>
    </form>
@endif

<script>
    var model = {{ Js::from($model->id) }}
</script>