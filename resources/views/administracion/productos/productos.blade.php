@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Productos</h1>
@stop

@section('content')
<div class="container mt-5">

    <div class="responsive-table">

        <!--<div class="d-flex justify-content-end align-content-center">
                <form class="form-inline">
                    <div class="form-group mx-sm-3 mb-2 mr-4">
                        <input type="search" class="form-control searchInput"  placeholder="Buscar producto">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                </form>-->

    </div>
    <div>
        <a href="{{ route('agregarproductos') }}" class="btn btn-primary mb-2">Agregar nuevo productos</a>
    </div>
    <div class="responsive-table">
        <table class="table table-striped mt-4 text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre </th>
                    <!--<th scope="col">Categoría</th>-->
                    <th scope="col">Cantidad disponible</th>
                    <th scope="col">Unidad de medida</th>
                    <!-- <th scope="col">Obtener</th>-->
                    <th scope="col">Acción</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <!--<td></td>-->
                    <td>{{ $producto->cantidad }}</td>
                    <td>{{ $producto->unidad_de_medida }}</td>
                    <td>

                        <form method="POST" action="{{ url('productos/' . $producto->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <a href="{{ url('productos/' . $producto->id . '/edit') }}"><i class="far fa-edit text-blue mr-3"></i></a>

                            <form method="Post" action="{{ route('productos.destroy', $productos) }}">
                                @csrf @method('delete')
                                <button class="bg-transparent border-0" type="submit"
                                    onclick="return confirm('Esta seguro de eliminar el dato');"><i
                                    class="far fa-trash-alt text-red"></i></button>
                            </form>
                        </form>

                    </td>
                    @endforeach

            </tbody>
        </table>

    </div>
</div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
