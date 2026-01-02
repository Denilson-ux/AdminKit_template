@extends('layouts.plantillabase')

@section('title','Empleados')
@section('h-title','Gestión de Empleados')
@section('card-title','Lista de Empleados')

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-message">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="mb-3 text-end">
        <a href="{{ route('empleados.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Empleado
        </a>
    </div>

    @if($empleados->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Cargo</th>
                        <th>Fecha Ingreso</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado->nombre }} {{ $empleado->apellido }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->cargo }}</td>
                        <td>{{ $empleado->fecha_ingreso->format('d/m/Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $empleado->activo ? 'success' : 'danger' }}">
                                {{ $empleado->activo ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('empleados.show', $empleado) }}" 
                                class="btn btn-sm btn-info" title="Ver">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('empleados.edit', $empleado) }}" 
                                class="btn btn-sm btn-warning" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('empleados.destroy', $empleado) }}" 
                                method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('¿Estás seguro de eliminar este empleado?')"
                                    title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $empleados->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <i class="fas fa-users fa-3x text-muted mb-3"></i>
            <p class="text-muted">No hay empleados registrados</p>
            <a href="{{ route('empleados.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Crear Primer Empleado
            </a>
        </div>
    @endif
@endsection
