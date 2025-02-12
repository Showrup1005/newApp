@extends('layout.master')
@section('title')
    Upload Page
@endsection

@section('content')
<div class="my-5"></div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('image.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-5">
                            <label for="imageUpload">Name: </label>
                            <input type="file" name="imageUpload" id="imageUpload" class="form-control">
                            @error('imageUpload')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
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