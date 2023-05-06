@if (url()->current() == route('ApiMasterKecamatan'))
    <a href="{{ route('kecamatanEdit', ['id' => $model->id]) }}" >
        <i class="fa fa-pencil-square text-yellow-300 text-3xl"></i>
    </a>
@elseif (url()->current() == route('ApiMasterKelurahan'))
    <a href="{{ route('kelurahanEdit', ['id' => $model->id]) }}" >
        <i class="fa fa-pencil-square text-yellow-300 text-3xl"></i>
    </a>
@elseif (url()->current() == route('ApiMasterCaleg'))
    <a href="{{ route('calegEdit', ['id' => $model->id]) }}" >
        <i class="fa fa-pencil-square text-yellow-300 text-3xl"></i>
    </a>
@elseif (url()->current() == route('ApiMasterPartai'))
    <a href="{{ route('partaiEdit', ['id' => $model->id]) }}" >
        <i class="fa fa-pencil-square text-yellow-300 text-3xl"></i>
    </a>
@elseif (url()->current() == route('ApiMasterUser'))
    <a href="{{ route('userEdit', ['id' => $model->id]) }}" >
        <i class="fa fa-pencil-square text-yellow-300 text-3xl"></i>
    </a>
@elseif (url()->current() == route('ApiDataLengkap'))
    <a href="{{ route('dataLengkapEdit', ['id' => $model->uuid]) }}" >
        <i class="fa fa-pencil-square text-yellow-300 text-3xl"></i>
    </a>
@elseif (url()->current() == route('ApiDataLengkapMember', ['user_id' => $model->user_id]))
    <a href="{{ route('dataLengkapMemberEdit', ['id' => $model->uuid]) }}" >
        <i class="fa fa-pencil-square text-yellow-300 text-3xl"></i>
    </a>
@endif

<script>
    var model = {{ Js::from($model->id) }}
</script>