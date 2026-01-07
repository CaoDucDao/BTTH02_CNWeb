<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\enployees;
use Illuminate\Http\Request;
use App\Models\employee;
class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = employee::with("department")->paginate(10);
        return view("employees.index", compact("employees"));



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = department::all();
        return view("employees.create", compact("departments"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required',
            'email' => 'required',
            "phone" => 'required',
            "department_id" => 'required',
            "position" => 'required',
            "salary" => 'required'

        ]);
        employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'da them thanh cong');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee = employee::with('department')->findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employees = employee::findOrfail($id);
        $departments = department::all();
        return view('employees.edit', compact('employees', 'departments'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $employees = employee::findOrfail($id);
        $request->validate([
            "name" => 'required',
            'email' => 'required',
            "phone" => 'required',
            "department_id" => 'required',
            "position" => 'required',
            "salary" => 'required'

        ]);

        $employees->update($request->all());
        return redirect()->route('employees.index')->with('success', 'ban da cap nhap thanh cong');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employees = employee::findOrfail($id);
        $employees->delete();
        return redirect()->route('employees.index')->with('success', 'ban da xoa thanh cong');

    }
}