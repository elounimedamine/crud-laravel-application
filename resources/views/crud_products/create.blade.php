@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('create-post') }}" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name_product" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name_product" placeholder="Enter name of product"
                            name="name_product">
                        @error('name_product')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="details_product" class="form-label">Details:</label>
                        <input type="text" class="form-control" id="details_product" placeholder="Enter details of product"
                            name="details_product">
                        @error('details_product')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Category:</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}"> {{ $categorie->name_category }} </option>
                                @endforeach
                            </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Add</button>
                    <a class="btn btn-dark mt-5" href="{{ route('index') }}">Back To HomePage</a>
                </form>
            </div>
        </div>
    </div>
@endsection
