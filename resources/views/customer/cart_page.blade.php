@extends('admin.layouts.template')
@section('page_title')
Cart Page - Ecommerce website
@endsection
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card">
            <h5 class="card-header">Cart Page</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                {{ session()->get('message') }}
                </div> 
            @endif
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($cart_item as $item)
                  <tr>
                    <td>{{ $item->product_id }}</td>
                    <td></td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->unit_price }}</td>
                    <td>{{ $item->total_price }}</td>
                    <td>
                      <a href="" class="btn btn-warning">Remove</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>
@endsection

