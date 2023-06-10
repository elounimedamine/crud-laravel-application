@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('edit-category-post', $categorie->id) }}" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name_category" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name_category" placeholder="Enter name of categorie"
                            name="name_category" value="{{ $categorie->name_category }}">
                        @error('name_category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="details_category" class="form-label">Details:</label>
                        <input type="text" class="form-control" id="details_category" placeholder="Enter details of categorie"
                            name="details_category" value="{{ $categorie->details_category }}">
                        @error('details_category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Edit</button>
                    <a class="btn btn-dark" href="{{ route('index-category') }}">Back To HomePage</a>
                </form>
            </div>
        </div>
    </div>
@endsection
