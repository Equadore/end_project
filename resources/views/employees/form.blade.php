@extends('layouts.app')

@section('content')
<div class="employee-content">
    <div class="page-title">
        <h2>{{ isset($employee) ? 'Edit Karyawan' : 'Tambah Karyawan' }}</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ isset($employee) ? route('employees.update', $employee) : route('employees.store') }}" 
                  method="POST">
                @csrf
                @if(isset($employee))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $employee->name ?? '') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email', $employee->email ?? '') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Divisi</label>
                    <select name="division_id" class="form-control @error('division_id') is-invalid @enderror">
                        <option value="">Pilih Divisi</option>
                        @foreach($divisions as $division)
                            <option value="{{ $division->id }}"
                                    {{ old('division_id', $employee->division_id ?? '') == $division->id ? 'selected' : '' }}>
                                {{ $division->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('division_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tambahkan field lainnya sesuai kebutuhan -->

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ isset($employee) ? 'Update' : 'Simpan' }}
                    </button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
