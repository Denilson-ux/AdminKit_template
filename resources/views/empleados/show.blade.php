@extends('layouts.plantillabase')

@section('title','Ver Empleado')
@section('h-title','Detalle del Empleado')
@section('card-title','Información del Empleado')

@section('content')
    <div class="mb-3 text-end">
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
        <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Nombre Completo:</label>
            <p>{{ $empleado->nombre }} {{ $empleado->apellido }}</p>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Email:</label>
            <p>{{ $empleado->email }}</p>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Teléfono:</label>
            <p>{{ $empleado->telefono ?? 'No especificado' }}</p>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Cargo:</label>
            <p>{{ $empleado->cargo }}</p>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Salario:</label>
            <p>{{ $empleado->salario ? 'Bs. ' . number_format($empleado->salario, 2) : 'No especificado' }}</p>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Fecha de Ingreso:</label>
            <p>{{ $empleado->fecha_ingreso->format('d/m/Y') }}</p>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Estado:</label>
            <p>
                <span class="badge bg-{{ $empleado->activo ? 'success' : 'danger' }}">
                    {{ $empleado->activo ? 'Activo' : 'Inactivo' }}
                </span>
            </p>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Fecha de Registro:</label>
            <p>{{ $empleado->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
@endsection
