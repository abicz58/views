@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('areaconoc.update', $areasc->idAreaC) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="txtNombre" class="form-label">Area Conocimiento</label>
                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                    value="{{ $areasC->nomAreaC }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
