@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('index') }}"><h4>categories Page</h4></a>
                <div class="container mt-4">
                    <h2>Categories Table</h2>
                    <a class="btn btn-primary mb-3" href="{{ route('create-category-get') }}">Add</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Category</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categorie)
                                <tr>
                                    <td>{{ $categorie->id }}</td>
                                    <td>{{ $categorie->name }}</td>
                                    <td>{{ $categorie->details }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('view-category-get', $categorie->id) }}">View</a>

                                        <a class="btn btn-success" href="{{ route('edit-category-get', $categorie->id) }}">Edit</a>

                                        <a class="btn btn-danger" href="{{ route('delete-category', $categorie->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer cette Catégorie ?')">Delete</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
