@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('create-post') }}" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="Name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name of product"
                            name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Details:</label>
                        <input type="text" class="form-control" id="details" placeholder="Enter details of product"
                            name="details">
                        @error('details')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection