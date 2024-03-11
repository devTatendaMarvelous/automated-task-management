<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('home');
});

Route::controller(App\Http\Controllers\Auth\ResetPasswordController::class)->group(function () {
    Route::post('/password/sendmail', 'sendMail')->name('password.sendMail');
    Route::post('/password/updatep', 'update')->name('password.updateP');
});

Route::group(
    ['namespace' => 'App\Http\Controllers', 'middleware' => 'auth'],
    function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/users', 'index')->name('users');
            Route::get('/tabulate', 'tabulate');
            Route::get('/users/create', 'create')->name('users.create');
            Route::post('/users', 'store')->name('users');
            Route::post('/users/{id}/update', 'update')->name('users.update');
            Route::post('/users/{id}/updateProfile', 'updateProfile')->name('users.updateProfile');
            Route::get('/users/{id}/activate', 'activate')->name('users.activate');
            Route::get('/users/{id}/deactivate', 'deactivate')->name('users.deactivate');
            Route::get('/users/{id}/edit', 'edit')->name('users.edit');
            Route::get('/users/{id}/delete', 'destroy')->name('users.delete');
            Route::get('/users/{id}/profile', 'profile')->name('users.profile');
        });
        Route::controller(EmployeeController::class)->group(function () {
            Route::get('/employees/{type?}', 'index')->name('employees');
            Route::get('/add-employee', fn()=> view('employees.make'))->name('employees.create');
            Route::get('/employees/{id}/edit', 'edit')->name('employees.edit');
            Route::get('/employees/{id}/delete', 'destroy')->name('employees.delete');
            Route::post('/employees', 'store')->name('employees.store');
            Route::post('/employees/{id}/update', 'update')->name('employees.update');
            Route::get('/employees/{id}/activate', 'activate')->name('employees.activate');
            Route::get('/employees/{id}/show', 'show')->name('employees.show');
            Route::post('/employees/{id}/comment', 'comment')->name('employees.comment');


            Route::get('/employees/{id}/deactivate', 'deactivate')->name('employees.deactivate');
        });
        Route::controller(TaskController::class)->group(function () {
            Route::get('/tasks', 'index')->name('tasks');
            Route::get('/tasks/create', 'create')->name('tasks.create');
            Route::get('/tasks/{id}/edit', 'edit')->name('tasks.edit');
            Route::get('/tasks/{id}/delete', 'destroy')->name('tasks.delete');
            Route::get('/tasks/{id}/show', 'show')->name('tasks.show');
            Route::post('/tasks', 'store')->name('tasks.store');
            Route::post('/tasks/{id}/update', 'update')->name('tasks.update');
            Route::get('/tasks/{id}/activate', 'activate')->name('tasks.activate');
            Route::get('/tasks/{id}/deactivate', 'deactivate')->name('tasks.deactivate');
            Route::post('/tasks/{id}/checklists', 'checklistsUpdate')->name('checklists.update');
        });
        Route::controller(SalaryController::class)->group(function () {
            Route::get('/salaries', 'index')->name('salaries');
            Route::get('/salaries/create', 'create')->name('salaries.create');
            Route::get('/salaries/{id}/edit', 'edit')->name('salaries.edit');
            Route::get('/salaries/{id}/delete', 'destroy')->name('salaries.delete');
            Route::get('/salaries/{id}/show', 'show')->name('salaries.show');
            Route::get('/salaries/generate', 'generate')->name('salaries.generate');
        });

    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
