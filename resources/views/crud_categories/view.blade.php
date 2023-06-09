@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('edit-category-post', $categorie->id) }}" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="Name" class="form-label">Name:</label>
                        <input readonly type="text" class="form-control" id="name" placeholder="Enter name of categorie" name="name" value="{{ $categorie->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Details:</label>
                        <input readonly type="text" class="form-control" id="details" placeholder="Enter details of categorie"
                            name="details" value="{{ $categorie->details }}">
                    </div>
                    <a class="btn btn-dark" href="{{ route('index-category') }}">Back To HomePage</a>
                </form>
            </div>
        </div>
    </div>
@endsection