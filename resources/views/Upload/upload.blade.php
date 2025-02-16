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
                    @session('success')
                    <div class="alert alert-success" role="alert"> 
                        {{ $value }}
                    </div>
                    <img src="images/{{ Session::get('image') }}" width="40%">
                @endsession
                
                <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
            
                    <div class="mb-3">
                        <label class="form-label" for="inputImage">Image:</label>
                        <input 
                            type="file" 
                            name="image" 
                            id="inputImage"
                            class="form-control @error('image') is-invalid @enderror">
            
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
             
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Upload</button>
                    </div>
                 
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection