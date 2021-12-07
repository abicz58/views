@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-11">
                <div class="card">
                    <div class="card-header">{{ __('LISTADO DE INSTANCIAS') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="div-flex">
                            <button onclick="location.href='{{ route('instancia.create') }}'" class="btn btn-primary ">
                                <i class="bi bi-plus-square-dotted"></i> NUEVO</button>
                            <div class="input-group col-5">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                <input id="busqueda" type="text" class="form-control" placeholder="BÚSQUEDA"
                                    style="text-transform: uppercase;" onkeyup='busquedaTabla()'>
                            </div>
                        </div>
                        <table class="table" id="tabla">
                            <thead>
                                <tr>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">RESPONSABLE</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">TELÉFONO</th>
                                    <th scope="col">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($instancias as $instancia)
                                    <tr>
                                        <td> {{ $instancia->nombre }} </td>
                                        <td> {{ $instancia->responsable }} </td>
                                        @if ($instancia->email === null)
                                            <td>SIN EMAIL</td>
                                        @else
                                            <td> {{ $instancia->email }} </td>
                                        @endif
                                        @if ($instancia->telefono === null)
                                            <td>SIN TELÉFONO</td>
                                        @else
                                            <td> {{ $instancia->telefono }} </td>
                                        @endif
                                        <td>
                                            <div style="display: flex; justify-content: start;">
                                                <button style="margin-right: 1rem"
                                                    onclick="location.href='{{ route('instancia.show', $instancia->idInstancia) }}'"
                                                    class="btn btn-outline-secondary"><i class="bi bi-info-circle"></i>
                                                    DETALLE</button>
                                                <button style="margin-right: 1rem"
                                                    onclick="location.href='{{ route('instancia.edit', $instancia->idInstancia) }}'"
                                                    class="btn btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                                <form action="{{ route('instancia.destroy', $instancia->idInstancia) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm( '¿ESTÁ SEGURO DE ELIMINAR {{ $instancia->nombre }}?') ">
                                                        <i class="bi bi-eraser"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
