@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    @if(auth()->user()->images)
                        @php
                            $images = json_decode(auth()->user()->images, true);
                        @endphp
                        <div class="d-flex flex-wrap">
                            @foreach($images as $image)
                                <div class="m-2">
                                    <img src="{{ asset('images/' . $image) }}" alt="Uploaded Image" width="100">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
