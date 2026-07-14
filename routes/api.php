<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// 1. Ruta pública de bienvenida (para probar que la API responde)
Route::get('/ping', function () {
    return response()->json(['message' => '¡API activa!']);
});

// 2. Ruta protegida estándar (Solo requiere estar autenticado)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// 3. Ruta protegida que requiere el scope 'read-tasks' (Lectura)
Route::get('/tasks', function () {
    return response()->json([
        ['id' => 1, 'title' => 'Aprender Laravel Passport', 'status' => 'En progreso'],
        ['id' => 2, 'title' => 'Configurar los Middleware de Scopes', 'status' => 'Completado']
    ]);
})->middleware(['auth:api', 'scope:read-tasks']);

// 4. Ruta protegida que requiere el scope 'write-tasks' (Escritura)
Route::post('/tasks', function () {
    return response()->json([
        'message' => '¡Has creado una tarea de forma simulada exitosamente!'
    ]);
})->middleware(['auth:api', 'scope:write-tasks']);
