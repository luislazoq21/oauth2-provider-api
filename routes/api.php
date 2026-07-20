<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// probar api
Route::get('/ping', fn() => response()->json(['message' => '¡API activa!']));

// register
Route::post('/register', [AuthController::class, 'register']);
// login
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:api')->group(function () {
    // ruta protegida que requiere el scope 'read-tasks' (Lectura)
    Route::get('/tasks', function () {
        return response()->json([
            ['id' => 1, 'title' => 'Aprender Laravel Passport', 'status' => 'En progreso'],
            ['id' => 2, 'title' => 'Configurar los Middleware de Scopes', 'status' => 'Completado']
        ]);
    })->middleware('scope:read-tasks');

    // ruta protegida que requiere el scope 'write-tasks' (Escritura)
    Route::post('/tasks', function () {
        return response()->json([
            'message' => '¡Has creado una tarea de forma simulada exitosamente!'
        ]);
    })->middleware('scope:write-tasks');
});




// ruta protegida estándar (Solo requiere estar autenticado)
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');
