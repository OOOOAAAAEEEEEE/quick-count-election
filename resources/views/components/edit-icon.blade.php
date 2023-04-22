@if (url()->current() == route('ApiMasterKecamatan'))
    <a href="{{ route('kecamatanEdit', ['id' => $model->id]) }}" >
        <i class="fa fa-pencil-square text-yellow-300"></i>
    </a>
@elseif (url()->current() == route('ApiMasterKelurahan'))
    <a href="{{ route('kelurahanEdit', ['id' => $model->id]) }}" >
        <i class="fa fa-pencil-square text-yellow-300"></i>
    </a>
@endif