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
                    @php
                        $total = 0;
                    @endphp
                  @foreach ($cart_item as $item)
                  @php
                    $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                    $product_img = App\Models\Product::where('id', $item->product_id)->value('product_img');
                  @endphp
                  <tr>
                    <td>{{ $product_name }}</td>
                    <td><img style="width: 50px" src="{{ asset($product_img) }}" alt=""></td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->unit_price }}</td>
                    <td>{{ $item->total_price }}</td>
                    <td>
                      <a href="{{ route('remove.cart', $item->id) }}" class="btn btn-warning">Remove</a></td>
                  </tr>
                  @php
                      $total =   $total + $item->total_price;
                  @endphp
                  @endforeach
                  <tr>
                    <td colspan="4"><b>Total Price</b></td>
                    <td><b>{{ $total }}</b></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>
@endsection

