@extends('layouts.plantillabase')

@section('title','Editar Empleado')
@section('h-title','Editar Empleado')
@section('card-title','Formulario de Actualización')

@section('content')
    <form action="{{ route('empleados.update', $empleado) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" 
                    value="{{ old('nombre', $empleado->nombre) }}" required>
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" 
                    value="{{ old('apellido', $empleado->apellido) }}" required>
                @error('apellido')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email', $empleado->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" 
                    value="{{ old('telefono', $empleado->telefono) }}">
                @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Cargo</label>
                <input type="text" name="cargo" class="form-control @error('cargo') is-invalid @enderror" 
                    value="{{ old('cargo', $empleado->cargo) }}" required>
                @error('cargo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Salario</label>
                <input type="number" step="0.01" name="salario" 
                    class="form-control @error('salario') is-invalid @enderror" 
                    value="{{ old('salario', $empleado->salario) }}">
                @error('salario')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" 
                    class="form-control @error('fecha_ingreso') is-invalid @enderror" 
                    value="{{ old('fecha_ingreso', $empleado->fecha_ingreso->format('Y-m-d')) }}" required>
                @error('fecha_ingreso')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="form-check">
                    <input type="hidden" name="activo" value="0">
                    <input type="checkbox" name="activo" value="1" 
                        class="form-check-input @error('activo') is-invalid @enderror" 
                        id="activo" {{ old('activo', $empleado->activo) ? 'checked' : '' }}>
                    <label class="form-check-label" for="activo">
                        Empleado Activo
                    </label>
                    @error('activo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Actualizar
            </button>
            <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancelar
            </a>
        </div>
    </form>
@endsection
