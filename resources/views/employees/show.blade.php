@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Employee Detail</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $employee->name }}</h5>
            <p class="card-text">
                <strong>Email:</strong> {{ $employee->email }}<br>
                <strong>Phone:</strong> {{ $employee->phone }}<br>
                <strong>Division:</strong> {{ $employee->division->name }}<br>
                <strong>Position:</strong> {{ $employee->position }}<br>
                <strong>Join Date:</strong> {{ $employee->join_date }}<br>
                <strong>Status:</strong> {{ $employee->status }}<br>
                <strong>Address:</strong> {{ $employee->address }}
            </p>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary">Edit</a>
    </div>
</div>
@endsection
