<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Division;

class EmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable|string|max:20',
            'division_id' => 'required|exists:divisions,id',
            'position' => 'required|string|max:100',
            'join_date' => 'required|date',
            'status' => 'required|in:active,inactive',
            'address' => 'nullable|string'
        ];

        // Jika update, ignore unique email untuk record yang sedang diupdate
        if ($this->method() === 'PUT') {
            $rules['email'] = 'required|email|unique:employees,email,' . $this->employee->id;
        }

        return $rules;
    }
}

