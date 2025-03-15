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
                    <h4>Back</h4>
                    <a href="{{route('category.index')}}" class="btn btn-danger float-right">Click me</a>
                </div>
                <div class="card-body">
                    <form action="{{route('category.update', $category->id)}}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="mb-5">
                            <label for="name">Name: </label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$category->name}}">
                            @error('name')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="description">Description: </label>
                            <textarea name="description" id="description" class="form-control" rows="3">{{$category->description}}</textarea>
                            @error('description')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="user_id">User: </label>
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $category->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="status">Status: </label>
                            <input type="checkbox" name="status" id="" value="{{$category->status}} == 1 ? 'checked':''">
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