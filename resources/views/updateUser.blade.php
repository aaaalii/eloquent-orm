@extends('layout');

@section('title')
    Update Student Data
@endsection

@section('content')
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter student's name" value="{{ $student->name }}">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" placeholder="Enter student's age" value="{{ $student->age }}">
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Enter student's city" value="{{ $student->city }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
@endsection