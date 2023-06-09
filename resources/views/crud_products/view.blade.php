@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('edit-post', $product->id) }}" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="Name" class="form-label">Name:</label>
                        <input readonly type="text" class="form-control" id="name" placeholder="Enter name of product" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Details:</label>
                        <input readonly type="text" class="form-control" id="details" placeholder="Enter details of product"
                            name="details" value="{{ $product->details }}">
                    </div>
                    <a class="btn btn-dark" href="{{ route('index') }}">Back To HomePage</a>
                </form>
            </div>
        </div>
    </div>
@endsection