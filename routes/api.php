<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

$routeWeb = 'routes/api/';
$basePath = base_path($routeWeb);
if (is_dir($basePath)) {
    $files = File::allFiles($basePath);
    foreach ($files as $file) {
        Route::group([], $basePath . $file->getFilename());
    }
}
