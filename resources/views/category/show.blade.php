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
                    <h4>Show Category Detials</h4>
                    <a href="{{route('category.index')}}" class="btn btn-danger float-right">Click me</a>
                </div>
                <div class="card-body">
                   <div class="mb-3">
                    <label for="">Name</label>
                    <p>{{$category->name}}</p>
                   </div>
                   <div class="mb-3">
                    <label for="">Description</label>
                    <p>{{$category->description}}</p>
                   </div>
                   <div class="mb-3">
                    <label for="">Status</label>
                    <p>{{$category->status == true ? 1 : 0}}</p>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection