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
@endif