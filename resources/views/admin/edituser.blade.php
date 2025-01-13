@extends('admin.layout')

@section('title', 'Edit User')

@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4" style="width: 30rem;">
            <h3 class="text-center mb-4">Edit User</h3>
            <form action="{{ route('admin.updateuser', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder=""
                        value="{{ $user->name }}">
                    <label for="name" class="form-label">Enter your name</label>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="email" name="email" placeholder=""
                        value="{{ $user->email }}">
                    <label for="email" class="form-label">Enter your email</label>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <label for="role">select Role</label>
                <select name="role" id="role" class="form-select">
                    @if ($user->role === 1)
                        <option value="{{ $user->role }}" selected>Is Admin</option>
                        <option value="0">Is Not Admin</option>
                    @elseif ($user->role === 0)
                        <option value="1">Is Admin</option>
                        <option value="{{ $user->role }}" selected>Is Not Admin</option>
                    @endif
                </select>
                @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                <hr>

                <small>Optional</small>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="">
                    <label for="password" class="form-label">Create a new password</label>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="">
                    <label for="password_confirmation" class="form-label">Confirm your password</label>
                    @error('confirm_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-primary w-100">Update</button>
                <a href="{{ route('admin.users') }}" class="btn btn-outline-primary w-100 mt-3">Go back</a>
            </form>
        </div>
    </div>
@endsection
