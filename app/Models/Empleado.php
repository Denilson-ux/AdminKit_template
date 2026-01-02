<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';
    
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'cargo',
        'salario',
        'fecha_ingreso',
        'activo'
    ];

    protected $casts = [
        'fecha_ingreso' => 'date',
        'activo' => 'boolean',
        'salario' => 'decimal:2'
    ];
}
