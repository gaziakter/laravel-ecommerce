@extends('admin.layouts.template')
@section('page_title')
All Categories - Ecommerce website
@endsection
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card">
            <h5 class="card-header">All Categories</h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Sub Category</th>
                    <th>Product</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>1</td>
                        <td>Electronics</td>
                        <td>12</td>
                        <td>23</td>
                        <td><a href="" class="btn btn-primary">Edit</a> <a href="" class="btn btn-warning">Delete</a></td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>
@endsection

