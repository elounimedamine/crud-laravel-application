@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('edit-post', $product->id) }}" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name_product" class="form-label">Name:</label>
                        <input readonly type="text" class="form-control" id="name_product"
                            placeholder="Enter name of product" name="name_product" value="{{ $product->name_product }}">
                    </div>
                    <div class="mb-3">
                        <label for="details_product" class="form-label">Details:</label>
                        <input readonly type="text" class="form-control" id="details_product"
                            placeholder="Enter details of product" name="details_product"
                            value="{{ $product->details_product }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="category_id">Category:</label>
                        <select disabled class="form-control" name="category_id">
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}"
                                    @if ($product->category_id == $categorie->id) selected @endif>
                                    {{ $categorie->name_category }}
                                </option>
                            @endforeach
                        </select>
                </div>
                    <a class="btn btn-dark" href="{{ route('index') }}">Back To HomePage</a>
                </form>
            </div>
        </div>
    </div>
@endsection
