@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('create-category-post') }}" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name_category" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name_category" placeholder="Enter name of category"
                            name="name_category">
                        @error('name_category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="details_category" class="form-label">Details:</label>
                        <input type="text" class="form-control" id="details_category" placeholder="Enter details of category"
                            name="details_category">
                        @error('details_category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a class="btn btn-dark" href="{{ route('index-category') }}">Back To HomePage</a>
                </form>
            </div>
        </div>
    </div>
@endsection
