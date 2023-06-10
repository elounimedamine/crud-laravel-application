@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('edit-category-post', $categorie->id) }}" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name_category" class="form-label">Name:</label>
                        <input readonly type="text" class="form-control" id="name_category" placeholder="Enter name of categorie" name="name_category" value="{{ $categorie->name_category }}">
                    </div>
                    <div class="mb-3">
                        <label for="details_category" class="form-label">Details:</label>
                        <input readonly type="text" class="form-control" id="details_category" placeholder="Enter details of categorie"
                            name="details_category" value="{{ $categorie->details_category }}">
                    </div>
                    <a class="btn btn-dark" href="{{ route('index-category') }}">Back To HomePage</a>
                </form>
            </div>
        </div>
    </div>
@endsection