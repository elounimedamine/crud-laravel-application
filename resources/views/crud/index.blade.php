@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container mt-3">
                    <h2>Products Table</h2>
                    <a class="btn btn-primary mb-3" href="{{ route('create-get') }}">Add</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Products</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->details }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('view-get', $product->id) }}">View</a>

                                        <a class="btn btn-success" href="{{ route('edit-get', $product->id) }}">Edit</a>

                                        <a class="btn btn-danger" href="{{ route('delete', $product->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer ce Product ?')">Delete</a>

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
