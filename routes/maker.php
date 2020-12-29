<?php


use Illuminate\Support\Facades\Route;



######################### Begin project Routes ########################
Route::group(['prefix' => 'Project'], function () {
    Route::get('/index',[\App\Http\Controllers\Maker\ProjectController::class,'index']) -> name('project.index');
    Route::get('/create',[\App\Http\Controllers\Maker\ProjectController::class,'create']) -> name('project.create');
    Route::get('/edit/{id}',[\App\Http\Controllers\Maker\ProjectController::class,'edit']) -> name('project.edit');
    Route::put('/update/{id}',[\App\Http\Controllers\Maker\ProjectController::class,'update']) -> name('project.update');
    Route::post('/store',[\App\Http\Controllers\Maker\ProjectController::class,'store']) -> name('project.store');
    Route::delete('/delete/{id}',[\App\Http\Controllers\Maker\ProjectController::class,'destroy']) -> name('project.delete');

});
######################### End  project Routes ########################

######################### Begin project Routes ########################
Route::group(['prefix' => 'Task'], function () {
    Route::get('/show/{id}',[\App\Http\Controllers\maker\ProjectTasksController::class,'show']) -> name('task.show');
    Route::get('/create/{id}',[\App\Http\Controllers\maker\ProjectTasksController::class,'create']) -> name('task.create');
    Route::get('/edit/{id}',[\App\Http\Controllers\maker\ProjectTasksController::class,'edit']) -> name('task.edit');
    Route::put('/update/{id}',[\App\Http\Controllers\maker\ProjectTasksController::class,'update']) -> name('task.update');
    Route::post('/store',[\App\Http\Controllers\maker\ProjectTasksController::class,'store']) -> name('task.store');
    Route::delete('/delete/{id}',[\App\Http\Controllers\maker\ProjectTasksController::class,'destroy']) -> name('task.delete');

});
######################### End  project Routes ########################
