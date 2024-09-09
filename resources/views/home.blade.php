@extends('layout')

@section('title')
    All Students
@endsection

@section('content')
    <a href="{{ route('students.create') }}" class="btn btn-success btn-sm">Add Student</a>
    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8"> <!-- Adjust the number to set table width -->
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th style="width: 25%">Name</th>
                            <th style="width: 10%">Age</th>
                            <th style="width: 25%">City</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)    
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->age }}</td>
                            <td>{{ $student->city }}</td>
                            <td>
                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary btn-sm">
                                    View
                                </a>
                            </td>
                            <td>     
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">
                                    Update
                                </a>
                            </td>
                            <td>     
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    {{ $students->links() }}
            </div>
        </div>
    </div>
    
@endsection