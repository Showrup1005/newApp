@extends('layout.master')
@section('title')
    Student Page
@endsection
@section('heading')
    Student Details
@endsection
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->date_of_birth}}</td>
            <td>{{$student->address}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
    
