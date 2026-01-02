<?php
namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::latest()->paginate(10);
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:empleados',
            'telefono' => 'nullable|string',
            'cargo' => 'required|string',
            'salario' => 'nullable|numeric',
            'fecha_ingreso' => 'required|date',
        ]);

        Empleado::create($validated);
        return redirect()->route('empleados.index')
            ->with('success', 'Empleado creado exitosamente');
    }

    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:empleados,email,' . $empleado->id,
            'telefono' => 'nullable|string',
            'cargo' => 'required|string',
            'salario' => 'nullable|numeric',
            'fecha_ingreso' => 'required|date',
            'activo' => 'boolean',
        ]);

        $empleado->update($validated);
        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado exitosamente');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado exitosamente');
    }
}
