<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::with('division');

        // Filter berdasarkan pencarian
        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%");
        }

        // Filter berdasarkan divisi
        if ($request->division_id) {
            $query->where('division_id', $request->division_id);
        }

        // Filter berdasarkan status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $employees = $query->paginate(10);
        $divisions = Division::all();

        return view('employees.index', compact('employees', 'divisions'));
    }

    public function create()
    {
        $divisions = Division::all();
        return view('employees.create', compact('divisions'));
    }

    public function store(EmployeeRequest $request)
    {
        Employee::create($request->validated());
        return redirect()->route('employees.index')
            ->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function edit(Employee $employee)
    {
        $divisions = Division::all();
        return view('employees.edit', compact('employee', 'divisions'));
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('employees.index')
            ->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')
            ->with('success', 'Karyawan berhasil dihapus');
    }
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }
}
