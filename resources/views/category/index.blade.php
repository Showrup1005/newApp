@extends('layout.master')
@section('title')
    Category Page
@endsection

@section('content')
<div class="my-5"></div>
  @session('msg')
    <div class="alert alert-success">
        {{session('msg')}}
    </div> 
  @endsession
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Category List</h4>
                    <a href="{{route('category.create')}}" class="btn btn-danger float-right">Click me</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category) 
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>{{$category->status == true ? 1:0}}</td>
                                    <td>
                                        <a href="{{route('category.edit', $category->id)}}" class="btn btn-success">Edit</a>
                                        <a href="{{route('category.show', $category->id)}}" class="btn btn-info">Show</a>
                                        <form action="{{route('category.destroy', $category->id)}}" method="post" class="d-inline" onsubmit="return confirm('Are you sure to delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection