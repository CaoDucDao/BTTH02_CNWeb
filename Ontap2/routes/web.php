<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;

Route::get("/", [EmployeesController::class, "index"])->name("employees.index");
Route::get("/employees/create", [EmployeesController::class, "create"])->name("employees.create");
Route::post("/employees", [EmployeesController::class, "store"])->name("employees.store");
Route::get("/employees/{id}", [EmployeesController::class, "show"])->name("employees.show");
Route::get("/employees/{id}/edit", [EmployeesController::class, "edit"])->name("employees.edit");
Route::put("/employees/{id}", [EmployeesController::class, 'update'])->name("employees.update");
Route::delete("/employess/{id}", [EmployeesController::class, 'destroy'])->name("employees.destroy");