@extends('admin.layouts.template')
@section('page_title')
All Sub Categories - Ecommerce website
@endsection
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card">
            <h5 class="card-header">All Sub Categories</h5>
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
                    <th>Sub Category Name</th>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($allsubcategories as $item )
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->sub_category_name }}</td>
                    <td>{{ $item->category_name }}</td>
                    <td>{{ $item->product_count }}</td>
                    <td><a href="{{ route('edit.subcategory', $item->id) }}" class="btn btn-primary">Edit</a> 
                      <a href="{{ route('delete.subcategory', $item->id) }}" class="btn btn-warning">Delete</a></td>
                </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>
@endsection

