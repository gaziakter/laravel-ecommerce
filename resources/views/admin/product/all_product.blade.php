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
                    <tr>
                        <td>1</td>
                        <td>Walton B594</td>
                        <td>12</td>
                        <td>100</td>
                        <td><a href="" class="btn btn-primary">Edit</a> <a href="" class="btn btn-warning">Delete</a></td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>
@endsection

