@extends('admin.layouts.template')
@section('page_title')
All Categories - Ecommerce website
@endsection
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card">
            <h5 class="card-header">All Categories</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                {{ session()->get('message') }}
                </div> 
            @endif
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Slug</th>
                    <th>Product</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($categories as $category)
                  <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->product_count }}</td>
                    <td>
                      <a href="{{ route('edit.category', $category->id) }}" class="btn btn-primary">Edit</a> 
                      <a href="" class="btn btn-warning">Delete</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>
@endsection

