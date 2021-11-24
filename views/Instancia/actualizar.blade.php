@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('MODIFICAR INSTANCIA') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('instancia.update', $instancias->idInstancia) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="mb-3">
                                <label for="txtResponsable" class="form-label">NOMBRE:</label>
                                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                                    value="{{ $instancias->nombre }}" required
                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>
                            <div class="mb-3">
                                <label for="txtResponsable" class="form-label">RESPONSABLE</label>
                                <input type="text" class="form-control" name="txtResponsable" id="txtResponsable"
                                    value="{{ $instancias->responsable }}" required
                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>
                            <div class="mb-3">
                                <label for="txtEmail" class="form-label">EMAIL</label>
                                <input type="email" class="form-control" name="txtEmail" id="txtEmail"
                                    value="{{ $instancias->email }}" required
                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>
                            <div class="mb-3">
                                <label for="txtTelefono" class="form-label">TELÉFONO</label>
                                <input type="tel" class="form-control" name="txtTelefono" id="txtTelefono"
                                    value="{{ $instancias->telefono }}" required
                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group">
                                <label for="sltGiro" class="form-label">GIRO</label>
                                <select name="sltGiro" class="form-control" onChange="agregarID(sltGiro, txtIdGiro)"
                                    required>
                                    <option>ELIJA EL GIRO</option>
                                    @foreach ($giros as $giro)
                                        @if ($giro->idGiro === $instancias->idGiro)
                                            <option selected value="{{ $giro->idGiro }}">{{ $giro->nomGiro }}</option>
                                        @else
                                            <option value="{{ $giro->idGiro }}">{{ $giro->nomGiro }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sltSector" class="form-label">SECTOR</label>
                                <select name="sltSector" class="form-control" onChange="agregarID(sltSector, txtIdSector)"
                                    required>
                                    <option>ELIJA EL SECTOR</option>
                                    @foreach ($sectores as $sector)
                                        @if ($sector->idSector === $instancias->idSector)
                                            <option selected value="{{ $sector->idSector }}">{{ $sector->nomSector }}
                                            </option>
                                        @else
                                            <option value="{{ $sector->idSector }}">{{ $sector->nomSector }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sltTipoSector" class="form-label">TIPO DE SECTOR</label>
                                <select name="sltTipoSector" class="form-control"
                                    onChange="agregarID(sltTipoSector, txtIdTipoSec)" required>
                                    <option selected>ELIJA EL TIPO DE SECTOR</option>
                                    @foreach ($tipoSectores as $tipoSector)
                                        @if ($tipoSector->idTipoSec === $instancias->idTipoSec)
                                            <option selected value="{{ $tipoSector->idTipoSec }}">
                                                {{ $tipoSector->nomTipoSec }}
                                            </option>
                                        @else
                                            <option value="{{ $tipoSector->idTipoSec }}">{{ $tipoSector->nomTipoSec }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sltTamanio" class="form-label">TAMAÑO</label>
                                <select name="sltTamanio" class="form-control"
                                    onChange="agregarID(sltTamanio, txtIdTamanio)" required>
                                    <option>ELIJA EL TAMAÑO</option>
                                    @foreach ($tamanios as $tamanio)
                                        @if ($tamanio->idTamanio === $instancias->idTamanio)
                                            <option selected value="{{ $tamanio->idTamanio }}">
                                                {{ $tamanio->nomTamanio }}
                                            </option>
                                        @else
                                            <option value="{{ $tamanio->idTamanio }}">{{ $tamanio->nomTamanio }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sltAreaConocimiento" class="form-label">ÁREA DE CONOCIMIENTO</label>
                                <select name="sltAreaConocimiento" class=" form-control"
                                    onChange="agregarID(sltAreaConocimiento, txtIdAreaC)" required>
                                    <option selected>ELIJA EL ÁREA DE CONOCIMIENTO</option>
                                    @foreach ($areaConocimientos as $areaConocimiento)
                                        @if ($areaConocimiento->idAreaC === $instancias->idAreaC)
                                            <option selected value="{{ $areaConocimiento->idAreaC }}">
                                                {{ $areaConocimiento->nomAreaC }}</option>
                                        @else
                                            <option value="{{ $areaConocimiento->idAreaC }}">
                                                {{ $areaConocimiento->nomAreaC }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sltAlcance" class="form-label">ALCANCE</label>
                                <select name="sltAlcance" class=" form-control"
                                    onChange="agregarID(sltAlcance, txtIdAreaC)" required>
                                    <option selected>ELIJA EL ALCANCE</option>
                                    @foreach ($alcances as $alcance)
                                        @if ($alcance->idAlcance === $instancias->idAlcance)
                                            <option selected value="{{ $alcance->idAlcance }}">
                                                {{ $alcance->nombre }}</option>
                                        @else
                                            <option value="{{ $alcance->idAlcance }}">
                                                {{ $alcance->nombre }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" hidden name="txtIdGiro" id="txtIdGiro" value="{{ $instancias->idGiro }}">
                            <input type="text" hidden name="txtIdSector" id="txtIdSector"
                                value="{{ $instancias->idSector }}">
                            <input type="text" hidden name="txtIdTipoSec" id="txtIdTipoSec"
                                value="{{ $instancias->idTipoSec }}">
                            <input type="text" hidden name="txtIdTamanio" id="txtIdTamanio"
                                value="{{ $instancias->idTamanio }}">
                            <input type="text" hidden name="txtIdAreaC" id="txtIdAreaC"
                                value="{{ $instancias->idAreaC }}">
                            <input type="text" hidden name="txtIdAlcance" id="txtIdAlcance"
                                value="{{ $instancias->idAlcance }}">
                            <button type="submit" class="btn btn-primary">MODIFICAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
