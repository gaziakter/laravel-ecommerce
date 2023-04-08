@extends('admin.layouts.template')
@section('page_title')
All Product - Ecommerce website
@endsection
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card">
            <h5 class="card-header">All Products</h5>
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
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($products as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td><img style="width: 50px" src="{{ asset($item->product_img) }}" alt=""> <a href="{{ route('edit.image', $item->id) }}" class="btn btn-primary">Edit Image</a></td>
                    <td>{{ $item->price }}</td>
                    <td><a href="" class="btn btn-primary">Edit</a> <a href="" class="btn btn-warning">Delete</a></td>
                </tr>                    
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>
@endsection

