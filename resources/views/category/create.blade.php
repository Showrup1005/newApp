@extends('layout.master')
@section('title')
    Category Page
@endsection

@section('content')
<div class="my-5"></div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category</h4>
                    <a href="{{route('category')}}" class="btn btn-danger float-right">Click me</a>
                </div>
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <div class="mb-5">
                            <label for="name">Name: </label>
                            <input type="text" name="name" id="name" class="form-control">
                            @error('name')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="description">Description: </label>
                            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                            @error('description')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="status">Status: </label>
                            <input type="checkbox" name="status" id="" checked>
                        </div>
                        <div class="mb-5">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection